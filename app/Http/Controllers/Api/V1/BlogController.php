<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        $blogs = $this->blogService->getAllBlogs($request->all());
        return $this->successResponse($blogs, 'Blogs retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $blog = $this->blogService->getBlogById($id);
        if (!$blog) {
            return $this->errorResponse('Blog not found.', 404);
        }
        return $this->successResponse($blog, 'Blog retrieved successfully.');
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
        $blog = $this->blogService->createBlog($request->all(), $file);

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
        $blog = $this->blogService->updateBlog($id, $request->all(), $file);

        if (!$blog) {
            return $this->errorResponse('Blog not found.', 404);
        }

        return $this->successResponse($blog, 'Blog updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->blogService->deleteBlog($id);
        if (!$deleted) {
            return $this->errorResponse('Blog not found.', 404);
        }
        return $this->successResponse(null, 'Blog deleted successfully.');
    }
}
