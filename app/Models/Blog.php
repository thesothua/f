<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'category',
        'tags',
        'excerpt',
        'content',
        'status',
        'featured_image',
        'user_id',
    ];

    protected $casts = [
        'tags' => 'array',
        'featured_image' => 'array',
    ];

    protected $appends = ['featuredImage', 'seo'];

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFeaturedImageAttribute()
    {
        if (!empty($this->attributes['featured_image'])) {
            $val = json_decode($this->attributes['featured_image'], true);
            return $val ?: $this->attributes['featured_image'];
        }

        $mediaUrl = $this->getFirstMediaUrl('featured_image');
        if ($mediaUrl) {
            return [
                'url' => $mediaUrl,
            ];
        }

        return null;
    }

    public function getSeoAttribute()
    {
        $seo = $this->seo()->first();
        if (!$seo) {
            return [
                'metaTitle' => '',
                'metaDescription' => '',
                'keywords' => [],
            ];
        }

        return [
            'metaTitle' => $seo->meta_title ?? '',
            'metaDescription' => $seo->meta_description ?? '',
            'keywords' => $seo->keywords ?? [],
        ];
    }
}
