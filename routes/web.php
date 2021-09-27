<?php

use App\Http\Controllers\MohammedController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::prefix('admin')->middleware('auth:web')->namespace('Admin')->group(function () {
        Route::get('/', 'GeneralController@dashboard')->name('admin.dashboard');
        Route::resource('categories', 'CategoryController');
        Route::resource('articles', 'ArticleController');
        Route::resource('users', 'UserController');
        Route::resource('contacts', 'ContactController');
    });
    // Route::get('font', [App\Http\Controllers\MohammedController::class, 'index']);

    Route::prefix('admin')->namespace('Auth')->group(function () {
        Route::get('/login', 'UserAuthController@showLoginView')->name('user.login_view');
        Route::post('/login','UserAuthController@login')->name('user.login');
        Route::get('/logout','UserAuthController@logout')->name('user.logout')->middleware('auth:web');
    });

    Route::get('/', 'Front\HomeContreoller@home')->name('page.home');
    Route::get('/category/{id}', 'Front\HomeContreoller@category')->name('page.category');
    Route::get('/category/article/{id}', 'Front\HomeContreoller@article')->name('page.article');
    Route::get('/contact', 'Front\HomeContreoller@contact')->name('page.contact');
    Route::post('/contact', 'Front\HomeContreoller@message')->name('post.message');


    Route::get('/test', function() {
        return view('test');
    });
});

// Route::get('/home', 'GeneralController@index');

