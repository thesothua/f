<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;

    public string $site_email;

    public ?string $logo;

    public ?string $favicon;

    public static function group(): string
    {
        return 'general';
    }
}
