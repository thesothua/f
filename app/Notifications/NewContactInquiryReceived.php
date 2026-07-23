<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Contact;

class NewContactInquiryReceived extends Notification
{
    use Queueable;

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
