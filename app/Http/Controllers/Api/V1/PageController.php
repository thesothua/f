<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the pages.
     */
    public function index(Request $request)
    {
        $query = Page::withCount('sections');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $pages = $query->orderBy('sort_order', 'asc')
                      ->orderBy('created_at', 'desc')
                      ->paginate($request->input('per_page', 15));

        return response()->json($pages);
    }

    /**
     * Get single page with its sections by ID.
     */
    public function show($id)
    {
        $page = Page::with(['sections' => function ($query) {
            $query->orderBy('sort_order', 'asc');
        }])->find($id);

        if (!$page) {
            return $this->errorResponse('Page not found.', 404);
        }

        return $this->successResponse($page, 'Page retrieved successfully.');
    }

    /**
     * Public endpoint: Get single page by slug with active sections.
     */
    public function showBySlug($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 'published')
            ->with(['sections' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order', 'asc');
            }])
            ->first();

        if (!$page) {
            return $this->errorResponse('Page not found.', 404);
        }

        return $this->successResponse($page, 'Page retrieved successfully.');
    }

    /**
     * Store a newly created page.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'description' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $page = Page::create($validated);

        return response()->json([
            'message' => 'Page created successfully',
            'data' => $page,
        ], 201);
    }

    /**
     * Update the specified page.
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:pages,slug,' . $page->id,
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:published,draft',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        if (isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $page->update($validated);

        return response()->json([
            'message' => 'Page updated successfully',
            'data' => $page->load('sections'),
        ]);
    }

    /**
     * Remove the specified page.
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json([
            'message' => 'Page deleted successfully',
        ]);
    }

    /**
     * Store a new section for a page.
     */
    public function storeSection(Request $request, $pageId)
    {
        $page = Page::findOrFail($pageId);

        $validated = $request->validate([
            'section_key' => 'required|string|max:100',
            'section_type' => 'required|string|max:50',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable',
            'media_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $maxOrder = $page->sections()->max('sort_order') ?? 0;
        $validated['page_id'] = $page->id;
        $validated['sort_order'] = $validated['sort_order'] ?? ($maxOrder + 1);
        $validated['is_active'] = $validated['is_active'] ?? true;

        $section = PageSection::create($validated);

        return response()->json([
            'message' => 'Page section added successfully',
            'data' => $section,
        ], 201);
    }

    /**
     * Update an existing section.
     */
    public function updateSection(Request $request, $sectionId)
    {
        $section = PageSection::findOrFail($sectionId);

        $validated = $request->validate([
            'section_key' => 'sometimes|required|string|max:100',
            'section_type' => 'sometimes|required|string|max:50',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'nullable',
            'media_url' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $section->update($validated);

        return response()->json([
            'message' => 'Page section updated successfully',
            'data' => $section,
        ]);
    }

    /**
     * Delete a page section.
     */
    public function destroySection($sectionId)
    {
        $section = PageSection::findOrFail($sectionId);
        $section->delete();

        return response()->json([
            'message' => 'Page section deleted successfully',
        ]);
    }

    /**
     * Reorder sections for a page.
     */
    public function reorderSections(Request $request, $pageId)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:page_sections,id',
            'orders.*.sort_order' => 'required|integer',
        ]);

        foreach ($request->input('orders') as $item) {
            PageSection::where('id', $item['id'])
                ->where('page_id', $pageId)
                ->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json([
            'message' => 'Page sections reordered successfully',
        ]);
    }
}
