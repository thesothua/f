<?php

namespace App\Services\Api\V1;

use App\Models\Donation;
use App\Models\RecurringSubscription;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DonationService
{
    protected $razorpay;

    public function __construct(RazorpayService $razorpay)
    {
        $this->razorpay = $razorpay;
    }

    /**
     * Get list of all donations (with search, filter, pagination)
     */
    public function getAllDonations($params = [])
    {
        $query = Donation::with(['plan', 'subscription', 'campaign']);

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('donor_phone', 'like', "%{$search}%")
                  ->orWhere('pan_number', 'like', "%{$search}%")
                  ->orWhere('gateway_transaction_id', 'like', "%{$search}%");
            });
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getDonationById($id)
    {
        return Donation::with(['plan', 'subscription', 'campaign'])->find($id);
    }

    /**
     * Initiate a One-Time Donation
     */
    public function initiateOneTimeDonation($data)
    {
        return DB::transaction(function () use ($data) {
            $amount = floatval($data['amount']);
            $currency = $data['currency'] ?? 'INR';

            // Create Razorpay Order
            $order = $this->razorpay->createOrder($amount, $currency);

            // Create pending Donation record
            $donation = Donation::create([
                'user_id' => $data['user_id'] ?? null,
                'plan_id' => $data['plan_id'] ?? null, // Target Cause
                'campaign_id' => $data['campaign_id'] ?? null, // Target Campaign
                'donor_name' => $data['donor_name'],
                'donor_email' => $data['donor_email'],
                'donor_phone' => $data['donor_phone'] ?? null,
                'pan_number' => $data['pan_number'] ?? null,
                'amount' => $amount,
                'currency' => $currency,
                'status' => 'pending',
                'payment_gateway' => 'razorpay',
                'gateway_order_id' => $order['id'],
                'anonymous' => filter_var($data['anonymous'] ?? false, FILTER_VALIDATE_BOOLEAN),
            ]);

            return [
                'donation' => $donation,
                'razorpay_order_id' => $order['id'],
                'amount' => $amount,
                'currency' => $currency,
                'key_id' => env('RAZORPAY_KEY_ID', '')
            ];
        });
    }

    /**
     * Verify payment signature for one-time donation
     */
    public function verifyOneTimeDonation($data)
    {
        return DB::transaction(function () use ($data) {
            // Find donation by order ID
            $donation = Donation::where('gateway_order_id', $data['razorpay_order_id'])->first();

            if (!$donation) {
                throw new \Exception('Donation order not found.');
            }

            if ($donation->status === 'succeeded') {
                return $donation;
            }

            // Verify with Razorpay signature
            $verified = $this->razorpay->verifyPaymentSignature([
                'razorpay_order_id' => $data['razorpay_order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature' => $data['razorpay_signature']
            ]);

            if (!$verified) {
                $donation->update(['status' => 'failed']);
                throw new \Exception('Payment verification failed.');
            }

            // Update donation record
            $donation->update([
                'status' => 'succeeded',
                'gateway_transaction_id' => $data['razorpay_payment_id']
            ]);

            // Update associated Plan (cause) raised amount
            if ($donation->plan_id) {
                $plan = Plan::find($donation->plan_id);
                if ($plan) {
                    $plan->increment('raised_amount', $donation->amount);
                }
            }

            // Update associated Campaign raised amount
            if ($donation->campaign_id) {
                $campaign = \App\Models\Campaign::find($donation->campaign_id);
                if ($campaign) {
                    $oldProgress = $campaign->progress_percentage;
                    $campaign->increment('raised_amount', $donation->amount);
                    $campaign->refresh();
                    
                    if ($oldProgress < 100 && $campaign->progress_percentage >= 100) {
                        try {
                            $admins = \App\Models\User::all();
                            \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\CampaignGoalReached($campaign));
                        } catch (\Exception $e) {
                            Log::error('Failed to send CampaignGoalReached notification: ' . $e->getMessage());
                        }
                    }
                }
            }

            // Trigger Admin Notification
            try {
                $admins = \App\Models\User::all();
                \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewDonationReceived($donation));
            } catch (\Exception $e) {
                Log::error('Failed to send NewDonationReceived notification: ' . $e->getMessage());
            }

            return $donation;
        });
    }

    /**
     * Initiate a Recurring Monthly Donation
     */
    public function initiateRecurringDonation($data)
    {
        return DB::transaction(function () use ($data) {
            $amount = floatval($data['amount']);
            $currency = $data['currency'] ?? 'INR';

            // 1. Create a Razorpay Plan dynamically
            $razorpayPlan = $this->razorpay->createPlan($amount, 'Monthly Support for ' . ($data['cause_name'] ?? 'Furrydom'), $currency);

            // 2. Create the Subscription in Razorpay
            $subscription = $this->razorpay->createSubscription($razorpayPlan['id'], [
                'name' => $data['donor_name'],
                'email' => $data['donor_email'],
                'contact' => $data['donor_phone'] ?? ''
            ]);

            // 3. Create a pending RecurringSubscription record locally
            $localSub = RecurringSubscription::create([
                'user_id' => $data['user_id'] ?? null,
                'plan_id' => $data['plan_id'] ?? null, // Target cause ID
                'campaign_id' => $data['campaign_id'] ?? null, // Target campaign ID
                'donor_name' => $data['donor_name'],
                'donor_email' => $data['donor_email'],
                'donor_phone' => $data['donor_phone'] ?? null,
                'pan_number' => $data['pan_number'] ?? null,
                'amount' => $amount,
                'currency' => $currency,
                'status' => 'pending',
                'gateway' => 'razorpay',
                'gateway_subscription_id' => $subscription['id'],
            ]);

            return [
                'subscription' => $localSub,
                'razorpay_subscription_id' => $subscription['id'],
                'amount' => $amount,
                'currency' => $currency,
                'key_id' => env('RAZORPAY_KEY_ID', '')
            ];
        });
    }

    /**
     * Verify and activate recurring monthly donation
     */
    public function verifyRecurringDonation($data)
    {
        return DB::transaction(function () use ($data) {
            $localSub = RecurringSubscription::where('gateway_subscription_id', $data['razorpay_subscription_id'])->first();

            if (!$localSub) {
                throw new \Exception('Subscription record not found.');
            }

            if ($localSub->status === 'active') {
                return $localSub;
            }

            // Verify with Razorpay signature
            $verified = $this->razorpay->verifySubscriptionSignature([
                'razorpay_subscription_id' => $data['razorpay_subscription_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature' => $data['razorpay_signature']
            ]);

            if (!$verified) {
                $localSub->update(['status' => 'cancelled']);
                throw new \Exception('Subscription verification failed.');
            }

            // Update Subscription Status
            $localSub->update([
                'status' => 'active',
                'next_billing_at' => now()->addDays(30)
            ]);

            // Create the first cycle Donation record
            $donation = Donation::create([
                'user_id' => $localSub->user_id,
                'plan_id' => $localSub->plan_id,
                'campaign_id' => $localSub->campaign_id,
                'subscription_id' => $localSub->id,
                'donor_name' => $localSub->donor_name,
                'donor_email' => $localSub->donor_email,
                'donor_phone' => $localSub->donor_phone,
                'pan_number' => $localSub->pan_number,
                'amount' => $localSub->amount,
                'currency' => $localSub->currency,
                'status' => 'succeeded',
                'payment_gateway' => 'razorpay',
                'gateway_transaction_id' => $data['razorpay_payment_id'],
                'anonymous' => false
            ]);

            // Update Cause / Plan Raised Amount
            if ($localSub->plan_id) {
                $plan = Plan::find($localSub->plan_id);
                if ($plan) {
                    $plan->increment('raised_amount', $localSub->amount);
                }
            }

            // Update Campaign Raised Amount
            if ($localSub->campaign_id) {
                $campaign = \App\Models\Campaign::find($localSub->campaign_id);
                if ($campaign) {
                    $oldProgress = $campaign->progress_percentage;
                    $campaign->increment('raised_amount', $localSub->amount);
                    $campaign->refresh();
                    
                    if ($oldProgress < 100 && $campaign->progress_percentage >= 100) {
                        try {
                            $admins = \App\Models\User::all();
                            \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\CampaignGoalReached($campaign));
                        } catch (\Exception $e) {
                            Log::error('Failed to send CampaignGoalReached notification: ' . $e->getMessage());
                        }
                    }
                }
            }

            // Trigger Admin Notification
            try {
                $admins = \App\Models\User::all();
                \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\NewDonationReceived($donation));
            } catch (\Exception $e) {
                Log::error('Failed to send NewDonationReceived notification: ' . $e->getMessage());
            }

            return $localSub;
        });
    }

    /**
     * Get list of all recurring subscriptions
     */
    public function getAllSubscriptions($params = [])
    {
        $query = RecurringSubscription::with('plan');

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('donor_name', 'like', "%{$search}%")
                  ->orWhere('donor_email', 'like', "%{$search}%")
                  ->orWhere('donor_phone', 'like', "%{$search}%")
                  ->orWhere('pan_number', 'like', "%{$search}%")
                  ->orWhere('gateway_subscription_id', 'like', "%{$search}%");
            });
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getSubscriptionById($id)
    {
        return RecurringSubscription::with('plan')->find($id);
    }

    /**
     * Cancel a recurring subscription
     */
    public function cancelSubscription($id)
    {
        return DB::transaction(function () use ($id) {
            $subscription = RecurringSubscription::find($id);

            if (!$subscription) {
                return false;
            }

            // Call Razorpay API to cancel subscription
            $this->razorpay->cancelSubscription($subscription->gateway_subscription_id);

            // Update locally
            $subscription->update([
                'status' => 'cancelled',
                'ends_at' => now()
            ]);

            return true;
        });
    }

    /**
     * Delete a donation record
     */
    public function deleteDonation($id)
    {
        $donation = Donation::find($id);
        if (!$donation) {
            return false;
        }
        $donation->delete();
        return true;
    }

    /**
     * Update subscription details locally
     */
    public function updateSubscription($id, $data)
    {
        $sub = RecurringSubscription::find($id);
        if (!$sub) {
            return null;
        }

        $updateData = [];
        if (isset($data['status'])) $updateData['status'] = $data['status'];
        if (isset($data['admin_notes'])) $updateData['admin_notes'] = $data['admin_notes'];

        $sub->update($updateData);
        return $sub->fresh();
    }
}
