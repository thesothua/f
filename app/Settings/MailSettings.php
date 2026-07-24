<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MailSettings extends Settings
{
    public bool $notify_on_donation;
    public bool $notify_on_volunteer;
    public string $admin_notify_email;

    public static function group(): string
    {
        return 'mail';
    }
}
