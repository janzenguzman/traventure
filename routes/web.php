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
    return view('landing');

});
Route::get('/TravelerLogin', 'Auth\LoginController@showLoginForm')->name('TravelerLogin');
Route::get('/TravelerRegister', 'Auth\LoginController@showRegisterForm')->name('TravelerRegister');
Route::get('/AgentRegister', 'Auth\AgentsLoginController@showRegisterForm')->name('AgentRegister');
Route::get('/AgentLogin', 'Auth\AgentsLoginController@showLoginForm')->name('AgentLogin');


Auth::routes();

Route::post('/agents-register', 'Auth\AgentsRegisterController@register') -> name('agents-register');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/agentsRegister', 'Auth\RegisterController@showRegisterForm') -> name('agentsRegister');
// Route::get('/agentsRegister', 'AgentsController@showRegisterForm') -> name('agentsRegister');
Route::post('Agent/HomePage', 'Auth\AgentsLoginController@login')->name('Agents.Login.Submit');


Route::prefix('Traveler')->group(function(){
    Route::get('/Explore', 'TravelersController@index') -> name('Traveler.Explore');
    Route::get('/TourPackage/{package}', 'TravelersController@showPackages') -> name('Traveler.TourPackage');
    Route::get('/TourPackage/{package}/ContactNow', 'TravelersController@showContactNow') -> name('Traveler.ContactNow');
    Route::get('/TourPackage/{package}/Book', 'TravelersController@book') -> name('Traveler.Book');
    Route::post('/store', 'TravelersController@store') -> name('Traveler.Store');
    Route::get('/Bill/{package}', 'TravelersController@showBill') -> name('Traveler.Bill');
    Route::get('/Bookings', 'TravelersController@showBookings')->name('Traveler.Bookings');
    Route::delete('/Bookings/Delete/{booking}', 'TravelersController@destroyBookings')->name('Traveler.DestroyBookings');
    Route::get('/Trips', 'TravelersController@showTrips')->name('Traveler.Trips');
    Route::get('/Favorites', 'TravelersController@showFavorites')->name('Traveler.MyFavorites');
    Route::get('/Messages', 'TravelersController@showMessages')->name('Traveler.Messages');
    Route::post('/favorite', 'TravelersController@favoritePackage')->name('Traveler.Favorite');
    Route::post('/unfavorite', 'TravelersController@unfavoritePackage')->name('Traveler.unFavorite');
});

Route::prefix('Admin')->group(function(){
    Route::get('/HomePage', 'AdminController@showHomePage')->name('Admin.HomePage');
    Route::get('/RequestsPage', 'AdminController@showRequestsPage')->name('Admin.RequestsPage');
    Route::get('/RequestsPage/requestsDatatable', 'AdminController@requestsDatatable')->name('Admin.RequestsPage.requestsDatatable');
    Route::get('/StatusPage/accreditedDatatable', 'AdminController@accreditedDatatable')->name('Admin.StatusPage.accreditedDatatable');
    Route::get('/StatusPage/activeDatatable', 'AdminController@activeDatatable')->name('Admin.StatusPage.activeDatatable');
    Route::get('/StatusPage/inactiveDatatable', 'AdminController@inactiveDatatable')->name('Admin.StatusPage.inactiveDatatable');
    Route::get('/RequestsPage/{id}/{action}', 'AdminController@requests')->name('requests');
    Route::get('/StatusPage/{id}', 'AdminController@deactivate')->name('deactivate');
    Route::get('/StatusPage', 'AdminController@showStatusPage')->name('Admin.StatusPage');
    Route::get('/Register', 'AdminController@showRegisterForm')->name('Admin.Register');
    Route::get('/Login', 'Auth\AdminLoginController@showLoginForm')->name('Admin.Login');
    Route::post('/Login', 'Auth\AdminLoginController@login')->name('Admin.Login.Submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('Admin.Logout');
}); 

Route::prefix('Agent')->group(function(){
    Route::get('/HomePage', 'AgentsController@showHomePage') -> name('Agent.HomePage');
}); 
