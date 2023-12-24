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
    return view('post.main');
});

Route::group(['namespace' => 'Posts','prefix'=>'home'], function () {
    Route::get('/posts', 'IndexController')->name('posts');

});


Route::group(['namespace' => 'Personal','prefix'=>'personal','middleware'=>'auth'], function () {
    Route::get('/posts', 'IndexController')->name('personal.posts');
    Route::get('/post/id', 'ShowController');
    Route::get('/post/create', 'CreateController')->name('personal.post.create');
    Route::post('/posts', 'StoreController')->name('personal.post.store');
});
Route::group(['namespace' => 'Auth','middleware'=>'guest'], function () {
    Route::get('/register', 'RegisterController')->name('register');
    Route::post('/register', 'RegisterStoreController')->name('register.store');
    Route::get('/login', 'LoginController')->name('login');
    Route::post('/login', 'LoginStoreController')->name('login.store');

});
Route::group(['namespace' => 'Auth', 'middleware' => 'auth'], function () {
    Route::post('/logout', 'LogoutController')->name('logout');
});
