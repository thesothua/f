@component('mail::message')
# Welcome to the Pack, {{ $volunteer->full_name }}!

Thank you so much for registering as a volunteer for **Furrydom India**. We have received your application and it is currently being reviewed by our core administration team.

### Your Applied Profile:
* **Role:** {{ ucfirst($volunteer->role) }}
* **City/Region:** {{ $volunteer->city ?? 'Not specified' }}
* **Status:** Under Review (Pending)

Our volunteer coordinators will contact you via email or phone at **{{ $volunteer->phone }}** within 2-3 business days to discuss upcoming orientation sessions and on-field rescue initiatives.

In the meantime, feel free to follow our updates on social media or reach out to us if you have any questions.

Thank you for dedicating your time to help our furry friends!

With gratitude,<br>
**The Volunteer Team, {{ config('app.name') }}**
@endcomponent
