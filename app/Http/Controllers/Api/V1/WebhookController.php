<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RecurringSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * Handle Razorpay incoming webhooks for subscription events.
     */
    public function handleRazorpayWebhook(Request $request)
    {
        $webhookSecret = config('services.razorpay.webhook_secret');
        $signature = $request->header('X-Razorpay-Signature');

        // Verify Razorpay Webhook Signature if secret is configured
        if (!empty($webhookSecret)) {
            if (empty($signature)) {
                Log::warning('Razorpay webhook request missing X-Razorpay-Signature header.');
                return response()->json(['status' => 'error', 'message' => 'Missing webhook signature header'], 400);
            }
            $expectedSignature = hash_hmac('sha256', $request->getContent(), $webhookSecret);
            if (!hash_equals($expectedSignature, $signature)) {
                Log::warning('Invalid Razorpay webhook signature received.');
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
            }
        }

        $payload = $request->all();
        $event = $payload['event'] ?? null;

        Log::info("Razorpay Webhook Received: {$event}");

        try {
            if (isset($payload['payload']['subscription']['entity'])) {
                $subEntity = $payload['payload']['subscription']['entity'];
                $gatewaySubscriptionId = $subEntity['id'] ?? null;

                if ($gatewaySubscriptionId) {
                    $subscription = RecurringSubscription::where('gateway_subscription_id', $gatewaySubscriptionId)->first();

                    if ($subscription) {
                        switch ($event) {
                            case 'subscription.cancelled':
                                if (strtolower($subscription->status) !== 'cancelled') {
                                    $subscription->update([
                                        'status' => 'cancelled',
                                        'ends_at' => now(),
                                    ]);

                                    activity('subscriptions')
                                        ->performedOn($subscription)
                                        ->withProperties([
                                            'cancelled_by' => 'Razorpay Webhook (Bank/UPI Auto-debit)',
                                            'cancelled_by_type' => 'gateway_webhook',
                                            'gateway' => 'Razorpay',
                                            'gateway_subscription_id' => $gatewaySubscriptionId,
                                            'cancellation_reason' => $subEntity['cancellation_reason'] ?? 'Mandate revoked or cancelled externally',
                                        ])
                                        ->log('Subscription cancelled externally via Razorpay Webhook (Bank/UPI Mandate turned off)');

                                    Log::info("Subscription {$subscription->id} ({$gatewaySubscriptionId}) marked as cancelled via webhook.");
                                }
                                break;

                            case 'subscription.paused':
                                $subscription->update(['status' => 'paused']);
                                activity('subscriptions')
                                    ->performedOn($subscription)
                                    ->withProperties([
                                        'cancelled_by_type' => 'gateway_webhook',
                                        'gateway' => 'Razorpay'
                                    ])
                                    ->log('Subscription paused via Razorpay Webhook');
                                break;

                            case 'subscription.resumed':
                                $subscription->update(['status' => 'active']);
                                activity('subscriptions')
                                    ->performedOn($subscription)
                                    ->withProperties([
                                        'cancelled_by_type' => 'gateway_webhook',
                                        'gateway' => 'Razorpay'
                                    ])
                                    ->log('Subscription resumed via Razorpay Webhook');
                                break;

                            case 'subscription.halted':
                                $subscription->update(['status' => 'halted']);
                                activity('subscriptions')
                                    ->performedOn($subscription)
                                    ->withProperties([
                                        'cancelled_by_type' => 'gateway_webhook',
                                        'gateway' => 'Razorpay'
                                    ])
                                    ->log('Subscription halted due to repeated billing failure');
                                break;
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            Log::error("Razorpay webhook handling error: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }

        return response()->json(['status' => 'success']);
    }
}
