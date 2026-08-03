<?php

namespace App\Services\Api\V1;

use App\Models\AnimalReport;
use App\Models\RescueCase;
use App\Models\User;
use App\Mail\AnimalReportAcceptedMail;
use App\Mail\RescueCaseAssignedMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AnimalReportService
{
    /**
     * Create a new animal report (Public submission).
     */
    public function createReport(array $data)
    {
        return DB::transaction(function () use ($data) {
            $report = AnimalReport::create([
                'reporter_name'   => $data['reporter_name'],
                'reporter_mobile' => $data['reporter_mobile'],
                'reporter_email'  => $data['reporter_email'] ?? null,
                'animal_type'     => $data['animal_type'],
                'approximate_age' => $data['approximate_age'],
                'color'           => $data['color'],
                'gender'          => $data['gender'] ?? null,
                'injuries'        => $data['injuries'],
                'address'         => $data['address'],
                'landmark'        => $data['landmark'] ?? null,
                'latitude'        => $data['latitude'] ?? null,
                'longitude'       => $data['longitude'] ?? null,
                'urgency'         => $data['urgency'],
                'description'     => $data['description'],
                'status'          => 'pending',
            ]);

            // Handle photos upload (max 5)
            if (!empty($data['photos']) && is_array($data['photos'])) {
                foreach (array_slice($data['photos'], 0, 5) as $photo) {
                    $originalName = $photo->getClientOriginalName();
                    $report->addMedia($photo)
                        ->usingFileName(time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName))
                        ->toMediaCollection('photos');
                }
            }

            // Handle video upload (optional)
            if (!empty($data['video'])) {
                $video = $data['video'];
                $originalName = $video->getClientOriginalName();
                $report->addMedia($video)
                    ->usingFileName(time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName))
                    ->toMediaCollection('video');
            }

            return $report->fresh(['media']);
        });
    }

    /**
     * List all reports with search, status filtering, and sorting (Admin).
     */
    public function getAllReports(array $params)
    {
        $query = AnimalReport::query()->with('rescueCase');

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('reporter_name', 'like', "%{$search}%")
                  ->orWhere('reporter_mobile', 'like', "%{$search}%")
                  ->orWhere('animal_type', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        $order = $params['order'] ?? 'desc';
        $query->orderBy($sortBy, $order);

        $limit = $params['limit'] ?? 10;
        return $query->paginate($limit);
    }

    /**
     * Get a single report by ID (Admin).
     */
    public function getReportById($id)
    {
        return AnimalReport::with(['rescueCase', 'media'])->find($id);
    }

    /**
     * Update report (Admin).
     */
    public function updateReport($id, array $data)
    {
        $report = AnimalReport::find($id);
        if (!$report) {
            return null;
        }

        $report->update(array_filter([
            'status'      => $data['status'] ?? null,
            'admin_notes' => $data['admin_notes'] ?? null,
        ]));

        return $report->fresh(['rescueCase', 'media']);
    }

    /**
     * Accept a report and convert to a Rescue Case (Admin).
     */
    public function acceptReport($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $report = AnimalReport::find($id);
            if (!$report) {
                return null;
            }

            if ($report->status === 'accepted') {
                return $report->rescueCase;
            }

            // Update Report Status
            $report->update([
                'status'      => 'accepted',
                'admin_notes' => $data['admin_notes'] ?? $report->admin_notes
            ]);

            // Auto-generate Case Number (Format: CASE-YYYY-XXXX)
            $currentYear = now()->year;
            $lastCase = RescueCase::whereYear('created_at', $currentYear)
                ->orderBy('id', 'desc')
                ->first();
            $nextNumber = 1;
            if ($lastCase) {
                $parts = explode('-', $lastCase->case_number);
                if (count($parts) === 3) {
                    $nextNumber = ((int) $parts[2]) + 1;
                }
            }
            $caseNumber = sprintf('CASE-%d-%04d', $currentYear, $nextNumber);

            // Create Rescue Case
            $rescueCase = RescueCase::create([
                'case_number'      => $caseNumber,
                'animal_report_id' => $report->id,
                'rescuer_id'       => $data['rescuer_id'] ?? null,
                'animal_type'      => $report->animal_type,
                'color'            => $report->color,
                'gender'           => $report->gender,
                'status'           => $data['status'] ?? 'dispatched',
                'description'      => $data['description'] ?? $report->description,
            ]);

            // Log activity manually for creation trace
            activity('rescue_cases')
                ->performedOn($rescueCase)
                ->causedBy(auth()->user())
                ->log("Rescue case created from report #{$report->id}");

            // Send notification email to reporter if email is provided
            if (!empty($report->reporter_email)) {
                try {
                    Mail::to($report->reporter_email)->send(new AnimalReportAcceptedMail($rescueCase));
                } catch (\Exception $e) {
                    Log::error('Failed to send animal report acceptance mail to reporter: ' . $e->getMessage());
                }
            }

            // Send assignment notification email to rescuer/volunteer if assigned
            if ($rescueCase->rescuer_id) {
                $rescuer = User::find($rescueCase->rescuer_id);
                if ($rescuer && !empty($rescuer->email)) {
                    try {
                        Mail::to($rescuer->email)->send(new RescueCaseAssignedMail($rescueCase, $rescuer));
                    } catch (\Exception $e) {
                        Log::error('Failed to send rescue case assignment mail to volunteer: ' . $e->getMessage());
                    }
                }
            }

            return $rescueCase;
        });
    }

    /**
     * Delete report (Admin).
     */
    public function deleteReport($id)
    {
        $report = AnimalReport::find($id);
        if (!$report) {
            return false;
        }

        // Deleting the report will delete associated files automatically through Spatie MediaLibrary
        $report->delete();
        return true;
    }
}
