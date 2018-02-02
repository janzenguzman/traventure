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
use Hash;

class TravelersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:travelers');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    // MADE BY JANZEN

    public function index(Request $req)
    {
        if($req->input('destination_search') != NULL && $req->input('date_search') != NULL && $req->input('categories') != NULL){ 
            $packages = DB::table('packages')
                    ->leftJoin('comments', function($join){
                        $join->on('comments.package_id', '=', 'packages.package_id');
                    })
                    ->join('agents', function($join){
                        $join->on('packages.agent_id', '=', 'agents.id');
                    })
                    ->join('slots', function($join){
                        $join->on('slots.package_id', '=', 'packages.package_id');
                    })
                    ->select('comments.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo as agent_photo', 
                            DB::raw('AVG(rating) as ratings_average'))
                    ->groupBy('comments.package_id', 'packages.package_id')
                    ->where([['packages.package_name', 'like', '%'.$req->input('destination_search').'%'],
                             ['slots.date_from', '=', $req->input('date_search')], 
                             ['packages.categories', 'like', '%'.$req->input('categories').'%']])
                    ->orderBy('packages.created_at', 'desc');
        }
        $destination = $req->input('destination_search');
        $date = $req->input('date_search');

        if($destination != NULL && $date != NULL){
            $packages = DB::table('packages')
                ->join('agents', 'packages.agent_id', '=', 'agents.id')
                ->join('slots', 'packages.package_id', '=', 'slots.package_id')
                ->where([['package_name', 'like', '%'.$destination.'%'],
                        ['slots.date_from', 'like', $date]
                ])
                ->orderBy('packages.created_at', 'desc')
                ->select('packages.*', 'agents.photo as agentPhoto', 'agents.fname', 'agents.lname')
                ->paginate(8);

                $avg = DB::table('comments')
                        ->join('packages', 'comments.package_id', '=', 'packages.package_id')
                        ->join('slots', 'packages.package_id', '=', 'slots.package_id')
                        ->where([['package_name', 'like', '%'.$destination.'%'],
                                ['slots.date_from', 'like', $date]
                        ])
                        ->avg('rating')
                        ->paginate(8);

        }else if($req->input('sort') == 'rating'){
            $packages = DB::table('packages')
                    ->leftJoin('comments', function($join){
                        $join->on('comments.package_id', '=', 'packages.package_id');
                    })
                    ->join('agents', function($join){
                        $join->on('packages.agent_id', '=', 'agents.id');
                    })
                    ->select('comments.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo as agent_photo', 
                            DB::raw('AVG(rating) as ratings_average'))
                    ->groupBy('comments.package_id', 'packages.package_id')
                    ->orderBy('comments.rating', 'desc')
                    ->paginate(8);
        }else if($req->input('sort') == 'joined'){
            $packages = DB::table('packages')
                    ->leftJoin('comments', function($join){
                        $join->on('comments.package_id', '=', 'packages.package_id');
                    })
                    ->join('agents', function($join){
                        $join->on('packages.agent_id', '=', 'agents.id');
                    })
                    ->select('comments.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo as agent_photo', 
                            DB::raw('AVG(rating) as ratings_average'))
                    ->groupBy('comments.package_id')
                    ->orderBy('packages.adult_price', 'asc')
                    ->where('packages.type', 'Joined')
                    ->paginate(8);
        
        }else if($req->input('sort') == 'exclusive'){
            $packages = DB::table('packages')
                    ->leftJoin('comments', function($join){
                        $join->on('comments.package_id', '=', 'packages.package_id');
                    })
                    ->join('agents', function($join){
                        $join->on('packages.agent_id', '=', 'agents.id');
                    })
                    ->select('comments.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo as agent_photo', 
                            DB::raw('AVG(rating) as ratings_average'))
                    ->groupBy('comments.package_id', 'packages.package_id')
                    ->orderBy('packages.adult_price', 'asc')
                    ->where('packages.type', 'Exclusive')
                    ->paginate(8);
        }else{
            $packages = DB::table('packages')
                    ->leftJoin('comments', function($join){
                        $join->on('comments.package_id', '=', 'packages.package_id');
                    })
                    ->join('agents', function($join){
                        $join->on('packages.agent_id', '=', 'agents.id');
                    })
                    ->select('comments.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo as agent_photo', 
                            DB::raw('AVG(rating) as ratings_average'))
                    ->groupBy('comments.package_id', 'packages.package_id')
                    ->orderBy('comments.rating')
                    ->paginate(8);
        }
        
        return view('Traveler.packages')->with('packages', $packages);
    }

    public function store(Request $request)
    {  
        $total_payment = $request->input('total_payment');
        $booking_id = $request->input('booking_id');
        $slot_id = $request->input('slot_id');
        $total_slots = ($request->input('adult') + $request->input('child') + $request->input('infant'));
        $service = $request->input('service');
        
        if($service == 'Joined')
            if($total_slots >= $request->input('slot')){
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
                $booking->service = $request->input('service');
                $booking->traveler_id = auth()->user()->id;
                $booking->status = 'Pending';
                $booking->package_id = $request->input('package_id');
                $booking->expired = 0;
                $booking->slot_id = $request->input('slot_id');
                $booking->save();

                return redirect('/Traveler/Bill');
            }else{
                return redirect()->back()->with('BookingFailed', 'The number of traveler you entered is more than the slots available!');
            }
        else{
            $booking = new Booking;
            $booking->date_from = $request->input('date_from');
            $booking->date_to = $request->input('date_to');
            $booking->client_fname = $request->input('client_fname');
            $booking->client_lname = $request->input('client_lname');
            $booking->contact_num = $request->input('contact_num');
            $booking->client_email = $request->input('client_email');
            $booking->no_of_excess = $request->input('no_of_excess');
            $booking->excess_price = $request->input('excess_price');
            $booking->no_of_exclusive_traveler = $request->input('no_of_exclusive_traveler');
            $booking->note = $request->input('note');
            $booking->service = $request->input('service');
            $booking->traveler_id = auth()->user()->id;
            $booking->status = 'Pending';
            $booking->package_id = $request->input('package_id');
            $booking->expired = 0;
            $booking->slot_id = $request->input('slot_id');
            $booking->save();

            return redirect('/Traveler/Bill');
        }
    }

    //DONT TOUCH
    public function showPackages($package_id)
    {
        $packages = DB::table('packages')
                    ->join('agents', 'packages.agent_id', '=', 'agents.id')
                    ->select('packages.*', 'agents.photo as agent_photo', 'agents.fname', 'agents.lname',
                                'agents.job_position', 'agents.company_name', 'agents.email', 'agents.contact_no')
                    ->where('packages.package_id', $package_id)
                    ->get();
        $itineraries = DB::table('itinerary')
                        ->where('package_id', $package_id)
                        ->orderBy('starttime', 'ASC')
                        ->orderBy('day', 'ASC')
                        ->get();
        
        $now = Carbon::now(); 
        $slots = DB::table('slots')
                    ->join('packages', 'slots.package_id', '=', 'packages.package_id')
                    ->where([['slots.package_id', $package_id],
                            ['slots.slots', '!=', '0'],
                            ['slots.date_from', '>=', $now]
                    ])
                    ->orderBy('slots.date_from', 'asc')
                    ->get();
        
        $avg = DB::table('comments')
                    ->where('package_id', $package_id)
                    ->avg('rating');

        $count = DB::table('comments')
                    ->where('package_id', $package_id)
                    ->count();

        $favs = DB::table('favorites')
                    ->where([['traveler_id', Auth::user()->id],
                            ['package_id', $package_id]
                    ])
                    ->get();

        $comments=DB::table('comments')
                    ->join('packages', 'comments.package_id', '=', 'packages.package_id')
                    ->where('comments.package_id', $package_id)
                    ->get();

        return view('Traveler.show')->with(['packages' => $packages, 'comments' => $comments, 
                    'avg' => $avg, 'count' => $count, 'slots' => $slots, 'favs' => $favs, 'itineraries' => $itineraries]); 
    }

    public function book($package_id)
    {
        $packages = Package::find($package_id);
        return view('Traveler/BookingForm')->with('packages', $packages);
    }

    public function showBill()
    {
        $traveler_id = auth()->id();
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
            $date_from  = new Carbon($booking->date_from);
            $diff = $date_to->diffInDays($now);
            $trips = DB::table('trips')->where('booking_id', $booking->booking_id)->first();

            if($now > $date_to){
                DB::table('bookings')->where('booking_id', $booking->booking_id)->update(['expired' => 1]); 
                DB::table('trips')->insert([
                    'booking_id' => $booking->booking_id,
                    'traveler_id' => $id,
                    'package_id' => $booking->package_id,
                ]);
            }else if($now > $date_from){
                DB::table('bookings')->where('booking_id', $booking->booking_id)->update(['expired' => 1]); 
                DB::table('trips')->insert([
                    'booking_id' => $booking->booking_id,
                    'traveler_id' => $id,
                    'package_id' => $booking->package_id,
                ]);
            }
        }
        return view('Traveler.Bookings')->with('bookings', $bookings);
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

    public function showFavorites(Request $request)
    {
        $id = auth()->user()->id;
        $pname_search = $request->input('search_pname');

        $favorites = DB::table('favorites')
            ->join('packages', 'packages.package_id', '=', 'favorites.package_id')
            ->join('agents', 'packages.agent_id', '=', 'agents.id')
            ->where([['traveler_id', $id],
                    ['packages.package_name', 'like', '%'.$pname_search.'%']])
            ->select('favorites.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo as agent_photo')
            ->orderBy('favorite_id', 'desc')->paginate(8);

        $avg = DB::table('comments')
            ->join('favorites', 'comments.package_id', 'favorites.package_id')
            ->avg('rating');

        return view('Traveler.Favorites')->with(['favorites' => $favorites, 'avg' => $avg]);
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
    
    //ADDED BY ARIEL
    
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

    public function sendMessage(Request $request){
        DB::table('messages')->insert([
                'sender_email' => Auth::user()->email,
                'receiver_email' => $request->input('receiver_email'),
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

        // $id = $request->input('message_id');
        // DB::table('messages')->where('id', $id)->update(['status' => 1]); 

        return redirect()->back()->with('messageSent', 'Message sent!');
    }

    public function UpdateMsgStatus(Request $req){
        $mId = $req->all();
        
        $updateMsg = DB::table('messages')
                    ->where('id', $mId)
                    ->update(['status' => 1]);
        if($updateMsg){
            echo "Succesfully updated status!";
        }
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
        $slot_id = $request->input('slot_id');
        $total_slots = ($request->input('adult') + $request->input('child') + $request->input('infant'));
        $service = $request->input('service');

        DB::table('bookings')
            ->where('booking_id', $booking_id)
            ->update(['status' => 'Confirmed']);

        if($service == 'Joined'){
            DB::table('slots')
            ->where('id', $slot_id)
            ->decrement('slots', $total_slots);

            DB::table('bills')->insert([
                'booking_id' => $booking_id,
                'traveler_id' => Auth::user()->id,
                'adult' => $request->input('adult'),
                'child' => $request->input('child'),
                'infant' => $request->input('infant'),
                'adult_price' => $request->input('adult_price'),
                'child_price' => $request->input('child_price'),
                'infant_price' => $request->input('infant_price'),
                'service' => $request->input('service'),
                'created_at' => Carbon::now(),
                'total_payment' => $total_payment
            ]);
        }else{

            DB::table('slots')
            ->where('id', $slot_id)
            ->decrement('slots', $request->input('no_of_exclusive_traveler'));

            DB::table('bills')->insert([
                'booking_id' => $booking_id,
                'traveler_id' => Auth::user()->id,
                'no_of_excess' => $request->input('no_of_excess'),
                'excess_price' => $request->input('excess_price'),
                'no_of_exclusive_traveler' => $request->input('no_of_exclusive_traveler'),
                'pax' => $request->input('pax'),
                'pax_price' => $request->input('pax_price'),
                'service' => $request->input('service'),
                'total_payment' => $total_payment,
                'created_at' => Carbon::now()
            ]);
        }
        
        return redirect()->route('Traveler.Bookings')->with('bookingConfirmed', 'Booking request sent!');
    }

    public function showVoucher($package_id, $booking_id){
        $bookings=DB::table('bookings')
                    ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                    ->join('agents', 'packages.agent_id', '=' ,'agents.id')
                    ->select('bookings.*', 'packages.*', 'agents.fname', 'agents.lname', 'agents.photo',
                        'agents.company_name', 'agents.job_position', 'agents.contact_no', 'agents.email')
                    ->where('bookings.booking_id', $booking_id)
                    ->get();

        $itineraries = DB::table('itinerary')
                    ->join('packages', 'itinerary.package_id', '=', 'packages.package_id')
                    ->where('itinerary.package_id', $package_id)
                    ->get();

        $bills = DB::table('bills')
                    ->join('bookings', 'bookings.booking_id', '=', 'bills.booking_id')
                    ->where('bills.booking_id', $booking_id)
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
        return view('Traveler.Voucher', ['bookings' => $bookings, 'comments' => $comments, 'avg' => $avg, 
                    'count' => $count, 'bills' => $bills, 'itineraries' => $itineraries]);
    }

    public function viewRoutes($package_id, $day){
        $routes = DB::table('itinerary')
                ->where([['package_id', $package_id], ['day', $day]])
                ->orderBy('starttime')
                ->get();
        return view('Traveler.ViewRoutes')->with('routes', $routes);
    }

    public function cancelBooking($booking_id){
        
        $booking = Booking::find($booking_id);

        if($booking->service == 'Joined'){
            $total_traveler = $booking->adult + $booking->child + $booking->infant;

            DB::table('slots')
                ->where('id', $booking->slot_id)
                ->increment('slots', $total_traveler);
        }else{
            $total_traveler = $booking->no_of_exclusive_traveler;

            DB::table('slots')
                ->where('id', $booking->slot_id)
                ->increment('slots', $total_traveler);
        }

        $cancelBooking = DB::table('bookings')
                        ->where('booking_id', $booking_id)
                        ->update(['status' => 'Cancelled']);
        return redirect()->back()->with('cancelledBooking', 'Booking successfully cancelled!');
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

    public function sortBy(Request $req){
        if($req->ajax()){

        }
    }

    public function changePass(Request $request){
        if (!(Hash::check($request->get('old_pass'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("ErrorPassword","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('confirm_pass'), $request->get('new_pass')) != 0){
            //Current password and new password are same
            return redirect()->back()->with("ErrorReEnteredPassword","Your new password does not match your re-entered password.");
        }
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_pass'));
        $user->save();
 
        return redirect()->back()->with("PasswordChanged", "Password changed successfully!");
    }
}
