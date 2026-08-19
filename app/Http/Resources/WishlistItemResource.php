<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistItemResource extends JsonResource
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
            'category' => $this->category,
            'price' => $this->price,
            'image_url' => $this->image_url,
            'flipkart_url' => $this->flipkart_url,
            'amazon_url' => $this->amazon_url,
            'target_quantity' => $this->target_quantity,
            'received_quantity' => $this->received_quantity,
            'is_urgent' => $this->is_urgent,
            'show_progress_bar' => $this->show_progress_bar,
        ];
    }
}
