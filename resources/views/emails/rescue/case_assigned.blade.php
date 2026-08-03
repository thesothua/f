@component('mail::message')
# 🚨 New Rescue Case Assigned

Hello {{ $volunteer->name ?? 'Volunteer' }},

You have been assigned a new animal rescue case. Please review the case details below and take appropriate action.

**Rescue Case Details:**
- **Case Number:** {{ $case->case_number }}
- **Animal Type:** {{ $case->animalReport->animal_type ?? ($case->animal_type ?? 'N/A') }}
- **Urgency Level:** {{ strtoupper($case->animalReport->urgency ?? 'Normal') }}
- **Injuries:** {{ is_array($case->animalReport->injuries ?? null) ? implode(', ', $case->animalReport->injuries) : ($case->animalReport->injuries ?? 'N/A') }}
- **Location Address:** {{ $case->animalReport->address ?? 'N/A' }}
- **Landmark:** {{ $case->animalReport->landmark ?? 'N/A' }}

**Reporter Contact Information:**
- **Name:** {{ $case->animalReport->reporter_name ?? 'N/A' }}
- **Mobile Number:** {{ $case->animalReport->reporter_mobile ?? 'N/A' }}

**Case Notes / Description:**
{{ $case->description ?? ($case->animalReport->description ?? 'No additional notes provided.') }}

@component('mail::button', ['url' => $adminUrl])
View Rescue Case in Admin Panel
@endcomponent

Thank you for your dedication to rescuing and caring for animals in distress!

Warm regards,<br>
The Team at {{ app(\App\Settings\GeneralSettings::class)->site_name ?? 'Furrydom NGO' }}
@endcomponent
