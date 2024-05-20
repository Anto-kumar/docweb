<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller


{
    public function usernotification()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications.usernotification', compact('notifications'));
    }

    public function markAsRead($notificationId)
    {
        
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        return redirect()->back();
    }

    public function adminnotification()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications.adminnotification', compact('notifications'));
    }

}