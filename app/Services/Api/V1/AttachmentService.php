<?php

namespace App\Services\Api\V1;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentService
{
    public function getAllAttachments($params = [])
    {
        $query = Attachment::with(['media', 'user']);

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where('name', 'like', "%{$search}%");
        }

        $query->latest();

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate($params['limit']);
        }

        return $query->get();
    }

    public function getAttachmentById($id)
    {
        return Attachment::with(['media', 'user', 'attachable'])->find($id);
    }

    public function uploadAttachment($file, $data = [])
    {
        $originalName = is_object($file) ? $file->getClientOriginalName() : 'Attachment';

        $attachment = Attachment::create([
            'name' => $data['name'] ?? $originalName,
            'attachable_type' => $data['attachable_type'] ?? null,
            'attachable_id' => $data['attachable_id'] ?? null,
            'user_id' => $data['user_id'] ?? auth()->id(),
        ]);

        if ($file) {
            $attachment->addMedia($file)
                ->usingFileName(time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName))
                ->toMediaCollection('attachments');
        }

        return $attachment->fresh(['media', 'user']);
    }

    public function deleteAttachment($id)
    {
        $attachment = Attachment::find($id);
        if (!$attachment) {
            return false;
        }

        $attachment->clearMediaCollection('attachments');
        $attachment->delete();
        return true;
    }
}
