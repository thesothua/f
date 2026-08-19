<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;
use App\Services\Api\V1\NotificationRoutingService;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // General settings group
        $this->migrator->add('general.site_name', 'Furrydom India');
        $this->migrator->add('general.site_slogan', 'All Lives Matter');
        $this->migrator->add('general.contact_email', 'info@furrydomindia.org');
        $this->migrator->add('general.contact_phone', '+91 77388 07882');
        $this->migrator->add('general.site_address', "203 2st Floor Rukmini Residenhaveli ,\nkesnand road, wagholi, pune 412207 Maharashtra");
        $this->migrator->add('general.logo_url', '/images/furrydom-logo.png');
        $this->migrator->add('general.favicon_url', '/favicon.ico');
        $this->migrator->add('general.signature_url', null);

        // Social settings group
        $this->migrator->add('social.facebook_url', 'https://facebook.com');
        $this->migrator->add('social.instagram_url', 'https://instagram.com');
        $this->migrator->add('social.twitter_url', 'https://twitter.com');
        $this->migrator->add('social.youtube_url', 'https://youtube.com');
        $this->migrator->add('social.google_maps_embed', '');
        $this->migrator->add('social.linkedin_url', '');
        $this->migrator->add('social.whatsapp_group_url', '');

        // Mail settings group
        $this->migrator->add('mail.notify_on_donation', true);
        $this->migrator->add('mail.notify_on_volunteer', true);
        $this->migrator->add('mail.admin_notify_email', 'info@furrydomindia.org');

        // SEO settings group
        $this->migrator->add('seo.website_name', 'Furrydom India Care Foundation');
        $this->migrator->add('seo.meta_title', 'Furrydom India Care Foundation');
        $this->migrator->add('seo.meta_description', 'Rescue, rehabilitate, and care for stray animals across India.');
        $this->migrator->add('seo.og_image', 'logo.png');
        $this->migrator->add('seo.favicon', 'favicon.ico');
        $this->migrator->add('seo.google_analytics_id', 'GA-XXXXXXX');
        $this->migrator->add('seo.google_search_console', 'Verification Code');
        $this->migrator->add('seo.robots', 'index, follow');

        // Notification routing setting
        $this->migrator->add('notification.routing', NotificationRoutingService::getDefaultRouting());
    }

    public function down(): void
    {
        $this->migrator->deleteIfExists('general.site_name');
        $this->migrator->deleteIfExists('general.site_slogan');
        $this->migrator->deleteIfExists('general.contact_email');
        $this->migrator->deleteIfExists('general.contact_phone');
        $this->migrator->deleteIfExists('general.site_address');
        $this->migrator->deleteIfExists('general.logo_url');
        $this->migrator->deleteIfExists('general.favicon_url');
        $this->migrator->deleteIfExists('general.signature_url');

        $this->migrator->deleteIfExists('social.facebook_url');
        $this->migrator->deleteIfExists('social.instagram_url');
        $this->migrator->deleteIfExists('social.twitter_url');
        $this->migrator->deleteIfExists('social.youtube_url');
        $this->migrator->deleteIfExists('social.google_maps_embed');
        $this->migrator->deleteIfExists('social.linkedin_url');
        $this->migrator->deleteIfExists('social.whatsapp_group_url');

        $this->migrator->deleteIfExists('mail.notify_on_donation');
        $this->migrator->deleteIfExists('mail.notify_on_volunteer');
        $this->migrator->deleteIfExists('mail.admin_notify_email');

        $this->migrator->deleteIfExists('seo.website_name');
        $this->migrator->deleteIfExists('seo.meta_title');
        $this->migrator->deleteIfExists('seo.meta_description');
        $this->migrator->deleteIfExists('seo.og_image');
        $this->migrator->deleteIfExists('seo.favicon');
        $this->migrator->deleteIfExists('seo.google_analytics_id');
        $this->migrator->deleteIfExists('seo.google_search_console');
        $this->migrator->deleteIfExists('seo.robots');

        $this->migrator->deleteIfExists('notification.routing');
    }
};
