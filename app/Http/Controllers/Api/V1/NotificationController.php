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
        $roleIds = $user->roles->pluck('id')->toArray();

        $notifications = \Illuminate\Notifications\DatabaseNotification::where('notifiable_type', \App\Models\Role::class)
            ->whereIn('notifiable_id', $roleIds)
            ->orderBy('created_at', 'desc')
            ->paginate($limit);

        $unreadCount = \Illuminate\Notifications\DatabaseNotification::where('notifiable_type', \App\Models\Role::class)
            ->whereIn('notifiable_id', $roleIds)
            ->whereNull('read_at')
            ->count();

        return $this->successResponse([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ], 'Notifications retrieved successfully.');
    }

    public function markAsRead(Request $request, $id)
    {
        $user = $request->user();
        $roleIds = $user->roles->pluck('id')->toArray();

        $notification = \Illuminate\Notifications\DatabaseNotification::where('notifiable_type', \App\Models\Role::class)
            ->whereIn('notifiable_id', $roleIds)
            ->findOrFail($id);

        $notification->markAsRead();

        return $this->successResponse(null, 'Notification marked as read.');
    }

    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        $roleIds = $user->roles->pluck('id')->toArray();

        \Illuminate\Notifications\DatabaseNotification::where('notifiable_type', \App\Models\Role::class)
            ->whereIn('notifiable_id', $roleIds)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return $this->successResponse(null, 'All notifications marked as read.');
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $roleIds = $user->roles->pluck('id')->toArray();

        $notification = \Illuminate\Notifications\DatabaseNotification::where('notifiable_type', \App\Models\Role::class)
            ->whereIn('notifiable_id', $roleIds)
            ->findOrFail($id);

        $notification->delete();

        return $this->successResponse(null, 'Notification deleted successfully.');
    }
}
