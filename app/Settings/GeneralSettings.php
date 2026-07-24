<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $site_slogan;
    public string $contact_email;
    public string $contact_phone;
    public string $site_address;
    public ?string $logo_url;
    public ?string $favicon_url;

    public static function group(): string
    {
        return 'general';
    }
}
