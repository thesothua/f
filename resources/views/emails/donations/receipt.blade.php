@component('mail::message')
# Thank You, {{ $donation->donor_name }}!

We have successfully received your generous contribution. Your support directly helps us rescue, feed, and provide veterinary care to stray and injured animals in need.

### Donation Details:
* **Amount:** {{ $donation->currency }} {{ number_format($donation->amount, 2) }}
* **Transaction ID:** `{{ $donation->gateway_transaction_id }}`
* **Date:** {{ $donation->created_at->format('M d, Y H:i') }}
* **Purpose:** {{ $donation->plan ? $donation->plan->title : 'General Care' }}

@if($donation->pan_number)
* **PAN Number provided:** `{{ $donation->pan_number }}`
*(Note: A tax exemption receipt will be processed and sent to you separately based on this PAN)*
@endif

---

Every penny counts toward rescuing a life. Thanks to animal lovers like you, we can continue to stand up for those who cannot speak for themselves.

@component('mail::button', ['url' => config('app.url')])
Visit Our Website
@endcomponent

With warm regards and gratitude,<br>
**Team {{ config('app.name') }}**
@endcomponent
