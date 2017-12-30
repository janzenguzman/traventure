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

Auth::routes();

Route::post('/agents-register', 'Auth\AgentsRegisterController@register') -> name('agents-register');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::post('/custom-login', 'Auth\LoginController@login') -> name('custom-login');

Route::prefix('Traveler')->group(function(){
    Route::get('/HomePage', 'TravelersController@index') -> name('Traveler.HomePage');
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
    Route::get('/Packages', 'AgentsController@showPackages') -> name('Agent.Packages');
    Route::get('/Bookings', 'AgentsController@showBookings') -> name('Agent.Bookings');
    Route::get('/Messages', 'AgentsController@showMessages') -> name('Agent.Messages');
    // Route::get('/Itinerary', 'AgentsController@itinerary') -> name('Agent.Itinerary');
    // Route::post('/Itinerary', array('uses' => 'AgentsController@storeItinerary'));
    
    Route::post('/Packages/StorePackage', 'AgentsController@storePackage') -> name('Agent.StorePackage');

    //Create Packages
    Route::get('/Packages/CreatePackage', 'AgentsController@createPackage') -> name('Agent.CreatePackage');


    //View Create Itineraries 
    Route::get('/Packages/CreateItineraries', 'AgentsController@createItineraries') -> name('Agent.CreateItineraries');

    //Store Itineraries
    Route::post('/Packages', array('uses' => 'AgentsController@storeItineraries'));

    //Update Itineraries
    Route::get('/Packages/EditItineraries/{package_id}', array('uses' => 'AgentsController@editItineraries'));
    // Route::match(['put', 'patch'], '/Packages/UpdateItineraries/{package_id}', 'AgentsController@updateItineraries');
    Route::post('/Packages/UpdateItineraries/{package_id}','AgentsController@updateItineraries');

    //Update Packages
    Route::get('/Packages/EditPackage/{package_id}', array('uses' => 'AgentsController@editPackage'));
    // Route::match(['put', 'patch'], '/Packages/Update/{package_id}','AgentsController@update');
    Route::post('/Packages/Update/{package_id}','AgentsController@updatePackage');

    //Show Agents
    Route::get('/Agents', 'AgentsController@showAgents') -> name('Agent.Agents');

    //Agents View Profile
    Route::get('/ViewProfile/{id}', 'AgentsController@ViewProfile') -> name('Agent.ViewProfile');
    
    //Package Details
    Route::get('/Packages/PackageDetails/{id}', 'AgentsController@ViewPackage') -> name('Agent.PackageDetails');
    
    //Update Agent
    Route::get('/EditAgent/{id}', array('uses' => 'AgentsController@editAgent'));
    Route::match(['put', 'patch'], '/Agents/{id}/Update','AgentsController@updateAgent');

    //Update Slots
    Route::get('/Packages/AddSlots/{package_id}', 'AgentsController@addSlots') -> name('Agent.AddSlots');
    Route::post('/UpdateSlots','AgentsController@updateSlots');
    
    //Delete
    Route::get('/Packages/DeletePackage/{package_id}', array('uses' => 'AgentsController@deletePackage'));

    //Decline Booking
    Route::get('/Packages/Decline/{booking_id}', array('uses' => 'AgentsController@declineBooking'));

    //Accept Booking
    Route::get('/Packages/Accept/{booking_id}', array('uses' => 'AgentsController@acceptBooking'));
});