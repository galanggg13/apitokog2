<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $req)
    {
        return Notification::where('user_id', $req->user()->user_id)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
