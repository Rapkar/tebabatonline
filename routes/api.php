<?php

use App\Http\Controllers\api\v1\UserController;
use App\Http\Resources\userResource;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Controllers\HomeController;
use App\Http\Resources\userResourceCollection;
use App\Models\User;

Route::get('/getFirstUser', function () {
    $user = User::first(); // Fetch the first user record
    if ($user) {
        return new UserResource($user); // Pass the single user instance to UserResource
    } else {
        return response()->json(['message' => 'No users found'], 404); // Handle case where no users exist
    }
});
Route::get('/getAllUsers', function () {
    $users = User::paginate(); // Fetch the first user record
    // dd($users);
    if ($users) {
        return new userResourceCollection($users); // Pass the single user instance to UserResource
    } else {
        return response()->json(['message' => 'No users found'], 404); // Handle case where no users exist
    }
});
