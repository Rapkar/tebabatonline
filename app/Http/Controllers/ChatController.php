<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Events\NotificationSent;
use App\Models\AdminPanel\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{ // ChatController.php (enable proper auth)
 

    public function getUserIp()
    {
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
    public function sendMessage(Request $request)
    {

        $message = $request->input('message');
        // dd($message);
        $receiver_id = 1;
        // $request->validate([
        //     'message' => 'required|string|max:255',
        // ]);
        $user_id = 1;
        // if (Auth::check()) {
        //     // The user is logged in, retrieve the user ID
        //     $user_id =  Auth::id();
        // }
        // Create a new message instance and save it to the database

        $message = Message::create([
            'sender_id' => $user_id,
            'receiver_id' => $receiver_id,
            'text' => $message,

        ]);
        // broadcast(new MessageSent($message));
        $options = array(
            'cluster' => 'ap2',

            'useTLS' => true
        );
        // $receiverUser = User::find($receiver_id)->get('id');
        // Log::info('Private channel authorization check 2', [
        //     'user_id' =>  $user_id,
        //     'userId1' =>  $user_id,
        //     'userId2' => $receiver_id
        // ]);
        // event(new MessageSent($message ));
        // broadcast(new NotificationSent($message ));

        // Broadcast the private chat message
        // broadcast(new PrivateChatMessage($message,   $receiver_id));
        // broadcast(new PrivateChatMessage($message,  $user_id));
        // PrivateChatMessage::dispatch($message, $user_id);
        broadcast(new MessageSent(1))->toOthers();

        // Send a notification (if needed)
        //    $receiverUser->notify(new PrivateChatMessage($message));
        // broadcast(new PrivateChatMessage($message,$user_id ,$receiver_id));
        // Log::info('PrivateChatMessage broadcasted', ['user_id' => $user_id, 'receiver_id' => $receiver_id,'message'=>$message]);
        return response()->json($message);
    }

    public function getMessages()
    {
        return Message::all(); // Fetch all messages from the database
    }
    public function index()
    {
        return User::all();
    }
}
