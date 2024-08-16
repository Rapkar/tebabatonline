<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('adminpanel')->group(function () {
    Route::get('newuser', [App\Http\Controllers\AdminPanel\UserController::class, 'create'])->name('newuser');
    Route::get('edituser', [App\Http\Controllers\AdminPanel\UserController::class, 'edit'])->name('edituser');
    Route::get('users', [App\Http\Controllers\AdminPanel\UserController::class, 'index'])->name('users');
    Route::post('store', [App\Http\Controllers\AdminPanel\UserController::class, 'store'])->name('store');
    Route::get('delete/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'delete'])->name('delete');
    
    
    // posts Routes
    
    Route::get('newpost', [App\Http\Controllers\AdminPanel\PostController::class, 'create'])->name('newpost');
    Route::get('posts', [App\Http\Controllers\AdminPanel\PostController::class, 'index'])->name('posts');

});
