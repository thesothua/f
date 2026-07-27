<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSettings extends Settings
{
    public string $website_name;
    public string $meta_title;
    public string $meta_description;
    public ?string $og_image;
    public ?string $favicon;
    public ?string $google_analytics_id;
    public ?string $google_search_console;
    public ?string $robots;

    public static function group(): string
    {
        return 'seo';
    }
}
