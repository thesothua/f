<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'keywords',
        'og_image',
        'canonical_url',
        'no_index',
        'seoable_type',
        'seoable_id',
    ];

    protected $casts = [
        'keywords' => 'array',
        'no_index' => 'boolean',
    ];

    public function seoable()
    {
        return $this->morphTo();
    }
}
