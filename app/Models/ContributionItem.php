<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'contribution_id',
        'item_name',
        'category',
        'quantity',
        'unit',
        'estimated_value',
        'condition',
        'notes',
    ];

    protected $casts = [
        'quantity' => 'float',
        'estimated_value' => 'float',
    ];

    public function contribution()
    {
        return $this->belongsTo(Contribution::class);
    }
}
