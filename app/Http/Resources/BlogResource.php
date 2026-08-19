<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'author' => $this->author,
            'category' => $this->category,
            'tags' => $this->tags,
            'excerpt' => $this->excerpt,
            'content' => $this->when(!request()->is('api/blogs'), $this->content),
            'status' => $this->status,
            'featuredImage' => $this->featuredImage,
            'seo' => $this->seo,
            'created_at' => $this->created_at,
        ];
    }
}
