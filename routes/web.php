<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MedicMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Auth::routes();

Route::get('/tebateba1', [App\Http\Controllers\HomeController::class, 'index'])->name('auth');


/***********************************************/
/**                                           **/
/**                                           **/
/*************** Admin Panel *******************/
/**                                           **/
/**                                           **/
/********************* *************************/
 

Route::prefix('adminpanel')->middleware(AdminMiddleware::class)->group(function () {

    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/
    Route::get('/',  [App\Http\Controllers\AdminPanel\PostController::class, 'index']);
    Route::get('newuser', [App\Http\Controllers\AdminPanel\UserController::class, 'create'])->name('newuser');
    Route::get('edit/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'edit'])->name('edit');
    Route::post('update/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'update'])->name('updateuser');
    Route::get('users', [App\Http\Controllers\AdminPanel\UserController::class, 'index'])->name('users');
    Route::post('usersstore', [App\Http\Controllers\AdminPanel\UserController::class, 'store'])->name('userstore');
    Route::get('delete/userid={id}', [App\Http\Controllers\AdminPanel\UserController::class, 'delete'])->name('userdelete');


    //Ajax
    Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\UserController::class, 'getusersbyrole'])->name('getusersbyrole');
    Route::post('upload', [App\Http\Controllers\AdminPanel\MediaController::class, 'uploadfile'])->name('uploadfile');



    /********************* *************************/
    /*************** Post Manager *******************/
    /********************* *************************/
    Route::get('newpost', [App\Http\Controllers\AdminPanel\PostController::class, 'create'])->name('newpost');
    Route::get('edit/postid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'edit'])->name('editpost');
    Route::post('update/postid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'update'])->name('updatepost');
    Route::get('posts', [App\Http\Controllers\AdminPanel\PostController::class, 'index'])->name('posts');
    Route::post('poststore', [App\Http\Controllers\AdminPanel\PostController::class, 'store'])->name('poststore');
    Route::get('delete/postid={id}', [App\Http\Controllers\AdminPanel\PostController::class, 'delete'])->name('delete');


    Route::get('post_newcat/type={type}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'create'])->name('post_newcat');
    Route::post('postnewcat/type={type}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'store'])->name('postsnewcat');
    Route::get('postscats/type={type}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'index'])->name('postscats');
    Route::get('deletecat/catid={id}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'delete'])->name('deletecat');


    Route::get('product_newcat/type={type}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'create'])->name('product_newcat');
    Route::post('productsnewcat/type={type}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'store'])->name('productsnewcat');
    Route::get('productcats/type={type}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'index'])->name('productscats');
    Route::get('deletecat/catid={id}', [App\Http\Controllers\AdminPanel\CategoryController::class, 'delete'])->name('deletecat');


    //Ajax
    // Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\PostController::class, 'getusersbyrole'])->name('getusersbyrole');



    /********************* *************************/
    /*************** Product Manager *******************/
    /********************* *************************/
    Route::get('newproduct', [App\Http\Controllers\AdminPanel\ProductController::class, 'create'])->name('newproduct');
    Route::get('edit/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'edit'])->name('editproduct');
    Route::post('updateproduct/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'update'])->name('updateproduct');
    Route::get('products', [App\Http\Controllers\AdminPanel\ProductController::class, 'index'])->name('productlist');
    Route::post('productstore', [App\Http\Controllers\AdminPanel\ProductController::class, 'store'])->name('productstore');
    Route::get('delete/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'delete'])->name('deleteproduct');


    //Ajax
    // Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\PostController::class, 'getusersbyrole'])->name('getusersbyrole');

    // Route::get('neworder', [App\Http\Controllers\AdminPanel\ProductController::class, 'create'])->name('newproduct');
    // Route::get('edit/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'edit'])->name('editproduct');
    // Route::post('update/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'update'])->name('update');
    Route::get('orders', [App\Http\Controllers\AdminPanel\OrderController::class, 'index'])->name('orderlist');
    // Route::post('store', [App\Http\Controllers\AdminPanel\ProductController::class, 'store'])->name('productstore');
    // Route::get('delete/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'delete'])->name('deleteproduct');




});



/***********************************************/
/**                                           **/
/**                                           **/
/*************** Medic Panel *******************/
/**                                           **/
/**                                           **/
/********************* *************************/
 

Route::prefix('medicpanel')->middleware(MedicMiddleware::class)->group(function () {

    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/

     Route::get('/', [App\Http\Controllers\MedicPanel\MedicController::class, 'index'])->name('Dashboard');



});




/***********************************************/
/**                                           **/
/**                                           **/
/*************** Front side *******************/
/**                                           **/
/**                                           **/
/********************* *************************/
Route::get('/', [App\Http\Controllers\Website\home::class, 'index'])->name('home');
Route::get('articles/{slug}', [App\Http\Controllers\Website\home::class, 'articles'])->name('articles');
Route::get('products/{slug}', [App\Http\Controllers\Website\home::class, 'products'])->name('products');
Route::post('addtocart/{id}', [App\Http\Controllers\Website\home::class, 'addproduct'])->name('addtocart');


Route::prefix('userpanel')->middleware(UserMiddleware::class)->group(function () {

    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/

     Route::get('/', [App\Http\Controllers\UserPanel\UserController::class, 'index'])->name('userDashboard');



});