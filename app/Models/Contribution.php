<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Contribution extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'reference_number',
                'type',
                'status',
                'contributor_name',
                'contributor_email',
                'admin_notes',
                'assigned_to',
            ])
            ->logOnlyDirty()
            ->useLogName('contributions')
            ->setDescriptionForEvent(fn(string $eventName) => "Contribution {$eventName}");
    }

    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
    }

    protected $fillable = [
        'user_id',
        'reference_number',
        'type',
        'title',
        'description',
        'status',
        'campaign_id',
        'rescue_case_id',
        'volunteer_id',
        'contributor_name',
        'contributor_email',
        'contributor_phone',
        'city',
        'address',
        'preferred_contact_method',
        'fulfillment_method',
        'preferred_date',
        'preferred_time_slot',
        'is_anonymous',
        'allow_public_display',
        'can_contact',
        'admin_notes',
        'assigned_to',
        'approved_at',
        'completed_at',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'allow_public_display' => 'boolean',
        'can_contact' => 'boolean',
        'preferred_date' => 'date',
        'approved_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function rescueCase()
    {
        return $this->belongsTo(RescueCase::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function assignedStaff()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function items()
    {
        return $this->hasMany(ContributionItem::class);
    }

    public function skill()
    {
        return $this->hasOne(ContributionSkill::class);
    }

    public function schedule()
    {
        return $this->hasOne(ContributionSchedule::class);
    }
}
