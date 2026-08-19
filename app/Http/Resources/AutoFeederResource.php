<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoFeederResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'google_map_url' => $this->google_map_url,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status' => $this->status,
            'installed_date' => $this->installed_date,
            'sponsor_name' => $this->sponsor_name,
            'image' => $this->image,
            'description' => $this->description,
            'capacity_kg' => $this->capacity_kg,
            'raised_amount' => $this->raised_amount,
        ];
    }
}
