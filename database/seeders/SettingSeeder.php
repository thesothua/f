<?php

namespace Database\Seeders;

use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use App\Settings\MailSettings;
use App\Settings\SeoSettings;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds for settings.
     */
    public function run(): void
    {
        $general = app(GeneralSettings::class);
        $general->site_name = 'Furrydom India Care Foundation';
        $general->site_slogan = 'All Lives Matter';
        $general->contact_email = 'care@furrydom.org';
        $general->contact_phone = '+91 98220 14785';
        $general->site_address = "Plot 14, Baner Road,\nPune, Maharashtra 411045";
        $general->logo_url = '/assets/images/logo.png';
        $general->favicon_url = '/favicon.ico';
        $general->signature_url = null;
        $general->save();

        $social = app(SocialSettings::class);
        $social->facebook_url = 'https://facebook.com';
        $social->instagram_url = 'https://instagram.com';
        $social->twitter_url = 'https://twitter.com';
        $social->youtube_url = 'https://youtube.com';
        $social->linkedin_url = 'https://linkedin.com';
        $social->whatsapp_group_url = 'https://chat.whatsapp.com/demo';
        $social->google_maps_embed = '';
        $social->save();

        $mail = app(MailSettings::class);
        $mail->notify_on_donation = true;
        $mail->notify_on_volunteer = true;
        $mail->admin_notify_email = 'care@furrydom.org';
        $mail->save();

        $seo = app(SeoSettings::class);
        $seo->website_name = 'Furrydom India';
        $seo->meta_title = 'Furrydom India — Animal Welfare, Child Development & Relief Foundation';
        $seo->meta_description = 'Furrydom is a registered non-profit organization dedicated to animal rescue, medical treatment, stray feeding drives, and child education programs.';
        $seo->og_image = '/assets/images/herosection.gif';
        $seo->favicon = '/favicon.ico';
        $seo->google_analytics_id = '';
        $seo->google_search_console = '';
        $seo->robots = 'index, follow';
        $seo->save();
    }
}
