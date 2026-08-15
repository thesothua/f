<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use App\Settings\SeoSettings;
use App\Settings\NotificationSettings;
use App\Services\Api\V1\NotificationRoutingService;
use Illuminate\Http\Request;

/**
 * @group System Settings
 *
 * APIs for site configuration, payment gateway keys, and general settings.
 */
class SettingController extends Controller
{
    public function index(GeneralSettings $general, SocialSettings $social, SeoSettings $seo)
    {
        return $this->successResponse([
            'general' => $general->toArray(),
            'social' => $social->toArray(),
            'seo' => $seo->toArray(),
            'notification' => NotificationRoutingService::getRoutingSettings(),
        ], 'Settings retrieved successfully.');
    }

    public function publicIndex(GeneralSettings $general, SocialSettings $social, SeoSettings $seo)
    {
        return $this->successResponse([
            'general' => $general->toArray(),
            'social' => $social->toArray(),
            'seo' => $seo->toArray(),
        ], 'Public settings retrieved successfully.');
    }

    public function update(Request $request)
    {
        $rules = [
            'notification' => 'nullable|array',
        ];

        // Only validate general fields when general group is submitted
        if ($request->has('general')) {
            $rules += [
                'general.site_name' => 'required|string',
                'general.site_slogan' => 'required|string',
                'general.contact_email' => 'required|email',
                'general.contact_phone' => 'required|string',
                'general.site_address' => 'required|string',
                'general.logo_url' => 'nullable|string',
                'general.favicon_url' => 'nullable|string',
                'general.signature_url' => 'nullable|string',
            ];
        }

        // Only validate social fields when social group is submitted
        if ($request->has('social')) {
            $rules += [
                'social.facebook_url' => 'nullable|string',
                'social.instagram_url' => 'nullable|string',
                'social.twitter_url' => 'nullable|string',
                'social.youtube_url' => 'nullable|string',
                'social.linkedin_url' => 'nullable|string',
                'social.whatsapp_group_url' => 'nullable|string',
                'social.google_maps_embed' => 'nullable|string',
            ];
        }

        // Only validate SEO fields when seo group is submitted
        if ($request->has('seo')) {
            $rules += [
                'seo.website_name' => 'required|string',
                'seo.meta_title' => 'required|string',
                'seo.meta_description' => 'required|string',
                'seo.og_image' => 'nullable|string',
                'seo.favicon' => 'nullable|string',
                'seo.google_analytics_id' => 'nullable|string',
                'seo.google_search_console' => 'nullable|string',
                'seo.robots' => 'nullable|string',
            ];
        }

        $request->validate($rules);

        if ($request->has('general')) {
            $general = app(GeneralSettings::class);
            $general->fill($request->input('general'));
            $general->save();
        }

        if ($request->has('social')) {
            $social = app(SocialSettings::class);
            $social->fill($request->input('social'));
            $social->save();
        }

        if ($request->has('seo')) {
            $seo = app(SeoSettings::class);
            $seo->fill($request->input('seo'));
            $seo->save();
        }

        if ($request->has('notification')) {
            try {
                $notificationSettings = app(NotificationSettings::class);
                $notificationSettings->routing = $request->input('notification');
                $notificationSettings->save();
            } catch (\Throwable $e) {
                // Ignore if migration has not run yet, settings will fallback to array in DB or memory
                \Illuminate\Support\Facades\DB::table('settings')->updateOrInsert(
                    ['group' => 'notification', 'name' => 'routing'],
                    ['payload' => json_encode($request->input('notification'))]
                );
            }
        }

        return $this->successResponse([
            'general' => app(GeneralSettings::class)->toArray(),
            'social' => app(SocialSettings::class)->toArray(),
            'seo' => app(SeoSettings::class)->toArray(),
            'notification' => NotificationRoutingService::getRoutingSettings(),
        ], 'Settings updated successfully.');
    }
}
