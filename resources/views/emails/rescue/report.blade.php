@component('mail::message')
# Rescue Case Status Report

Dear {{ $case->animalReport->reporter_name ?? 'Furrydom Supporter' }},

We are writing to share an update regarding the rescue case you reported. Thanks to your prompt report, we were able to intervene and provide care for the animal in need.

Please find the official status report and case details attached as a PDF to this email.

**Case Summary:**
- **Case Number:** {{ $case->case_number }}
- **Animal Type:** {{ $case->animalReport->animal_type ?? ($case->animal_type ?? 'N/A') }}
- **Current Status:** {{ strtoupper(str_replace('_', ' ', $case->status)) }}
- **Assigned Rescuer:** {{ $case->rescuer->name ?? 'Unassigned' }}

@if (!empty($case->recovery_details['expenses']) && $case->recovery_details['expenses'] > 0)
**Medical Expenses:**
The medical expenses incurred for this rescue operation total **INR {{ number_format($case->recovery_details['expenses'], 2) }}**. If you would like to contribute towards these medical expenses, please use the button below:

@component('mail::button', ['url' => env('FRONTEND_URL', 'https://furrydom-front.vercel.app') . '/donate?amount=' . $case->recovery_details['expenses']])
Donate for Medical Expenses
@endcomponent
@else
If you would like to support our general rescue operations and help us save more animals in distress, please consider making a donation:

@component('mail::button', ['url' => env('FRONTEND_URL', 'https://furrydom-front.vercel.app') . '/donate'])
Donate Now
@endcomponent
@endif

Thank you for being a vital part of our animal welfare community. Your vigilance helps save lives!

If you have any questions or further updates, feel free to reply to this email or contact us at {{ app(\App\Settings\GeneralSettings::class)->contact_email ?? 'contact@furrydom.com' }}.

Warm regards,<br>
The Team at {{ app(\App\Settings\GeneralSettings::class)->site_name ?? 'Furrydom NGO' }}
@endcomponent
