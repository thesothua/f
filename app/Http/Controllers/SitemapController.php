<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Campaign;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap XML containing static pages, blogs, and active campaigns.
     */
    public function index(): Response
    {
        $baseUrl = rtrim(config('app.frontend_url', env('FRONTEND_URL', 'https://furrydom.org')), '/');

        $blogs = Blog::where('status', 'Published')->get();
        $campaigns = Campaign::where('status', 'Active')->get();

        $content = view('sitemap', compact('baseUrl', 'blogs', 'campaigns'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
