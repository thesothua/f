<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Campaign extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'gallery_images',
        'goal_amount',
        'raised_amount',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'goal_amount' => 'float',
        'raised_amount' => 'float',
        'gallery_images' => 'array',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $appends = [
        'progress_percentage',
        'cover_image_url',
        'gallery_image_urls',
    ];

    /**
     * Relationship: Donations to this campaign
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Relationship: Recurring Subscriptions to this campaign
     */
    public function subscriptions()
    {
        return $this->hasMany(RecurringSubscription::class);
    }

    /**
     * Get auto calculated progress percentage
     */
    public function getProgressPercentageAttribute()
    {
        if ($this->goal_amount <= 0) {
            return 0;
        }
        $percentage = ($this->raised_amount / $this->goal_amount) * 100;
        return round(min($percentage, 100), 2); // Cap display at 100% or allow over-achieved based on design
    }

    /**
     * Get URL for Spatie Media Library cover image, fallback to text field
     */
    public function getCoverImageUrlAttribute()
    {
        $mediaUrl = $this->getFirstMediaUrl('campaign_cover');
        return $mediaUrl ?: $this->cover_image;
    }

    /**
     * Get URLs for Spatie Media Library gallery images, fallback to text field
     */
    public function getGalleryImageUrlsAttribute()
    {
        $urls = [];
        $media = $this->getMedia('campaign_gallery');
        foreach ($media as $item) {
            $urls[] = $item->getUrl();
        }
        return count($urls) > 0 ? $urls : ($this->gallery_images ?? []);
    }
}
