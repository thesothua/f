<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'src',
        'alt',
        'category',
        'desc',
        'status',
        'sort_order',
        'user_id',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    protected $appends = ['sortOrder'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSortOrderAttribute()
    {
        return $this->attributes['sort_order'] ?? 1;
    }

    public function getSrcAttribute()
    {
        $mediaUrl = $this->getFirstMediaUrl('gallery_image');
        if ($mediaUrl) {
            return $mediaUrl;
        }
        return $this->attributes['src'] ?? null;
    }
}
