<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\PlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\PlanResource;

/**
 * @group Plans & Causes
 *
 * APIs for managing cause plans, sponsorship packages, and goals.
 */
class PlanController extends Controller
{
    public $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index(Request $request)
    {
        $cacheKey = 'plans.index.' . md5(json_encode($request->query()));
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($request) {
            $plans = $this->planService->getAllPlans($request->all());
            $resource = PlanResource::collection($plans);
            return $request->has('page') ? $resource->response()->getData(true) : $resource->resolve();
        });

        return $this->successResponse($data, 'Plans retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $cacheKey = 'plans.show.' . $id;
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($id) {
            $plan = $this->planService->getPlanById($id);
            return $plan ? (new PlanResource($plan))->resolve() : null;
        });

        if (!$data) {
            return $this->errorResponse('Plan not found.', 404);
        }
        return $this->successResponse($data, 'Plan retrieved successfully.');
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

        $this->clearPlanCache();

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

        $this->clearPlanCache($plan->id);

        return $this->successResponse($plan, 'Plan updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->planService->deletePlan($id);
        if (!$deleted) {
            return $this->errorResponse('Plan not found.', 404);
        }
        
        $this->clearPlanCache($id);
        
        return $this->successResponse(null, 'Plan deleted successfully.');
    }

    private function clearPlanCache($id = null)
    {
        if ($id) Cache::forget('plans.show.' . $id);
    }
}
