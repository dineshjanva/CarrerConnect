<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Fetch chat messages between two users
    public function fetchMessages(Request $request)
    {
        $userId = Auth::id();
        $otherUserId = $request->input('user_id');

        $messages = Message::where(function ($q) use ($userId, $otherUserId) {
            $q->where('sender_id', $userId)->where('receiver_id', $otherUserId);
        })
            ->orWhere(function ($q) use ($userId, $otherUserId) {
                $q->where('sender_id', $otherUserId)->where('receiver_id', $userId);
            })
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    // Send a new message
    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->input('user_id'),
            'message' => $request->input('message'),
        ]);

        return response()->json($message);
    }
}
