<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Notifications\Notifiable;

class Role extends SpatieRole
{
    use Notifiable;

    protected $fillable = [
        'name',
        'guard_name',
        'allow_notification',
        'is_volunteer',
        'role_description',
    ];

    protected $casts = [
        'allow_notification' => 'boolean',
        'is_volunteer' => 'boolean',
    ];

    protected $appends = ['roleDescription'];

    public function getRoleDescriptionAttribute()
    {
        return $this->attributes['role_description'] ?? null;
    }

    /**
     * Get all roles that are allowed to receive notifications.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getNotificationRecipients()
    {
        return self::where('allow_notification', true)->get();
    }

    /**
     * Scope query to get volunteer roles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVolunteer($query)
    {
        return $query->where('is_volunteer', true);
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return array
     */
    public function routeNotificationForMail()
    {
        return $this->users()->pluck('email')->toArray();
    }
}
