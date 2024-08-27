<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/auth', [App\Http\Controllers\HomeController::class, 'index'])->name('auth');


    /***********************************************/
    /**                                           **/
    /**                                           **/
    /*************** Admin Panel *******************/
    /**                                           **/
    /**                                           **/
    /********************* *************************/


Route::prefix('adminpanel')->group(function () {

    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/

    Route::get('newuser', [App\Http\Controllers\AdminPanel\UserController::class, 'create'])->name('newuser');
    Route::get('edit/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'edit'])->name('edit');
    Route::post('update/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'update'])->name('update');
    Route::get('users', [App\Http\Controllers\AdminPanel\UserController::class, 'index'])->name('users');
    Route::post('store', [App\Http\Controllers\AdminPanel\UserController::class, 'store'])->name('store');
    Route::get('delete/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'delete'])->name('delete');
                
                
    //Ajax
    Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\UserController::class, 'getusersbyrole'])->name('getusersbyrole');


    
    /********************* *************************/
    /*************** Post Manager *******************/
    /********************* *************************/
    Route::get('newpost', [App\Http\Controllers\AdminPanel\PostController::class, 'create'])->name('newpost');
    Route::get('edit/postid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'edit'])->name('editpost');
    Route::post('update/postid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'update'])->name('updatepost');
    Route::get('posts', [App\Http\Controllers\AdminPanel\PostController::class, 'index'])->name('posts');
    Route::post('store', [App\Http\Controllers\AdminPanel\PostController::class, 'store'])->name('store');
    Route::get('delete/postid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'delete'])->name('delete');

    
    Route::get('postnewcat', [App\Http\Controllers\AdminPanel\CategoryController::class, 'create'])->name('postnewcat');
    Route::post('postnewcat', [App\Http\Controllers\AdminPanel\CategoryController::class, 'store'])->name('postnewcat');
    Route::get('postcats', [App\Http\Controllers\AdminPanel\CategoryController::class, 'index'])->name('postcats');
    Route::get('deletecat/catid={id}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'delete'])->name('deletecat');
     
                
    //Ajax
    // Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\PostController::class, 'getusersbyrole'])->name('getusersbyrole');


        
    /********************* *************************/
    /*************** Product Manager *******************/
    /********************* *************************/
    Route::get('newproduct', [App\Http\Controllers\AdminPanel\PostController::class, 'create'])->name('newproduct');
    Route::get('edit/productid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'edit'])->name('edit');
    Route::post('update/productid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'update'])->name('update');
    Route::get('products', [App\Http\Controllers\AdminPanel\PostController::class, 'index'])->name('products');
    Route::post('store', [App\Http\Controllers\AdminPanel\PostController::class, 'store'])->name('store');
    Route::get('delete/productid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'delete'])->name('delete');
                
                
    //Ajax
    // Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\PostController::class, 'getusersbyrole'])->name('getusersbyrole');




});




    /***********************************************/
    /**                                           **/
    /**          we                                 **/
    /*************** Front side *******************/
    /**                                           **/
    /**                                           **/
    /********************* *************************/
Route::get('/', [App\Http\Controllers\Website\home::class, 'index'])->name('home');
Route::get('articles/{slug}', [App\Http\Controllers\Website\home::class, 'articles'])->name('articles');

