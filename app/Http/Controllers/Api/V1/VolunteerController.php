<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\VolunteerService;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public $volunteerService;

    public function __construct(VolunteerService $volunteerService)
    {
        $this->volunteerService = $volunteerService;
    }

    public function index(Request $request)
    {
        $volunteers = $this->volunteerService->getAllVolunteers($request->all());
        return $this->successResponse($volunteers, 'Volunteers retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $volunteer = $this->volunteerService->getVolunteerById($id);
        if (!$volunteer) {
            return $this->errorResponse('Volunteer application not found.', 404);
        }
        return $this->successResponse($volunteer, 'Volunteer application retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName'    => 'required_without:full_name|string|min:2',
            'full_name'   => 'required_without:fullName|string|min:2',
            'email'       => 'required|email',
            'phone'       => 'nullable|string',
            'city'        => 'nullable|string',
            'role'        => 'nullable|string',
            'reason'      => 'nullable|string',
            'status'      => 'nullable|string|in:Pending,Approved,Rejected',
            'adminNotes'  => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        $volunteer = $this->volunteerService->createVolunteer($request->all());

        return $this->successResponse($volunteer, 'Volunteer application submitted successfully! Thank you for joining.', 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullName'    => 'sometimes|string|min:2',
            'full_name'   => 'sometimes|string|min:2',
            'email'       => 'sometimes|email',
            'phone'       => 'nullable|string',
            'city'        => 'nullable|string',
            'role'        => 'sometimes|string',
            'reason'      => 'nullable|string',
            'status'      => 'sometimes|string|in:Pending,Approved,Rejected',
            'adminNotes'  => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        $volunteer = $this->volunteerService->updateVolunteer($id, $request->all());

        if (!$volunteer) {
            return $this->errorResponse('Volunteer application not found.', 404);
        }

        return $this->successResponse($volunteer, 'Volunteer application updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->volunteerService->deleteVolunteer($id);
        if (!$deleted) {
            return $this->errorResponse('Volunteer application not found.', 404);
        }
        return $this->successResponse(null, 'Volunteer application deleted successfully.');
    }
}
