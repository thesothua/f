<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlacesController extends Controller
{
    /**
     * Public: Search place autocomplete using Google Places API (New) v1.
     */
    public function autocomplete(Request $request)
    {
        $input = trim($request->input('input', ''));

        if (empty($input)) {
            return response()->json(['suggestions' => []]);
        }

        $apiKey = config('services.google.maps_key', env('GOOGLE_MAPS_API_KEY', 'AIzaSyA0xwpQM7wOsQ3UsjTyi4ZO0gPZvaVi8yM'));

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Goog-Api-Key' => $apiKey,
            ])->post('https://places.googleapis.com/v1/places:autocomplete', [
                'input' => $input,
                'includedRegionCodes' => ['IN'],
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch predictions from Google Places API.',
                'error' => $response->body()
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Public: Fetch place details (location lat/lng, address) by place ID.
     */
    public function details(Request $request, $placeId)
    {
        $apiKey = config('services.google.maps_key', env('GOOGLE_MAPS_API_KEY', 'AIzaSyA0xwpQM7wOsQ3UsjTyi4ZO0gPZvaVi8yM'));

        try {
            $response = Http::withHeaders([
                'X-Goog-Api-Key' => $apiKey,
                'X-Goog-FieldMask' => 'id,displayName,location,formattedAddress',
            ])->get("https://places.googleapis.com/v1/places/{$placeId}");

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'place' => $response->json()
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch place details.',
                'error' => $response->body()
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
