<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DeshbordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

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



Route::get('/', [WebController::class,"index"])->name('home');
Route::get('/home', [WebController::class,"index"])->name('home');

Route::get('/about', [WebController::class,"about"])->name('about');
Route::get('/works', [WebController::class,"works"])->name('works');
Route::get('/services', [WebController::class,"services"])->name('services');
Route::get('/contact', [WebController::class,"contact"])->name('contact');
Route::get('/blog', [WebController::class,"blog"])->name('all_blog');
Route::get('blog_details/{slug:slug}', [WebController::class,"blog_details"])->name('blog-details');


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
    'as'     => 'customer.'
],function(){

    Route::get('/registion', [CustomerController::class, 'registion_get'])->name('registion_get')->middleware('guest');
    Route::post('/registion', [CustomerController::class, 'registion_post'])->name('registion_post');

    Route::get('/login', [CustomerController::class, 'login_get'])->name('login')->middleware('guest');
    Route::post('/login', [CustomerController::class, 'login_post'])->name('login_post');

    Route::group([
        'middleware'=>'is_customer'
    ], function(){

        Route::get('/deshbord', [CustomerController::class, 'deshbord'])->name('deshbord');
    });


    Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');


});



///-------------------------------////////////----------------------///////////////



////////////////////////////////////////////////////////////
// Deshbord function Route [[[[[  BlogController  ]]]]]


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){


    Route::resources([
        'blog' => BlogController::class,
    ]);

    Route::group(['middleware'=>'is_admin'], function(){

        Route::resources([
            'category' => CategoryController::class,
            'user' => UserController::class
        ]);

    });


    Route::get('/my-profile', [UserController::class, 'my_profile'])->name('user.profile');

});


// Deshbord Route
/////////////////////////////////////////

Route::group(['prefix'=>'deshbord', 'middleware'=>'auth'], Function(){

    Route::resource('deshbord', DeshbordController::class);

});



Route::get('/cards_basic', [DeshbordController::class, 'cards'])->name('cards')->middleware('auth');
Route::get('/perfect-scrollbar', [DeshbordController::class, 'perfect_scrollbar'])->name('perfectscrollbar')->middleware('auth');
Route::get('/text-divider', [DeshbordController::class, 'text_divider'])->name('textdivider')->middleware('auth');
Route::get('/layouts-horizontal', [DeshbordController::class, 'layouts_horizontal'])->name('layoutshorizontal')->middleware('auth');
Route::get('/layouts-vertical', [DeshbordController::class, 'layouts_vertical'])->name('layoutsvertical')->middleware('auth');
Route::get('/basic-inputs', [DeshbordController::class, 'basic_inputs'])->name('basicinputs')->middleware('auth');
Route::get('/input-groups', [DeshbordController::class, 'input_groups'])->name('inputgroups')->middleware('auth');
Route::get('/icons-boxicons', [DeshbordController::class, 'icons_boxicons'])->name('iconsboxicons')->middleware('auth');
Route::get('/layouts-blank', [DeshbordController::class, 'layouts_blank'])->name('layoutsblank')->middleware('auth');
Route::get('/layouts-container', [DeshbordController::class, 'layouts_container'])->name('layoutscontainer')->middleware('auth');
Route::get('/layouts-fluid', [DeshbordController::class, 'layouts_fluid'])->name('layoutsfluid')->middleware('auth');
Route::get('/without-menu', [DeshbordController::class, 'without_menu'])->name('withoutmenu')->middleware('auth');
Route::get('/without-navbar', [DeshbordController::class, 'without_navbar'])->name('withoutnavbar')->middleware('auth');
Route::get('/settings-account', [DeshbordController::class, 'settings_account'])->name('settingsaccount')->middleware('auth');
Route::get('/settings-connections', [DeshbordController::class, 'settings_connections'])->name('settingsconnections')->middleware('auth');
Route::get('/settings-notifications', [DeshbordController::class, 'settings_notifications'])->name('settingsnotifications')->middleware('auth');
Route::get('/misc-error', [DeshbordController::class, 'misc_error'])->name('miscerror')->middleware('auth');
Route::get('/misc-under', [DeshbordController::class, 'misc_under'])->name('miscunder')->middleware('auth');
Route::get('/tables-basic', [DeshbordController::class, 'tables_basic'])->name('tablesbasic')->middleware('auth');

Route::get('/ui-accordion', [DeshbordController::class, 'ui_accordion'])->name('uiaccordion')->middleware('auth');
Route::get('/ui-alerts', [DeshbordController::class, 'ui_alerts'])->name('uialerts')->middleware('auth');
Route::get('/ui-badges', [DeshbordController::class, 'ui_badges'])->name('uibadges')->middleware('auth');
Route::get('/ui-buttons', [DeshbordController::class, 'ui_buttons'])->name('uibuttons')->middleware('auth');
Route::get('/ui-carousel', [DeshbordController::class, 'ui_carousel'])->name('uicarousel')->middleware('auth');
Route::get('/ui-collapse', [DeshbordController::class, 'ui_collapse'])->name('uicollapse')->middleware('auth');
Route::get('/ui-dropdowns', [DeshbordController::class, 'ui_dropdowns'])->name('uidropdowns')->middleware('auth');
Route::get('/ui-footer', [DeshbordController::class, 'ui_footer'])->name('uifooter')->middleware('auth');
Route::get('/uilist-groups', [DeshbordController::class, 'uilist_groups'])->name('uilistgroups')->middleware('auth');
Route::get('/ui-modals', [DeshbordController::class, 'ui_modals'])->name('uimodals')->middleware('auth');
Route::get('/ui-navbar', [DeshbordController::class, 'ui_navbar'])->name('uinavbar')->middleware('auth');
Route::get('/ui-offcanvas', [DeshbordController::class, 'ui_offcanvas'])->name('uioffcanvas')->middleware('auth');
Route::get('/ui-pagination', [DeshbordController::class, 'ui_pagination'])->name('uipagination')->middleware('auth');
Route::get('/ui-progress', [DeshbordController::class, 'ui_progress'])->name('uiprogress')->middleware('auth');
Route::get('/ui-spinners', [DeshbordController::class, 'ui_spinners'])->name('uispinners')->middleware('auth');
Route::get('/ui-tabs', [DeshbordController::class, 'ui_tabs'])->name('uitabs')->middleware('auth');
Route::get('/ui-toasts', [DeshbordController::class, 'ui_toasts'])->name('uitoasts')->middleware('auth');
Route::get('/ui-tooltips', [DeshbordController::class, 'ui_tooltips'])->name('uitooltips')->middleware('auth');
Route::get('/ui-typography', [DeshbordController::class, 'ui_typography'])->name('uitypography')->middleware('auth');




Route::get('update/migrate', function(){
    Artisan::call('migrate');

    return "Successfully Migrated";
});
