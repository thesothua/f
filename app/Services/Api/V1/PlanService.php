<?php

namespace App\Services\Api\V1;

use App\Models\Plan;

class PlanService
{
    public function getAllPlans($params = [])
    {
        $query = Plan::with(['media', 'user']);

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if (!empty($params['category']) && $params['category'] !== 'All') {
            $query->where('category', $params['category']);
        }

        if (!empty($params['cardType']) || !empty($params['card_type'])) {
            $cardType = $params['cardType'] ?? $params['card_type'];
            $query->where('card_type', $cardType);
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        if (isset($params['featured'])) {
            $query->where('featured', filter_var($params['featured'], FILTER_VALIDATE_BOOLEAN));
        }

        $sortBy = $params['sortBy'] ?? 'sort_order';
        $order = strtolower($params['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getPlanById($id)
    {
        return Plan::with(['media', 'user'])->find($id);
    }

    public function createPlan($data, $file = null)
    {
        $cardType = $data['cardType'] ?? $data['card_type'] ?? 'cause';
        $sortOrder = $data['sortOrder'] ?? $data['sort_order'] ?? 1;
        $goalAmount = $data['goalAmount'] ?? $data['goal_amount'] ?? 0;

        $plan = Plan::create([
            'card_type' => $cardType,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'category' => $data['category'] ?? null,
            'sort_order' => (int) $sortOrder,
            'image' => $data['image'] ?? null,
            'alt' => $data['alt'] ?? null,
            'goal_amount' => (float) $goalAmount,
            'status' => $data['status'] ?? 'Active',
            'featured' => filter_var($data['featured'] ?? false, FILTER_VALIDATE_BOOLEAN),
            'user_id' => auth()->id(),
        ]);

        if ($file) {
            $plan->addMedia($file)->toMediaCollection('plan_image');
        }

        return $plan->fresh(['media']);
    }

    public function updatePlan($id, $data, $file = null)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return null;
        }

        $updateData = [];
        if (isset($data['cardType']) || isset($data['card_type'])) {
            $updateData['card_type'] = $data['cardType'] ?? $data['card_type'];
        }
        if (isset($data['title'])) $updateData['title'] = $data['title'];
        if (isset($data['description'])) $updateData['description'] = $data['description'];
        if (isset($data['category'])) $updateData['category'] = $data['category'];
        if (isset($data['sortOrder']) || isset($data['sort_order'])) {
            $updateData['sort_order'] = (int) ($data['sortOrder'] ?? $data['sort_order']);
        }
        if (isset($data['image'])) $updateData['image'] = $data['image'];
        if (isset($data['alt'])) $updateData['alt'] = $data['alt'];
        if (isset($data['goalAmount']) || isset($data['goal_amount'])) {
            $updateData['goal_amount'] = (float) ($data['goalAmount'] ?? $data['goal_amount']);
        }
        if (isset($data['status'])) $updateData['status'] = $data['status'];
        if (isset($data['featured'])) {
            $updateData['featured'] = filter_var($data['featured'], FILTER_VALIDATE_BOOLEAN);
        }

        $plan->update($updateData);

        if ($file) {
            $plan->clearMediaCollection('plan_image');
            $plan->addMedia($file)->toMediaCollection('plan_image');
        }

        return $plan->fresh(['media']);
    }

    public function deletePlan($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return false;
        }

        $plan->clearMediaCollection('plan_image');
        $plan->delete();
        return true;
    }
}
