<x-mail::message>
# Donation Invoice Received

Dear {{ $donation->donor_name }},

Thank you so much for your generous support of {{ app(\App\Settings\GeneralSettings::class)->site_name ?? 'Furrydom NGO' }}.

Your official donation receipt and invoice has been generated and is attached to this email as a PDF.

**Donation Details:**
- **Amount:** ₹{{ number_format($donation->amount, 2) }}
- **Date:** {{ $donation->created_at->format('M d, Y') }}
- **Transaction ID:** {{ $donation->gateway_transaction_id ?? $donation->transaction_id ?? 'N/A' }}

Your contribution directly helps us rescue, feed, and find loving homes for animals in need. We are deeply grateful for your support!

If you have any questions, feel free to contact us at {{ app(\App\Settings\GeneralSettings::class)->contact_email ?? 'contact@furrydom.com' }}.

Warm regards,<br>
The Team at {{ app(\App\Settings\GeneralSettings::class)->site_name ?? 'Furrydom NGO' }}
</x-mail::message>
