<?php

use App\Events\AdminStream;
use App\Http\Controllers\AdminPanel\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MedicMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\NotificationSent;
use App\Http\Controllers\AdminPanel\OptionController;
use App\Http\Controllers\BotController;
use App\Notifications\NotifyAllUsers;
use Illuminate\Support\Facades\Request;
use App\Models\User;
use App\Notifications\VisitNotification;
use App\Http\Middleware\LimitLoginAttempts;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\RobotsController;
use App\Http\Controllers\FileManagerController;

// Route::get('/send-notification', function () {
//     // Log::info('Broadcasting NotificationSent event');
//     $user=Auth::user();
//     event(new NotificationSent('Hello! This is a test notification.'));

//     $user->notify(new NotificationSent('Hello! This is a test notification.'));

//     // $medicuserss = User::whereHas('roles', function ($query) {
//     //     $query->whereIn('name', ['Medic', 'Admin']);
//     // })->get();

//     // foreach ($medicuserss as $user) {

//     //     $user->notify(new VisitNotification($user, 2));
//     // }
//     // event(new NotificationSent('Hello! This is a test notification.'));
//     // event(new NotifyAllUsers('Hello! This is a test notification.'));
//     //    broadcast(new NotificationSent('Hello! This is a test notification.'));
//     return 'Notification sent!';
// });
// Route::get('/send-notification-admin', function () {
//     Log::info('admin NotificationSent event');

//     event(new AdminStream(Auth::user()->id, "test messages"));
//     // event(new NotifyAllUsers('Hello! This is a test notification.'));
//     //    broadcast(new NotificationSent('Hello! This is a test notification.'));
//     return 'Notification sent to admin ' . Auth::user()->id;
// });


Route::get('/test-cache', function (Request $request) {
    $ipAddress = Request::ip(); // Use $request instead of Request::ip()
    $key = 'alogin_attempts:' . $ipAddress;
    $decayMinutes = 15;
    Cache::forget($key);
    // Check if the key exists in the cache
    // if (!Cache::has($key)) {
    //     // If it doesn't exist, set it with an initial value of 1 and an expiration time
    //     Cache::put($key, 1, now()->addMinutes($decayMinutes));
    // } else {
    //     // If it exists, increment the value
    //     Cache::increment($key);
    // }

    // // Optionally, return the current number of attempts
    // return response()->json([
    //     'attempts' => Cache::get($key),
    //     'message' => 'Login attempts recorded.'
    // ]);
});



Route::get('/getuser', [App\Http\Controllers\HomeController::class, 'getuser'])->name('getuser');

Route::middleware(LimitLoginAttempts::class)->group(function () {
    Auth::routes();
});

Route::get('/tebateba1', [App\Http\Controllers\HomeController::class, 'index'])->name('auth');


/***********************************************/
/**                                           **/
/**                                           **/
/*************** Admin Panel *******************/
/**                                           **/
/**                                           **/
/********************* *************************/


// Grouping admin panel routes with AdminMiddleware
Route::prefix('adminpanel')->middleware(AdminMiddleware::class)->group(function () {

    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/
    Route::get('/',  [App\Http\Controllers\AdminPanel\PostController::class, 'index'])->name('adminDashboard');
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
    Route::post('posts_in', [App\Http\Controllers\AdminPanel\PostController::class, 'byfilter'])->name('posts.filter');


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

    Route::get('/settings/login', [OptionController::class, 'index'])->name('options.login');
    Route::post('/settings/login', [OptionController::class, 'store'])->name('options.store');
    //Ajax
    // Route::post('getusersbyrole', [App\Http\Controllers\AdminPanel\PostController::class, 'getusersbyrole'])->name('getusersbyrole');

    // Route::get('neworder', [App\Http\Controllers\AdminPanel\ProductController::class, 'create'])->name('newproduct');
    // Route::get('edit/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'edit'])->name('editproduct');
    // Route::post('update/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'update'])->name('update');
    Route::get('orders', [App\Http\Controllers\AdminPanel\OrderController::class, 'index'])->name('orderlist');
    // Route::post('store', [App\Http\Controllers\AdminPanel\ProductController::class, 'store'])->name('productstore');
    // Route::get('delete/productid={id}', [App\Http\Controllers\AdminPanel\ProductController::class, 'delete'])->name('deleteproduct');

    Route::get('Notifications', [App\Http\Controllers\Website\EventController::class, 'index'])->name('events.show');
    Route::post('Notifications', [App\Http\Controllers\Website\EventController::class, 'store'])->name('events.store');


    Route::get('/robots', [BotController::class, 'index'])->name('get.robot');
    Route::post('/robots', [BotController::class, 'update'])->name('update.robot');
});



/***********************************************/
/**                                           **/
/**                                           **/
/*************** Medic Panel *******************/
/**                                           **/
/**                                           **/
/********************* *************************/


// Grouping medic panel routes with AdminMiddleware
Route::prefix('medicpanel')->middleware(MedicMiddleware::class)->group(function () {

    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/

    Route::get('/', [App\Http\Controllers\MedicPanel\MedicController::class, 'index'])->name('medicDashboard');
    Route::get('/visits', [App\Http\Controllers\MedicPanel\VisitControllr::class, 'visits'])->name('visits');

    Route::get('/patient_examination/{id}', [App\Http\Controllers\MedicPanel\PatientController::class, 'patient_examination'])->middleware('auth')->name('patient_examination');
    Route::post('/addproducttopatient', [App\Http\Controllers\MedicPanel\PatientController::class, 'addproducttopatient'])->middleware('auth')->name('addproducttopatient');
    Route::get('/removeproducttopatient/{visit_id}/{product_id}', [App\Http\Controllers\MedicPanel\PatientController::class, 'removeProductFromPatient'])
        ->middleware('auth')
        ->name('removeproducttopatient');


    //    get descibtion from recommendation  ajax
    Route::post('/getdescribtions', [App\Http\Controllers\MedicPanel\DescribtionController::class, 'getdescribtions'])->middleware('auth')->name('getdescribtions');


    //    get descibtion from recommendation  ajax
    Route::post('/getrecommendationproduct', [App\Http\Controllers\MedicPanel\DescribtionController::class, 'getrecommendationproduct'])->middleware('auth')->name('getrecommendationproduct');


    //    set descibtion & recommendation  in visit page
    Route::post('/setdescribtions', [App\Http\Controllers\MedicPanel\DescribtionController::class, 'setdescribtions'])->middleware('auth')->name('setdescribtions');

    //    remove descibtion from recommendation in visit page
    Route::post('/visit/recommendation/describtion', [App\Http\Controllers\MedicPanel\DescribtionController::class, 'invisitrmdrecom'])->middleware('auth')->name('invisitrmdrecom');

    //    completevisit in visit page by admin 
    Route::post('/completevisit', [App\Http\Controllers\MedicPanel\VisitControllr::class, 'completevisit'])->middleware('auth')->name('completevisit');

    //    uncompletevisit in visit page by admin 
    Route::post('/uncompletevisit', [App\Http\Controllers\MedicPanel\VisitControllr::class, 'uncompletevisit'])->middleware('auth')->name('uncompletevisit');
    Route::get('/recommendation/{type}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'index'])->middleware('auth')->name('recommendation');
    Route::get('/recommendation/create/{type}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'create'])->middleware('auth')->name('createRecommendation');
    Route::post('/recommendation/create', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'store'])->middleware('auth')->name('storeRecommendation');
    Route::get('/recommendation/delete/{id}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'destroy'])->middleware('auth')->name('deleteRecommendation');
    Route::get('/recommendation/edit/{id}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'edit'])->middleware('auth')->name('editRecommendation');
    Route::post('/recommendation/update/{id}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'update'])->middleware('auth')->name('updateRecommendation');

    Route::post('/describtion/create/{id}', [App\Http\Controllers\MedicPanel\DescribtionController::class, 'store'])->middleware('auth')->name('storeDescribtion');
    Route::get('/describtion/delete/{id}', [App\Http\Controllers\MedicPanel\DescribtionController::class, 'destroy'])->middleware('auth')->name('deleteDescribtion');
});


// Route::get('/describtion/edit/{id}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'edit'])->middleware('auth')->name('editRecommendation');
// Route::post('/describtion/update/{id}', [App\Http\Controllers\MedicPanel\RecomendationController::class, 'update'])->middleware('auth')->name('updateRecommendation');



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
Route::post('addtocart/{id}/{type?}', [App\Http\Controllers\UserPanel\CartController::class, 'addproduct'])->name('addtocart');
Route::post('removefromcart/{cartid}/{productid}', [App\Http\Controllers\UserPanel\CartController::class, 'removefromcart'])->name('removefromcart');
Route::get('shop', [App\Http\Controllers\Website\home::class, 'shop'])->name('shop');

Route::get('diseases-based-on-body-parts', [App\Http\Controllers\Website\home::class, 'diseases'])->name('diseases');


Route::prefix('userpanel')->middleware([UserMiddleware::class])->group(function () {
    /********************* *************************/
    /*************** User Manager *******************/
    /********************* *************************/
    Route::get('/', [App\Http\Controllers\UserPanel\UserController::class, 'index'])->name('userDashboard');
    Route::get('/cart', [App\Http\Controllers\UserPanel\CartController::class, 'index'])->name('cart');
    Route::post('/payment', [App\Http\Controllers\UserPanel\PaymentController::class, 'payment'])->name('payment');
    Route::post('/medicpayment', [App\Http\Controllers\UserPanel\PaymentController::class, 'medicpayment'])->name('medicpayment');



    Route::post('/storecomment', [App\Http\Controllers\Website\CommentController::class, 'storecomment'])->middleware('auth')->name('storecomment');
    Route::post('/storevisit', [App\Http\Controllers\UserPanel\VisitControllr::class, 'storevisit'])->middleware('auth')->name('storevisit');
    Route::get('/forms', [App\Http\Controllers\UserPanel\VisitControllr::class, 'forms'])->name('forms');
    Route::get('/edit/user/{id}', [App\Http\Controllers\UserPanel\UserPanelController::class, 'editprofile'])->middleware('auth')->name('editprofile');

    Route::get('visit', [App\Http\Controllers\Website\home::class, 'visit'])->name('visit');
    Route::get('visit/{id}', [App\Http\Controllers\UserPanel\VisitControllr::class, 'visit'])->name('visitdetails');
    //profile mangment
    Route::post('/profile/update', [App\Http\Controllers\UserPanel\UserPanelController::class, 'updateprofile'])->middleware('auth')->name('updateprofile');
});

Route::post('/send-message{friend}', [App\Http\Controllers\ChatController::class, 'sendMessage'])->middleware('auth')->name('sendmessage');
Route::get('/messages', [App\Http\Controllers\ChatController::class, 'getMessages'])->name('getmessage');
Route::post('/update-quantity', [App\Http\Controllers\AdminPanel\ProductController::class, 'updateQuantity'])->name('updateQuantity');

Route::post('/getproductbyprice', [App\Http\Controllers\AdminPanel\ProductController::class, 'getproductbyprice'])->name('getproductbyprice');

Route::post('/getCityByState', [App\Http\Controllers\Website\EventController::class, 'getcitybystate'])->name('getcitybystate');




// handler install

Route::get('/migrate', function () {
    try {
        // Attempt to get PDO connection
        DB::connection()->getPdo();
        echo 'Connected to the database: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        echo 'Could not connect to the database: ' . $e->getMessage();
    }


    // Read the secret key from .env
    $secretKey = env('MIGRATION_SECRET_KEY');

    // Ensure the secret key is set
    if (!$secretKey) {
        return response('Migration secret key not set', 500);
    }

    // Check if the provided key matches the one in .env
    if (request('key') !== $secretKey) {
        return response('Unauthorized', 401);
    }

    // Run the migrations
    Artisan::call('migrate');
    Artisan::call('db:seed');

    // return "Migrations completed successfully.";

});

Route::get('/caches/clear', function () {
    Artisan::call('route:cache');
    return redirect()->back()->with('success', 'cache removed');
})->name('routecache');



