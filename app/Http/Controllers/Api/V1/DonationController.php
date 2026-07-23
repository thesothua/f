<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\DonationService;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    protected $donationService;

    public function __construct(DonationService $donationService)
    {
        $this->donationService = $donationService;
    }

    /**
     * Display a listing of donations (Transactions)
     */
    public function index(Request $request)
    {
        $donations = $this->donationService->getAllDonations($request->all());
        return $this->successResponse($donations, 'Donation records retrieved successfully.');
    }

    /**
     * Display a specific donation
     */
    public function show(Request $request, $id)
    {
        $donation = $this->donationService->getDonationById($id);
        if (!$donation) {
            return $this->errorResponse('Donation record not found.', 404);
        }
        return $this->successResponse($donation, 'Donation record retrieved successfully.');
    }

    /**
     * Initiate a donation (One-Time or Recurring)
     */
    public function initiate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'nullable|string|size:3',
            'donor_name' => 'required|string|min:2',
            'donor_email' => 'required|email',
            'donor_phone' => 'nullable|string',
            'pan_number' => 'nullable|string|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/i', // Validation for PAN format
            'plan_id' => 'nullable|integer|exists:plans,id',
            'type' => 'required|string|in:one_time,recurring',
            'anonymous' => 'nullable|boolean',
        ]);

        try {
            $type = $request->input('type');
            if ($type === 'one_time') {
                $response = $this->donationService->initiateOneTimeDonation($request->all());
                return $this->successResponse($response, 'One-time donation order created successfully.', 201);
            } else {
                $response = $this->donationService->initiateRecurringDonation($request->all());
                return $this->successResponse($response, 'Recurring monthly donation plan initiated.', 201);
            }
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to initiate payment: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Verify payment signature from checkout (One-Time or Recurring)
     */
    public function verify(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:one_time,recurring',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature' => 'required|string',
            'razorpay_order_id' => 'required_if:type,one_time|string',
            'razorpay_subscription_id' => 'required_if:type,recurring|string',
        ]);

        try {
            $type = $request->input('type');
            if ($type === 'one_time') {
                $donation = $this->donationService->verifyOneTimeDonation($request->all());
                return $this->successResponse($donation, 'Payment verified and donation completed successfully.');
            } else {
                $subscription = $this->donationService->verifyRecurringDonation($request->all());
                return $this->successResponse($subscription, 'Payment verified and subscription activated.');
            }
        } catch (\Exception $e) {
            return $this->errorResponse('Verification failed: ' . $e->getMessage(), 400);
        }
    }

    /**
     * Display list of all subscriptions
     */
    public function subscriptions(Request $request)
    {
        $subscriptions = $this->donationService->getAllSubscriptions($request->all());
        return $this->successResponse($subscriptions, 'Recurring subscriptions retrieved successfully.');
    }

    /**
     * Display a specific subscription details
     */
    public function showSubscription(Request $request, $id)
    {
        $subscription = $this->donationService->getSubscriptionById($id);
        if (!$subscription) {
            return $this->errorResponse('Subscription not found.', 404);
        }
        return $this->successResponse($subscription, 'Subscription details retrieved successfully.');
    }

    /**
     * Cancel a recurring subscription
     */
    public function cancelSubscription(Request $request, $id)
    {
        try {
            $cancelled = $this->donationService->cancelSubscription($id);
            if (!$cancelled) {
                return $this->errorResponse('Subscription not found.', 404);
            }
            return $this->successResponse(null, 'Subscription cancelled successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to cancel subscription: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Delete a donation record
     */
    public function destroy(Request $request, $id)
    {
        $deleted = $this->donationService->deleteDonation($id);
        if (!$deleted) {
            return $this->errorResponse('Donation record not found.', 404);
        }
        return $this->successResponse(null, 'Donation record deleted successfully.');
    }

    /**
     * Update subscription details
     */
    public function updateSubscription(Request $request, $id)
    {
        $request->validate([
            'status' => 'sometimes|required|string|in:active,pending,cancelled',
            'admin_notes' => 'nullable|string',
        ]);

        try {
            $subscription = $this->donationService->updateSubscription($id, $request->all());
            if (!$subscription) {
                return $this->errorResponse('Subscription not found.', 404);
            }
            return $this->successResponse($subscription, 'Subscription updated successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update subscription: ' . $e->getMessage(), 500);
        }
    }
}
