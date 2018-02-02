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

Auth::routes();

Route::get('/TravelerLogin', 'Auth\LoginController@showLoginForm')->name('TravelerLogin');
Route::get('/TravelerRegister', 'Auth\LoginController@showRegisterForm')->name('TravelerRegister');
Route::get('/AgentRegister', 'Auth\AgentsLoginController@showRegisterForm')->name('AgentsRegister');
Route::get('/AgentLogin', 'Auth\AgentsLoginController@showLoginForm')->name('AgentLogin');
Route::post('/', 'Auth\AgentsLoginController@logout')->name('Agent.Logout');
Route::get('/', 'Auth\LoginController@logout')->name('Traveler.Logout');

Route::prefix('Traveler')->group(function(){
    Route::get('/Explore', 'TravelersController@index') -> name('Traveler.Explore');
    Route::post('/Explore', 'TravelersController@index') -> name('Traveler.Search');
    Route::get('/TourPackage/{package}', 'TravelersController@showPackages') -> name('Traveler.TourPackage');
    Route::post('/store', 'TravelersController@store') -> name('Traveler.Store');
    Route::get('/Bill', 'TravelersController@showBill') -> name('Traveler.Bill');
    Route::get('/Bookings', 'TravelersController@showBookings')->name('Traveler.Bookings');
    Route::delete('/Bookings/Delete/{booking}', 'TravelersController@destroyBookings')->name('Traveler.DestroyBookings');
    Route::post('/Trips', 'TravelersController@showTrips')->name('Traveler.Trips');
    Route::get('/Favorites', 'TravelersController@showFavorites')->name('Traveler.Favorites');
    Route::post('/UpdateProfile', 'TravelersController@updateProfile')->name('Traveler.UpdateProfile');
    Route::get('/Favorites', 'TravelersController@showFavorites')->name('Traveler.MyFavorites');
    Route::post('/favorite', 'TravelersController@favoritePackage')->name('Traveler.Favorite');
    Route::post('/unfavorite', 'TravelersController@unfavoritePackage')->name('Traveler.unFavorite');
    Route::get('/Trips', 'TravelersController@showTrips')->name('Traveler.Trips');
    Route::get('/Messages', 'TravelersController@showMessages')->name('Traveler.ShowMessages');
    Route::get('/SentMessages', 'TravelersController@showSentMessages')->name('Traveler.SentMessages');
    Route::post('/SendMessage', 'TravelersController@sendMessage')->name('Traveler.SendMessage');
    Route::post('/ReplyMessage', 'TravelersController@replyMessage')->name('Traveler.ReplyMessage');
    Route::get('/UpdateMsgStatus', 'TravelersController@UpdateMsgStatus')->name('Traveler.UpdateMsgStatus');
    Route::post('/DeleteMessage', 'TravelersController@deleteMessage')->name('Traveler.DeleteMessage');
    Route::post('/CancelRequest', 'TravelersController@cancelRequest')->name('Traveler.CancelRequest');
    Route::get('/Bookings/{package}/{booking}', 'TravelersController@showVoucher')->name('Traveler.Voucher');
    Route::get('/Trips/{package}/{booking}', 'TravelersController@showVoucher')->name('Traveler.Voucher');
    Route::get('/Cancel/{booking}', 'TravelersController@cancelBooking')->name('Traveler.CancelBooking');
    Route::post('/Bookings', 'TravelersController@showBookings')->name('Traveler.SearchPname');
    Route::post('/Voucher', 'TravelersController@confirmRequest')->name('Traveler.ConfirmRequest');
    Route::get('/Bookings', 'TravelersController@showBookings')->name('Traveler.Bookings');
    Route::post('/ChangePass', 'TravelersController@changePass')->name('Traveler.ChangePass');
    Route::get('/Trips', 'TravelersController@showTrips')->name('Traveler.Trips');
    Route::post('/Favorites', 'TravelersController@showFavorites')->name('Traveler.MyFavorites');
    Route::post('/favorite', 'TravelersController@favoritePackage')->name('Traveler.Favorite');
    Route::post('/unfavorite', 'TravelersController@unfavoritePackage')->name('Traveler.unFavorite');
    Route::post('/Trips/CommentInsert', 'TravelersController@storeComment');
    Route::post('/Explore/AddToFavorite', 'TravelersController@addToFavorites');
    Route::post('/Explore/Sort', 'TravelersController@sortBy')->name('Traveler.Sort');
    Route::get('/Bookings/ViewRoutes/{package_id}/{day}', 'TravelersController@viewRoutes')->name('Traveler.ViewRoutes');
    
});

Route::prefix('Admin')->group(function(){
    Route::get('/HomePage', 'AdminController@showHomePage')->name('Admin.HomePage');
    Route::get('/RequestsPage', 'AdminController@showRequestsPage')->name('Admin.RequestsPage');
    Route::get('/RequestsPage/requestsDatatable', 'AdminController@requestsDatatable')->name('Admin.RequestsPage.requestsDatatable');
    Route::get('/StatusPage/accreditedDatatable', 'AdminController@accreditedDatatable')->name('Admin.StatusPage.accreditedDatatable');
    Route::get('/StatusPage/activeDatatable', 'AdminController@activeDatatable')->name('Admin.StatusPage.activeDatatable');
    Route::get('/StatusPage/inactiveDatatable', 'AdminController@inactiveDatatable')->name('Admin.StatusPage.inactiveDatatable');
    Route::post('/RequestPage/Decline', 'AdminController@declineAgent')->name('Admin.Decline');
    Route::get('/RequestsPage/{id}/{action}', 'AdminController@requests')->name('requests');
    Route::post('/StatusPage/Deactivate', 'AdminController@deactivateAgent')->name('Admin.Deactivate');
    Route::get('/StatusPage', 'AdminController@showStatusPage')->name('Admin.StatusPage');
    Route::get('/Register', 'AdminController@showRegisterForm')->name('Admin.Register');
    Route::get('/Login', 'Auth\AdminLoginController@showLoginForm')->name('Admin.Login');
    Route::post('/Login', 'Auth\AdminLoginController@login')->name('Admin.Login.Submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('Admin.Logout');
}); 

Route::prefix('Agent')->group(function(){
    Route::post('/HomePage', 'Auth\AgentsLoginController@login')->name('Agents.Login.Submit');
    Route::post('/ChangePass', 'AgentsController@changePass')->name('Agent.ChangePass');
    Route::post('/Bookings', 'AgentsController@showBookings') -> name('Agent.Bookings');
    Route::get('/Messages', 'AgentsController@showMessages') -> name('Agent.Messages');
    Route::get('/Bookings/{booking}/{package}', 'AgentsController@openBooking') -> name('Agent.OpenBooking');
    Route::get('/Messages', 'AgentsController@showMessages') -> name('Agent.ShowMessages');
    Route::get('/SentMessages', 'AgentsController@showSentMessages') -> name('Agent.SentMessages');
    Route::post('/ReplyMessage', 'AgentsController@replyMessage')->name('Agent.ReplyMessage');
    Route::get('/UpdateMsgStatus', 'AgentsController@UpdateMsgStatus')->name('Agent.UpdateMsgStatus');
    Route::post('/Bookings/SendMessage', 'AgentsController@replyMessage')->name('Agent.SendMessage');
    Route::post('/DeleteMessage', 'AgentsController@deleteMessage')->name('Agent.DeleteMessage');
    Route::post('/UpdateProfile', 'AgentsController@updateProfile')->name('Agent.UpdateProfile');
    Route::get('/Packages', 'AgentsController@showPackages') -> name('Agent.Packages');
    Route::get('/Bookings', 'AgentsController@showBookings') -> name('Agent.Bookings');
    Route::get('/Messages', 'AgentsController@showMessages') -> name('Agent.ShowMessages');
    Route::get('/Packages/CreatePackage', 'AgentsController@createPackage') -> name('Agent.CreatePackage');
    Route::post('/Packages/StorePackage', 'AgentsController@storePackage') -> name('Agent.StorePackage');
    Route::get('/Packages/{package_id}', 'AgentsController@cancelPackage');
    Route::get('/Packages/CreateItineraries/{id}/{day}', 'AgentsController@createItineraries')->name('Agent.CreateItineraries');
    Route::post('/Packages', array('uses' => 'AgentsController@storeItinerary'))->name('Agent.StoreItinerary');
    Route::get('/Packages/EditItineraries/{package_id}/{day}', array('uses' => 'AgentsController@editItineraries'));
    Route::post('/Packages/UpdateItineraries','AgentsController@updateItineraries');
    Route::get('/Packages/EditPackage/{package_id}', array('uses' => 'AgentsController@editPackage'));
    Route::post('/Packages/Update/{package_id}','AgentsController@updatePackage');
    Route::get('/Packages/PackageDetails/{id}', 'AgentsController@ViewPackage') -> name('Agent.PackageDetails');
    Route::get('/Packages/AddSlots/{package_id}', 'AgentsController@addSlots') -> name('Agent.AddSlots');
    Route::post('/UpdateSlots','AgentsController@updateSlots');
    Route::post('/Packages/DeletePackage', array('uses' => 'AgentsController@deletePackage'))->name('Agent.DeletePackage');
    Route::get('/Packages/Decline/{booking_id}', array('uses' => 'AgentsController@declineBooking'));
    Route::get('/Packages/Accept/{booking_id}', array('uses' => 'AgentsController@acceptBooking'));
    Route::post('/Packages/PackageDetails/DeleteSlot', array('uses' => 'AgentsController@deleteSlot'))->name('Agent.DeleteSlot');
    Route::post('/Bookings/DeleteBooking', array('uses' => 'AgentsController@deleteBooking'))->name('Agent.DeleteBooking');
    Route::get('/Packages/PackageDetails/ViewRoutes/{package_id}/{day}', 'AgentsController@viewRoutes')->name('Agent.ViewRoutes');
});