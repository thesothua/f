<?php

namespace App\Mail;

use App\Models\RescueCase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class RescueCaseReportMail extends Mailable implements ShouldQueue
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
        return new Envelope(
            subject: '📄 Rescue Case Status Report - ' . ($this->case->case_number ?? $this->case->id),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.rescue.report',
        );
    }

    public function attachments(): array
    {
        $settings = app(\App\Settings\GeneralSettings::class);
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.rescue-case-report', [
            'case' => $this->case,
            'settings' => $settings
        ]);

        $fileName = 'rescue-case-report-' . ($this->case->case_number ?? $this->case->id) . '.pdf';

        return [
            Attachment::fromData(fn () => $pdf->output(), $fileName)
                ->withMime('application/pdf'),
        ];
    }
}
