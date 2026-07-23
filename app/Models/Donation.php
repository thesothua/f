<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

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
        'gateway_transaction_id',
        'gateway_order_id',
        'receipt_url',
        'anonymous',
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

    public function subscription()
    {
        return $this->belongsTo(RecurringSubscription::class, 'subscription_id');
    }
}
