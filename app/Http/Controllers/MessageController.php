<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    // List all conversations for the authenticated user
    public function conversations()
    {
        $userId = Auth::id();
        $conversations = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($msg) use ($userId) {
                return $msg->sender_id == $userId ? $msg->receiver_id : $msg->sender_id;
            });
        return view('user.chat.index', compact('conversations'));
    }

    // Show chat messages between authenticated user and another user
    public function index($receiver_id)
    {
        $user_id = Auth::id();
        $messages = Message::where(function ($query) use ($user_id, $receiver_id) {
            $query->where('sender_id', $user_id)->where('receiver_id', $receiver_id);
        })->orWhere(function ($query) use ($user_id, $receiver_id) {
            $query->where('sender_id', $receiver_id)->where('receiver_id', $user_id);
        })->orderBy('created_at')->get();

        // Mark received messages as read
        Message::where('sender_id', $receiver_id)
            ->where('receiver_id', $user_id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('user.chat.index', compact('messages', 'receiver_id'));
    }

    // Send a new message
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'is_read' => false,
        ]);
        return response()->json($message);
    }

    // Mark all messages from a user as read
    public function markAsRead($sender_id)
    {
        $user_id = Auth::id();
        Message::where('sender_id', $sender_id)
            ->where('receiver_id', $user_id)
            ->where('is_read', false)
            ->update(['is_read' => true]);
        return response()->json(['status' => 'success']);
    }
}