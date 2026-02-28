<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Mark a single notification as read.
     */
    public function markAsRead($id)
    {
        $notification = AdminNotification::findOrFail($id);
        $notification->markAsRead();

        // If the notification has a link, redirect there
        if ($notification->link) {
            return redirect($notification->link);
        }

        return redirect()->back()->with('success', 'Notification marked as read');
    }

    /**
     * Mark ALL notifications as read.
     */
    public function markAllRead()
    {
        AdminNotification::unread()->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        return redirect()->back()->with('success', 'All notifications marked as read');
    }

    /**
     * Delete a single notification.
     */
    public function destroy($id)
    {
        AdminNotification::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Notification deleted');
    }

    /**
     * Delete all read notifications.
     */
    public function clearRead()
    {
        AdminNotification::read()->delete();
        return redirect()->back()->with('success', 'Read notifications cleared');
    }
}
