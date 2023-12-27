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


Route::group(['namespace' => 'Posts','prefix'=>'home'], function () {
    Route::get('/posts', 'IndexController')->name('posts');
    Route::get('/{post}', 'ShowController')->name('post.show');


    Route::group(['namespace'=>'Comment','prefix'=>'{post}/comments'],function (){
        Route::post('/','StoreController')->name('home.comment.store');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/{category}', 'IndexController')->name('home.category.index');
    });
});


Route::group(['namespace' => 'Personal','prefix'=>'personal','middleware'=>'auth'], function () {
    Route::get('/posts', 'IndexController')->name('personal.posts');
    Route::get('/post/create', 'CreateController')->name('personal.post.create');
    Route::get('/post/{post}', 'ShowController')->name('personal.post.show');
    Route::post('/posts', 'StoreController')->name('personal.post.store');
    Route::delete('/posts/{post}', 'DeleteController')->name('personal.post.delete');
    Route::get('/{post}/edit','EditController')->name('personal.post.edit');
    Route::patch('/{post}','UpdateController')->name('personal.post.update');


    Route::group(['namespace'=>'Comment','prefix'=>'{post}/comments'],function (){
        Route::post('/posts','StoreController')->name('personal.comment.store');
    });
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
