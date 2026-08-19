<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\CampaignService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\CampaignResource;

/**
 * @group Campaigns
 *
 * APIs for managing fundraising campaigns, targets, and progress metrics.
 */
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
        $cacheKey = 'campaigns.index.' . md5(json_encode($request->query()));
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($request) {
            $campaigns = $this->campaignService->getAllCampaigns($request->only(['search', 'status', 'sortBy', 'order', 'page', 'limit']));
            $resource = CampaignResource::collection($campaigns);
            return $request->has('page') ? $resource->response()->getData(true) : $resource->resolve();
        });

        return $this->successResponse($data, 'Campaigns retrieved successfully.');
    }

    /**
     * Show a campaign detail
     */
    public function show(Request $request, $id)
    {
        $cacheKey = 'campaigns.show.' . $id;
        $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($id) {
            $campaign = is_numeric($id) 
                ? $this->campaignService->getCampaignById($id) 
                : $this->campaignService->getCampaignBySlug($id);
            
            return $campaign ? (new CampaignResource($campaign))->resolve() : null;
        });

        if (!$data) {
            return $this->errorResponse('Campaign not found.', 404);
        }

        return $this->successResponse($data, 'Campaign retrieved successfully.');
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
            'cover_image' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'seo' => 'nullable|array',
            'cover_image_file' => 'nullable|image|max:5120',
            'gallery_image_files.*' => 'nullable|image|max:5120',
        ]);

        try {
            $coverFile = $request->file('cover_image_file');
            $galleryFiles = $request->file('gallery_image_files') ?? [];

            $campaign = $this->campaignService->createCampaign($request->all(), $coverFile, $galleryFiles);

            $this->clearCampaignCache();

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
            'cover_image' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'seo' => 'nullable|array',
            'cover_image_file' => 'nullable|image|max:5120',
            'gallery_image_files.*' => 'nullable|image|max:5120',
        ]);

        try {
            $coverFile = $request->file('cover_image_file');
            $galleryFiles = $request->file('gallery_image_files') ?? [];

            $campaign = $this->campaignService->updateCampaign($id, $request->all(), $coverFile, $galleryFiles);

            if (!$campaign) {
                return $this->errorResponse('Campaign not found.', 404);
            }

            $this->clearCampaignCache($campaign->id, $campaign->slug);

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
            $this->clearCampaignCache($id);
            return $this->successResponse(null, 'Campaign deleted successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete campaign: ' . $e->getMessage(), 500);
        }
    }

    private function clearCampaignCache($id = null, $slug = null)
    {
        if ($id) Cache::forget('campaigns.show.' . $id);
        if ($slug) Cache::forget('campaigns.show.' . $slug);
    }
}
