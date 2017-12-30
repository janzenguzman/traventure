<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Package;
use App\Booking;
use App\Travelers;
use App\Trips;
use App\Comment;
use Carbon\Carbon;
use App\Favorites;
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
        $packages = Package::all();
        // $packages = DB::select('SELECT * FROM packages');
         $packages = Package::orderBy('created_at', 'desc')->paginate(8);
         return view('Traveler.packages')->with('packages', $packages);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Create Post

        // $bookingRequest = $request->all();
        $booking = new Booking;
        $booking->date_from = $request->input('date_from');
        $booking->date_to = $request->input('date_to');
        $booking->client_fname = $request->input('client_fname');
        $booking->client_lname = $request->input('client_lname');
        $booking->contact_num = $request->input('contact_num');
        $booking->client_email = $request->input('client_email');
        $booking->adult = $request->input('adult');
        $booking->child = $request->input('child');
        $booking->infant = $request->input('infant');
        $booking->note = $request->input('note');
        $booking->service = $request->get('service');
        $booking->traveler_id = auth()->user()->id;
        $booking->status = 'Pending';
        $booking->package_id = $request->input('package_id');
        $booking->expired = 0;
        $booking->save();

        return redirect('/Traveler/Bill');
    }

    //DONT TOUCH
    public function showPackages($package_id)
    {
        $comments=DB::table('comments')
                    ->join('packages', 'comments.package_id', '=', 'packages.package_id')
                    ->where('comments.package_id', $package_id)
                    ->get();
        $packages = Package::find($package_id);
        
        $avg = DB::table('comments')
                ->where('package_id', $package_id)
                ->avg('rating');

        $count = DB::table('comments')
                ->where('package_id', $package_id)
                ->count();
        return view('Traveler.show')->with(['packages' => $packages, 'comments' => $comments, 
                    'avg' => $avg, 'count' => $count]); 
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

    public function book($package_id)
    {
        $packages = Package::find($package_id);
        return view('Traveler/BookingForm')->with('packages', $packages);
    }

    public function showBill()
    {
        $traveler_id=auth()->id();
        $bookingRequest = DB::table('bookings')
                        ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                        ->where('traveler_id', $traveler_id)
                        ->orderby('bookings.created_at', 'desc')->first();

        return view('Traveler/Bill')->with('bookingRequest', $bookingRequest);
    }

    public function showBookings(Request $request)
    {
        $requested = $request->input('requested'); 
        $accepted = $request->input('accepted');
        $pname_search = $request->input('search_pname');
        $id = auth()->user()->id;

        if($requested){
            $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->where([['traveler_id', $id], ['bookings.status', '!=', 'Pending'], 
                    ['bookings.status', '!=', 'Cancelled'],
                    ['bookings.status', 'like', $requested],])
            ->orderBy('bookings.created_at', 'desc')->paginate(5);
        }elseif($accepted){
            $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->where([['traveler_id', $id], ['bookings.status', '!=', 'Pending'], 
                    ['bookings.status', '!=', 'Cancelled'],
                    ['bookings.status', 'like', $accepted]])
            ->orderBy('bookings.created_at', 'desc')->paginate(5);
        }else{
            $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->where([['traveler_id', $id], ['bookings.status', '!=', 'Pending'], 
                    ['bookings.status', '!=', 'Cancelled'],
                    ['packages.package_name', 'like', '%'.$pname_search.'%'],
                    ['bookings.expired', '0']])
            ->orderBy('bookings.created_at', 'desc')->paginate(5);
        }
            // return view('Traveler.Bookings')->with('bookings', $bookings);

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

    public function showTrips(Request $request)
    {
        $id = auth()->user()->id;
        $pname_search = $request->input('search_pname');

        $trips = DB::table('trips')
            ->join('bookings', 'trips.booking_id', '=', 'bookings.booking_id')
            ->join('packages', 'trips.package_id', '=', 'packages.package_id')
            ->where([['trips.traveler_id', $id],
                    ['packages.package_name', 'like', '%'.$pname_search.'%'],
                    ['bookings.status', 'Accepted']])
            ->orderBy('trips_id')->paginate(5);
        return view('Traveler.Trips')->with('trips', $trips);
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

    public function updateProfile(Request $request){

        $user_id = Auth::user()->id;
        $fileName = Auth::user()->photo;
        if (Input::file('photo')) {
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('photo')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
    
            Input::file('photo')->move($destinationPath, $fileName);
        }

        $travelers = travelers::find($user_id);
        $travelers->fname = $request->input('fname');
        $travelers->lname = $request->input('lname');
        $travelers->username = $request->input('username');
        $travelers->birthday = $request->input('birthday');
        $travelers->contact_no = $request->input('contact_no');
        $travelers->photo = $fileName;
        $travelers->save();

        return redirect()->back()->with('updatedProfile', 'You have successfully updated your profile!');
    }

    //ADDED BY ARIEL

    public function sendMessage(Request $request){

        DB::table('messages')->insert([
                'sender_email' => Auth::user()->email,
                'receiver_email' => 'agentone@gmail.com',
                'package_id' => $request->input('package_id'),
                'message' => $request->input('message'),
                'status' => 0,
                'created_at' => Carbon::now()
            ]);

        return redirect()->back()->with('messageSent', 'Message sent!');
    }

    public function replyMessage(Request $request){

        DB::table('messages')->insert([
                'sender_email' => Auth::user()->email,
                'receiver_email' => $request->input('receiver_email'),
                'package_id' => $request->input('package_id'),
                'message' => $request->input('message'),
                'status' => 0,
                'created_at' => Carbon::now()
            ]);

        $id = $request->input('message_id');
        DB::table('messages')->where('id', $id)->update(['status' => 1]); 

        return redirect()->back()->with('messageSent', 'Message sent!');
    }

    public function showSentMessages(){
        
        $traveler_email = Auth::user()->email;
        $messages = DB::table('messages')
            ->join('agents', 'messages.receiver_email', '=', 'agents.email')
            ->join('packages', 'messages.package_id', '=', 'packages.package_id')
            ->select('messages.*', 'agents.fname', 'agents.lname', 'agents.photo','packages.package_name')
            ->where('sender_email', $traveler_email)
            ->orderBy('created_at', 'desc')->paginate(5);

        $messagesCount = DB::table('messages')->where([['receiver_email', $traveler_email],['status', 0]])->count();
        return view('Traveler.SentMessages')->with(['messages' => $messages, 'messagesCount' => $messagesCount]);
        // dd($messages);
    }

    public function showMessages(){
        
        $traveler_email = Auth::user()->email;
        $messages = DB::table('messages')
            ->join('agents', 'messages.sender_email', '=', 'agents.email')
            ->join('packages', 'messages.package_id', '=', 'packages.package_id')
            ->select('messages.*', 'agents.fname', 'agents.lname', 'agents.photo','packages.package_name')
            ->where('receiver_email', $traveler_email)
            ->orderBy('created_at', 'desc')->paginate(5);

        $messagesCount = DB::table('messages')->where([['receiver_email', $traveler_email],['status', 0]])->count();
        return view('Traveler.ShowMessages')->with(['messages' => $messages, 'messagesCount' => $messagesCount]);
        // dd($messages);
    }

    public function deleteMessage(Request $request){
        
        $inserted = DB::table('deleted_messages')->insert([
            'id' => $request->input('id'),
            'sender_email' => $request->input('sender_email'),
            'receiver_email' => $request->input('receiver_email'),
            'package_id' => $request->input('package_id'),
            'message' => $request->input('message'),
            'created_at' => $request->input('created_at')
        ]);

        if($inserted){
            DB::table('messages')->where('id', $request->input('id'))->delete();
            return redirect()->back()->with('messageDeleted', 'Message deleted successfully!');
        }else{
            return redirect()->back()->with('messageDeletedFail', 'Message failed to delete!');
        }
    }

    public function cancelRequest(Request $request){
        $booking_id = $request->input('booking_id');

        DB::table('bookings')->where('booking_id', $booking_id)->delete();

        return redirect()->route('Traveler.Explore')->with('bookingRequestCancelled', 'You successfully cancelled your booking request.');
    }

    public function confirmRequest(Request $request){
        $total_payment = $request->input('total_payment');
        $booking_id = $request->input('booking_id');

         DB::table('bookings')
            ->where('booking_id', $booking_id)
            ->update(['total_payment' => $total_payment, 'status' => 'Confirmed']);
            return redirect()->route('Traveler.Bookings')->with('bookingConfirmed', 'Booking request sent!');
    }

    public function showVoucher($package_id, $booking_id){
        $bookings=DB::table('bookings')
                    ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                    ->where('booking_id', $booking_id)
                    ->get();
        $comments=DB::table('comments')
                    ->where('package_id', $package_id)
                    ->get();

        $avg = DB::table('comments')
                ->where('package_id', $package_id)
                ->avg('rating');

        $count = DB::table('comments')
                ->where('package_id', $package_id)
                ->count();
        return view('Traveler.Voucher', ['bookings' => $bookings, 'comments' => $comments, 'avg' => $avg, 'count' => $count]);
    }

    public function cancelBooking($booking_id){
        $cancelBooking = DB::table('bookings')
                        ->where('booking_id', $booking_id)
                        ->update(['status' => 'Cancelled']);
        return redirect()->route('Traveler.Bookings')->with('cancelledBooking', 'Booking successfully cancelled!');
    }

    public function addToFavorites(Request $req){
        if($req->ajax()){
            $fav = Favorites::create($req->all());
            return response()->json($fav);
            // return response($req->all());
        }
    }

    public function storeComment(Request $req){
        if($req->ajax()){     
            $comment=Comment::create($req->all());
            return response()->json($comment);
        }
    }
}
