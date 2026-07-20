<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function index(Request $request)
    {
        $galleries = $this->galleryService->getAllGalleryItems($request->all());
        return $this->successResponse($galleries, 'Gallery items retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $gallery = $this->galleryService->getGalleryItemById($id);
        if (!$gallery) {
            return $this->errorResponse('Gallery item not found.', 404);
        }
        return $this->successResponse($gallery, 'Gallery item retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2',
            'src' => 'nullable|string',
            'alt' => 'required|string',
            'category' => 'required|string',
            'desc' => 'required|string|max:300',
            'status' => 'nullable|string|in:Active,Inactive',
            'sortOrder' => 'nullable|integer',
            'file' => 'nullable|file|image|max:10240',
        ]);

        $file = $request->file('file');
        $gallery = $this->galleryService->createGalleryItem($request->all(), $file);

        return $this->successResponse($gallery, 'Gallery item created successfully.', 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|min:2',
            'src' => 'nullable|string',
            'alt' => 'sometimes|required|string',
            'category' => 'sometimes|required|string',
            'desc' => 'sometimes|required|string|max:300',
            'status' => 'nullable|string|in:Active,Inactive',
            'sortOrder' => 'nullable|integer',
            'file' => 'nullable|file|image|max:10240',
        ]);

        $file = $request->file('file');
        $gallery = $this->galleryService->updateGalleryItem($id, $request->all(), $file);

        if (!$gallery) {
            return $this->errorResponse('Gallery item not found.', 404);
        }

        return $this->successResponse($gallery, 'Gallery item updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->galleryService->deleteGalleryItem($id);
        if (!$deleted) {
            return $this->errorResponse('Gallery item not found.', 404);
        }
        return $this->successResponse(null, 'Gallery item deleted successfully.');
    }
}
