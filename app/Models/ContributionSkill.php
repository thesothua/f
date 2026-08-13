<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'contribution_id',
        'skill_category',
        'specific_skills',
        'years_of_experience',
        'portfolio_url',
        'service_mode',
        'availability_days',
        'estimated_hours_per_week',
        'notes',
    ];

    protected $casts = [
        'years_of_experience' => 'integer',
        'estimated_hours_per_week' => 'integer',
    ];

    public function contribution()
    {
        return $this->belongsTo(Contribution::class);
    }
}
