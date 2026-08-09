<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use App\Settings\SeoSettings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(GeneralSettings $general, SocialSettings $social, SeoSettings $seo)
    {
        return $this->successResponse([
            'general' => $general->toArray(),
            'social' => $social->toArray(),
            'seo' => $seo->toArray(),
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
        $request->validate([
            'general.site_name' => 'required|string',
            'general.site_slogan' => 'required|string',
            'general.contact_email' => 'required|email',
            'general.contact_phone' => 'required|string',
            'general.site_address' => 'required|string',
            'general.logo_url' => 'nullable|string',
            'general.favicon_url' => 'nullable|string',
            'general.signature_url' => 'nullable|string',

            'social.facebook_url' => 'nullable|string',
            'social.instagram_url' => 'nullable|string',
            'social.twitter_url' => 'nullable|string',
            'social.youtube_url' => 'nullable|string',
            'social.linkedin_url' => 'nullable|string',
            'social.whatsapp_group_url' => 'nullable|string',
            'social.google_maps_embed' => 'nullable|string',

            'seo.website_name' => 'required|string',
            'seo.meta_title' => 'required|string',
            'seo.meta_description' => 'required|string',
            'seo.og_image' => 'nullable|string',
            'seo.favicon' => 'nullable|string',
            'seo.google_analytics_id' => 'nullable|string',
            'seo.google_search_console' => 'nullable|string',
            'seo.robots' => 'nullable|string',
        ]);

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

        return $this->successResponse([
            'general' => app(GeneralSettings::class)->toArray(),
            'social' => app(SocialSettings::class)->toArray(),
            'seo' => app(SeoSettings::class)->toArray(),
        ], 'Settings updated successfully.');
    }
}
