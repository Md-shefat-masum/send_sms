<?php

use Illuminate\Support\Facades\Route;
use App\User;

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

// global blade variable
$users = User::where('status',1)->latest()->get();
View()->share(['users'=>$users]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin_index')->middleware(['auth','admin']);

// user routes
Route::group(['prefix' => 'admin/user', 'namespace' => 'Admin', 'middleware' => ['auth','admin']], function () {
    Route::get('/', 'UserController@index')->name('admin_user_index');

    Route::get('/profile/{id}', 'UserController@profile')->name('admin_user_profile');
    Route::post('/profile/update', 'UserController@profile_update')->name('admin_user_profile_update');

    Route::get('/view', 'UserController@view')->name('admin_user_view');
    Route::get('/edit', 'UserController@edit')->name('admin_user_edit');
    Route::get('/add', 'UserController@add')->name('admin_user_add');
    Route::post('/store', 'UserController@store')->name('admin_user_store');
    Route::post('/update', 'UserController@update')->name('admin_user_update');
    Route::get('/delete/{id}', 'UserController@delete')->name('admin_user_delete');
});

Route::group(['prefix' => 'admin/sms', 'namespace' => 'Admin', 'middleware' => ['auth','admin']], function () {
    Route::post('/submit', 'UserController@sms_submit')->name('admin_sms_submit');
});


