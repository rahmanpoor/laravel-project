<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function readAll(Request $request)
    {
        $notification = Notification::all();
       foreach ($notification as $notification) {
            $notification->update(['read_at' => now()]);
       }
    }
}
