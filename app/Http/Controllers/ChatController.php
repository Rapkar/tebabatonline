<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\AdminPanel\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

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
        $receiver_id = $request->input('receiver_id');
        // $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);
        $user_id = 2;
        if (Auth::check()) {
            // The user is logged in, retrieve the user ID
            $user_id =  Auth::id();
        } 
        // Create a new message instance and save it to the database
     
        $message = Message::create([
            'sender_id' => $user_id,
            'receiver_id' =>$receiver_id,
            'text' => $message,
        ]);
        // broadcast(new MessageSent($message));
        $options = array(
            'cluster' => 'ap2',
            
            'useTLS' => true
          );
          $pusher = new Pusher(
            '723614bfcaeb1ebf3619',
            'a2838ce5a4460d3d26c7',
            '1881515',
            $options
          );
        $pusher->trigger('chat'.$message->receiver_id, 'message.sent', $message);
        // event(new MessageSent($message ));
        broadcast(new MessageSent($message));
        // $pusher->trigger('chat'.$message->receiver_id, 'message.sent', $message);

        return response()->json($message);

    }
    
    public function getMessages() {
        return Message::all(); // Fetch all messages from the database
    }
    public function index()
    {
        return User::all();
    }
}
