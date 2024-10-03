<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeshbordController;
use App\Http\Controllers\PermissionController;

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
Route::resource('deshbord', DeshbordController::class);



Route::get('update/migrate', function () {
    Artisan::call('migrate');

    return "Successfully Migrated";
});
