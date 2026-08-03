<?php

namespace App\Mail;

use App\Models\RescueCase;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RescueCaseAssignedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $case;
    public $volunteer;
    public $adminUrl;

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

    public function __construct(RescueCase $case, ?User $volunteer = null)
    {
        $this->case = $case;
        $this->volunteer = $volunteer ?? $case->rescuer;
        $this->adminUrl = env('FRONTEND_URL', 'http://localhost:5173') . '/admin/rescue-cases/' . $case->id;
    }

    public function envelope(): Envelope
    {
        $caseNum = $this->case->case_number ?? '#' . $this->case->id;
        $animalType = $this->case->animalReport->animal_type ?? ($this->case->animal_type ?? 'Animal');
        return new Envelope(
            subject: '🚨 New Rescue Case Assigned: ' . $caseNum . ' (' . $animalType . ')',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.rescue.case_assigned',
        );
    }
}
