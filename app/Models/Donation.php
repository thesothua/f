<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Donation extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'status',
                'amount',
                'anonymous',
            ])
            ->logOnlyDirty()
            ->useLogName('donations')
            ->setDescriptionForEvent(fn(string $eventName) => "Donation {$eventName}");
    }

    /**
     * Relationship: Get all of the donation's activities.
     */
    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
    }

    protected $fillable = [
        'user_id',
        'plan_id',
        'subscription_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'pan_number',
        'amount',
        'currency',
        'status',
        'payment_gateway',
        'payment_method',
        'gateway_transaction_id',
        'gateway_order_id',
        'receipt_url',
        'anonymous',
        'campaign_id',
    ];

    protected $casts = [
        'amount' => 'float',
        'anonymous' => 'boolean',
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

    public function subscription()
    {
        return $this->belongsTo(RecurringSubscription::class, 'subscription_id');
    }
}
