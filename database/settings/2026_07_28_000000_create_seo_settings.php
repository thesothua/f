<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Add signature_url to general settings group
        $this->migrator->add('general.signature_url', null);

        // Add seo settings group
        $this->migrator->add('seo.website_name', 'Furrydom India Care Foundation');
        $this->migrator->add('seo.meta_title', 'Furrydom India Care Foundation');
        $this->migrator->add('seo.meta_description', 'Rescue, rehabilitate, and care for stray animals across India.');
        $this->migrator->add('seo.og_image', 'logo.png');
        $this->migrator->add('seo.favicon', 'favicon.ico');
        $this->migrator->add('seo.google_analytics_id', 'GA-XXXXXXX');
        $this->migrator->add('seo.google_search_console', 'Verification Code');
        $this->migrator->add('seo.robots', 'index, follow');
    }
};
