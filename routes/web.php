<?php

use App\Models\Blog;
use Illuminate\Foundation\Auth\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeshbordController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NotificationController;

use Illuminate\Support\Facades\Crypt;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








Route::get('/', [WebController::class, "index"])->name('home');
Route::get('/home', [WebController::class, "index"])->name('home');

Route::get('/about', [WebController::class, "about"])->name('about');
Route::get('/works', [WebController::class, "works"])->name('works');
Route::get('/services', [WebController::class, "services"])->name('services');
Route::get('/contact', [WebController::class, "contact"])->name('contact');
Route::get('/blog', [WebController::class, "blog"])->name('all_blog');
Route::get('blog_details/{slug:slug}', [WebController::class, "blog_details"])->name('blog-details');


// // Route for Category

Route::get('category/{category:slug}', [WebController::class, 'category_blogs'])->name('categoryblogs');

// // Route for User

Route::get('user/{user:name}', [WebController::class, 'user_blog'])->name('userblog');




// Route::get('/serch-page', function(){
//     return view('search');
// });





// ////////////////////////////////////////////////////////
// // Login and Register Route

Route::get('/registion', [LoginController::class, 'registion_get'])->name('registion_get');
Route::post('/registion', [LoginController::class, 'registion_post'])->name('registion_post');

Route::get('/login', [LoginController::class, 'login_get'])->name('login');
Route::post('/login', [LoginController::class, 'login_post'])->name('login_post');

Route::get('/forgot-password', [LoginController::class, 'password_request'])->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'password_request_post'])->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'password_reset'])->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'password_update'])->name('password.update');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

///-------------------------------////////////----------------------///////////////


// ////////////////////////////////////////////////////////

// // Customer  Login and Register Route

Route::group([
    'prefix' => 'customer',
    'as' => 'customer.'
], function () {

    Route::get('/registion', [CustomerController::class, 'registion_get'])->name('registion_get')->middleware('guest');
    Route::post('/registion', [CustomerController::class, 'registion_post'])->name('registion_post');

    Route::get('/login', [CustomerController::class, 'login_get'])->name('login')->middleware('guest');
    Route::post('/login', [CustomerController::class, 'login_post'])->name('login_post');

    Route::group([
        'middleware' => 'is_customer'
    ], function () {
        Route::get('/deshbord', [CustomerController::class, 'deshbord'])->name('deshbord');
    });

    Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');

});



///-------------------------------////////////----------------------///////////////



////////////////////////////////////////////////////////////
// Deshbord function Route [[[[[  BlogController  ]]]]]


Route::group(['prefix'=> '','middleware' => ['auth']], function () {

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, "destroy" ]);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, "destroy" ]);

    Route::get('roles/{roleId}/give-permissions', [RoleController::class,'addPermissionToRole'] );
    Route::put('roles/{roleId}/give-permissions', [RoleController::class,'givePermissionToRole'] );



    Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {
        Route::resources([
            'blog' => BlogController::class,
            'category' => CategoryController::class,
            'user' => UserController::class
        ]);
        Route::get('/my-profile', [UserController::class, 'my_profile'])->name('user.profile');
    });

});


// Deshbord Route
/////////////////////////////////////////

//Route::resource('deshbord', DeshbordController::class)->middleware('auth', 'verified');

Route::get('deshbord', [DeshbordController::class, "index"])->middleware('auth', 'verified')->name('deshbord.index');

Route::get('update/migrate', function () {
    Artisan::call('migrate');

    return "Successfully Migrated";
});

Route::get('make-payment', [PaymentController::class,'view']);
Route::post("payment", [PaymentController::class,"store"])->name("payment.mail");

Route::get('assignment', [AssignmentController::class,'notification']);
Route::post('send-score', [AssignmentController::class,'score'])->name('send.score');

Route ::get('/notification', [NotificationController::class,'index']);


//////// //////    test  Response
/*

*/
/*
Route::get('/sydhul/{user}',function (User $user){
    return response($user);
});
*/

/*
Route::get('/sydhul/{user}',function (User $user){
    return $user;
});
*/

/*
Route::get('/sydhul',function (){
    return response("Hello World")->cookie("name","newCookie", 30);
});
*/

/*
Route::get('/rana',function (){
    return redirect("/sydhul");
});
*/

/*
Route::get('/sydhul/{user}',function (User $user){
    return back ();
});
*/

/*
Route::get('/rana/{user}',function (){
    return redirect("/sydhul");
});
*/


/*
Route::get('/sydhul',function (){
    return response()->json([
        "name" => "feni",
        "state" => "Chittagong"
    ]);
});
*/

/*
Route::get('/sydhul',function (){
    return response()->download('storage/images/3Ezid6AnXHCx3InGbuqNn38AmbctskLpAncdoLkP.jpg');
});
*/


/*
Route::get('/sydhul',function (){
    return response()->file('storage/images/3Ezid6AnXHCx3InGbuqNn38AmbctskLpAncdoLkP.jpg');
});
*/

//////// //////    test  Response End



//////// //////    URL Generation

/*
Route::get("one", function(){
    return 'first page <a href="/two"> Cleck Another Page </a>'. 'we are in the Page of ' . url()->current();
});
Route::get("two", function(){
    return "secound page". '<a href="'.url()->previous().'"> Previous Page </a>';
});
*/

/*
Route::get('/newsession', function(){
    session()->put(['name' => 'sydhul']);
});

Route::get('/getsession', function(){
    return session()->get('name' );
});


Route::get('/distroysession', function(){
    session()->forget('name' );
});

*/




Route::get('/email/verify', [LoginController::class, 'emailNotice'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}',[LoginController::class, 'emailVerify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification',[LoginController::class, 'resentVerify'])->middleware(['auth', 'throttle:6,1'])->name('verification.send') ;


Route::get('/encrypt-value', function(){
    $password = "123456";

    $encrypt_pass = Crypt::encryptString($password);

    return $encrypt_pass;
}) ;

Route::get('/decrypt-value', function(){

    $encrypt_password = "eyJpdiI6IlNiV0hOeFloM0xKcXhvMUFBNStnOVE9PSIsInZhbHVlIjoiZ2VxMzRoYXd3UXc5cGpoZXJabmUyQT09IiwibWFjIjoiYjljMTBhNzgwYTkzMTBhYjE2MGZiMDYwY2UyZTlhNmNiMTVkNWZiMDY0ZTQ5MWU5NGE3ZDM4MzJjN2M4MDhkYiIsInRhZyI6IiJ9";

    $decrypt_pass = Crypt::decryptString($encrypt_password);


    return $decrypt_pass;
}) ;




































































































































































































































































































































































































