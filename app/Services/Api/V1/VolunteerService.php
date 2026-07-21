<?php

namespace App\Services\Api\V1;

use App\Models\Volunteer;

class VolunteerService
{
    public function getAllVolunteers($params = [])
    {
        $query = Volunteer::query();

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhere('reason', 'like', "%{$search}%");
            });
        }

        if (!empty($params['role'])) {
            $query->where('role', $params['role']);
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        // Map camelCase sort fields to snake_case column names if necessary
        if ($sortBy === 'fullName') {
            $sortBy = 'full_name';
        }

        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getVolunteerById($id)
    {
        return Volunteer::find($id);
    }

    public function createVolunteer($data)
    {
        return Volunteer::create([
            'full_name'   => $data['fullName'] ?? $data['full_name'] ?? '',
            'email'       => $data['email'] ?? '',
            'phone'       => $data['phone'] ?? null,
            'city'        => $data['city'] ?? null,
            'role'        => $data['role'] ?? 'rescue',
            'reason'      => $data['reason'] ?? null,
            'status'      => $data['status'] ?? 'Pending',
            'admin_notes' => $data['adminNotes'] ?? $data['admin_notes'] ?? null,
        ]);
    }

    public function updateVolunteer($id, $data)
    {
        $volunteer = Volunteer::find($id);
        if (!$volunteer) {
            return null;
        }

        $updateData = [];

        if (isset($data['fullName']) || isset($data['full_name'])) {
            $updateData['full_name'] = $data['fullName'] ?? $data['full_name'];
        }
        if (isset($data['email'])) {
            $updateData['email'] = $data['email'];
        }
        if (array_key_exists('phone', $data)) {
            $updateData['phone'] = $data['phone'];
        }
        if (array_key_exists('city', $data)) {
            $updateData['city'] = $data['city'];
        }
        if (isset($data['role'])) {
            $updateData['role'] = $data['role'];
        }
        if (array_key_exists('reason', $data)) {
            $updateData['reason'] = $data['reason'];
        }
        if (isset($data['status'])) {
            $updateData['status'] = $data['status'];
        }
        if (array_key_exists('adminNotes', $data) || array_key_exists('admin_notes', $data)) {
            $updateData['admin_notes'] = $data['adminNotes'] ?? $data['admin_notes'] ?? null;
        }

        $volunteer->update($updateData);

        return $volunteer->fresh();
    }

    public function deleteVolunteer($id)
    {
        $volunteer = Volunteer::find($id);
        if (!$volunteer) {
            return false;
        }

        $volunteer->delete();
        return true;
    }
}
