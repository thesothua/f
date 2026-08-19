<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\GalleryResource;

/**
 * @group Media & Gallery
 *
 * APIs for managing media items, photo galleries, and shelter photos.
 */
class GalleryController extends Controller
{
    public $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function index(Request $request)
    {
        $cacheKey = 'galleries.index.' . md5(json_encode($request->query()));
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($request) {
            $galleries = $this->galleryService->getAllGalleryItems($request->only(['search', 'category', 'status', 'sortBy', 'order', 'page', 'limit']));
            $resource = GalleryResource::collection($galleries);
            return $request->has('page') ? $resource->response()->getData(true) : $resource->resolve();
        });

        return $this->successResponse($data, 'Gallery items retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $cacheKey = 'galleries.show.' . $id;
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($id) {
            $gallery = $this->galleryService->getGalleryItemById($id);
            return $gallery ? (new GalleryResource($gallery))->resolve() : null;
        });

        if (!$data) {
            return $this->errorResponse('Gallery item not found.', 404);
        }
        return $this->successResponse($data, 'Gallery item retrieved successfully.');
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
        $gallery = $this->galleryService->createGalleryItem($request->only(['title', 'src', 'alt', 'category', 'desc', 'status', 'sortOrder']), $file);

        $this->clearGalleryCache();

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
        $gallery = $this->galleryService->updateGalleryItem($id, $request->only(['title', 'src', 'alt', 'category', 'desc', 'status', 'sortOrder']), $file);

        if (!$gallery) {
            return $this->errorResponse('Gallery item not found.', 404);
        }

        $this->clearGalleryCache($gallery->id);

        return $this->successResponse($gallery, 'Gallery item updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->galleryService->deleteGalleryItem($id);
        if (!$deleted) {
            return $this->errorResponse('Gallery item not found.', 404);
        }
        
        $this->clearGalleryCache($id);

        return $this->successResponse(null, 'Gallery item deleted successfully.');
    }

    private function clearGalleryCache($id = null)
    {
        if ($id) Cache::forget('galleries.show.' . $id);
    }
}
