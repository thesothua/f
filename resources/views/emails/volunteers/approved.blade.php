@component('mail::message')
# Welcome to the Pack, {{ $user->name }}!

We are thrilled to inform you that your volunteer application for **Furrydom India** has been approved! 

You have been assigned the role of **{{ $roleName }}**. To help you get started, we have created an administrator account for you.

### Your Account Credentials:
* **Login Email:** {{ $user->email }}
* **Temporary Password:** `{{ $password }}`

Please use these credentials to log in to our admin panel.

@component('mail::button', ['url' => $loginUrl])
Log In to Admin Panel
@endcomponent

> [!WARNING]
> For security reasons, please update your temporary password immediately after logging in.

If you have any questions or need assistance setting up, please contact your volunteer coordinator.

Thank you for your dedication to helping our furry friends!

With warm regards,<br>
**The Volunteer Team, {{ config('app.name') }}**
@endcomponent
