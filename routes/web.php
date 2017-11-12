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
Route::post('/agentsRegister', 'Auth\AgentsRegisterController@create') -> name('agentsRegister');
Auth::routes();
Route::get('/travelers', 'TravelersController@index') -> name('travelers');
Route::get('/agentsHomePage', 'Auth\AgentsController@showHomePage') -> name('agentsHomePage');

