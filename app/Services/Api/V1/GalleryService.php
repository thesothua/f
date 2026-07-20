<?php

namespace App\Services\Api\V1;

use App\Models\Gallery;

class GalleryService
{
    public function getAllGalleryItems($params = [])
    {
        $query = Gallery::with(['media', 'user']);

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('alt', 'like', "%{$search}%")
                  ->orWhere('desc', 'like', "%{$search}%");
            });
        }

        if (!empty($params['category']) && $params['category'] !== 'All') {
            $query->where('category', $params['category']);
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'sort_order';
        $order = strtolower($params['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getGalleryItemById($id)
    {
        return Gallery::with(['media', 'user'])->find($id);
    }

    public function createGalleryItem($data, $file = null)
    {
        $sortOrder = $data['sortOrder'] ?? $data['sort_order'] ?? 1;

        $gallery = Gallery::create([
            'title' => $data['title'],
            'src' => $data['src'] ?? null,
            'alt' => $data['alt'] ?? null,
            'category' => $data['category'] ?? null,
            'desc' => $data['desc'] ?? $data['description'] ?? null,
            'status' => $data['status'] ?? 'Active',
            'sort_order' => (int) $sortOrder,
            'user_id' => auth()->id(),
        ]);

        if ($file) {
            $gallery->addMedia($file)->toMediaCollection('gallery_image');
        }

        return $gallery->fresh(['media']);
    }

    public function updateGalleryItem($id, $data, $file = null)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return null;
        }

        $updateData = [];
        if (isset($data['title'])) $updateData['title'] = $data['title'];
        if (isset($data['src'])) $updateData['src'] = $data['src'];
        if (isset($data['alt'])) $updateData['alt'] = $data['alt'];
        if (isset($data['category'])) $updateData['category'] = $data['category'];
        if (isset($data['desc']) || isset($data['description'])) {
            $updateData['desc'] = $data['desc'] ?? $data['description'];
        }
        if (isset($data['status'])) $updateData['status'] = $data['status'];
        if (isset($data['sortOrder']) || isset($data['sort_order'])) {
            $updateData['sort_order'] = (int) ($data['sortOrder'] ?? $data['sort_order']);
        }

        $gallery->update($updateData);

        if ($file) {
            $gallery->clearMediaCollection('gallery_image');
            $gallery->addMedia($file)->toMediaCollection('gallery_image');
        }

        return $gallery->fresh(['media']);
    }

    public function deleteGalleryItem($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return false;
        }

        $gallery->clearMediaCollection('gallery_image');
        $gallery->delete();
        return true;
    }
}
