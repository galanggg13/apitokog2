<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::orderBy('created_at', 'ASC')->get();
    }

    public function send(Request $req)
    {
        $req->validate([
            'message' => 'required'
        ]);

        $chat = Chat::create([
            'user_id' => $req->user()->user_id,
            'message' => $req->message
        ]);

        return ['success' => true, 'chat' => $chat];
    }
}
