<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\Contact;

class NewContactInquiryReceived extends Notification implements ShouldQueue
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

    protected $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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
        $recipientName = !empty($notifiable->name) ? $notifiable->name : 'Team Member';

        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('✉️ New Contact Inquiry - ' . config('app.name'))
            ->greeting("Hello {$recipientName},")
            ->line('You have received a new inquiry from the website contact form.')
            ->line('**Inquiry Details:**')
            ->line('• Sender Name: ' . $this->contact->name)
            ->line('• Email: ' . $this->contact->email)
            ->line('• Subject: ' . ($this->contact->subject ?? 'General Inquiry'))
            ->line('**Message:**')
            ->line('"' . $this->contact->message . '"')
            ->action('View Messages', url(config('app.frontend_url', 'http://127.0.0.1:5173') . "/admin/contacts"))
            ->line('Please follow up with the sender as soon as possible.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Contact Inquiry',
            'message' => "Received a new message from {$this->contact->name}: \"" . substr($this->contact->message, 0, 60) . "...\"",
            'category' => 'inquiry',
            'action_url' => "/admin/contact/edit/{$this->contact->id}",
            'metadata' => [
                'contact_id' => $this->contact->id,
                'name' => $this->contact->name,
                'email' => $this->contact->email,
                'subject' => $this->contact->subject,
            ]
        ];
    }
}
