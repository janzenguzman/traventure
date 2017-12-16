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
    //return view('welcome');
    return view('auth.login');
});

Route::get('/sample', 'UserController@show');

Route::get('/agentsRegister', function() {
    return view('auth/agentsRegister');
}); 

Auth::routes();

Route::post('/agents-register', 'Auth\AgentsRegisterController@register') -> name('agents-register');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/custom-login', 'Auth\LoginController@login') -> name('custom-login');

Route::prefix('Traveler')->group(function(){
    Route::get('/Explore', 'TravelersController@index') -> name('Traveler.Explore');
    Route::get('/TourPackage/{package}', 'TravelersController@showPackages') -> name('Traveler.TourPackage');
    Route::get('/TourPackage/{package}/ContactNow', 'TravelersController@showContactNow') -> name('Traveler.ContactNow');
    Route::get('/TourPackage/{package}/Book', 'TravelersController@book') -> name('Traveler.Book');
    Route::post('/store', 'TravelersController@store') -> name('Traveler.Store');
    Route::get('/TourPackage/{package}/Bill', 'TravelersController@showBill') -> name('Traveler.Bill');
    Route::get('/Bookings', 'TravelersController@showBookings')->name('Traveler.Bookings');
    Route::delete('/Bookings/Delete/{booking}', 'TravelersController@destroyBookings')->name('Traveler.DestroyBookings');
    Route::get('/Trips', 'TravelersController@showTrips')->name('Traveler.Trips');
    Route::get('/Favorites', 'TravelersController@showFavorites')->name('Traveler.Favorites');
    Route::get('/Messages', 'TravelersController@showMessages')->name('Traveler.Messages');
});

Route::prefix('Admin')->group(function(){
    Route::get('/HomePage', 'AdminController@showHomePage')->name('Admin.HomePage');
    Route::get('/RequestsPage', 'AdminController@showRequestsPage')->name('Admin.RequestsPage');
    Route::get('/RequestsPage', 'AdminController@showRequests')->name('Admin.RequestsPage');
    Route::get('/StatusPage', 'AdminController@showStatusPage')->name('Admin.StatusPage');
    Route::get('/Register', 'AdminController@showRegisterForm')->name('Admin.Register');
    Route::get('/Login', 'Auth\AdminLoginController@showLoginForm')->name('Admin.Login');
    Route::post('/Login', 'Auth\AdminLoginController@login')->name('Admin.Login.Submit');
}); 

Route::prefix('Agent')->group(function(){
    Route::get('/HomePage', 'AgentsController@showHomePage') -> name('Agent.HomePage');
}); 
