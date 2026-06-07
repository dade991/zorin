<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = \App\Models\ChatMessage::where(function ($q) {
                $q->where('sender_id', Auth::id())
                  ->orWhere('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark received messages as read
        \App\Models\ChatMessage::where('receiver_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('chat.index', compact('messages'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'receiver_id' => 'nullable|exists:users,id'
        ]);

        \App\Models\ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id ?? 1, // 1 = admin/support
            'message' => $request->message,
        ]);

        return back();
    }
}