<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Furrydom India');
        $this->migrator->add('general.site_slogan', 'All Lives Matter');
        $this->migrator->add('general.contact_email', 'info@furrydom.org');
        $this->migrator->add('general.contact_phone', '+91 98765 43210');
        $this->migrator->add('general.site_address', 'Shelter Road, New Delhi, India');
        $this->migrator->add('general.logo_url', '/images/furrydom-logo.png');
        $this->migrator->add('general.favicon_url', '/favicon.ico');

        $this->migrator->add('social.facebook_url', 'https://facebook.com');
        $this->migrator->add('social.instagram_url', 'https://instagram.com');
        $this->migrator->add('social.twitter_url', 'https://twitter.com');
        $this->migrator->add('social.youtube_url', 'https://youtube.com');
        $this->migrator->add('social.google_maps_embed', '');

        $this->migrator->add('mail.notify_on_donation', true);
        $this->migrator->add('mail.notify_on_volunteer', true);
        $this->migrator->add('mail.admin_notify_email', 'alerts@furrydom.org');
    }
};
