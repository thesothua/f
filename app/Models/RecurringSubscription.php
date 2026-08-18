<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class RecurringSubscription extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'status',
                'amount',
                'ends_at',
                'next_billing_at',
                'admin_notes',
            ])
            ->logOnlyDirty()
            ->useLogName('subscriptions')
            ->setDescriptionForEvent(fn(string $eventName) => "Subscription {$eventName}");
    }

    /**
     * Relationship: Get all of the subscription's activities.
     */
    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
    }

    protected $fillable = [
        'user_id',
        'plan_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'pan_number',
        'amount',
        'currency',
        'status',
        'gateway',
        'gateway_subscription_id',
        'gateway_customer_id',
        'next_billing_at',
        'ends_at',
        'campaign_id',
        'auto_feeder_id',
        'new_feeder_name',
        'new_feeder_address',
        'admin_notes',
    ];

    protected $casts = [
        'amount' => 'float',
        'next_billing_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function autoFeeder()
    {
        return $this->belongsTo(AutoFeeder::class, 'auto_feeder_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'subscription_id');
    }
}
