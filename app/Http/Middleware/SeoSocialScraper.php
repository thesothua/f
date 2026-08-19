<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Campaign;
use App\Models\Blog;

class SeoSocialScraper
{
    public function handle($request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');
        $isBot = preg_match('/(facebookexternalhit|twitterbot|whatsapp|linkedinbot)/i', $userAgent);

        $response = $next($request);

        if ($isBot && $response->status() == 200) {
            $content = $response->getContent();
            $path = ltrim($request->path(), '/');

            if (str_starts_with($path, 'campaigns/')) {
                $slug = str_replace('campaigns/', '', $path);
                $campaign = Campaign::where('slug', $slug)->first();
                
                if ($campaign) {
                    $meta = '
                        <meta property="og:title" content="'.$campaign->title.' | Furrydom" />
                        <meta property="og:description" content="'.strip_tags($campaign->excerpt).'" />
                        <meta property="og:image" content="'.$campaign->featured_image_url.'" />
                    ';
                    $content = preg_replace('/<title>.*?<\/title>/s', '<title>'.$campaign->title.'</title>', $content);
                    $content = str_replace('</head>', $meta . '</head>', $content);
                    $response->setContent($content);
                }
            } elseif (str_starts_with($path, 'blog/')) {
                $slug = str_replace('blog/', '', $path);
                $blog = Blog::where('slug', $slug)->first();
                
                if ($blog) {
                    $meta = '
                        <meta property="og:title" content="'.$blog->title.' | Furrydom" />
                        <meta property="og:description" content="'.strip_tags($blog->excerpt ?? '').'" />
                        <meta property="og:image" content="'.$blog->featured_image_url.'" />
                    ';
                    $content = preg_replace('/<title>.*?<\/title>/s', '<title>'.$blog->title.'</title>', $content);
                    $content = str_replace('</head>', $meta . '</head>', $content);
                    $response->setContent($content);
                }
            }
        }
        return $response;
    }
}
