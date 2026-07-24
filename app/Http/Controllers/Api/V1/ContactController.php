<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index(Request $request)
    {
        $contacts = $this->contactService->getAllContacts($request->all());
        return $this->successResponse($contacts, 'Contact messages retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $contact = $this->contactService->getContactById($id);
        if (!$contact) {
            return $this->errorResponse('Contact message not found.', 404);
        }
        return $this->successResponse($contact, 'Contact message retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'subject' => 'nullable|string',
            'message' => 'required|string',
            'recaptcha_token' => 'required|string',
        ]);

        $recaptchaToken = $request->input('recaptcha_token');

        $response = \Illuminate\Support\Facades\Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $recaptchaToken,
            'remoteip' => $request->ip(),
        ]);

        if (!$response->successful() || !$response->json('success')) {
            return $this->errorResponse('reCAPTCHA verification failed. Please try again.', 422);
        }

        $contact = $this->contactService->createContact($request->all());

        // Trigger Admin Notification
        try {
            $admins = \App\Models\User::all();
            \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewContactInquiryReceived($contact));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send NewContactInquiryReceived notification: ' . $e->getMessage());
        }

        return $this->successResponse($contact, 'Message sent successfully! We will get back to you soon.', 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'sometimes|required|string|in:Unread,Read,Replied',
            'adminNotes' => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        $contact = $this->contactService->updateContact($id, $request->all());

        if (!$contact) {
            return $this->errorResponse('Contact message not found.', 404);
        }

        return $this->successResponse($contact, 'Contact thread updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->contactService->deleteContact($id);
        if (!$deleted) {
            return $this->errorResponse('Contact message not found.', 404);
        }
        return $this->successResponse(null, 'Contact message deleted successfully.');
    }
}
