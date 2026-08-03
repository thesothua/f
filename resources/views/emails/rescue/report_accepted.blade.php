@component('mail::message')
# Animal Report Accepted

Dear {{ $case->animalReport->reporter_name ?? 'Animal Welfare Supporter' }},

Thank you for reporting the distressed animal. We are pleased to inform you that your report has been accepted by our team and an official rescue case has been registered.

**Case Details:**
- **Case Number:** {{ $case->case_number }}
- **Animal Type:** {{ $case->animalReport->animal_type ?? ($case->animal_type ?? 'N/A') }}
- **Location:** {{ $case->animalReport->address ?? 'N/A' }}
- **Current Status:** {{ strtoupper(str_replace('_', ' ', $case->status)) }}
- **Assigned Rescuer / Team:** {{ $case->rescuer->name ?? 'Furrydom Rescue Team' }}

Our rescue team is taking action to provide immediate care and assistance to the animal.

@component('mail::button', ['url' => env('FRONTEND_URL', 'https://furrydom-front.vercel.app')])
Visit Furrydom Website
@endcomponent

Thank you for being a compassionate voice for animals in distress.

Warm regards,<br>
The Team at {{ app(\App\Settings\GeneralSettings::class)->site_name ?? 'Furrydom NGO' }}
@endcomponent
