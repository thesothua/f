<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AuthService;
use Illuminate\Http\Request;
/**
 * @group Authentication Management
 *
 * APIs for user authentication, registration, Google OAuth, password resets, and profile management.
 */
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

        $result = $this->authService->login($request->only(['email', 'password']));
        if (is_array($result) && isset($result['error'])) {
            return $this->errorResponse($result['error'], $result['status_code'] ?? 403);
        }
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

        $data = $request->only(['name', 'email', 'password', 'phone', 'dob', 'anniversary']);

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
        $data = $request->only(['email', 'name', 'avatar', 'credential', 'access_token', 'phone', 'dob', 'gender', 'anniversary']);

        // 1. If access_token is provided, fetch user profile from Google
        if (!empty($request->access_token)) {
            try {
                // Primary: Use Google UserInfo endpoint (works with basic openid/email/profile scopes)
                $userinfoResp = \Illuminate\Support\Facades\Http::withToken($request->access_token)
                    ->get('https://www.googleapis.com/oauth2/v3/userinfo');

                if ($userinfoResp->successful()) {
                    $info = $userinfoResp->json();
                    $data['email'] = $info['email'] ?? ($data['email'] ?? null);
                    $data['name'] = $info['name'] ?? ($data['name'] ?? null);
                    $data['avatar'] = $info['picture'] ?? ($data['avatar'] ?? null);
                }

                // Optional enrichment: Try People API for birthday, gender, phone
                // This will only work if the user granted those scopes
                $peopleResp = \Illuminate\Support\Facades\Http::withToken($request->access_token)
                    ->get('https://people.googleapis.com/v1/people/me', [
                        'personFields' => 'phoneNumbers,birthdays,genders',
                    ]);

                if ($peopleResp->successful()) {
                    $payload = $peopleResp->json();

                    // Extract phone number
                    if (!empty($payload['phoneNumbers'][0]['value'])) {
                        $data['phone'] = $payload['phoneNumbers'][0]['value'];
                    }

                    // Extract birthday (dob)
                    if (!empty($payload['birthdays'])) {
                        foreach ($payload['birthdays'] as $bday) {
                            if (!empty($bday['date'])) {
                                $d = $bday['date'];
                                $year = $d['year'] ?? 2000;
                                $month = isset($d['month']) ? str_pad($d['month'], 2, '0', STR_PAD_LEFT) : null;
                                $day = isset($d['day']) ? str_pad($d['day'], 2, '0', STR_PAD_LEFT) : null;

                                if ($month && $day) {
                                    $data['dob'] = "{$year}-{$month}-{$day}";
                                    break;
                                }
                            }
                        }
                    }

                    // Extract gender
                    if (!empty($payload['genders'][0]['value'])) {
                        $g = strtolower($payload['genders'][0]['value']);
                        if ($g === 'male') $data['gender'] = 'Male';
                        elseif ($g === 'female') $data['gender'] = 'Female';
                        elseif ($g === 'other') $data['gender'] = 'Other';
                        else $data['gender'] = ucfirst($g);
                    }
                }
                // People API failure is non-fatal — basic login still works
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::warning('Google auth fetch error: ' . $e->getMessage());
            }
        }

        // 2. Verify Google ID Token securely if credential string is provided
        if (empty($data['email']) && !empty($request->credential)) {
            try {
                $response = \Illuminate\Support\Facades\Http::get('https://oauth2.googleapis.com/tokeninfo', [
                    'id_token' => $request->credential,
                ]);

                if ($response->successful()) {
                    $payload = $response->json();

                    $clientId = config('services.google.client_id');
                    if (empty($clientId)) {
                        return $this->errorResponse('Google Client ID is not configured on the server.', 500);
                    }
                    if (isset($payload['aud']) && $payload['aud'] !== $clientId) {
                        return $this->errorResponse('Invalid Google Client ID token.', 401);
                    }

                    if (isset($payload['email'])) {
                        $data['email'] = $payload['email'];
                        $data['name'] = $payload['name'] ?? ($data['name'] ?? null);
                        $data['avatar'] = $payload['picture'] ?? ($data['avatar'] ?? null);
                    }
                } else {
                    return $this->errorResponse('Google token verification failed.', 401);
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::warning('Google token verification error: ' . $e->getMessage());
            }
        }

        if (empty($data['email'])) {
            return $this->errorResponse('Valid email is required for Google login.', 422);
        }

        if ($request->has('phone') && !empty($request->input('phone'))) $data['phone'] = $request->input('phone');
        if ($request->has('dob') && !empty($request->input('dob'))) $data['dob'] = $request->input('dob');
        if ($request->has('gender') && !empty($request->input('gender'))) $data['gender'] = $request->input('gender');
        if ($request->has('anniversary') && !empty($request->input('anniversary'))) $data['anniversary'] = $request->input('anniversary');

        $result = $this->authService->googleLogin($data);
        if (is_array($result) && isset($result['error'])) {
            return $this->errorResponse($result['error'], $result['status_code'] ?? 403);
        }
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
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'gender' => 'nullable|string|max:50',
            'dob' => 'nullable|date',
            'anniversary' => 'nullable|date',
            'bio' => 'nullable|string',
            'avatar' => 'nullable',
            'current_password' => 'nullable|string|required_with:password',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return $this->errorResponse('The provided current password does not match our records.', 422);
            }
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = asset('storage/' . $path);
        } elseif ($request->filled('avatar') && is_string($request->input('avatar'))) {
            $user->avatar = $request->input('avatar');
        }

        $user->fill($request->only([
            'name',
            'phone',
            'gender',
            'dob',
            'anniversary',
            'bio',
        ]));

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
