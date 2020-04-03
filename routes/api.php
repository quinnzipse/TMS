<?php

use Illuminate\Http\Request;

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

// Auth Routes
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

// List tasks
Route::get('tasks', 'Api\TaskApiController@index');
Route::get('task/{id}', 'Api\TaskApiController@show');
Route::post('task', 'Api\TaskApiController@store');
Route::put('task', 'Api\TaskApiController@store');
Route::delete('task/{id}', 'Api\TaskApiController@destroy');
