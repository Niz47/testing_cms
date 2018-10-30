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
Route::get('/', 'PageController@index');
Route::get('lang/{lang}', 'PageController@setLanguage');

Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');
Auth::routes();

Route::group(array('prefix' => 'admin', 'middleware' => ['auth']), function () {
    Route::get('/', 'Admin\AdminController@index');

    // Users
    Route::get('users', 'Admin\UserController@index')->name('admin.users.index');
    Route::get('users/{user}/edit', 'Admin\UserController@edit')->name('admin.users.edit');
    Route::patch('users/{user}/edit', 'Admin\UserController@update')->name('admin.users.update');

    // Roles
    Route::get('roles', 'Admin\RoleController@index')->name('admin.roles.index');
    Route::get('roles/create', 'Admin\RoleController@create')->name('admin.roles.create');
    Route::patch('roles/create', 'Admin\RoleController@store')->name('admin.roles.store');
    Route::get('roles/{role}/edit', 'Admin\RoleController@edit')->name('admin.roles.edit');
    Route::patch('roles/{role}/edit', 'Admin\RoleController@update')->name('admin.roles.update');
});
