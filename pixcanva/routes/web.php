<?php

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
Route::get('/index','PixcanvaController@index');
Route::get('/posts','PixcanvaController@posts');
Route::post('/add_posts','PixcanvaController@addPosts');
Route::post('/comments','PixcanvaController@comments');
Route::post('/deletePosts','PixcanvaController@deletePosts');
Route::get('/profile','PixcanvaController@profile');
Route::get('/like','PixcanvaController@likePosts');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
