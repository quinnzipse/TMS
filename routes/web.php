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
})->name('welcome');

Auth::routes();
//Auth::routes(['verify' => true]);

//Misc Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
Route::post('/profile/edit', 'HomeController@profileEditProcess')->name('profile.edit');

//Task Routes
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/tasks/add', 'TaskController@add')->name('tasks.add');
Route::post('/tasks/add', 'TaskController@addProcess')->name('tasks.add');
Route::post('/tasks/{task}/delete', 'TaskController@delete')->name('tasks.delete');
Route::get('/tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
Route::post('/tasks/{task}/task', 'TaskController@editProcess')->name('tasks.edit');
Route::get('/tasks/{task}/view', 'TaskCotnroller@view')->name('tasks.view');

//Setting Routes
Route::get('/settings', 'SettingsController@index')->name('settings');

Route::get('/settings/flags', 'SettingsController@flags')->name('settings.flags');
Route::get('/settings/flags/{flag}/edit', 'SettingsController@editFlag')->name('settings.flags.edit');
Route::post('/settings/flags/{flag}/edit', 'SettingsController@editFlagProcess')->name('settings.flags.edit');
Route::get('/settings/flags/{flag}/view', 'SettingsController@viewFlag')->name('settings.flags.view');
Route::get('/settings/flags/add', 'SettingsController@addFlag')->name('settings.flags.add');
Route::post('/settings/flags/add', 'SettingsController@addFlagProcess')->name('settings.flags.add');

Route::get('/settings/categories', 'SettingsController@categories')->name('settings.categories');
Route::get('/settings/categories/{category}/edit', 'SettingsController@editCategory')->name('settings.categories.edit');
Route::post('/settings/categories/{category}/edit', 'SettingsController@editCategoryProcess')->name('settings.categories.edit');
Route::get('/settings/categories/{category}/view', 'SettingsController@viewCategory')->name('settings.categories.view');
Route::get('/settings/categories/add', 'SettingsController@addCategory')->name('settings.categories.add');
Route::post('/settings/categories/add', 'SettingsController@addCategoryProcess')->name('settings.categories.add');

//Profile Routes
