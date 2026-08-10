<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\CampaignService;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    protected $campaignService;

    public function __construct(CampaignService $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    /**
     * List all campaigns
     */
    public function index(Request $request)
    {
        $campaigns = $this->campaignService->getAllCampaigns($request->only(['search', 'status', 'sortBy', 'order', 'page', 'limit']));
        return $this->successResponse($campaigns, 'Campaigns retrieved successfully.');
    }

    /**
     * Show a campaign detail
     */
    public function show(Request $request, $id)
    {
        // Try finding by ID first, then by slug
        $campaign = is_numeric($id) 
            ? $this->campaignService->getCampaignById($id) 
            : $this->campaignService->getCampaignBySlug($id);

        if (!$campaign) {
            return $this->errorResponse('Campaign not found.', 404);
        }

        return $this->successResponse($campaign, 'Campaign retrieved successfully.');
    }

    /**
     * Store a new campaign
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'nullable|string|in:Active,Completed,Closed',
            'cover_image_file' => 'nullable|image|max:5120',
            'gallery_image_files.*' => 'nullable|image|max:5120',
        ]);

        try {
            $coverFile = $request->file('cover_image_file');
            $galleryFiles = $request->file('gallery_image_files') ?? [];

            $campaign = $this->campaignService->createCampaign($request->only(['title', 'slug', 'description', 'goal_amount', 'raised_amount', 'start_date', 'end_date', 'status']), $coverFile, $galleryFiles);

            return $this->successResponse($campaign, 'Campaign created successfully.', 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create campaign: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Update an existing campaign
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|min:2',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'goal_amount' => 'sometimes|required|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'sometimes|required|string|in:Active,Completed,Closed',
            'cover_image_file' => 'nullable|image|max:5120',
            'gallery_image_files.*' => 'nullable|image|max:5120',
        ]);

        try {
            $coverFile = $request->file('cover_image_file');
            $galleryFiles = $request->file('gallery_image_files') ?? [];

            $campaign = $this->campaignService->updateCampaign($id, $request->only(['title', 'slug', 'description', 'goal_amount', 'raised_amount', 'start_date', 'end_date', 'status']), $coverFile, $galleryFiles);

            if (!$campaign) {
                return $this->errorResponse('Campaign not found.', 404);
            }

            return $this->successResponse($campaign, 'Campaign updated successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update campaign: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Delete a campaign
     */
    public function destroy(Request $request, $id)
    {
        try {
            $deleted = $this->campaignService->deleteCampaign($id);
            if (!$deleted) {
                return $this->errorResponse('Campaign not found.', 404);
            }
            return $this->successResponse(null, 'Campaign deleted successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete campaign: ' . $e->getMessage(), 500);
        }
    }
}
