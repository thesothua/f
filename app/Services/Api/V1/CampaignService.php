<?php

namespace App\Services\Api\V1;

use App\Models\Campaign;
use Illuminate\Support\Str;

class CampaignService
{
    /**
     * Get all campaigns with parameters
     */
    public function getAllCampaigns($params = [])
    {
        $query = Campaign::with(['media']);

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
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

    /**
     * Get a campaign by ID
     */
    public function getCampaignById($id)
    {
        return Campaign::with(['media'])->find($id);
    }

    /**
     * Get a campaign by Slug
     */
    public function getCampaignBySlug($slug)
    {
        return Campaign::with(['media'])->where('slug', $slug)->first();
    }

    /**
     * Create a campaign
     */
    public function createCampaign($data, $coverFile = null, $galleryFiles = [])
    {
        $slug = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['title']);

        // Handle unique slug check
        $originalSlug = $slug;
        $count = 1;
        while (Campaign::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $campaign = Campaign::create([
            'title' => $data['title'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
            'goal_amount' => (float) ($data['goal_amount'] ?? $data['goalAmount'] ?? 0),
            'raised_amount' => (float) ($data['raised_amount'] ?? $data['raisedAmount'] ?? 0),
            'start_date' => !empty($data['start_date']) ? $data['start_date'] : (!empty($data['startDate']) ? $data['startDate'] : null),
            'end_date' => !empty($data['end_date']) ? $data['end_date'] : (!empty($data['endDate']) ? $data['endDate'] : null),
            'status' => $data['status'] ?? 'Active',
            'cover_image' => $data['cover_image'] ?? $data['coverImage'] ?? null,
            'gallery_images' => $data['gallery_images'] ?? $data['galleryImages'] ?? null,
        ]);

        if ($coverFile) {
            $campaign->addMedia($coverFile)->toMediaCollection('campaign_cover');
        }

        if (!empty($galleryFiles)) {
            foreach ($galleryFiles as $gFile) {
                $campaign->addMedia($gFile)->toMediaCollection('campaign_gallery');
            }
        }

        return $campaign->fresh(['media']);
    }

    /**
     * Update a campaign
     */
    public function updateCampaign($id, $data, $coverFile = null, $galleryFiles = [])
    {
        $campaign = Campaign::find($id);
        if (!$campaign) {
            return null;
        }

        $updateData = [];
        if (isset($data['title'])) $updateData['title'] = $data['title'];
        
        if (isset($data['slug'])) {
            $slug = Str::slug($data['slug']);
            if ($slug !== $campaign->slug) {
                $originalSlug = $slug;
                $count = 1;
                while (Campaign::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $updateData['slug'] = $slug;
            }
        }

        if (isset($data['description'])) $updateData['description'] = $data['description'];
        if (isset($data['goal_amount']) || isset($data['goalAmount'])) {
            $updateData['goal_amount'] = (float) ($data['goal_amount'] ?? $data['goalAmount']);
        }
        if (isset($data['raised_amount']) || isset($data['raisedAmount'])) {
            $updateData['raised_amount'] = (float) ($data['raised_amount'] ?? $data['raisedAmount']);
        }
        if (isset($data['start_date']) || isset($data['startDate'])) {
            $updateData['start_date'] = $data['start_date'] ?? $data['startDate'];
        }
        if (isset($data['end_date']) || isset($data['endDate'])) {
            $updateData['end_date'] = $data['end_date'] ?? $data['endDate'];
        }
        if (isset($data['status'])) $updateData['status'] = $data['status'];
        if (isset($data['cover_image']) || isset($data['coverImage'])) {
            $updateData['cover_image'] = $data['cover_image'] ?? $data['coverImage'];
        }
        if (isset($data['gallery_images']) || isset($data['galleryImages'])) {
            $updateData['gallery_images'] = $data['gallery_images'] ?? $data['galleryImages'];
        }

        $campaign->update($updateData);

        if ($coverFile) {
            $campaign->clearMediaCollection('campaign_cover');
            $campaign->addMedia($coverFile)->toMediaCollection('campaign_cover');
        }

        if (!empty($galleryFiles)) {
            // Keep old gallery images if appending, or clear if overwriting?
            // Usually we clear and replace if they upload new ones, but let's clear existing gallery
            // only if we explicitly receive new gallery files
            $campaign->clearMediaCollection('campaign_gallery');
            foreach ($galleryFiles as $gFile) {
                $campaign->addMedia($gFile)->toMediaCollection('campaign_gallery');
            }
        }

        return $campaign->fresh(['media']);
    }

    /**
     * Delete a campaign
     */
    public function deleteCampaign($id)
    {
        $campaign = Campaign::find($id);
        if (!$campaign) {
            return false;
        }

        $campaign->clearMediaCollection('campaign_cover');
        $campaign->clearMediaCollection('campaign_gallery');
        $campaign->delete();
        return true;
    }
}
