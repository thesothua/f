<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolunteerApprovedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $roleName;
    public $loginUrl;

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

    public function __construct(User $user, string $password, string $roleName)
    {
        $this->user = $user;
        $this->password = $password;
        $this->roleName = $roleName;
        $this->loginUrl = config('app.frontend_url', 'http://127.0.0.1:5173') . '/admin/login';
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🐾 Your Volunteer Application has been Approved!',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.volunteers.approved',
        );
    }
}
