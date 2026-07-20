<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AttachmentService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public $attachmentService;

    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    public function index(Request $request)
    {
        $attachments = $this->attachmentService->getAllAttachments($request->all());
        return $this->successResponse($attachments, 'Attachments retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $attachment = $this->attachmentService->getAttachmentById($id);
        if (!$attachment) {
            return $this->errorResponse('Attachment not found.', 404);
        }
        return $this->successResponse($attachment, 'Attachment retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:20480', // Max 20MB file
            'name' => 'nullable|string',
            'attachable_type' => 'nullable|string',
            'attachable_id' => 'nullable|integer',
        ]);

        $file = $request->file('file');
        $attachment = $this->attachmentService->uploadAttachment($file, $request->all());

        return $this->successResponse($attachment, 'Attachment uploaded successfully via Spatie Media Library.', 201);
    }

    public function destroy(Request $request, $id)
    {
        $deleted = $this->attachmentService->deleteAttachment($id);
        if (!$deleted) {
            return $this->errorResponse('Attachment not found.', 404);
        }
        return $this->successResponse(null, 'Attachment deleted successfully.');
    }
}
