<?php

use App\Http\Controllers\api\v1\UserController;
use App\Http\Resources\userResource;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Controllers\HomeController;
use App\Http\Resources\userResourceCollection;
use App\Models\User;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Symfony\Component\HttpFoundation\Request;
Route::get('/getFirstUser', function () {
    $user = User::first(); // Fetch the first user record
    if ($user) {
        return new UserResource($user); // Pass the single user instance to UserResource
    } else {
        return response()->json(['message' => 'No users found'], 404); // Handle case where no users exist
    }
});
Route::middleware('auth:api')->get('/getAllUsers', function (Request $request) {
    $users = User::paginate(); // Fetch paginated user records

    if ($users->isNotEmpty()) {
        return new UserResourceCollection($users); // Return paginated user collection
    } else {
        return response()->json(['message' => 'No users found'], 404); // Handle case where no users exist
    }
});
Route::get('/users', function () {
    $users = User::paginate(); // Fetch paginated user records

    if ($users->isNotEmpty()) {
        return new UserResourceCollection($users); // Return paginated user collection
    } else {
        return response()->json(['message' => 'No users found'], 404); // Handle case where no users exist
    }
})->middleware(AuthenticateWithBasicAuth::class);
