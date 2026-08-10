<?php

namespace App\Services\Api\V1;

use App\Models\Attachment;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

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

    /**
     * Upload an image attachment, compress it, and convert to WebP.
     */
    public function uploadAttachment($file, $data = [])
    {
        $originalName = is_object($file) ? $file->getClientOriginalName() : 'Attachment';

        $attachment = Attachment::create([
            'name'            => $data['name'] ?? pathinfo($originalName, PATHINFO_FILENAME),
            'attachable_type' => $data['attachable_type'] ?? null,
            'attachable_id'   => $data['attachable_id'] ?? null,
            'user_id'         => $data['user_id'] ?? auth()->id(),
        ]);

        if ($file) {
            // Attempt WebP conversion & compression via GD
            $webpFile = $this->convertToWebp($file);

            if ($webpFile) {
                // Upload the compressed WebP version
                $webpName = pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
                $attachment->addMedia($webpFile)
                    ->usingFileName(time() . '_' . Str::slug(pathinfo($webpName, PATHINFO_FILENAME)) . '.webp')
                    ->toMediaCollection('attachments');

                // Cleanup temporary converted WebP file
                if (file_exists($webpFile)) {
                    @unlink($webpFile);
                }
            } else {
                // Fallback: upload original if conversion fails (e.g. SVG)
                $attachment->addMedia($file)
                    ->usingFileName(time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName))
                    ->toMediaCollection('attachments');
            }
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

    /**
     * Convert an uploaded image to compressed WebP format using GD.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return string|null  Path to the temporary WebP file, or null on failure
     */
    private function convertToWebp(UploadedFile $file): ?string
    {
        $mime = $file->getMimeType();

        // Skip SVG — can't rasterise with GD
        if ($mime === 'image/svg+xml') {
            return null;
        }

        // Supported input formats for GD
        $supportedMimes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'image/webp',
            'image/bmp',
        ];

        if (!in_array($mime, $supportedMimes)) {
            return null;
        }

        try {
            $sourcePath = $file->getRealPath();
            $image = null;

            switch ($mime) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($sourcePath);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($sourcePath);
                    // Preserve transparency
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($sourcePath);
                    break;
                case 'image/webp':
                    $image = imagecreatefromwebp($sourcePath);
                    break;
                case 'image/bmp':
                    $image = imagecreatefrombmp($sourcePath);
                    break;
            }

            if (!$image) {
                return null;
            }

            // Resize if width exceeds 1920px (keeps aspect ratio)
            $width  = imagesx($image);
            $height = imagesy($image);
            $maxWidth = 1920;

            if ($width > $maxWidth) {
                $newHeight = (int) round($height * ($maxWidth / $width));
                $resized = imagecreatetruecolor($maxWidth, $newHeight);

                // Preserve transparency for PNG/GIF sources
                if (in_array($mime, ['image/png', 'image/gif'])) {
                    imagecolortransparent($resized, imagecolorallocatealpha($resized, 0, 0, 0, 127));
                    imagealphablending($resized, false);
                    imagesavealpha($resized, true);
                }

                imagecopyresampled($resized, $image, 0, 0, 0, 0, $maxWidth, $newHeight, $width, $height);
                imagedestroy($image);
                $image = $resized;
            }

            // Write to temp file as WebP with quality 80 (good balance of size vs quality)
            $tempPath = tempnam(sys_get_temp_dir(), 'webp_') . '.webp';
            $result = imagewebp($image, $tempPath, 80);
            imagedestroy($image);

            if (!$result || !file_exists($tempPath)) {
                return null;
            }

            return $tempPath;

        } catch (\Throwable $e) {
            \Log::warning('WebP conversion failed: ' . $e->getMessage());
            return null;
        }
    }
}
