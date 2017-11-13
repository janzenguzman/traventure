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

Route::get('/agentsRegister', function() {
    return view('auth/agentsRegister');
}); 

Route::get('/admin-login', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');

Auth::routes();
Route::get('/travelers', 'TravelersController@index') -> name('travelers');
Route::post('/agents-register', 'Auth\AgentsRegisterController@register') -> name('agents-register');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::get('/agentsHomePage', 'AgentsController@showHomePage') -> name('agentsHomePage');
Route::post('/custom-login', 'Auth\LoginController@login') -> name('custom-login');
