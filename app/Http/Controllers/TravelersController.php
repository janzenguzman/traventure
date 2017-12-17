<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Booking;
use App\Travelers;
use App\Trips;
use DB;
use Auth;

class TravelersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('Traveler/HomePage');
        // $packages = Package::all();
        // $packages = DB::select('SELECT * FROM packages');
        // $packages = Package::orderBy('created_at', 'desc')->take(1)->get();
        // $packages = Package::orderBy('created_at', 'desc')->get();

         $packages = Package::orderBy('created_at', 'desc')->paginate(10);
         return view('Traveler.packages')->with('packages', $packages);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'fname' => 'required',
        //     'lname' => 'required'
        // ]);

        // Create Post
        $booking = new Booking;
        $booking->date_from = $request->input('frDate');
        $booking->date_to = $request->input('toDate');
        $booking->client_fname = $request->input('fname');
        $booking->client_lname = $request->input('lname');
        $booking->contact_num = $request->input('contactnum');
        $booking->client_email = $request->input('email');
        $booking->adult = $request->input('adult');
        $booking->child = $request->input('child');
        $booking->infant = $request->input('infant');
        $booking->note = $request->input('note');
        $booking->traveler_id = auth()->user()->id;
        $booking->status = 0;
        $booking->package_id = $request->input('package_id_hidden');
        $booking->save();

        return redirect('/Traveler/TourPackage/{package_id}/Bill')->with('success', 'Booked!');
    }

    public function showPackages($package_id)
    {
        $packages = Package::find($package_id);
        return view('Traveler.show')->with('packages', $packages);
    }

    public function edit($package_id)
    {
        //
    }

    public function update(Request $request, $package_id)
    {
        //
    }

    public function destroyBookings($booking_id)
    {
        //
    }

    public function showContactNow($package_id)
    {
        $packages = Package::find($package_id);
        return view('/Traveler/ContactNow')->with('packages', $packages);
    }

    public function book($package_id)
    {
        $packages = Package::find($package_id);
        return view('Traveler/BookingForm')->with('packages', $packages);
    }

    public function showBill($package_id)
    {
        return view('Traveler/Bill');
    }

    public function showBookings()
    {
        $id = auth()->user()->id;
        $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->where('traveler_id', $id)
            ->orderBy('booking_id')->get();
        return view('Traveler.Bookings')->with('bookings', $bookings);
    }

    public function showTrips()
    {
        
        return view('Traveler.Trips');
    }

    public function showMessages()
    {
        // $packages = Package::find($package_id);
        return view('Traveler.Messages');
    }

    public function showFavorites()
    {
        // $packages = Package::find($package_id);
        return view('Traveler.Favorites');
    }
}
