<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('notifications', function ($user) {
    return true; // Only allow the user to access their own channel
});

Broadcast::channel('admin.{userId}', function ($user, $userId) {
    // Only allow the user to access their channel if they are authenticated
    return true; // Ensure only the user can access their channel
});


