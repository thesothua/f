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
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.invoice', [
            'donation' => $this->donation,
            'settings' => $settings
        ]);

        $fileName = 'donation-invoice-' . ($this->donation->gateway_transaction_id ?? $this->donation->id) . '.pdf';

        return [
            Attachment::fromData(fn () => $pdf->output(), $fileName)
                ->withMime('application/pdf'),
        ];
    }
}
