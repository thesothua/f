<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use App\Services\Api\V1\ContributionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContributionController extends Controller
{
    protected ContributionService $contributionService;

    public function __construct(ContributionService $contributionService)
    {
        $this->contributionService = $contributionService;
    }

    /**
     * Public: Get available contribution types and categories.
     */
    public function getTypes()
    {
        return response()->json([
            'success' => true,
            'types' => [
                ['id' => 'food', 'label' => 'Give Food', 'description' => 'Pet food, grains, milk packets, and animal meals.'],
                ['id' => 'supplies', 'label' => 'Give Supplies', 'description' => 'Medicines, blankets, bowls, cages, and stationery.'],
                ['id' => 'services', 'label' => 'Give Services', 'description' => 'Animal transportation, printing, grooming, & logistics.'],
                ['id' => 'business_csr', 'label' => 'Business / CSR Support', 'description' => 'Corporate supply sponsorship & recurring monthly drives.'],
            ],
            'categories' => [
                'food' => ['Dog Food', 'Cat Food', 'Rice & Grains', 'Milk & Formula', 'Vegetables & Meat', 'Meal Packets'],
                'supplies' => ['Medicines & First Aid', 'Blankets & Towels', 'Pet Beds & Cages', 'Bowls & Leashes', 'Stationery & School Bags'],
                'services' => ['Animal Transportation', 'Free Printing', 'Grooming & Hygiene', 'Storage & Logistics'],
            ],
        ]);
    }

    /**
     * Public: Get public impact summary.
     */
    public function publicImpactSummary()
    {
        $impact = $this->contributionService->getPublicImpactSummary();

        return response()->json([
            'success' => true,
            'impact' => $impact,
        ]);
    }

    /**
     * Public: Store new contribution request.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:food,supplies,services,business_csr',
            'contributor_name' => 'required|string|max:255',
            'contributor_email' => 'required|email|max:255',
            'contributor_phone' => 'required|string|max:50',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
            'fulfillment_method' => 'nullable|string|in:pickup,drop_off,courier,digital,on_site,n_a',
            'preferred_date' => 'nullable|date',
            'items' => 'nullable|array',
            'items.*.item_name' => 'required_with:items|string|max:255',
            'items.*.quantity' => 'required_with:items|numeric|min:0.01',
            'skill' => 'nullable|array',
            'schedule' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $contribution = $this->contributionService->createContribution($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your contribution request has been submitted successfully.',
                'reference_number' => $contribution->reference_number,
                'contribution' => $contribution,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit contribution request: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Public: Track contribution status by reference number.
     */
    public function trackByReference(string $referenceNumber)
    {
        $contribution = Contribution::where('reference_number', $referenceNumber)
            ->with(['items', 'skill', 'schedule'])
            ->first();

        if (!$contribution) {
            return response()->json([
                'success' => false,
                'message' => 'Contribution reference number not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'contribution' => [
                'reference_number' => $contribution->reference_number,
                'title' => $contribution->title,
                'type' => $contribution->type,
                'status' => $contribution->status,
                'contributor_name' => $contribution->is_anonymous ? 'Anonymous' : $contribution->contributor_name,
                'fulfillment_method' => $contribution->fulfillment_method,
                'created_at' => $contribution->created_at->toDateTimeString(),
                'approved_at' => $contribution->approved_at ? $contribution->approved_at->toDateTimeString() : null,
                'completed_at' => $contribution->completed_at ? $contribution->completed_at->toDateTimeString() : null,
                'items' => $contribution->items,
            ],
        ]);
    }

    /**
     * Admin: Get paginated contribution requests.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['type', 'status', 'search', 'per_page']);
        $contributions = $this->contributionService->getAdminContributions($filters);

        return response()->json([
            'success' => true,
            'contributions' => $contributions,
        ]);
    }

    /**
     * Admin: Show single contribution detail.
     */
    public function show($id)
    {
        $contribution = Contribution::with(['items', 'skill', 'schedule', 'user', 'assignedStaff', 'activities.causer'])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'contribution' => $contribution,
        ]);
    }

    /**
     * Admin: Update status and notes.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,under_review,approved,contacted,scheduled,received,completed,rejected,cancelled',
            'admin_notes' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $contribution = Contribution::findOrFail($id);
        $updated = $this->contributionService->updateStatus(
            $contribution,
            $request->input('status'),
            $request->input('admin_notes'),
            $request->input('assigned_to')
        );

        return response()->json([
            'success' => true,
            'message' => 'Contribution status updated successfully.',
            'contribution' => $updated,
        ]);
    }

    /**
     * Admin: Add internal note.
     */
    public function addNote(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|string',
        ]);

        $contribution = Contribution::findOrFail($id);
        $existingNotes = $contribution->admin_notes ? $contribution->admin_notes . "\n---\n" : '';
        $newNotes = $existingNotes . '[' . now()->format('Y-m-d H:i') . ' by ' . (auth()->user()->name ?? 'Admin') . ']: ' . $request->input('notes');

        $contribution->update(['admin_notes' => $newNotes]);

        return response()->json([
            'success' => true,
            'message' => 'Admin note added successfully.',
            'admin_notes' => $newNotes,
        ]);
    }

    /**
     * Admin: Get statistics summary.
     */
    public function stats()
    {
        $stats = $this->contributionService->getAdminStats();

        return response()->json([
            'success' => true,
            'stats' => $stats,
        ]);
    }

    /**
     * Admin: Delete a contribution.
     */
    public function destroy($id)
    {
        $contribution = Contribution::findOrFail($id);
        $contribution->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contribution record deleted successfully.',
        ]);
    }
}
