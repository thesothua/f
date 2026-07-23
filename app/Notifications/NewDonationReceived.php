<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Donation;

class NewDonationReceived extends Notification
{
    use Queueable;

    protected $donation;

    /**
     * Create a new notification instance.
     */
    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
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
        $campaignTitle = $this->donation->plan ? $this->donation->plan->title : null;
        $desc = $campaignTitle ? "for '{$campaignTitle}'" : "";

        return [
            'title' => 'New Donation Received',
            'message' => "{$this->donation->donor_name} donated ₹" . number_format($this->donation->amount) . " {$desc}.",
            'category' => 'donation',
            'action_url' => "/admin/donations/edit/{$this->donation->id}",
            'metadata' => [
                'donation_id' => $this->donation->id,
                'amount' => $this->donation->amount,
                'donor_name' => $this->donation->donor_name,
                'campaign_id' => $this->donation->plan_id,
            ]
        ];
    }
}
