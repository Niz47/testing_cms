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

/*Route::get('/login', function () {
    return "Your email is not allowed!";
});*/

/*Route::get('google', function () {
    return view('google');
});*/

Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', 'PageController@index');
// Route::get('lang/{lang}', 'TestController@setLanguage');

Route::get('lang/{locale}', function ($locale) {
	\Log::info("testing .... 123");
	\App::setLocale($locale);
    \Session::put('langKey', $locale);
    // return redirect()->back();
    return view('home');
});
