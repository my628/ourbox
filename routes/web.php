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
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/posts/{slug}', 'BlogController@show')->name('blog.show');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/home/permission', 'PermissionController');
Route::resource('/home/post', 'PostController');
Route::get('/home/file', 'UploadController@index');
Route::post('/home/file', 'UploadController@store');
Route::get('/home/category', 'CategoryController@index');
Route::post('/home/category', 'CategoryController@store');
Route::get('/home/tag', 'TagController@index');