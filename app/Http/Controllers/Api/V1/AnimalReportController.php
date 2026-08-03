<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AnimalReportService;
use Illuminate\Http\Request;

class AnimalReportController extends Controller
{
    protected $animalReportService;

    public function __construct(AnimalReportService $animalReportService)
    {
        $this->animalReportService = $animalReportService;
    }

    /**
     * Store a new animal report (Public submission).
     */
    public function store(Request $request)
    {
        // Support mapping camelCase keys from React to snake_case for validation
        if ($request->has('reporterName')) {
            $request->merge(['reporter_name' => $request->input('reporterName')]);
        }
        if ($request->has('reporterMobile')) {
            $request->merge(['reporter_mobile' => $request->input('reporterMobile')]);
        }
        if ($request->has('reporterEmail')) {
            $request->merge(['reporter_email' => $request->input('reporterEmail')]);
        }
        if ($request->has('animalType')) {
            $request->merge(['animal_type' => $request->input('animalType')]);
        }
        if ($request->has('approximateAge')) {
            $request->merge(['approximate_age' => $request->input('approximateAge')]);
        }

        $request->validate([
            'reporter_name'   => 'required|string|max:255',
            'reporter_mobile' => 'required|string|max:20',
            'reporter_email'  => 'nullable|email|max:255',
            'animal_type'     => 'required|string|max:100',
            'approximate_age' => 'required|string|max:100',
            'color'           => 'required|string|max:100',
            'gender'          => 'nullable|string|max:50',
            'injuries'        => 'required|array|min:1',
            'injuries.*'      => 'string',
            'address'         => 'required|string',
            'landmark'        => 'nullable|string|max:255',
            'latitude'        => 'nullable|numeric',
            'longitude'       => 'nullable|numeric',
            'urgency'         => 'required|string|in:low,medium,high,critical,Low,Medium,High,Critical',
            'description'     => 'required|string',
            'photos'          => 'nullable|array|max:5',
            'photos.*'        => 'file|image|mimes:jpeg,png,jpg,webp|max:10240',
            'video'           => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,video/x-matroska,video/x-msvideo|max:51200',
        ], [
            'reporter_name.required'   => 'Reporter name is required.',
            'reporter_mobile.required' => 'Reporter mobile number is required.',
            'animal_type.required'     => 'Animal type is required.',
            'approximate_age.required' => 'Approximate age is required.',
            'color.required'           => 'Animal color is required.',
            'injuries.required'        => 'Please select at least one injury type.',
            'injuries.min'             => 'Please select at least one injury type.',
            'address.required'         => 'Address location is required.',
            'urgency.required'         => 'Please specify the urgency level.',
            'description.required'     => 'Description of the situation is required.',
            'photos.max'               => 'You can upload a maximum of 5 images.',
            'photos.*.image'           => 'Uploaded files must be valid images.',
            'photos.*.max'             => 'Each photo must not exceed 10MB.',
            'video.max'                => 'The video must not exceed 50MB.',
        ]);

        $report = $this->animalReportService->createReport($request->all());

        // Trigger Admin Notification
        try {
            $roles = \App\Models\Role::getNotificationRecipients();
            \Illuminate\Support\Facades\Notification::send($roles, new \App\Notifications\NewAnimalReportReceived($report));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send NewAnimalReportReceived notification: ' . $e->getMessage());
        }

        return $this->successResponse(
            $report,
            'Thank you for reporting! The case has been logged successfully and our rescue team is notified.',
            201
        );
    }

    /**
     * Retrieve list of reports (Admin).
     */
    public function index(Request $request)
    {
        $reports = $this->animalReportService->getAllReports($request->all());
        return $this->successResponse($reports, 'Animal reports retrieved successfully.');
    }

    /**
     * Retrieve single report details (Admin).
     */
    public function show($id)
    {
        $report = $this->animalReportService->getReportById($id);
        if (!$report) {
            return $this->errorResponse('Animal report not found.', 404);
        }
        return $this->successResponse($report, 'Animal report retrieved successfully.');
    }

    /**
     * Update report notes or status (Admin).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status'      => 'sometimes|required|string|in:pending,accepted,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $report = $this->animalReportService->updateReport($id, $request->all());
        if (!$report) {
            return $this->errorResponse('Animal report not found.', 404);
        }

        return $this->successResponse($report, 'Animal report updated successfully.');
    }

    /**
     * Accept report & create Rescue Case (Admin).
     */
    public function accept(Request $request, $id)
    {
        // Support mapping camelCase keys from React
        if ($request->has('rescuerId')) {
            $request->merge(['rescuer_id' => $request->input('rescuerId')]);
        }

        $request->validate([
            'rescuer_id'  => 'nullable|exists:users,id',
            'status'      => 'nullable|string|in:dispatched,admitted,in_treatment,recovered,released,adopted,deceased',
            'description' => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        $case = $this->animalReportService->acceptReport($id, $request->all());
        if (!$case) {
            return $this->errorResponse('Animal report not found or could not be accepted.', 404);
        }

        return $this->successResponse($case, 'Animal report accepted and active rescue case created successfully.', 201);
    }

    /**
     * Delete report (Admin).
     */
    public function destroy($id)
    {
        $deleted = $this->animalReportService->deleteReport($id);
        if (!$deleted) {
            return $this->errorResponse('Animal report not found.', 404);
        }
        return $this->successResponse(null, 'Animal report deleted successfully.');
    }
}
