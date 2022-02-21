<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function (){
   Route::get('login', 'AdminLoginController@showLoginForm');
   Route::post('login', 'AdminLoginController@login')->name('admin.login');
});

Route::group(['prefix' => 'moderator', 'namespace' => 'Auth'], function (){
    Route::get('login', 'ModeratorLoginController@showLoginForm');
    Route::post('login', 'ModeratorLoginController@login')->name('moderator.login');
});

/* ======= after login the admin and moderator ======= */

/* #### the middleware takes 2 parameters 1 for guard (admin or moderator),
        2 the error path to login form  #### */

Route::group(['prefix' => 'admin', 'middleware' => 'assign.guard:admin,admin/login'], function (){
   Route::get('dashboard', function (){
       return view('auth.admin.home');
   });
});

Route::group(['prefix' => 'moderator', 'middleware' => 'assign.guard:moderator,moderator/login'], function (){
    Route::get('dashboard', function (){
        return view('auth.moderator.home');
    });
});

