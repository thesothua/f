<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Volunteer extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'full_name',
                'email',
                'phone',
                'city',
                'role',
                'reason',
                'status',
                'admin_notes',
            ])
            ->logOnlyDirty()
            ->useLogName('volunteers')
            ->setDescriptionForEvent(fn(string $eventName) => "Volunteer application {$eventName}");
    }

    /**
     * Relationship: Get all of the volunteer's activities.
     */
    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
    }

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'city',
        'role',
        'reason',
        'status',
        'admin_notes',
    ];

    protected $appends = ['fullName', 'adminNotes'];

    public function getFullNameAttribute()
    {
        return $this->attributes['full_name'] ?? null;
    }

    public function getAdminNotesAttribute()
    {
        return $this->attributes['admin_notes'] ?? null;
    }
}
