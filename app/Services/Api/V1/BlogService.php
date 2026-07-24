<?php

namespace App\Services\Api\V1;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogService
{
    public function getAllBlogs($params = [])
    {
        $query = Blog::with(['seo', 'media', 'user']);

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if (!empty($params['category'])) {
            $query->where('category', $params['category']);
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getBlogById($id)
    {
        if (is_numeric($id)) {
            return Blog::with(['seo', 'media', 'user'])->find($id);
        }
        return Blog::with(['seo', 'media', 'user'])->where('slug', $id)->first();
    }

    public function createBlog($data, $file = null)
    {
        $slug = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);

        $featuredImage = $data['featuredImage'] ?? $data['featured_image'] ?? null;
        if (is_string($featuredImage)) {
            $decoded = json_decode($featuredImage, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $featuredImage = $decoded;
            }
        }

        $blog = Blog::create([
            'title' => $data['title'],
            'slug' => $slug,
            'author' => $data['author'] ?? auth()->user()?->name ?? 'Admin',
            'category' => $data['category'] ?? null,
            'tags' => $data['tags'] ?? [],
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'] ?? null,
            'status' => $data['status'] ?? 'Draft',
            'featured_image' => $featuredImage,
            'user_id' => auth()->id(),
        ]);

        // Save polymorphic SEO
        if (!empty($data['seo'])) {
            $seoData = is_string($data['seo']) ? json_decode($data['seo'], true) : $data['seo'];
            $blog->seo()->create([
                'meta_title' => $seoData['metaTitle'] ?? $seoData['meta_title'] ?? null,
                'meta_description' => $seoData['metaDescription'] ?? $seoData['meta_description'] ?? null,
                'keywords' => $seoData['keywords'] ?? [],
            ]);
        }

        if ($file) {
            $blog->addMedia($file)->toMediaCollection('featured_image');
        }

        return $blog->fresh(['seo', 'media']);
    }

    public function updateBlog($id, $data, $file = null)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return null;
        }

        $updateData = [];
        if (isset($data['title'])) $updateData['title'] = $data['title'];
        if (isset($data['slug'])) $updateData['slug'] = Str::slug($data['slug']);
        if (isset($data['author'])) $updateData['author'] = $data['author'];
        if (isset($data['category'])) $updateData['category'] = $data['category'];
        if (isset($data['tags'])) $updateData['tags'] = $data['tags'];
        if (isset($data['excerpt'])) $updateData['excerpt'] = $data['excerpt'];
        if (isset($data['content'])) $updateData['content'] = $data['content'];
        if (isset($data['status'])) $updateData['status'] = $data['status'];

        if (array_key_exists('featuredImage', $data) || array_key_exists('featured_image', $data)) {
            $featuredImage = $data['featuredImage'] ?? $data['featured_image'] ?? null;
            if (is_string($featuredImage)) {
                $decoded = json_decode($featuredImage, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $featuredImage = $decoded;
                }
            }
            $updateData['featured_image'] = $featuredImage;
        }

        $blog->update($updateData);

        // Update polymorphic SEO
        if (isset($data['seo'])) {
            $seoData = is_string($data['seo']) ? json_decode($data['seo'], true) : $data['seo'];
            $blog->seo()->updateOrCreate(
                ['seoable_id' => $blog->id, 'seoable_type' => Blog::class],
                [
                    'meta_title' => $seoData['metaTitle'] ?? $seoData['meta_title'] ?? null,
                    'meta_description' => $seoData['metaDescription'] ?? $seoData['meta_description'] ?? null,
                    'keywords' => $seoData['keywords'] ?? [],
                ]
            );
        }

        if ($file) {
            $blog->clearMediaCollection('featured_image');
            $blog->addMedia($file)->toMediaCollection('featured_image');
        }

        return $blog->fresh(['seo', 'media']);
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return false;
        }

        $blog->seo()?->delete();
        $blog->clearMediaCollection('featured_image');
        $blog->delete();
        return true;
    }
}
