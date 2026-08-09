<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RescueCase;
use App\Models\User;
use App\Mail\RescueCaseAssignedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RescueCaseController extends Controller
{
    /**
     * Check if the authenticated user has a volunteer role.
     */
    private function isVolunteerUser(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        if ($user->hasRole('Super Admin')) {
            return false;
        }

        return $user->roles()->where('is_volunteer', true)->exists();
    }

    /**
     * Display a listing of rescue cases.
     */
    public function index(Request $request)
    {
        $query = RescueCase::query()->with(['animalReport', 'rescuer']);

        $user = $request->user() ?? auth()->user();
        if ($this->isVolunteerUser($user)) {
            $query->where('rescuer_id', $user->id);
        }

        // Search filter
        if (!empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('case_number', 'like', "%{$search}%")
                  ->orWhere('animal_type', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%")
                  ->orWhereHas('rescuer', function ($sub) use ($search) {
                      $sub->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('animalReport', function ($sub) use ($search) {
                      $sub->where('reporter_name', 'like', "%{$search}%");
                  });
            });
        }

        // Status filter
        if (!empty($request->input('status'))) {
            $query->where('status', $request->input('status'));
        }

        // Sorting
        $sortBy = $request->input('sortBy') ?? 'created_at';
        $order = $request->input('order') ?? 'desc';
        $query->orderBy($sortBy, $order);

        $limit = $request->input('limit') ?? 10;
        $cases = $query->paginate($limit);

        return $this->successResponse($cases, 'Rescue cases retrieved successfully.');
    }

    /**
     * Display the specified rescue case with relationships and activities.
     */
    public function show(Request $request, $id)
    {
        $case = RescueCase::with(['animalReport.media', 'rescuer', 'activities.causer'])->find($id);

        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $user = $request->user() ?? auth()->user();
        if ($this->isVolunteerUser($user) && $case->rescuer_id != $user?->id) {
            return $this->errorResponse('Unauthorized. You can only view rescue cases assigned to you.', 403);
        }

        return $this->successResponse($case, 'Rescue case retrieved successfully.');
    }

    /**
     * Update the specified rescue case in storage.
     */
    public function update(Request $request, $id)
    {
        // Support mapping camelCase keys from React
        if ($request->has('rescuerId')) {
            $request->merge(['rescuer_id' => $request->input('rescuerId')]);
        }
        if ($request->has('clinicDetails')) {
            $request->merge(['clinic_details' => $request->input('clinicDetails')]);
        }
        if ($request->has('recoveryDetails')) {
            $request->merge(['recovery_details' => $request->input('recoveryDetails')]);
        }
        if ($request->has('adoptionDetails')) {
            $request->merge(['adoption_details' => $request->input('adoptionDetails')]);
        }
        if ($request->has('releaseDetails')) {
            $request->merge(['release_details' => $request->input('releaseDetails')]);
        }
        if ($request->has('deceasedDetails')) {
            $request->merge(['deceased_details' => $request->input('deceasedDetails')]);
        }

        $request->validate([
            'rescuer_id'        => 'nullable|exists:users,id',
            'status'            => 'sometimes|required|string|in:dispatched,admitted,in_treatment,recovered,released,adopted,deceased',
            'description'       => 'nullable|string',
            'clinic_details'    => 'nullable|array',
            'recovery_details'  => 'nullable|array',
            'adoption_details'  => 'nullable|array',
            'release_details'   => 'nullable|array',
            'deceased_details'  => 'nullable|array',
        ]);

        $case = RescueCase::find($id);
        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $user = $request->user() ?? auth()->user();
        if ($this->isVolunteerUser($user) && $case->rescuer_id != $user?->id) {
            return $this->errorResponse('Unauthorized. You can only update rescue cases assigned to you.', 403);
        }

        $updateData = [];
        if ($request->has('rescuer_id')) {
            $updateData['rescuer_id'] = $request->input('rescuer_id');
        }
        if ($request->has('status')) {
            $updateData['status'] = $request->input('status');
        }
        if ($request->has('description')) {
            $updateData['description'] = $request->input('description');
        }
        if ($request->has('clinic_details')) {
            $updateData['clinic_details'] = $request->input('clinic_details');
        }
        if ($request->has('recovery_details')) {
            $updateData['recovery_details'] = $request->input('recovery_details');
        }
        if ($request->has('adoption_details')) {
            $updateData['adoption_details'] = $request->input('adoption_details');
        }
        if ($request->has('release_details')) {
            $updateData['release_details'] = $request->input('release_details');
        }
        if ($request->has('deceased_details')) {
            $updateData['deceased_details'] = $request->input('deceased_details');
        }

        $oldRescuerId = $case->rescuer_id;
        $case->update($updateData);

        // If rescuer_id changed and is set, notify the newly assigned volunteer
        if (isset($updateData['rescuer_id']) && $updateData['rescuer_id'] != $oldRescuerId && !empty($updateData['rescuer_id'])) {
            $newRescuer = User::find($updateData['rescuer_id']);
            if ($newRescuer && !empty($newRescuer->email)) {
                try {
                    Mail::to($newRescuer->email)->send(new RescueCaseAssignedMail($case, $newRescuer));
                } catch (\Exception $e) {
                    Log::error('Failed to send rescue case assignment mail to volunteer: ' . $e->getMessage());
                }
            }
        }

        // Eager load relationships after updating to return complete object
        return $this->successResponse(
            $case->fresh(['animalReport', 'rescuer', 'activities.causer']),
            'Rescue case updated successfully.'
        );
    }

    /**
     * Remove the specified rescue case from storage.
     */
    public function destroy(Request $request, $id)
    {
        $case = RescueCase::find($id);
        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $user = $request->user() ?? auth()->user();
        if ($this->isVolunteerUser($user) && $case->rescuer_id != $user?->id) {
            return $this->errorResponse('Unauthorized. You can only delete rescue cases assigned to you.', 403);
        }

        $case->delete();
        return $this->successResponse(null, 'Rescue case deleted successfully.');
    }

    /**
     * Download the rescue case report as PDF.
     */
    public function downloadReport(Request $request, $id)
    {
        $case = RescueCase::with(['animalReport.media', 'rescuer', 'activities.causer'])->find($id);

        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $user = $request->user() ?? auth()->user();
        if ($this->isVolunteerUser($user) && $case->rescuer_id != $user?->id) {
            return $this->errorResponse('Unauthorized. You can only access rescue cases assigned to you.', 403);
        }

        $settings = app(\App\Settings\GeneralSettings::class);
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.rescue-case-report', [
            'case' => $case,
            'settings' => $settings
        ]);

        $fileName = 'rescue-case-report-' . ($case->case_number ?? $case->id) . '.pdf';

        return $pdf->download($fileName);
    }

    /**
     * Send the rescue case report PDF to the reporter's email.
     */
    public function sendReportToReporter(Request $request, $id)
    {
        $case = RescueCase::with(['animalReport.media', 'rescuer', 'activities.causer'])->find($id);

        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $user = $request->user() ?? auth()->user();
        if ($this->isVolunteerUser($user) && $case->rescuer_id != $user?->id) {
            return $this->errorResponse('Unauthorized. You can only access rescue cases assigned to you.', 403);
        }

        $reporterEmail = $case->animalReport->reporter_email ?? null;

        if (empty($reporterEmail)) {
            return $this->errorResponse('The reporter does not have an email address recorded.', 422);
        }

        \Illuminate\Support\Facades\Mail::to($reporterEmail)->send(new \App\Mail\RescueCaseReportMail($case));

        // Log this action to the activity timeline
        activity('rescue_cases')
            ->performedOn($case)
            ->causedBy(auth()->user())
            ->log("Email sent to reporter ({$reporterEmail})");

        return $this->successResponse(null, 'Rescue case report has been successfully sent to the reporter.');
    }
}
