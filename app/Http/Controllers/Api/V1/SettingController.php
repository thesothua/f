<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use App\Settings\SocialSettings;
use App\Settings\MailSettings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(GeneralSettings $general, SocialSettings $social, MailSettings $mail)
    {
        return $this->successResponse([
            'general' => $general->toArray(),
            'social' => $social->toArray(),
            'mail' => $mail->toArray(),
        ], 'Settings retrieved successfully.');
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

            'social.facebook_url' => 'nullable|string',
            'social.instagram_url' => 'nullable|string',
            'social.twitter_url' => 'nullable|string',
            'social.youtube_url' => 'nullable|string',
            'social.google_maps_embed' => 'nullable|string',

            'mail.notify_on_donation' => 'required|boolean',
            'mail.notify_on_volunteer' => 'required|boolean',
            'mail.admin_notify_email' => 'required|email',
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

        if ($request->has('mail')) {
            $mail = app(MailSettings::class);
            $mail->fill($request->input('mail'));
            $mail->save();
        }

        return $this->successResponse([
            'general' => app(GeneralSettings::class)->toArray(),
            'social' => app(SocialSettings::class)->toArray(),
            'mail' => app(MailSettings::class)->toArray(),
        ], 'Settings updated successfully.');
    }
}
