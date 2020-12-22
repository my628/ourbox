<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Role
Route::post('role', 'RoleController@store');
Route::get('roles', 'RoleController@index');
Route::get('role/{id}/edit', 'RoleController@edit');

//Posts
Route::get('posts', 'PostController@index');
Route::get('posts/{id}', 'PostController@show');
Route::put('posts/{id}', 'PostController@update');

//Categories
Route::post('categories', 'CategoryController@store');
Route::get('categories', 'CategoryController@index');
//Tags
Route::get('tags', 'TagController@index');