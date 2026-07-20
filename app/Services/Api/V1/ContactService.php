<?php

namespace App\Services\Api\V1;

use App\Models\Contact;

class ContactService
{
    public function getAllContacts($params = [])
    {
        $query = Contact::query();

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $sortBy = $params['sortBy'] ?? 'created_at';
        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
        }

        return $query->get();
    }

    public function getContactById($id)
    {
        return Contact::find($id);
    }

    public function createContact($data)
    {
        return Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
            'status' => $data['status'] ?? 'Unread',
            'admin_notes' => $data['adminNotes'] ?? $data['admin_notes'] ?? null,
        ]);
    }

    public function updateContact($id, $data)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return null;
        }

        $updateData = [];
        if (isset($data['name'])) $updateData['name'] = $data['name'];
        if (isset($data['email'])) $updateData['email'] = $data['email'];
        if (isset($data['phone'])) $updateData['phone'] = $data['phone'];
        if (isset($data['subject'])) $updateData['subject'] = $data['subject'];
        if (isset($data['message'])) $updateData['message'] = $data['message'];
        if (isset($data['status'])) $updateData['status'] = $data['status'];
        if (isset($data['adminNotes']) || isset($data['admin_notes'])) {
            $updateData['admin_notes'] = $data['adminNotes'] ?? $data['admin_notes'];
        }

        $contact->update($updateData);

        return $contact->fresh();
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return false;
        }

        $contact->delete();
        return true;
    }
}
