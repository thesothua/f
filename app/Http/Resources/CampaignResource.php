<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->when(!request()->is('api/campaigns'), $this->description),
            'goal_amount' => $this->goal_amount,
            'raised_amount' => $this->raised_amount,
            'progress_percentage' => $this->progress_percentage,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'cover_image_url' => $this->cover_image_url,
            'gallery_image_urls' => $this->when(!request()->is('api/campaigns'), $this->gallery_image_urls),
            'seo' => $this->seo,
            'created_at' => $this->created_at,
        ];
    }
}
