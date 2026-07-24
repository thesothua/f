<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return $this->errorResponse('Unauthorized.', 401);
        }

        $limit = (int) $request->get('limit', 15);
        $notifications = $user->notifications()->paginate($limit);

        return $this->successResponse([
            'notifications' => $notifications,
            'unread_count' => $user->unreadNotifications()->count()
        ], 'Notifications retrieved successfully.');
    }

    public function markAsRead(Request $request, $id)
    {
        $user = $request->user();
        $notification = $user->notifications()->findOrFail($id);
        $notification->markAsRead();

        return $this->successResponse(null, 'Notification marked as read.');
    }

    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        $user->unreadNotifications->markAsRead();

        return $this->successResponse(null, 'All notifications marked as read.');
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $notification = $user->notifications()->findOrFail($id);
        $notification->delete();

        return $this->successResponse(null, 'Notification deleted successfully.');
    }
}
