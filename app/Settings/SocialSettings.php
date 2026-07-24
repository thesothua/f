<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
{
    public ?string $facebook_url;
    public ?string $instagram_url;
    public ?string $twitter_url;
    public ?string $youtube_url;
    public ?string $google_maps_embed;

    public static function group(): string
    {
        return 'social';
    }
}
