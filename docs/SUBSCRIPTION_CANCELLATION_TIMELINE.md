# 📜 Subscription Cancellation Audit & Timeline Documentation

This document explains how to track **who** cancelled a recurring donation subscription (Admin Staff, Donor, or Gateway Webhook) and render it in the **History Timeline** using Spatie Activity Log.

---

## 🎯 Overview

Subscriptions can be turned off/cancelled through three different channels:

| Cancellation Channel | Triggered By | Logged Causer | Description in History Timeline |
| :--- | :--- | :--- | :--- |
| **Admin Panel** | Admin / Staff | Admin User Model (`User#id`) | *"Cancelled by Admin: [Admin Name] ([Admin Email]) with reason: [Reason]"* |
| **Donor Portal** | Donor / Subscriber | Subscriber User Model (`User#id`) | *"Cancelled by Donor: [Donor Name] from self-service dashboard"* |
| **Razorpay Webhook** | Gateway / Bank / UPI | System (`null` causer or System Bot) | *"Cancelled via Razorpay Webhook (Bank/UPI Auto-debit turned off externally)"* |

---

## 🏗️ Architecture & Database Logging

The `App\Models\RecurringSubscription` model utilizes `Spatie\Activitylog\Traits\LogsActivity` and has a `activities()` relationship:

```php
public function activities()
{
    return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
}
```

Every cancellation event records:
- **`causer_type` & `causer_id`**: Identifies who initiated the change (Null if Webhook).
- **`properties` (JSON)**: Stores metadata like `cancellation_reason`, `cancelled_by_type` (`admin`, `donor`, `gateway`), `ip_address`, `gateway_subscription_id`.
- **`description`**: Human-readable activity summary.

---

## 💻 Backend Implementation

### 1. Admin Panel Cancellation (Admin Action)

When an admin cancels a subscription from the Admin Panel (`SubscriptionController` or `AdminController`):

```php
use App\Models\RecurringSubscription;
use Illuminate\Http\Request;

public function cancelByAdmin(Request $request, $id)
{
    $request->validate([
        'reason' => 'nullable|string|max:500',
    ]);

    $subscription = RecurringSubscription::findOrFail($id);
    $admin = auth()->user();

    // 1. Cancel on Gateway if active
    if ($subscription->gateway_subscription_id) {
        app(\App\Services\Api\V1\RazorpayService::class)->cancelSubscription($subscription->gateway_subscription_id);
    }

    // 2. Update Subscription Status
    $subscription->update([
        'status' => 'Cancelled',
        'ends_at' => now(),
    ]);

    // 3. Log Activity Timeline Entry
    activity()
        ->performedOn($subscription)
        ->causedBy($admin)
        ->withProperties([
            'cancelled_by_type' => 'admin',
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
            'reason' => $request->input('reason', 'Cancelled via Admin Panel'),
            'ip_address' => $request->ip(),
        ])
        ->log("Subscription cancelled by Admin ({$admin->name})");

    return response()->json([
        'success' => true,
        'message' => 'Subscription cancelled successfully by admin.',
        'subscription' => $subscription->fresh(['activities']),
    ]);
}
```

---

### 2. Donor Portal Cancellation (Donor Action)

When a donor turns off their subscription from the website user profile:

```php
public function cancelByDonor(Request $request, $id)
{
    $donor = auth()->user();

    $subscription = RecurringSubscription::where('id', $id)
        ->where('user_id', $donor->id)
        ->firstOrFail();

    // 1. Cancel on Razorpay Gateway
    if ($subscription->gateway_subscription_id) {
        app(\App\Services\Api\V1\RazorpayService::class)->cancelSubscription($subscription->gateway_subscription_id);
    }

    // 2. Update Subscription Status
    $subscription->update([
        'status' => 'Cancelled',
        'ends_at' => now(),
    ]);

    // 3. Log Activity Timeline Entry
    activity()
        ->performedOn($subscription)
        ->causedBy($donor)
        ->withProperties([
            'cancelled_by_type' => 'donor',
            'donor_id' => $donor->id,
            'donor_name' => $donor->name,
            'donor_email' => $donor->email,
            'ip_address' => $request->ip(),
        ])
        ->log("Subscription cancelled by Donor ({$donor->name})");

    return response()->json([
        'success' => true,
        'message' => 'Your subscription has been cancelled.',
    ]);
}
```

---

### 3. Razorpay Webhook Cancellation (External Action)

When auto-debit is turned off inside Google Pay / PhonePe / Bank or Razorpay Portal:

```php
public function handleRazorpayWebhook(Request $request)
{
    $payload = $request->all();
    $event = $payload['event'] ?? null;

    if ($event === 'subscription.cancelled' && isset($payload['payload']['subscription']['entity'])) {
        $subEntity = $payload['payload']['subscription']['entity'];
        $gatewaySubId = $subEntity['id'];

        $subscription = RecurringSubscription::where('gateway_subscription_id', $gatewaySubId)->first();

        if ($subscription && $subscription->status !== 'Cancelled') {
            $subscription->update([
                'status' => 'Cancelled',
                'ends_at' => now(),
            ]);

            // Log Activity Timeline Entry for Gateway Webhook
            activity()
                ->performedOn($subscription)
                ->withProperties([
                    'cancelled_by_type' => 'gateway_webhook',
                    'gateway' => 'Razorpay',
                    'gateway_subscription_id' => $gatewaySubId,
                    'reason' => $subEntity['cancellation_reason'] ?? 'Turned off via Bank/UPI Mandate',
                ])
                ->log('Subscription cancelled externally via Razorpay Webhook (UPI/Bank Mandate)');
        }
    }

    return response()->json(['status' => 'success']);
}
```

---

## 📊 Fetching History Timeline for Admin UI

To display the history timeline in the Admin Panel subscription detail view:

### API Endpoint (`SubscriptionAdminController@show`):

```php
public function show($id)
{
    $subscription = RecurringSubscription::with([
        'user',
        'plan',
        'campaign',
        'activities.causer', // Fetches who made each change
    ])->findOrFail($id);

    // Format activities for timeline UI
    $timeline = $subscription->activities->map(function ($activity) {
        $causer = $activity->causer;
        $properties = $activity->properties ?? [];

        return [
            'id' => $activity->id,
            'event' => $activity->description,
            'causer_type' => $properties['cancelled_by_type'] ?? ($causer ? 'user' : 'system'),
            'causer_name' => $causer ? $causer->name : ($properties['gateway'] ?? 'System / Webhook'),
            'causer_email' => $causer ? $causer->email : null,
            'properties' => $properties,
            'created_at' => $activity->created_at->toIso8601String(),
            'formatted_date' => $activity->created_at->format('M d, Y h:i A'),
        ];
    });

    return response()->json([
        'success' => true,
        'subscription' => $subscription,
        'timeline' => $timeline,
    ]);
}
```

---

## 🎨 Ant Design Timeline UI Example (Frontend)

```jsx
import { Timeline, Tag, Card } from 'antd';
import { FiCheckCircle, FiXCircle, FiUser, FiShield, FiGlobe } from 'react-icons/fi';

const SubscriptionTimeline = ({ timeline }) => {
  const getIcon = (type) => {
    if (type === 'admin') return <FiShield className="text-purple-500" />;
    if (type === 'donor') return <FiUser className="text-blue-500" />;
    return <FiGlobe className="text-orange-500" />;
  };

  return (
    <Card title="Subscription History Timeline" className="rounded-2xl shadow-xs">
      <Timeline
        items={timeline.map((item) => ({
          dot: getIcon(item.causer_type),
          children: (
            <div className="space-y-1">
              <div className="flex items-center gap-2">
                <span className="font-semibold text-sm">{item.event}</span>
                <Tag color={item.causer_type === 'admin' ? 'purple' : item.causer_type === 'donor' ? 'blue' : 'orange'}>
                  {item.causer_type.toUpperCase()}
                </Tag>
              </div>
              <p className="text-xs text-gray-500">
                By: {item.causer_name} {item.causer_email && `(${item.causer_email})`} • {item.formatted_date}
              </p>
              {item.properties?.reason && (
                <p className="text-xs text-gray-600 bg-gray-50 dark:bg-zinc-800 p-2 rounded-lg italic">
                  "{item.properties.reason}"
                </p>
              )}
            </div>
          ),
        }))}
      />
    </Card>
  );
};
