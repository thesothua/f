<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Attachment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'attachable_type',
        'attachable_id',
        'user_id',
    ];

    protected $appends = ['url', 'file_name', 'mime_type', 'size'];

    public function getUrlAttribute()
    {
        return $this->getFirstMediaUrl('attachments') ?: $this->getFirstMediaUrl();
    }

    public function getFileNameAttribute()
    {
        return $this->getFirstMedia('attachments')?->file_name ?? $this->name;
    }

    public function getMimeTypeAttribute()
    {
        return $this->getFirstMedia('attachments')?->mime_type;
    }

    public function getSizeAttribute()
    {
        return $this->getFirstMedia('attachments')?->size;
    }

    public function attachable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
