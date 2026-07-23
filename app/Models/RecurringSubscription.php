<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringSubscription extends Model
{
    use HasFactory;

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

    public function donations()
    {
        return $this->hasMany(Donation::class, 'subscription_id');
    }
}
