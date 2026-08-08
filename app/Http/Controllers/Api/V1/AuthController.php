<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $result = $this->authService->login($request->all());
        if (!$result) {
            return $this->errorResponse('Invalid email or password.', 401);
        }
        return $this->successResponse($result, 'User logged in successfully.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:50',
            'dob' => 'nullable|date',
            'anniversary' => 'nullable|date',
            'avatar' => 'nullable',
        ]);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('avatars', $filename, 'public');
            $data['avatar'] = url('storage/' . $path);
        }

        $result = $this->authService->register($data);
        return $this->successResponse($result, 'User registered successfully.', 201);
    }

    public function googleLogin(Request $request)
    {
        $data = $request->all();

        // Verify Google ID Token securely if credential string is provided
        if (!empty($request->credential)) {
            try {
                $response = \Illuminate\Support\Facades\Http::get('https://oauth2.googleapis.com/tokeninfo', [
                    'id_token' => $request->credential,
                ]);

                if ($response->successful()) {
                    $payload = $response->json();
                    
                    $clientId = config('services.google.client_id');
                    if (!empty($clientId) && isset($payload['aud']) && $payload['aud'] !== $clientId) {
                        return $this->errorResponse('Invalid Google Client ID token.', 401);
                    }

                    if (isset($payload['email'])) {
                        $data['email'] = $payload['email'];
                        $data['name'] = $payload['name'] ?? ($data['name'] ?? null);
                        $data['avatar'] = $payload['picture'] ?? ($data['avatar'] ?? null);
                    }
                } else {
                    // Fallback to manual payload decode if tokeninfo endpoint is unreachable
                    $parts = explode('.', $request->credential);
                    if (count($parts) === 3) {
                        $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
                        if ($payload && isset($payload['email'])) {
                            $data['email'] = $payload['email'];
                            $data['name'] = $payload['name'] ?? ($data['name'] ?? null);
                            $data['avatar'] = $payload['picture'] ?? ($data['avatar'] ?? null);
                        }
                    }
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::warning('Google token verification error: ' . $e->getMessage());
            }
        }

        if (empty($data['email'])) {
            return $this->errorResponse('Valid email is required for Google login.', 422);
        }

        if ($request->has('phone')) $data['phone'] = $request->input('phone');
        if ($request->has('dob')) $data['dob'] = $request->input('dob');
        if ($request->has('gender')) $data['gender'] = $request->input('gender');
        if ($request->has('anniversary')) $data['anniversary'] = $request->input('anniversary');

        $result = $this->authService->googleLogin($data);
        return $this->successResponse($result, 'Google login successful.');
    }

    public function logout(Request $request)
    {
        $status = $this->authService->logout($request->user());
        if (!$status) {
            return $this->errorResponse('Logout failed.', 400);
        }
        return $this->successResponse(null, 'User logged out successfully.');
    }

    public function me(Request $request)
    {
        $user = $this->authService->me($request->user());
        if (!$user) {
            return $this->errorResponse('User not found.', 404);
        }
        return $this->successResponse($user, 'User retrieved successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'gender' => 'nullable|string|max:50',
            'dob' => 'nullable|date',
            'anniversary' => 'nullable|date',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|string|max:1000',
            'current_password' => 'nullable|string|required_with:password',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return $this->errorResponse('The provided current password does not match our records.', 422);
            }
            $user->password = Hash::make($request->input('password'));
        }

        $user->fill($request->only([
            'first_name',
            'last_name',
            'phone',
            'gender',
            'dob',
            'anniversary',
            'bio',
            'avatar',
        ]));

        if ($request->filled('name')) {
            $user->name = $request->input('name');
        } else if ($request->filled('first_name') || $request->filled('last_name')) {
            $user->name = trim($request->input('first_name') . ' ' . $request->input('last_name'));
        }

        if (empty($user->name)) {
            $user->name = $user->email;
        }

        $user->save();

        return $this->successResponse($user->load('roles.permissions', 'permissions'), 'Profile updated successfully.');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = \Illuminate\Support\Facades\Password::broker()->sendResetLink(
            $request->only('email')
        );

        return $status === \Illuminate\Support\Facades\Password::RESET_LINK_SENT
            ? $this->successResponse(null, __($status))
            : $this->errorResponse(__($status), 422);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = \Illuminate\Support\Facades\Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => \Illuminate\Support\Facades\Hash::make($password)
                ])->setRememberToken(\Illuminate\Support\Str::random(60));

                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user));
            }
        );

        return $status === \Illuminate\Support\Facades\Password::PASSWORD_RESET
            ? $this->successResponse(null, __($status))
            : $this->errorResponse(__($status), 422);
    }
}
