<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\DonationService;
use Illuminate\Http\Request;

/**
 * @group Donations & Subscriptions
 *
 * APIs for processing online/offline donations, recurring monthly subscriptions, invoice generation, and donor receipts.
 */
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
        $donations = $this->donationService->getAllDonations($request->only(['search', 'status', 'sortBy', 'order', 'page', 'limit']));
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
            'plan_id' => 'nullable|integer|exists:plans,id|prohibits:campaign_id',
            'campaign_id' => 'nullable|integer|exists:campaigns,id|prohibits:plan_id',
            'auto_feeder_id' => 'nullable|integer|exists:auto_feeders,id',
            'new_feeder_name' => 'nullable|string|max:255',
            'new_feeder_address' => 'nullable|string',
            'type' => 'required|string|in:one_time,recurring',
            'anonymous' => 'nullable|boolean',
        ]);

        try {
            $type = $request->input('type');
            if ($type === 'one_time') {
                $response = $this->donationService->initiateOneTimeDonation($request->only(['amount', 'currency', 'donor_name', 'donor_email', 'donor_phone', 'pan_number', 'plan_id', 'campaign_id', 'auto_feeder_id', 'new_feeder_name', 'new_feeder_address', 'type', 'anonymous']));
                return $this->successResponse($response, 'One-time donation order created successfully.', 201);
            } else {
                $response = $this->donationService->initiateRecurringDonation($request->only(['amount', 'currency', 'donor_name', 'donor_email', 'donor_phone', 'pan_number', 'plan_id', 'campaign_id', 'auto_feeder_id', 'new_feeder_name', 'new_feeder_address', 'type', 'anonymous', 'cause_name']));
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
                $donation = $this->donationService->verifyOneTimeDonation($request->only(['type', 'razorpay_payment_id', 'razorpay_signature', 'razorpay_order_id']));
                return $this->successResponse($donation, 'Payment verified and donation completed successfully.');
            } else {
                $subscription = $this->donationService->verifyRecurringDonation($request->only(['type', 'razorpay_payment_id', 'razorpay_signature', 'razorpay_subscription_id']));
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
        $subscriptions = $this->donationService->getAllSubscriptions($request->only(['search', 'status', 'sortBy', 'order', 'page', 'limit']));
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
            $subscription = $this->donationService->updateSubscription($id, $request->only(['status', 'admin_notes']));
            if (!$subscription) {
                return $this->errorResponse('Subscription not found.', 404);
            }
            return $this->successResponse($subscription, 'Subscription updated successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update subscription: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Send Donation Invoice PDF to donor's email
     */
    public function sendInvoice(Request $request, $id)
    {
        $donation = $this->donationService->getDonationById($id);
        if (!$donation) {
            return $this->errorResponse('Donation record not found.', 404);
        }

        try {
            \Illuminate\Support\Facades\Mail::to($donation->donor_email)
                ->send(new \App\Mail\DonationInvoiceMail($donation));

            // Log this action to the activity timeline
            activity('donations')
                ->performedOn($donation)
                ->causedBy(auth()->user())
                ->log("Invoice sent to donor ({$donation->donor_email})");

            return $this->successResponse(null, 'Invoice sent successfully to donor email.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send invoice email: ' . $e->getMessage());
            return $this->errorResponse('Failed to send invoice: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Store a manually created donation record
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'nullable|string|size:3',
            'donor_name' => 'required|string|min:2',
            'donor_email' => 'required|email',
            'donor_phone' => 'nullable|string',
            'pan_number' => 'nullable|string|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/i',
            'plan_id' => 'nullable|integer|exists:plans,id|prohibits:campaign_id',
            'campaign_id' => 'nullable|integer|exists:campaigns,id|prohibits:plan_id',
            'auto_feeder_id' => 'nullable|integer|exists:auto_feeders,id',
            'status' => 'required|string|in:succeeded,pending,failed',
            'payment_gateway' => 'required|string',
            'gateway_transaction_id' => 'nullable|string',
            'anonymous' => 'nullable|boolean',
            'created_at' => 'nullable|date',
        ]);

        try {
            $donation = $this->donationService->createManualDonation($request->only(['amount', 'currency', 'donor_name', 'donor_email', 'donor_phone', 'pan_number', 'plan_id', 'campaign_id', 'auto_feeder_id', 'status', 'payment_gateway', 'gateway_transaction_id', 'anonymous', 'created_at']));
            return $this->successResponse($donation, 'Manual donation record created successfully.', 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create donation record: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Verify payment status of a dynamic UPI QR Code donation
     */
    public function verifyQrCode(Request $request, $id)
    {
        try {
            $donation = $this->donationService->verifyQrCodePayment($id);
            return $this->successResponse($donation, 'QR code payment verified.');
        } catch (\Exception $e) {
            return $this->errorResponse('Verification failed: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Get authenticated user's / donor's donation and subscription records
     */
    public function myDonations(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return $this->errorResponse('Unauthenticated.', 401);
        }

        $donations = \App\Models\Donation::with(['plan', 'campaign', 'subscription'])
            ->where(function ($q) use ($user) {
                $q->where('user_id', $user->id);
                if (!empty($user->email)) {
                    $q->orWhere('donor_email', $user->email);
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $subscriptions = \App\Models\RecurringSubscription::with(['plan', 'campaign'])
            ->where(function ($q) use ($user) {
                $q->where('user_id', $user->id);
                if (!empty($user->email)) {
                    $q->orWhere('donor_email', $user->email);
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->successResponse([
            'donations' => $donations,
            'subscriptions' => $subscriptions
        ], 'My donations retrieved successfully.');
    }

    /**
     * Download donation invoice PDF
     */
    public function downloadInvoice(Request $request, $id)
    {
        $donation = $this->donationService->getDonationById($id);

        if (!$donation) {
            return $this->errorResponse('Donation record not found.', 404);
        }

        $user = auth()->user();

        if ($user) {
            $isOwner = ($donation->user_id && $donation->user_id === $user->id) ||
                (strtolower($donation->donor_email) === strtolower($user->email));
            $isAdmin = $user->hasRole('Super Admin') || $user->hasRole('Admin');

            if (!$isOwner && !$isAdmin) {
                return $this->errorResponse('Unauthorized access to invoice.', 403);
            }
        }

        try {
            $settings = app(\App\Settings\GeneralSettings::class);
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.invoice', [
                'donation' => $donation,
                'settings' => $settings
            ]);

            $filename = 'invoice-donation-' . ($donation->gateway_transaction_id ?? $donation->id) . '.pdf';

            return response($pdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to generate PDF invoice: ' . $e->getMessage());
            return $this->errorResponse('Failed to generate PDF invoice: ' . $e->getMessage(), 500);
        }
    }
}
