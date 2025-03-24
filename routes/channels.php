<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
 
Broadcast::channel('messages.{id}', function ($user, $receiver_id) {
    return (int) $user->id === (int) $receiver_id;
});
 