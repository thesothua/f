<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RescueCase;
use Illuminate\Http\Request;

class RescueCaseController extends Controller
{
    /**
     * Display a listing of rescue cases.
     */
    public function index(Request $request)
    {
        $query = RescueCase::query()->with(['animalReport', 'rescuer']);

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
    public function show($id)
    {
        $case = RescueCase::with(['animalReport.media', 'rescuer', 'activities.causer'])->find($id);

        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
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

        $request->validate([
            'rescuer_id'  => 'nullable|exists:users,id',
            'status'      => 'sometimes|required|string|in:dispatched,admitted,in_treatment,recovered,released,adopted,deceased',
            'description' => 'nullable|string',
        ]);

        $case = RescueCase::find($id);
        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $case->update(array_filter([
            'rescuer_id'  => $request->has('rescuer_id') ? $request->input('rescuer_id') : $case->rescuer_id,
            'status'      => $request->input('status') ?? $case->status,
            'description' => $request->input('description') ?? $case->description,
        ], function ($value) {
            return !is_null($value);
        }));

        // Eager load relationships after updating to return complete object
        return $this->successResponse(
            $case->fresh(['animalReport', 'rescuer', 'activities.causer']),
            'Rescue case updated successfully.'
        );
    }

    /**
     * Remove the specified rescue case from storage.
     */
    public function destroy($id)
    {
        $case = RescueCase::find($id);
        if (!$case) {
            return $this->errorResponse('Rescue case not found.', 404);
        }

        $case->delete();
        return $this->successResponse(null, 'Rescue case deleted successfully.');
    }
}
