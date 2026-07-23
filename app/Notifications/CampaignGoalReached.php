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
