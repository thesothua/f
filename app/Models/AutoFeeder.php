<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AutoFeeder extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'address',
                'google_map_url',
                'latitude',
                'longitude',
                'status',
                'installed_date',
                'sponsor_name',
                'capacity_kg',
                'raised_amount',
                'description',
            ])
            ->logOnlyDirty()
            ->useLogName('auto_feeders')
            ->setDescriptionForEvent(fn(string $eventName) => "Auto Feeder Station {$eventName}");
    }

    /**
     * Relationship: Get all activities logged for this station (Spatie ActivityLog).
     */
    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject')->orderByDesc('created_at');
    }

    protected $fillable = [
        'name',
        'address',
        'google_map_url',
        'latitude',
        'longitude',
        'status',
        'installed_date',
        'sponsor_name',
        'image',
        'description',
        'capacity_kg',
        'raised_amount',
    ];

    protected $casts = [
        'installed_date' => 'date:Y-m-d',
        'latitude' => 'float',
        'longitude' => 'float',
        'raised_amount' => 'decimal:2',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
