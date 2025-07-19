<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {

        // $user_id = Auth::id();

        // $messages = Message::where(function ($query) use ($user_id, $receiver_id) {
        //     $query->where('sender_id', $user_id)->where('receiver_id', $receiver_id);
        // })->orWhere(function ($query) use ($user_id, $receiver_id) {
        //     $query->where('sender_id', $receiver_id)->where('receiver_id', $user_id);
        // })->orderBy('created_at')->get();

        $messages = "";
        $receiver_id = 1;


        return view('User.Chat.index', compact('messages', 'receiver_id'));
    }

    public function store(Request $request)
    {
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json($message);
    }
}