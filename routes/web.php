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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/login', function () {
    return "Your email is not allowed!";
});*/

/*Route::get('google', function () {
    return view('google');
});*/

Route::get('/', 'PageController@index');

Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('lang/{lang}', 'TestController@setLanguage');

/*Route::get('lang/{locale}', function ($locale) {
	\Log::info("testing .... 123");
	\App::setLocale($locale);
    \Session::put('langKey', $locale);
    // return redirect()->back();
    return view('home');
});*/

Route::get('/test', 'PageController@test');


// Route::group(array('prefix' => 'admin', 'middleware' => ['auth','perms']), function () {
Route::group(array('prefix' => 'admin'), function () {
    Route::get('users', 'Admin\UserController@index')->name('admin.users.index');
    Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('admin.users.edit');
    Route::patch('users/{user}/edit', 'Admin\UserController@update')->name('admin.users.update');


    Route::get('roles', 'Admin\RoleController@index')->name('admin.roles.index');
    Route::get('roles/create', 'Admin\RoleController@create')->name('admin.roles.create');
    Route::patch('roles/create', 'Admin\RoleController@store')->name('admin.roles.store');
    Route::get('roles/{role}/edit', 'Admin\RoleController@edit')->name('admin.roles.edit');
    Route::patch('roles/{role}/edit', 'Admin\RoleController@update')->name('admin.roles.update');
    /*Route::resource('users', 'Admin\UserController');
    Route::resource('roles', 'Admin\RoleController');*/
});
