<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AnimalReport extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'reporter_name',
        'reporter_mobile',
        'reporter_email',
        'animal_type',
        'approximate_age',
        'color',
        'gender',
        'injuries',
        'address',
        'landmark',
        'latitude',
        'longitude',
        'urgency',
        'description',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'injuries' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    protected $appends = [
        'photo_urls',
        'video_url',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos');
        $this->addMediaCollection('video')->singleFile();
    }

    /**
     * Get URLs for photos uploaded via Spatie Media Library
     */
    public function getPhotoUrlsAttribute(): array
    {
        $urls = [];
        $media = $this->getMedia('photos');
        foreach ($media as $item) {
            $urls[] = $item->getUrl();
        }
        return $urls;
    }

    /**
     * Get URL for the optional video uploaded via Spatie Media Library
     */
    public function getVideoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('video') ?: null;
    }

    /**
     * Relationship: One animal report can have one active rescue case.
     */
    public function rescueCase()
    {
        return $this->hasOne(RescueCase::class);
    }
}
