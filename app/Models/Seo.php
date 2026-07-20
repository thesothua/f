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
        'seoable_type',
        'seoable_id',
    ];

    protected $casts = [
        'keywords' => 'array',
    ];

    public function seoable()
    {
        return $this->morphTo();
    }
}
