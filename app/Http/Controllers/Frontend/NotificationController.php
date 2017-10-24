<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class NotificationController.
 */
class NotificationController extends Controller
{
    /**
     * mark all notifications as read.
     *
     * @return http/request
     */
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead(); // or delete() ?

        return back();
    }

    /**
     * mark specific notification as read.
     *
     * @return http/request
     */
    public function markSpecificAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);

        $notification->markAsRead(); // or delete() ?

        return back();
    }
}
