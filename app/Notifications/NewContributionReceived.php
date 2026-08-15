<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\Contribution;

class NewContributionReceived extends Notification implements ShouldQueue
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

    protected $contribution;

    /**
     * Create a new notification instance.
     */
    public function __construct(Contribution $contribution)
    {
        $this->contribution = $contribution;
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
        $typeLabel = ucfirst(str_replace('_', ' ', $this->contribution->type));
        $recipientName = !empty($notifiable->name) ? $notifiable->name : 'Team Member';
        $fulfillment = ucfirst(str_replace('_', ' ', $this->contribution->fulfillment_method ?? 'N/A'));

        $mail = (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('📦 New Contribution Received - ' . config('app.name'))
            ->greeting("Hello {$recipientName},")
            ->line('A new contribution/donation-in-kind request has been submitted on ' . config('app.name') . '.')
            ->line('**Contributor Details:**')
            ->line('• Name: ' . $this->contribution->contributor_name)
            ->line('• Email: ' . $this->contribution->contributor_email)
            ->line('• Phone: ' . ($this->contribution->contributor_phone ?? 'N/A'))
            ->line('• Type: ' . $typeLabel)
            ->line('• Reference: ' . $this->contribution->reference_number)
            ->line('• Fulfillment: ' . $fulfillment);

        if ($this->contribution->city) {
            $mail->line('• City: ' . $this->contribution->city);
        }

        $mail->action('View Contribution', url(config('app.frontend_url', 'http://127.0.0.1:5173') . '/admin/contributions'))
            ->line('Thank you for supporting ' . config('app.name') . '!');

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $typeLabel = ucfirst(str_replace('_', ' ', $this->contribution->type));

        return [
            'title' => 'New Contribution Received',
            'message' => "{$this->contribution->contributor_name} submitted a {$typeLabel} contribution ({$this->contribution->reference_number}).",
            'category' => 'contribution',
            'action_url' => '/admin/contributions',
            'metadata' => [
                'contribution_id' => $this->contribution->id,
                'reference_number' => $this->contribution->reference_number,
                'type' => $this->contribution->type,
                'contributor_name' => $this->contribution->contributor_name,
            ]
        ];
    }
}
