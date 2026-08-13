<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'price',
        'image_url',
        'flipkart_url',
        'amazon_url',
        'target_quantity',
        'received_quantity',
        'is_urgent',
        'show_progress_bar',
        'is_active',
        'order_priority',
    ];

    protected $casts = [
        'is_urgent' => 'boolean',
        'show_progress_bar' => 'boolean',
        'is_active' => 'boolean',
        'target_quantity' => 'integer',
        'received_quantity' => 'integer',
        'order_priority' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUrgent($query)
    {
        return $query->where('is_urgent', true);
    }
}
