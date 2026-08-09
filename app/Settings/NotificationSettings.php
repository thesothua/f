<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class NotificationSettings extends Settings
{
    public array $routing;

    public static function group(): string
    {
        return 'notification';
    }
}
