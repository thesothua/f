<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'contribution_id',
        'company_name',
        'company_website',
        'gst_number',
        'frequency',
        'start_date',
        'end_date',
        'next_due_date',
        'schedule_status',
        'csr_agreement_details',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'next_due_date' => 'date',
    ];

    public function contribution()
    {
        return $this->belongsTo(Contribution::class);
    }
}
