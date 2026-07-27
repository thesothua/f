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
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): \Illuminate\Notifications\Messages\MailMessage
    {
        $campaignTitle = $this->donation->plan ? $this->donation->plan->title : null;
        $desc = $campaignTitle ? "for '{$campaignTitle}'" : "for General Support";

        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('🐾 New Donation Received - ' . config('app.name'))
            ->greeting('Hello Admin,')
            ->line('A new donation has been successfully processed on ' . config('app.name') . '.')
            ->line('**Donor Details:**')
            ->line('• Name: ' . $this->donation->donor_name)
            ->line('• Email: ' . $this->donation->donor_email)
            ->line('• Amount: ' . $this->donation->currency . ' ' . number_format($this->donation->amount, 2))
            ->line('• Purpose/Cause: ' . $desc)
            ->line('• Payment ID: ' . ($this->donation->gateway_transaction_id ?? 'N/A'))
            ->action('View Donation Record', url(env('FRONTEND_URL', 'http://127.0.0.1:5173') . "/admin/donations"))
            ->line('Thank you for supporting ' . config('app.name') . '!');
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
