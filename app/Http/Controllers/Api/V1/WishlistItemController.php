<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Wishlist Management
 *
 * APIs for shelter wishlist items, urgent needs, and stock tracking.
 */
class WishlistItemController extends Controller
{
    /**
     * Public: Fetch active wishlist items for website.
     */
    public function indexPublic()
    {
        $items = WishlistItem::active()
            ->orderByDesc('is_urgent')
            ->orderBy('order_priority')
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'items' => $items,
        ]);
    }

    /**
     * Admin: Fetch all wishlist items (including inactive).
     */
    public function indexAdmin()
    {
        $items = WishlistItem::orderByDesc('is_urgent')
            ->orderBy('order_priority')
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'items' => $items,
        ]);
    }

    /**
     * Admin: Store new wishlist item.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:MEDICAL,STATIONARY,SHELTER COMFORT,FOOD,CLOTH,OTHER,HYGIENE,EQUIPMENT',
            'price' => 'required|string|max:50',
            'image_url' => 'nullable|url|max:2048',
            'flipkart_url' => 'nullable|url|max:2048',
            'amazon_url' => 'nullable|url|max:2048',
            'target_quantity' => 'nullable|integer|min:1',
            'received_quantity' => 'nullable|integer|min:0',
            'is_urgent' => 'nullable|boolean',
            'show_progress_bar' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $item = WishlistItem::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Wishlist item created successfully.',
            'item' => $item,
        ], 201);
    }

    /**
     * Admin: Update wishlist item.
     */
    public function update(Request $request, $id)
    {
        $item = WishlistItem::find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Wishlist item not found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|in:MEDICAL,STATIONARY,SHELTER COMFORT,FOOD,CLOTH,OTHER,HYGIENE,EQUIPMENT',
            'price' => 'sometimes|required|string|max:50',
            'image_url' => 'nullable|url|max:2048',
            'flipkart_url' => 'nullable|url|max:2048',
            'amazon_url' => 'nullable|url|max:2048',
            'target_quantity' => 'nullable|integer|min:1',
            'received_quantity' => 'nullable|integer|min:0',
            'is_urgent' => 'nullable|boolean',
            'show_progress_bar' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $item->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Wishlist item updated successfully.',
            'item' => $item,
        ]);
    }

    /**
     * Admin: Delete wishlist item.
     */
    public function destroy($id)
    {
        $item = WishlistItem::find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Wishlist item not found.'], 404);
        }

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Wishlist item deleted.',
        ]);
    }

    /**
     * Admin: Toggle item urgency.
     */
    public function toggleUrgent(Request $request, $id)
    {
        $item = WishlistItem::find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Wishlist item not found.'], 404);
        }

        if ($request->has('is_urgent')) {
            $item->is_urgent = filter_var($request->input('is_urgent'), FILTER_VALIDATE_BOOLEAN);
        } else {
            $item->is_urgent = !$item->is_urgent;
        }

        $item->save();

        return response()->json([
            'success' => true,
            'message' => 'Urgent status updated.',
            'item' => $item,
        ]);
    }

    /**
     * Admin: Toggle show progress bar option.
     */
    public function toggleProgressBar(Request $request, $id)
    {
        $item = WishlistItem::find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Wishlist item not found.'], 404);
        }

        if ($request->has('show_progress_bar')) {
            $item->show_progress_bar = filter_var($request->input('show_progress_bar'), FILTER_VALIDATE_BOOLEAN);
        } else {
            $item->show_progress_bar = !$item->show_progress_bar;
        }

        $item->save();

        return response()->json([
            'success' => true,
            'message' => 'Progress bar visibility updated.',
            'item' => $item,
        ]);
    }
}
