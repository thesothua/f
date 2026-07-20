<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Plan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'card_type',
        'title',
        'description',
        'category',
        'sort_order',
        'image',
        'alt',
        'goal_amount',
        'raised_amount',
        'status',
        'featured',
        'user_id',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'goal_amount' => 'float',
        'raised_amount' => 'float',
        'featured' => 'boolean',
    ];

    protected $appends = [
        'cardType',
        'sortOrder',
        'goalAmount',
        'raisedAmount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCardTypeAttribute()
    {
        return $this->attributes['card_type'] ?? 'cause';
    }

    public function getSortOrderAttribute()
    {
        return $this->attributes['sort_order'] ?? 1;
    }

    public function getGoalAmountAttribute()
    {
        return isset($this->attributes['goal_amount']) ? (float) $this->attributes['goal_amount'] : 0;
    }

    public function getRaisedAmountAttribute()
    {
        return isset($this->attributes['raised_amount']) ? (float) $this->attributes['raised_amount'] : 0;
    }

    public function getImageAttribute()
    {
        $mediaUrl = $this->getFirstMediaUrl('plan_image');
        if ($mediaUrl) {
            return $mediaUrl;
        }
        return $this->attributes['image'] ?? null;
    }
}
