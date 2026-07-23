<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Volunteer;

class NewVolunteerRegistered extends Notification
{
    use Queueable;

    protected $volunteer;

    /**
     * Create a new notification instance.
     */
    public function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Volunteer Registered',
            'message' => "{$this->volunteer->name} has applied as a volunteer.",
            'category' => 'volunteer',
            'action_url' => "/admin/volunteers/edit/{$this->volunteer->id}",
            'metadata' => [
                'volunteer_id' => $this->volunteer->id,
                'name' => $this->volunteer->name,
                'email' => $this->volunteer->email,
            ]
        ];
    }
}
