<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Campaign;

class CampaignGoalReached extends Notification
{
    use Queueable;

    protected $campaign;

    /**
     * Create a new notification instance.
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
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
            ->subject('🎉 Campaign Goal Reached! - ' . config('app.name'))
            ->greeting('Hello Admin,')
            ->line("Great news! The campaign '{$this->campaign->title}' has reached 100% of its fundraising goal!")
            ->line('**Campaign Details:**')
            ->line('• Target Goal: ' . $this->campaign->currency . ' ' . number_format($this->campaign->goal_amount, 2))
            ->line('• Total Raised: ' . $this->campaign->currency . ' ' . number_format($this->campaign->raised_amount, 2))
            ->action('View Campaign Details', url(env('FRONTEND_URL', 'http://127.0.0.1:5173') . "/admin/campaigns"))
            ->line('Thank you for making a difference!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Campaign Goal Reached! 🎉',
            'message' => "Campaign '{$this->campaign->title}' has reached 100% of its goal!",
            'category' => 'campaign',
            'action_url' => "/admin/campaigns/edit/{$this->campaign->id}",
            'metadata' => [
                'campaign_id' => $this->campaign->id,
                'title' => $this->campaign->title,
                'goal_amount' => $this->campaign->goal_amount,
                'raised_amount' => $this->campaign->raised_amount,
            ]
        ];
    }
}
