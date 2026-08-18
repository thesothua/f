<?php

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class DonationInvoiceMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $donation;

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

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📄 Your Donation Invoice - ' . (app(\App\Settings\GeneralSettings::class)->site_name ?? 'Furrydom NGO'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.donations.invoice',
        );
    }

    public function attachments(): array
    {
        $settings = app(\App\Settings\GeneralSettings::class);
        
        $donation = \App\Models\Donation::with(['plan', 'subscription.plan', 'subscription.campaign', 'subscription.autoFeeder', 'campaign', 'autoFeeder'])
            ->find($this->donation->id) ?? $this->donation;

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.invoice', [
            'donation' => $donation,
            'settings' => $settings
        ]);

        $fileName = 'donation-invoice-' . ($donation->gateway_transaction_id ?? $donation->id) . '.pdf';

        return [
            Attachment::fromData(fn () => $pdf->output(), $fileName)
                ->withMime('application/pdf'),
        ];
    }
}
