<?php

namespace App\Notifications;

use App\Models\AnimalReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAnimalReportReceived extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $backoff = 3;

    protected $report;

    /**
     * Create a new notification instance.
     */
    public function __construct(AnimalReport $report)
    {
        $this->report = $report;
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
    public function toMail(object $notifiable): MailMessage
    {
        $injuriesStr = is_array($this->report->injuries) 
            ? implode(', ', $this->report->injuries) 
            : $this->report->injuries;

        $recipientName = !empty($notifiable->name) ? $notifiable->name : 'Team Member';

        return (new MailMessage)
            ->subject('🚨 New Injured Animal Report Received - ' . config('app.name'))
            ->greeting("Hello {$recipientName},")
            ->line('A new injured animal report has been successfully submitted on ' . config('app.name') . '.')
            ->line('**Report Details:**')
            ->line('• Animal Type: ' . $this->report->animal_type)
            ->line('• Urgency: ' . ucfirst($this->report->urgency))
            ->line('• Injuries: ' . $injuriesStr)
            ->line('• Location/Address: ' . $this->report->address)
            ->line('• Landmark: ' . ($this->report->landmark ?? 'N/A'))
            ->line('**Reporter Details:**')
            ->line('• Name: ' . $this->report->reporter_name)
            ->line('• Mobile: ' . $this->report->reporter_mobile)
            ->line('• Email: ' . ($this->report->reporter_email ?? 'N/A'))
            ->line('**Description:**')
            ->line('"' . $this->report->description . '"')
            ->action('View Animal Reports', url(env('FRONTEND_URL', 'http://127.0.0.1:5173') . "/admin/animal-reports"))
            ->line('Please review the report details and dispatch a rescuer if appropriate.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Animal Report Received',
            'message' => "A new report for a {$this->report->animal_type} has been submitted by {$this->report->reporter_name}.",
            'category' => 'animal_report',
            'action_url' => "/admin/animal-reports",
            'metadata' => [
                'animal_report_id' => $this->report->id,
                'animal_type' => $this->report->animal_type,
                'urgency' => $this->report->urgency,
                'reporter_name' => $this->report->reporter_name,
            ]
        ];
    }
}
