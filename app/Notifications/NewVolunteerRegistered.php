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
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): \Illuminate\Notifications\Messages\MailMessage
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('🤝 New Volunteer Application - ' . config('app.name'))
            ->greeting('Hello Admin,')
            ->line('A new volunteer application has been submitted.')
            ->line('**Volunteer Details:**')
            ->line('• Name: ' . $this->volunteer->full_name)
            ->line('• Email: ' . $this->volunteer->email)
            ->line('• Preferred Role: ' . ucfirst($this->volunteer->role))
            ->line('• Location: ' . ($this->volunteer->city ?? 'N/A'))
            ->line('**Reason for Joining:**')
            ->line('"' . $this->volunteer->reason . '"')
            ->action('Review Application', url(env('FRONTEND_URL', 'http://127.0.0.1:5173') . "/admin/volunteers"))
            ->line('Manage your volunteers from the dashboard.');
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
