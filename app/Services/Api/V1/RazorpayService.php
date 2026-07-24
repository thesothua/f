<?php

namespace App\Services\Api\V1;

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Log;

class RazorpayService
{
    protected $api;

    public function __construct()
    {
        $keyId = env('RAZORPAY_KEY_ID', 'rzp_test_placeholder');
        $keySecret = env('RAZORPAY_KEY_SECRET', 'placeholder_secret');
        $this->api = new Api($keyId, $keySecret);
    }

    /**
     * Create a Razorpay Order for one-time payments
     */
    public function createOrder($amount, $currency = 'INR')
    {
        // Razorpay expects amount in paise (multiply by 100)
        $orderData = [
            'receipt'         => 'rcpt_' . time(),
            'amount'          => intval($amount * 100), 
            'currency'        => $currency,
            'payment_capture' => 1 // Auto capture payment
        ];

        return $this->api->order->create($orderData);
    }

    /**
     * Verify payment signature for one-time payments
     */
    public function verifyPaymentSignature(array $attributes)
    {
        try {
            $this->api->utility->verifyPaymentSignature([
                'razorpay_order_id' => $attributes['razorpay_order_id'],
                'razorpay_payment_id' => $attributes['razorpay_payment_id'],
                'razorpay_signature' => $attributes['razorpay_signature']
            ]);
            return true;
        } catch (SignatureVerificationError $e) {
            Log::error('Razorpay payment verification failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Create a Razorpay Plan dynamically for recurring payments
     */
    public function createPlan($amount, $name = 'Monthly Donation', $currency = 'INR')
    {
        return $this->api->plan->create([
            'period' => 'daily', // Options: daily, weekly, monthly, yearly (using daily/weekly for testing, monthly for production)
            'interval' => 30, // Every 30 days = roughly monthly
            'item' => [
                'name' => $name,
                'amount' => intval($amount * 100),
                'currency' => $currency,
                'description' => 'Furrydom Monthly Recurring Support'
            ]
        ]);
    }

    /**
     * Create a Razorpay Subscription
     */
    public function createSubscription($planId, $customerDetails = [])
    {
        $subscriptionData = [
            'plan_id' => $planId,
            'total_count' => 120, // 10 years of monthly billing
            'quantity' => 1,
            'customer_notify' => 1,
        ];

        return $this->api->subscription->create($subscriptionData);
    }

    /**
     * Verify subscription payment signature
     */
    public function verifySubscriptionSignature(array $attributes)
    {
        try {
            $this->api->utility->verifyPaymentSignature([
                'razorpay_subscription_id' => $attributes['razorpay_subscription_id'],
                'razorpay_payment_id' => $attributes['razorpay_payment_id'],
                'razorpay_signature' => $attributes['razorpay_signature']
            ]);
            return true;
        } catch (SignatureVerificationError $e) {
            Log::error('Razorpay subscription verification failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Cancel a Razorpay Subscription
     */
    public function cancelSubscription($subscriptionId)
    {
        try {
            return $this->api->subscription->fetch($subscriptionId)->cancel();
        } catch (\Exception $e) {
            Log::error('Failed to cancel Razorpay subscription ' . $subscriptionId . ': ' . $e->getMessage());
            return null;
        }
    }
}
