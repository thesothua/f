<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AutoFeederService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutoFeederController extends Controller
{
    protected $autoFeederService;

    public function __construct(AutoFeederService $autoFeederService)
    {
        $this->autoFeederService = $autoFeederService;
    }

    /**
     * Public: Get list of active auto feeders for website visitors.
     */
    public function indexPublic()
    {
        $feeders = $this->autoFeederService->getPublicFeeders();

        return response()->json([
            'success' => true,
            'status' => true,
            'feeders' => $feeders,
            'data' => $feeders,
        ]);
    }

    /**
     * Admin: Get all auto feeders (with search/pagination/filter).
     */
    public function indexAdmin(Request $request)
    {
        $feeders = $this->autoFeederService->getAllAdminFeeders($request->all());

        return response()->json([
            'success' => true,
            'status' => true,
            'feeders' => $feeders,
            'data' => $feeders,
        ]);
    }

    /**
     * Admin: Store new auto feeder installation.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'google_map_url' => 'nullable|string|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|string|in:active,maintenance,inactive',
            'installed_date' => 'nullable|date',
            'sponsor_name' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:2048',
            'description' => 'nullable|string',
            'capacity_kg' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $feeder = $this->autoFeederService->createFeeder($validator->validated());

        return response()->json([
            'success' => true,
            'status' => true,
            'message' => 'Auto feeder station created successfully.',
            'feeder' => $feeder,
            'data' => $feeder,
        ], 201);
    }

    /**
     * Admin/Public: Show auto feeder details.
     */
    public function show($id)
    {
        $feeder = $this->autoFeederService->getFeederById($id);

        if (!$feeder) {
            return response()->json([
                'success' => false,
                'status' => false,
                'message' => 'Auto feeder station not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => true,
            'feeder' => $feeder,
            'data' => $feeder,
        ]);
    }

    /**
     * Admin: Update auto feeder installation details.
     */
    public function update(Request $request, $id)
    {
        $feeder = $this->autoFeederService->getFeederById($id);

        if (!$feeder) {
            return response()->json([
                'success' => false,
                'status' => false,
                'message' => 'Auto feeder station not found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string',
            'google_map_url' => 'nullable|string|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|string|in:active,maintenance,inactive',
            'installed_date' => 'nullable|date',
            'sponsor_name' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:2048',
            'description' => 'nullable|string',
            'capacity_kg' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $updatedFeeder = $this->autoFeederService->updateFeeder($id, $validator->validated());

        return response()->json([
            'success' => true,
            'status' => true,
            'message' => 'Auto feeder station updated successfully.',
            'feeder' => $updatedFeeder,
            'data' => $updatedFeeder,
        ]);
    }

    /**
     * Admin: Delete auto feeder installation.
     */
    public function destroy($id)
    {
        $deleted = $this->autoFeederService->deleteFeeder($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'status' => false,
                'message' => 'Auto feeder station not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => true,
            'message' => 'Auto feeder station deleted.',
        ]);
    }
}
