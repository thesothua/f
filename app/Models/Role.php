<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Notifications\Notifiable;

class Role extends SpatieRole
{
    use Notifiable;

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
     * Route notifications for the mail channel.
     *
     * @return array
     */
    public function routeNotificationForMail()
    {
        return $this->users()->pluck('email')->toArray();
    }
}
