@php
    $generalSettings = app(\App\Settings\GeneralSettings::class);
    $siteName = $generalSettings->site_name ?? 'Furrydom India';
    $siteSlogan = $generalSettings->site_slogan ?? 'All Lives Matter';
    $logoUrl = $generalSettings->logo_url ?? null;
    
    // Normalize logo URL to ensure it is publicly accessible
    if (empty($logoUrl) || str_contains($logoUrl, 'localhost:5173')) {
        $logoUrl = url('images/furrydom-logo.png');
    } elseif (!str_starts_with($logoUrl, 'http://') && !str_starts_with($logoUrl, 'https://')) {
        $logoUrl = url($logoUrl);
    }
    
    $frontendUrl = config('app.frontend_url', config('app.url'));
@endphp

<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="$frontendUrl">
<table cellpadding="0" cellspacing="0" border="0" align="center" style="margin: 0 auto; display: inline-table;">
    <tr>
        @if($logoUrl)
        <td style="vertical-align: middle; padding-right: 12px;">
            <a href="{{ $frontendUrl }}" style="text-decoration: none; display: block;">
                <img src="{{ $logoUrl }}" alt="{{ $siteName }}" style="max-height: 42px; height: 42px; width: auto; display: block; border: 0;">
            </a>
        </td>
        @endif
        <td style="vertical-align: middle; text-align: left; line-height: 1.15;">
            <a href="{{ $frontendUrl }}" style="text-decoration: none; display: block;">
                <div style="font-size: 13px; font-weight: 900; color: #18181b; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0.12em; text-transform: uppercase; margin: 0; padding: 0;">
                    {{ $siteName }}
                </div>
                @if(!empty($siteSlogan))
                <div style="font-size: 9px; font-weight: 700; color: #f97316; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; letter-spacing: 0.18em; text-transform: uppercase; margin-top: 3px; padding: 0;">
                    {{ $siteSlogan }}
                </div>
                @endif
            </a>
        </td>
    </tr>
</table>
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{!! $slot !!}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{!! $subcopy !!}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ $siteName }}. {{ __('All rights reserved.') }}
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
