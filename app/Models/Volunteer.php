<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'city',
        'role',
        'reason',
        'status',
        'admin_notes',
    ];

    protected $appends = ['fullName', 'adminNotes'];

    public function getFullNameAttribute()
    {
        return $this->attributes['full_name'] ?? null;
    }

    public function getAdminNotesAttribute()
    {
        return $this->attributes['admin_notes'] ?? null;
    }
}
