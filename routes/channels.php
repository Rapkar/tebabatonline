<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('channel_for_everyone', function ($user) {
    return true;
});
Broadcast::channel('private-chat.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId; // Only allow the user to access their channel
});
Broadcast::channel('chat.{id}', function ($user, $id ) {
    return (int) $user->id == (int) $id; // Only allow the user to access their own channel
});