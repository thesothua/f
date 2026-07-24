<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index(Request $request)
    {
        $plans = $this->planService->getAllPlans($request->all());
        return $this->successResponse($plans, 'Plans retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $plan = $this->planService->getPlanById($id);
        if (!$plan) {
            return $this->errorResponse('Plan not found.', 404);
        }
        return $this->successResponse($plan, 'Plan retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cardType' => 'nullable|string|in:cause,mission',
            'card_type' => 'nullable|string|in:cause,mission',
            'title' => 'required|string|min:2',
            'description' => 'required|string',
            'category' => 'required|string',
            'sortOrder' => 'nullable|integer',
            'image' => 'nullable|string',
            'alt' => 'nullable|string',
            'goalAmount' => 'nullable|numeric|min:0',
            'status' => 'nullable|string|in:Active,Inactive,Draft',
            'featured' => 'nullable|boolean',
            'file' => 'nullable|file|image|max:10240',
        ]);

        $file = $request->file('file');
        $plan = $this->planService->createPlan($request->all(), $file);

        return $this->successResponse($plan, 'Plan created successfully.', 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cardType' => 'nullable|string|in:cause,mission',
            'card_type' => 'nullable|string|in:cause,mission',
            'title' => 'sometimes|required|string|min:2',
            'description' => 'sometimes|required|string',
            'category' => 'sometimes|required|string',
            'sortOrder' => 'nullable|integer',
            'image' => 'nullable|string',
            'alt' => 'nullable|string',
            'goalAmount' => 'nullable|numeric|min:0',
            'status' => 'nullable|string|in:Active,Inactive,Draft',
            'featured' => 'nullable|boolean',
            'file' => 'nullable|file|image|max:10240',
        ]);

        $file = $request->file('file');
        $plan = $this->planService->updatePlan($id, $request->all(), $file);

        if (!$plan) {
            return $this->errorResponse('Plan not found.', 404);
        }

        return $this->successResponse($plan, 'Plan updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->planService->deletePlan($id);
        if (!$deleted) {
            return $this->errorResponse('Plan not found.', 404);
        }
        return $this->successResponse(null, 'Plan deleted successfully.');
    }
}
