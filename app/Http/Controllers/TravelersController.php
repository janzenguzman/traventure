<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Booking;
use App\Travelers;
use App\Trips;
use App\Favorites;
use DB;
use Auth;
use Carbon\Carbon;

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
        $packages = Package::all();
        // $packages = DB::select('SELECT * FROM packages');

        $packages = Package::with('favorites:favorite_id')
            ->orderBy('package_id', 'desc')->paginate(5);
        // return view('Traveler.packages')->with('packages', $packages);
        return view('Traveler.packages', compact('packages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
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
        $booking->expired = 0;
        $booking->save();

        return view('Traveler.Bill', compact('package_id_hidden'));
            // ->with('success', 'Booked!');
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
        // $bookings = Booking::find($booking_id);
        $bookings = DB::table('bookings')->where('booking_id', $booking_id)->get();
            foreach($bookings as $booking){
                DB::table('cancelled_bookings')->insert([
                    'booking_id'=> $booking->booking_id,
                    'date_from' => $booking->date_from,
                    'date_to' => $booking->date_to,
                    'client_fname' => $booking->client_fname,
                    'client_lname' => $booking->client_lname,
                    'contact_num' => $booking->contact_num,
                    'client_email' => $booking->client_email,
                    'adult' => $booking->adult,
                    'child' => $booking->child,
                    'infant' =>$booking->infant,
                    'note' => $booking->note,
                    'created_at' => $booking->created_at,
                    'updated_at' => $booking->updated_at,
                ]);
            }
        // $bookings->delete();
        DB::table('bookings')->where('booking_id', $booking_id)->delete();
        return redirect('/Traveler/Bookings')->with('success', 'Booking Cancelled!');
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
        $packages = Package::all();
        return view('Traveler/Bill')->with('packages', $packages);
    }

    public function showBookings()
    {
        $id = auth()->user()->id;
        $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->where('traveler_id', $id)
            ->orderBy('booking_id')->get();
        // $bookings = \App\Booking::with('packages:package_name')
        //     ->where('traveler_id', $id)
        //     ->orderBy('booking_id')->get();

        foreach($bookings as $booking){
            $now = Carbon::now();
            $date_to  = new Carbon($booking->date_to);
            $diff = $date_to->diffInDays($now);
            $trips = DB::table('trips')->where('booking_id', $booking->booking_id)->first();

            if($now > $date_to){
                DB::table('bookings')->where('booking_id', $booking->booking_id)->update(['expired' => 1]); 
            }
            if($booking->expired == 1 && $trips === NULL){
                DB::table('trips')->insert([
                    'booking_id' => $booking->booking_id,
                    'traveler_id' => $id,
                    'package_id' => $booking->package_id,
                ]);
            }
        }
        // return view('Traveler.Bookings')->with('bookings', $bookings);
        return view('Traveler.Bookings', compact('bookings'));
    }

    public function showTrips()
    {
        $id = auth()->user()->id;
        $trips = DB::table('trips')
            ->join('bookings', 'trips.booking_id', '=', 'bookings.booking_id')
            ->join('packages', 'trips.package_id', '=', 'packages.package_id')
            ->where('trips.traveler_id', $id)
            ->orderBy('trip_id')->get();
        return view('Traveler.Trips')->with('trips', $trips);
    }

    public function showMessages()
    {
        return view('Traveler.Messages');
    }

    public function showFavorites()
    {
        $id = auth()->user()->id;
        $favorites = DB::table('favorites')
            ->join('packages', 'packages.package_id', '=', 'favorites.package_id')
            ->where('traveler_id', $id)
            ->orderBy('favorite_id', 'desc')->paginate(19);
        return view('Traveler.Favorites')->with('favorites', $favorites);
    }

    public function favoritePackage(Request $request)
    {
        if($request->ajax()){
            $id = $request['packageId'];
            $package = Package::find($id);
            if(!$package){
                return null;
            }
            $traveler = Auth::user();
            $faves = $traveler->favorites()->where('package_id', $id)->first();
            if($faves){
                $faves->delete();
                // return 'Unfavorite';
                return response()->json($faves);
            }else{
                $faves = new Favorites;
                $faves->favorited = 1;
                $faves->traveler_id = $traveler->id;
                $faves->package_id = $id;
                $faves->save();
                return 'Favorite';
            }   
        }
    }

    public function unfavoritePackage(Request $request)
    {
        if($request->ajax()){
            $getId = $request['deleteFave'];
            $fave = Favorites::find($getId);
            $fave->delete();
            return response()->json($fave);
        }
    }
}
