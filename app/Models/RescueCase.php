<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class RescueCase extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'case_number',
        'animal_report_id',
        'rescuer_id',
        'animal_type',
        'color',
        'gender',
        'status',
        'description',
        'clinic_details',
        'recovery_details',
        'adoption_details',
        'release_details',
        'deceased_details',
    ];

    protected $casts = [
        'clinic_details' => 'array',
        'recovery_details' => 'array',
        'adoption_details' => 'array',
        'release_details' => 'array',
        'deceased_details' => 'array',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'status',
                'rescuer_id',
                'description',
                'animal_type',
                'color',
                'gender',
                'clinic_details',
                'recovery_details',
                'adoption_details',
                'release_details',
                'deceased_details'
            ])
            ->logOnlyDirty()
            ->useLogName('rescue_cases')
            ->setDescriptionForEvent(fn(string $eventName) => "Rescue case {$eventName}");
    }

    /**
     * Relationship: A rescue case belongs to an animal report.
     */
    public function animalReport()
    {
        return $this->belongsTo(AnimalReport::class);
    }

    /**
     * Relationship: A rescue case is assigned to a rescuer (User/Volunteer).
     */
    public function rescuer()
    {
        return $this->belongsTo(User::class, 'rescuer_id');
    }

    /**
     * Relationship: Get all of the case's activities.
     */
    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
    }
}
