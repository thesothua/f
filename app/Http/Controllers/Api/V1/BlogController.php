<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\BlogResource;

/**
 * @group Blog & Content CMS
 *
 * APIs for managing blog posts, categories, and articles.
 */
class BlogController extends Controller
{
    public $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        $cacheKey = 'blogs.index.' . md5(json_encode($request->query()));
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($request) {
            $blogs = $this->blogService->getAllBlogs($request->only(['search', 'category', 'status', 'sortBy', 'order', 'page', 'limit']));
            $resource = BlogResource::collection($blogs);
            return $request->has('page') ? $resource->response()->getData(true) : $resource->resolve();
        });

        return $this->successResponse($data, 'Blogs retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $cacheKey = 'blogs.show.' . $id;
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($id) {
            $blog = $this->blogService->getBlogById($id);
            return $blog ? (new BlogResource($blog))->resolve() : null;
        });

        if (!$data) {
            return $this->errorResponse('Blog not found.', 404);
        }
        return $this->successResponse($data, 'Blog retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'slug' => 'nullable|string',
            'author' => 'required|string',
            'category' => 'required|string',
            'excerpt' => 'required|string|max:300',
            'content' => 'required|string',
            'status' => 'nullable|string|in:Draft,Published',
            'file' => 'nullable|file|image|max:10240',
        ]);

        $file = $request->file('file');
        $blog = $this->blogService->createBlog($request->only(['title', 'slug', 'author', 'category', 'tags', 'excerpt', 'content', 'status', 'featuredImage', 'featured_image', 'seo']), $file);

        $this->clearBlogCache();

        return $this->successResponse($blog, 'Blog created successfully.', 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|min:3',
            'slug' => 'nullable|string',
            'author' => 'sometimes|required|string',
            'category' => 'sometimes|required|string',
            'excerpt' => 'sometimes|required|string|max:300',
            'content' => 'sometimes|required|string',
            'status' => 'nullable|string|in:Draft,Published',
            'file' => 'nullable|file|image|max:10240',
        ]);

        $file = $request->file('file');
        $blog = $this->blogService->updateBlog($id, $request->only(['title', 'slug', 'author', 'category', 'tags', 'excerpt', 'content', 'status', 'featuredImage', 'featured_image', 'seo']), $file);

        if (!$blog) {
            return $this->errorResponse('Blog not found.', 404);
        }

        $this->clearBlogCache($blog->id, $blog->slug);

        return $this->successResponse($blog, 'Blog updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->blogService->deleteBlog($id);
        if (!$deleted) {
            return $this->errorResponse('Blog not found.', 404);
        }

        $this->clearBlogCache($id);

        return $this->successResponse(null, 'Blog deleted successfully.');
    }

    private function clearBlogCache($id = null, $slug = null)
    {
        // For simplicity, we can use tags if Redis is used, but for file/db cache we clear by pattern or just specific keys.
        // Since we don't have tags on default file cache, we might not be able to easily clear all index caches.
        // But for now, we can flush standard keys.
        if ($id) Cache::forget('blogs.show.' . $id);
        if ($slug) Cache::forget('blogs.show.' . $slug);
        
        // In a real scenario, use Cache::tags(['blogs'])->flush(); if driver supports it.
        // We will just let index caches expire after 60 mins.
    }
}
