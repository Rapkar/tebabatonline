<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\AdminPanel\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getUserIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // Check for shared internet
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Check for proxies
            return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }
        
        // Return remote address as a fallback
        return $_SERVER['REMOTE_ADDR'];
    }
    public function sendMessage(Request $request) {
        $message = $request->input('message');
        // $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);
        $user_id = 4;
        if (Auth::check()) {
            // The user is logged in, retrieve the user ID
            $user_id =  Auth::id();
        } 
        // Create a new message instance and save it to the database
     
        $message = Message::create([
            'sender_id' => 2,
            'receiver_id' =>4,
            'text' => $message,
        ]);
        broadcast(new MessageSent($message));
        return response()->json($message);

    }
    
    public function getMessages() {
        return Message::all(); // Fetch all messages from the database
    }
    
}
