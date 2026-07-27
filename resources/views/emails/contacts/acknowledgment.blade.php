@component('mail::message')
# Hello {{ $contact->name }},

Thank you for reaching out to us. We have successfully received your inquiry submitted via our contact form.

### Summary of your message:
* **Subject:** {{ $contact->subject ?? 'General Inquiry' }}
* **Message:** 
  > "{{ $contact->message }}"

Our support team or appropriate coordinator will look into your message and respond back to you at this email address within 24-48 business hours.

If this is an urgent rescue request, please contact our emergency helpline directly.

Kind regards,<br>
**Support Team, {{ config('app.name') }}**
@endcomponent
