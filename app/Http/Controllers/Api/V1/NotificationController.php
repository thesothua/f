<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Notifications
 *
 * APIs for user notifications, unread badges, and marking notifications as read.
 */
class NotificationController extends Controller
{
    private function getBaseQuery(Request $request)
    {
        $user = $request->user();
        $roleIds = $user->roles->pluck('id')->toArray();

        return \Illuminate\Notifications\DatabaseNotification::where(function ($q) use ($user, $roleIds) {
            $q->where(function ($userQuery) use ($user) {
                $userQuery->where('notifiable_type', get_class($user))
                    ->where('notifiable_id', $user->id);
            });
            if (!empty($roleIds)) {
                $q->orWhere(function ($roleQuery) use ($roleIds) {
                    $roleQuery->where('notifiable_type', \App\Models\Role::class)
                        ->whereIn('notifiable_id', $roleIds);
                });
            }
        });
    }

    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return $this->errorResponse('Unauthorized.', 401);
        }

        $limit = (int) $request->get('limit', 15);
        $baseQuery = $this->getBaseQuery($request);

        $notifications = (clone $baseQuery)
            ->orderBy('created_at', 'desc')
            ->paginate($limit);

        $unreadCount = (clone $baseQuery)
            ->whereNull('read_at')
            ->count();

        return $this->successResponse([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ], 'Notifications retrieved successfully.');
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = $this->getBaseQuery($request)->findOrFail($id);
        $notification->markAsRead();

        return $this->successResponse(null, 'Notification marked as read.');
    }

    public function markAllAsRead(Request $request)
    {
        $this->getBaseQuery($request)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return $this->successResponse(null, 'All notifications marked as read.');
    }

    public function destroy(Request $request, $id)
    {
        $notification = $this->getBaseQuery($request)->findOrFail($id);
        $notification->delete();

        return $this->successResponse(null, 'Notification deleted successfully.');
    }
}
