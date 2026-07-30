<?php

namespace App\Mail;

use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolunteerWelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $volunteer;

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

    public function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🐾 Thank you for volunteering with Furrydom!',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.volunteers.welcome',
        );
    }
}
