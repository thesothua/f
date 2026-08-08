<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sort_order',
    ];

    /**
     * Get the sections for the page.
     */
    public function sections()
    {
        return $this->hasMany(PageSection::class)->orderBy('sort_order', 'asc');
    }
}
