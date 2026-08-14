# Comprehensive Technical SEO Audit & Implementation Plan

**Project:** Furrydom NGO Platform  
**Architecture:** React.js SPA (Vite + React Router 7) Frontend | Laravel REST API (Postgres) Backend  
**Audit Date:** August 2026  
**Status:** Non-Destructive Architectural Blueprint  

---

## 1. Executive Summary

This document presents a comprehensive Technical SEO Audit and Step-by-Step Infrastructure Plan for the Furrydom NGO website. 

### Current State Assessment
- **Rendering Architecture:** Pure Client-Side Rendering (CSR) via Vite + React. Search engines crawling the initial HTML response receive an empty `<div id="root"></div>` shell.
- **Indexability & Crawlability:** Dynamic routes for **Blogs** (`/blog/:id`) and **Campaigns/Causes** (`/causes/:id`) rely on client-side API fetching after React hydration. Search engine bots that do not execute JavaScript (or defer JS execution) fail to index dynamic article content, campaign donation goals, and rescue case updates.
- **Metadata Handling:** Imperative `document.title` mutation inside components and `SettingsContext.jsx`. Missing dynamic Open Graph (`og:*`), Twitter Card (`twitter:*`), canonical URLs (`<link rel="canonical">`), and structured JSON-LD schemas site-wide.
- **Sitemap & Robots Directives:** Basic static `robots.txt` lacking `Sitemap:` declarations. No dynamic `sitemap.xml` generator endpoint on the Laravel API server.
- **SEO Health Score Estimate:** **42 / 100**

---

## 2. Infrastructure & Architectural Bottlenecks

### 2.1 CSR Rendering vs Search Engine Crawling
| Element | Current Behaviour | SEO Impact | Recommended Fix |
| :--- | :--- | :--- | :--- |
| **Initial HTML Response** | Delivers generic `<title>Vite + React</title>` with blank body | Crawlers categorize pages as thin/duplicate content before JS executes | Prerendering (e.g. `vite-plugin-prerender` / SSG) or React SSR / Edge Proxy rendering for public routes |
| **Dynamic Routes** | Routes use IDs (`/blog/12`, `/causes/5`) instead of SEO slugs | Poor keyword relevance in URLs; bad URL structure | Enforce Slug-based Routing (`/blog/rescuing-stray-puppies-in-pune`, `/causes/monsoon-shelter-drive-2026`) |
| **Metadata Injection** | Async DOM updates via `SettingsContext` | Crawlers parse `<head>` before JS context updates complete | `react-helmet-async` with SSR/Prerender state hydration |
| **Asset Optimization** | GIF/PNG assets (`herosection.gif`, `fav70-70.png`) without WebP variants | High LCP (Largest Contentful Paint) and cumulative layout shifts | WebP image conversion, responsive `srcset`, and explicit `width`/`height` dimensions |

---

## 3. Detailed SEO Architecture & Technical Requirements

### 3.1 Frontend Metadata Management (`react-helmet-async`)
Replace manual DOM manipulation with a centralized, declarative `<SeoHead />` component.

#### Implementation Architecture:
```jsx
// Recommended Component: src/components/common/SeoHead.jsx
import { Helmet } from 'react-helmet-async';
import { useLocation } from 'react-router-dom';
import { useSettings } from '../../context/SettingsContext';

export const SeoHead = ({ 
  title, 
  description, 
  keywords, 
  ogImage, 
  ogType = 'website',
  jsonLd 
}) => {
  const { settings } = useSettings();
  const location = useLocation();

  const siteName = settings?.seo?.website_name || 'Furrydom India Care Foundation';
  const metaTitle = title ? `${title} | ${siteName}` : (settings?.seo?.meta_title || siteName);
  const metaDesc = description || settings?.seo?.meta_description || '';
  const metaImage = ogImage || settings?.seo?.og_image || '/fav70-70.png';
  const canonicalUrl = `${window.location.origin}${location.pathname}`;

  return (
    <Helmet>
      {/* Standard Meta Tags */}
      <title>{metaTitle}</title>
      <meta name="description" content={metaDesc} />
      {keywords && <meta name="keywords" content={Array.isArray(keywords) ? keywords.join(', ') : keywords} />}
      <meta name="robots" content={settings?.seo?.robots || 'index, follow'} />
      <link rel="canonical" href={canonicalUrl} />

      {/* Open Graph / Facebook */}
      <meta property="og:type" content={ogType} />
      <meta property="og:title" content={metaTitle} />
      <meta property="og:description" content={metaDesc} />
      <meta property="og:image" content={metaImage} />
      <meta property="og:url" content={canonicalUrl} />
      <meta property="og:site_name" content={siteName} />

      {/* Twitter Cards */}
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" content={metaTitle} />
      <meta name="twitter:description" content={metaDesc} />
      <meta name="twitter:image" content={metaImage} />

      {/* JSON-LD Structured Data Injection */}
      {jsonLd && (
        <script type="application/ld+json">
          {JSON.stringify(jsonLd)}
        </script>
      )}
    </Helmet>
  );
};
```

---

### 3.2 Structured Data (JSON-LD) Schemas

#### A. NGO / Organization Schema (Global Footer or Home Route)
```json
{
  "@context": "https://schema.org",
  "@type": "NGO",
  "name": "Furrydom India Care Foundation",
  "url": "https://furrydom.org",
  "logo": "https://furrydom.org/logo.png",
  "sameAs": [
    "https://facebook.com/furrydom",
    "https://instagram.com/furrydom",
    "https://x.com/furrydom"
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Survey No. 42, Near Katraj Animal Rescue Hub, Pune - Satara Road",
    "addressLocality": "Pune",
    "addressRegion": "Maharashtra",
    "postalCode": "411046",
    "addressCountry": "IN"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-9876543210",
    "contactType": "Emergency Animal Rescue Desk"
  }
}
```

#### B. Campaign / DonateAction Schema (`/causes/:slug`)
```json
{
  "@context": "https://schema.org",
  "@type": "DonateAction",
  "name": "Monsoon Animal Medical Drive 2026",
  "description": "Funding emergency medical treatments and shelter kits for stray animals in Pune.",
  "recipient": {
    "@type": "NGO",
    "name": "Furrydom India Care Foundation"
  },
  "price": "500.00",
  "priceCurrency": "INR"
}
```

#### C. Article / BlogPosting Schema (`/blog/:slug`)
```json
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "10 Crucial Tips for Stray Animal Welfare During Monsoons",
  "image": ["https://api.furrydom.org/storage/blogs/monsoon-tips.jpg"],
  "datePublished": "2026-08-10T08:00:00+05:30",
  "dateModified": "2026-08-14T10:30:00+05:30",
  "author": {
    "@type": "Person",
    "name": "Dr. Ananya Sharma"
  },
  "publisher": {
    "@type": "NGO",
    "name": "Furrydom India Care Foundation",
    "logo": {
      "@type": "ImageObject",
      "url": "https://furrydom.org/logo.png"
    }
  }
}
```

---

## 4. Backend Database & API Modifications

### 4.1 Migration Blueprint: Standardizing SEO Morphs & Slugs
Existing tables (`blogs`, `campaigns`) already have `slug` and polymorph relationship (`seos` table).

#### Schema Enhancements to Add to Laravel:
1. Ensure all `blogs` and `campaigns` enforce indexed unique `slug` fields.
2. Update existing polymorphic `Seo` model to include OpenGraph and Canonical overrides:
   - `meta_title` (string, nullable)
   - `meta_description` (text, nullable)
   - `keywords` (json, nullable)
   - `og_image` (string, nullable)
   - `canonical_url` (string, nullable)
   - `no_index` (boolean, default false)

```php
// Database Migration: Add Extended Fields to `seos` Table
Schema::table('seos', function (Blueprint $table) {
    $table->string('og_image')->nullable()->after('keywords');
    $table->string('canonical_url')->nullable()->after('og_image');
    $table->boolean('no_index')->default(false)->after('canonical_url');
});
```

### 4.2 API Endpoint Expansion
Ensure public API routes (`/api/v1/blogs/{slug}`, `/api/v1/campaigns/{slug}`) eager-load the morph relationship:

```php
// BlogController public detail method
public function showBySlug($slug)
{
    $blog = Blog::with('seo')->where('slug', $slug)->where('status', 'Published')->firstOrFail();
    return $this->successResponse($blog, 'Blog details retrieved successfully.');
}
```

---

## 5. Dynamic Sitemap & Robots Directive Strategy

### 5.1 Laravel Dynamic Sitemap Controller (`sitemap.xml`)
Create a public endpoint in Laravel (`/routes/web.php`) serving dynamically generated XML:

```php
// Controller: app/Http/Controllers/SitemapController.php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Campaign;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $blogs = Blog::where('status', 'Published')->get();
        $campaigns = Campaign::where('status', 'Active')->get();

        $content = view('sitemap', compact('blogs', 'campaigns'))->render();
        return response($content, 200)->header('Content-Type', 'text/xml');
    }
}
```

#### Blade View Template (`resources/views/sitemap.blade.php`):
```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://furrydom.org/</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://furrydom.org/about</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://furrydom.org/ways-to-give</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>https://furrydom.org/report-injured</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    @foreach($blogs as $blog)
    <url>
        <loc>https://furrydom.org/blog/{{ $blog->slug }}</loc>
        <lastmod>{{ $blog->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    @foreach($campaigns as $campaign)
    <url>
        <loc>https://furrydom.org/causes/{{ $campaign->slug }}</loc>
        <lastmod>{{ $campaign->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
```

### 5.2 Updated `robots.txt` Blueprint
```txt
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /api/

Sitemap: https://api.furrydom.org/sitemap.xml
```

---

## 6. Admin Panel SEO Management Requirements

### 6.1 Requirements Matrix for Admin UI (`/admin/settings`, `/admin/blogs`, `/admin/campaigns`)
1. **CMS SEO Form Fields:**
   - Meta Title (with real-time character counter, recommended max 60 chars)
   - Meta Description (real-time character counter, recommended max 160 chars)
   - Target Keywords (Ant Design Tag input)
   - OpenGraph Custom Image Upload / Selector
   - Canonical URL Overrides
   - Search Indexing Toggle (`noindex` / `nofollow`)
2. **Google SERP Snippet Live Preview:**
   - Real-time visual rendering of how the title, URL, and snippet will appear in Google desktop & mobile search results.
3. **Bulk SEO Auditing Table:**
   - Dedicated tab in Admin Settings listing all pages/blogs lacking meta descriptions or OpenGraph images.

---

## 7. Developer Implementation Roadmap & Task Checklist

### Phase 1: Meta Tag Architecture & Router Slugs (High Priority)
- [ ] Install `react-helmet-async` in frontend (`npm install react-helmet-async`).
- [ ] Wrap main application in `<HelmetProvider>` inside `src/main.jsx`.
- [ ] Create `SeoHead` reusable component in `src/components/common/SeoHead.jsx`.
- [ ] Refactor dynamic routes in `App.jsx` from `/blog/:id` and `/causes/:id` to `/blog/:slug` and `/causes/:slug`.
- [ ] Update frontend services (`blog.service.js`, `campaign.service.js`) to support slug fetching.

### Phase 2: Schema Markup & Prerendering Configuration (High Priority)
- [ ] Inject JSON-LD `NGO` schema into public layout / footer.
- [ ] Inject JSON-LD `BlogPosting` schema into `BlogDetail.jsx`.
- [ ] Inject JSON-LD `DonateAction` schema into `CampaignDetail.jsx`.
- [ ] Configure `vite-plugin-prerender` or Vercel static prerendering for static public routes (`/`, `/about`, `/ways-to-give`, `/contact`, `/gallery`).

### Phase 3: Backend Dynamic Sitemap & Database Extensions (Medium Priority)
- [ ] Add extended SEO fields migration to `seos` table in Laravel.
- [ ] Create `SitemapController` and Blade template in Laravel backend.
- [ ] Expose dynamic `/sitemap.xml` route on backend domain.
- [ ] Update backend `public/robots.txt` to include `Sitemap: https://api.furrydom.org/sitemap.xml`.

### Phase 4: Admin Panel SEO Tools & Performance Optimization (Medium Priority)
- [ ] Add real-time SERP Snippet Preview component to Admin Blog and Campaign forms.
- [ ] Convert key homepage GIF/PNG assets to WebP format with responsive `<picture>` tags.
- [ ] Enable HTTP caching headers on Laravel media attachments.
- [ ] Verify indexing using Google Search Console "Live URL Test" tool.

---
*End of SEO Audit & Implementation Blueprint.*
