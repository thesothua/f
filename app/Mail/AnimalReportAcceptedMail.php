<?php

namespace App\Mail;

use App\Models\RescueCase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnimalReportAcceptedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $case;

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

    public function __construct(RescueCase $case)
    {
        $this->case = $case;
    }

    public function envelope(): Envelope
    {
        $caseNum = $this->case->case_number ?? '#' . $this->case->id;
        return new Envelope(
            subject: '🐾 Update on your Animal Report: Case Registered (' . $caseNum . ')',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.rescue.report_accepted',
        );
    }
}
