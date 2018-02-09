<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Packages;
use App\Itineraries;
use App\Slots;
use App\Bookings;
use Carbon\Carbon;
use App\Travelers;
use App\Agents;
use DB;
use View;
use Auth;
use Hash;
use App\Itinerary;
use App\Days;

class AgentsController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:agents');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showBookings(Request $request){
        $requested = $request->input('requested'); 
        $accepted = $request->input('accepted');
        $bookingid_search = $request->input('search_bookingid');
        $id = Auth::user()->id;
        

        if($requested){
            $bookings = DB::table('bookings')
                ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                ->join('travelers', 'bookings.traveler_id', '=', 'travelers.id')
                ->where([['packages.agent_id', $id],
                        ['bookings.status', '!=', 'Declined'], ['bookings.status', '!=', 'Pending'], 
                        ['bookings.status', '!=', 'Cancelled'], ['bookings.status', '=', $requested]])
                ->select('bookings.*', 'packages.*', 'travelers.fname', 'travelers.lname', 'travelers.email')
                ->orderBy('bookings.created_at', 'desc')
                ->paginate(5);
        }elseif($accepted){
            $bookings = DB::table('bookings')
                ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                ->join('travelers', 'bookings.traveler_id', '=', 'travelers.id')
                ->where([['packages.agent_id', $id],
                        ['bookings.status', '!=', 'Declined'], ['bookings.status', '!=', 'Pending'],
                        ['bookings.status', '!=', 'Cancelled'],['bookings.status', '=', $accepted]])
                ->select('bookings.*', 'packages.*', 'travelers.fname', 'travelers.lname', 'travelers.email')
                ->orderBy('bookings.created_at', 'desc')
                ->paginate(5);
        }else{
            $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->join('travelers', 'bookings.traveler_id', '=', 'travelers.id')
            ->where([['packages.agent_id', $id], ['bookings.status', '!=', 'Pending'],
                    ['bookings.status', '!=', 'Declined'], ['bookings.status', '!=', 'Cancelled'],
                    ['bookings.booking_id', 'like', '%'.$bookingid_search.'%']])
            ->select('bookings.*', 'packages.*', 'travelers.fname', 'travelers.lname', 'travelers.email')
            ->orderBy('bookings.created_at', 'desc')
            ->paginate(5);

        }

        foreach($bookings as $booking){
            $now = Carbon::now();
            $date_from  = new Carbon($booking->date_from);
            $diff = $date_from->diffInDays($now);

            if($now > $date_from){
                DB::table('bookings')->where('booking_id', $booking->booking_id)->update(['expired' => 1]);
            }
        }

        return view('Agent.Bookings')->with('bookings', $bookings);
    }

    public function storePackage(Request $request){
        if($request->input('days') == 0){
            return redirect()->back()->with('InvalidDay', 'Error! The day you inputted is (0)zero!');
        }else{
            $this->validate($request, [
                'photo' => 'image|nullable|max:1999',
            ]);
            
                if (Input::file('photo')->isValid()) {
                    $destinationPath = public_path('public/uploads/files/');
                    $extension = Input::file('photo')->getClientOriginalExtension();
                    $fileName = uniqid().'.'.$extension;

                    Input::file('photo')->move($destinationPath, $fileName);
                }

            $agent_id = auth()->user()->id;
            $categoriesString = implode(', ', $request->input('categories'));
            $packages = new Packages(array(
                'package_name' => $request->input('package_name'),
                'days' => $request->input('days'),
                'adult_price' => $request->input('adult_price'),
                'child_price' => $request->input('child_price'),
                'infant_price' => $request->input('infant_price'),
                'excess_price' => $request->input('excess_price'),
                'type' => $request->get('type'),
                'pax1' => $request->input('pax1'),
                'pax1_price' => $request->input('pax1_price'),
                'pax2' => $request->input('pax2'),
                'pax2_price' => $request->input('pax2_price'),
                'pax3' => $request->input('pax3'),
                'pax3_price' => $request->input('pax3_price'),
                'inclusions' => $request->input('inclusions'),
                'add_info' => $request->input('add_info'),
                'reminders' => $request->input('reminders'),
                'categories' => $categoriesString,
                'photo' => $fileName,
                'agent_id' => $agent_id
            ));
            
            $packages->save();

            $day = 1;
            return redirect("Agent/Packages/CreateItineraries/".$packages->package_id."/".$day."")->with('day', $day);
        }
    }

    public function storeItinerary(Request $request){
        $packages = Packages::find($request->input('package_id'));
            foreach ($request->file('day1_photo') as $media) {
                $destinationPath = public_path('public/uploads/files/');
                $extension = $media->getClientOriginalExtension();
                $filename = uniqid().'.'.$extension;
                $media->move($destinationPath, $filename);
            }

            $package_id = $request->input('package_id');
            for($x = 0; $x < count($request->input('starttime')); ++$x){
                $itinerary =  new Itinerary;
                $itinerary->package_id = $package_id;
                $itinerary->starttime =  $request->input('starttime')[$x];
                $itinerary->endtime = $request->input('endtime')[$x];
                $itinerary->destination = $request->input('destination')[$x];
                $itinerary->dayPhoto = $filename;
                $itinerary->day = $request->input('day');
                $itinerary->lat = $request->input('lat')[$x];
                $itinerary->lng = $request->input('lng')[$x];
                $itinerary->save();
                
            }
            
        $days = 0;
        $day = $request->input('day');
        if($request->input('day') == $request->input('no_day')){
            return redirect('Agent\Packages')->with('packages', $packages)
                ->with('addedPackage', 'You have successfully made a new Package Tour!');
        }else{
            ++$day;
            return redirect("Agent/Packages/CreateItineraries/".$packages->package_id."/".$day."");
        }
    }
    
    public function showPackages(Request $req){
        $lastSignedIn = new Carbon(Auth::guard('agents')->user()->last_signed_in);
        $now = Carbon::now();
        $diffHours = $lastSignedIn->diffInHours($now);

        if($diffHours <= 1){
            DB::table('agents')->where('id', auth()->user()->id)->update(['active' => 1]);
        }else{
            DB::table('agents')->where('id', auth()->user()->id)->update(['active' => 0]);
        }
        
        $destination = $req->input('pname_search');
        $packages = DB::table('packages')
                    ->leftJoin('comments', function($join){
                        $join->on('comments.package_id', '=', 'packages.package_id');
                    })
                    ->leftjoin('bookings', function($join){
                        $join->on('bookings.package_id', '=', 'packages.package_id');
                    })
                    ->select('comments.*', 'packages.*', DB::raw('AVG(rating) as ratings_average'),
                            DB::raw('count(bookings.booking_id) as count_bookings'))
                    ->groupBy('comments.package_id', 'bookings.package_id')
                    ->where([['packages.agent_id', Auth::user()->id], 
                            ['packages.package_name', 'like', '%'.$destination.'%']])
                    ->orderBy('packages.created_at', 'desc')
                    ->paginate(8);  
        return view('Agent.Packages')->with(['packages' => $packages, 'diffHours' => $diffHours]);
    }

    public function editItineraries($package_id, $day){
        // $packages = Packages::find($package_id);
        $packages = DB::table('packages')
                    ->join('itinerary', 'packages.package_id', '=', 'itinerary.package_id')
                    ->where([['packages.package_id', $package_id], ['itinerary.day', $day]])
                    ->get();
        return view('Agent.editItineraries')->with(['packages' => $packages, 'day' => $day, 'package_id' => $package_id]);
    }


    public function updateItineraries(Request $request){
        $packages = Packages::find($request->input('package_id'));
            foreach ($request->file('day1_photo') as $media) {
                $destinationPath = public_path('public/uploads/files/');
                $extension = $media->getClientOriginalExtension();
                $filename = uniqid().'.'.$extension;
                $media->move($destinationPath, $filename);
            }
            
            DB::table('itinerary')->where([['package_id', $request->input('package_id')], ['day', $request->input('day')]])->delete();

            for($x = 0; $x < count($request->input('starttime')); ++$x){
                $itinerary =  new Itinerary;
                $itinerary->package_id = $request->input('package_id');
                $itinerary->starttime =  $request->input('starttime')[$x];
                $itinerary->endtime = $request->input('endtime')[$x];
                $itinerary->destination = $request->input('destination')[$x];
                $itinerary->dayPhoto = $filename;
                $itinerary->day = $request->input('day');
                $itinerary->lat = $request->input('lat')[$x];
                $itinerary->lng = $request->input('lng')[$x];
                $itinerary->save();
            }

        $days = 0;
        $day = $request->input('day');
        if($request->input('day') == $request->input('no_day')){
            return redirect("Agent/Packages/PackageDetails/".$packages->package_id."")->with('packages', $packages)
                ->with('updatedItinerary', 'Itinerary Successfully Updated!');
        }else{
            ++$day;
            return redirect("Agent/Packages/EditItineraries/".$packages->package_id."/".$day."");
        }
    }

    public function editPackage($package_id){
        $packages = Packages::find($package_id);
        $itineraries = Itinerary::find($package_id);
 
        return view('Agent.editPackage')->with(['packages' => $packages, 'itineraries' => $packages]);
    }
    
    public function updatePackage(Request $request, $package_id){
        if($request->input('days') == 0){
            return redirect()->back()->with('InvalidDay', 'Error! The day you inputted is (0)zero!');
        }else{
            if (Input::file('photo')->isValid()) {
                $destinationPath = public_path('public/uploads/files/');
                $extension = Input::file('photo')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;

                Input::file('photo')->move($destinationPath, $fileName);
            }

            if($request->input('type') == 'Joined'){
                $categoriesString = implode(", ", $request->get('categories'));
                $itineraries= Itinerary::find($package_id);
                $packages = Packages::find($package_id);
                $packages->package_name = $request->input('package_name');
                $packages->days = $request->input('days');
                $packages->adult_price = $request->input('adult_price');
                $packages->child_price = $request->input('child_price');
                $packages->infant_price = $request->input('infant_price');
                $packages->pax1 = NULL;
                $packages->pax1_price = NULL;
                $packages->pax2 = NULL;
                $packages->pax2_price = NULL;
                $packages->pax3 = NULL;
                $packages->pax3_price = NULL;
                $packages->excess_price = NULL;
                $packages->inclusions = $request->input('inclusions');
                $packages->add_info = $request->input('add_info');
                $packages->reminders = $request->input('reminders');
                $packages->categories = $categoriesString;
                $packages->photo = $fileName;
                $packages->save();
            }else{
                $categoriesString = implode(",", $request->get('categories'));
                $itineraries= Itinerary::find($package_id);
                $packages = Packages::find($package_id);
                $packages->package_name = $request->input('package_name');
                $packages->days = $request->input('days');
                $packages->type = $request->input('type');
                $packages->adult_price = NULL;
                $packages->child_price = NULL;
                $packages->infant_price = NULL; 
                $packages->pax1 = $request->input('pax1');
                $packages->pax1_price = $request->input('pax1_price');
                $packages->pax2 = $request->input('pax2');
                $packages->pax2_price = $request->input('pax2_price');
                $packages->pax3 = $request->input('pax3');
                $packages->pax3_price = $request->input('pax3_price');
                $packages->excess_price = $request->input('excess_price');
                $packages->inclusions = $request->input('inclusions');
                $packages->add_info = $request->input('add_info');
                $packages->reminders = $request->input('reminders');
                $packages->categories = $categoriesString;
                $packages->photo = $fileName;
                $packages->save();

            }
        }
        return redirect("Agent/Packages/PackageDetails/".$package_id."")->with('updatedPackage', 'Tour Package Successfully Updated!');
    }

    public function deletePackage(Request $req){
        $package_id = $req->input('package_id');
        DB::table('packages')->where('package_id', $package_id)->delete();
        DB::table('itinerary')->where('package_id', $package_id)->delete();
        return redirect()->route('Agent.Packages')->with('deletedPackage', 'Package Deleted.');
    }

    public function cancelPackage($package_id){
        DB::table('packages')->where('package_id', $package_id)->delete();
        return redirect()->route('Agent.createPackage');
        
    }

    public function declineBooking($booking_id){
        Bookings::where('booking_id', $booking_id)->update(array('status' => 'Declined'));

        return redirect()->route('Agent.Bookings')->with('BookingDeclined', 'You have successfully declined a booking!');
    }
    
    public function acceptBooking($booking_id){
        Bookings::where('booking_id', $booking_id)->update(array('status' => 'Accepted'));

        return redirect()->route('Agent.Bookings')->with('BookingAccepted', 'You have successfully accepted a booking!');
    }

    public function createPackage(){
        return view ('Agent.createPackage');
    }

    public function createItineraries($package_id, $day){
        $packages = Packages::find($package_id);
        return view("Agent.createItineraries")->with(['packages' => $packages, 'day' => $day]);
    }

    public function viewPackage($package_id){
        $packages =  Packages::find($package_id);
        $booking = Bookings::find($package_id);

        $itineraries = DB::table('itinerary')
                    ->where('itinerary.package_id', $package_id)
                    ->orderBy('day', 'ASC')
                    ->orderBy('starttime', 'ASC')
                    ->get();
        $avg = DB::table('comments')->where('package_id', $package_id)->avg('rating');
        $comments = DB::table('comments')
                    ->join('packages', 'comments.package_id', '=', 'packages.package_id')
                    ->where('comments.package_id', $package_id)
                    ->get();

        $countCom = DB::table('comments')
                ->where('package_id', $package_id)
                ->count();
        
        $now = Carbon::now(); 

        $slots = DB::table('slots')
                    ->join('packages', 'slots.package_id', '=', 'packages.package_id')
                    ->where([['slots.package_id', $package_id],
                            ['slots.slots', '!=', '0'],
                            ['slots.date_from', '>=', $now]
                    ])
                    ->orderBy('slots.date_from', 'asc')
                    ->get();
        return view('Agent.packageDetails', ['packages' => $packages, 
                                                    'itineraries' => $itineraries, 
                                                    'avg' => $avg,
                                                    'booking' => $booking,
                                                    'comments' => $comments,
                                                    'countCom' => $countCom,
                                                    'slots' => $slots]);
    }

    public function viewRoutes($package_id, $day){
        $routes = DB::table('itinerary')
                ->where([['package_id', $package_id], ['day', $day]])
                ->orderBy('starttime')
                ->get();
        return view('Agent.ViewRoutes')->with('routes', $routes);
    }

    public function editAgent($id){
        $agents = Agents::find($id);
 
        return View::make('\Agent\EditAgent', ['agents' => $agents]);
     }

    public function updateAgent(Request $request, $id){
        $fileName = 'null';
        if (Input::file('agentPhoto')) {
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('agentPhoto')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
    
            Input::file('agentPhoto')->move($destinationPath, $fileName);
        }

        $agents = Agents::find($id);
        $agents->company = $request->input('company');
        $agents->name = $request->input('name');
        $agents->position = $request->input('position');
        $agents->contactNo = $request->input('contactNo');
        $agents->email = $request->input('email');
        $agents->agentPhoto = $fileName;

        $agents->save();
        
        return redirect('Agent/Agents')->with('success', 'Updated');
    }

    public function addSlots($package_id){
        $packages = Packages::find($package_id);
        return view('Agent.AddSlots')->with('packages', $packages);
    }

    public function updateSlots(Request $request){
        $packages= Packages::find($request->input('package_id'));

        if($packages->days == 1){
            $slots = new Slots;
            $slots->package_id = $request->input('package_id');
            $slots->date_to = $request->input('date_to');
            $slots->date_from = $request->input('date_from');
            $slots->slots = $request->input('slots');
            $slots->save();
        }else{
            $from  = new Carbon($request->input('date_from'));
            $to  = new Carbon($request->input('date_to'));
            $diff = $from->diffInDays($to);

            if($diff == (($packages->days) - 1)){
                $slots = new Slots;
                $slots->package_id = $request->input('package_id');
                $slots->date_to = $request->input('date_to');
                $slots->date_from = $request->input('date_from');
                $slots->slots = $request->input('slots');
                $slots->save();
            }else{
                return redirect()->back()->with('ErrorSlots', 'Invalid Dates!');
            }
        }
        return redirect()->back()->with('slotsAdded', 'Successfully Added Slots!');
    } 
       

    public function showMessages(){
        $agent_email = Auth::user()->email;
        $messages = DB::table('messages')
                    ->join('travelers', 'messages.sender_email', '=', 'travelers.email')
                    ->join('packages', 'messages.package_id', '=', 'packages.package_id')
                    ->select('messages.*', 'travelers.fname', 'travelers.photo','travelers.lname', 'packages.package_name')
                    ->where('receiver_email', $agent_email)
                    ->orderBy('created_at', 'desc')->paginate(5);

        $messagesCount = DB::table('messages')->where([['receiver_email', $agent_email],['status', 0]])->count();
        return view('Agent.ShowMessages')->with(['messages' => $messages, 'messagesCount' => $messagesCount]);
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

    public function showSentMessages(){
        
        $agent_email = Auth::user()->email;
        $messages = DB::table('messages')
            ->join('travelers', 'messages.receiver_email', '=', 'travelers.email')
            ->join('packages', 'messages.package_id', '=', 'packages.package_id')
            ->select('messages.*', 'travelers.fname', 'travelers.lname', 'travelers.photo','packages.package_name')
            ->where('sender_email', $agent_email)
            ->orderBy('created_at', 'desc')->paginate(5);

        $messagesCount = DB::table('messages')->where([['receiver_email', $agent_email],['status', 0]])->count();
        return view('Agent.SentMessages')->with(['messages' => $messages, 'messagesCount' => $messagesCount]);
        // dd($messages);
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
        
        $agents = Agents::find($user_id);
        $agents->fname = $request->input('fname');
        $agents->lname = $request->input('lname');
        $agents->job_position = $request->input('job_position');
        $agents->contact_no = $request->input('contact_no');
        $agents->email = $request->input('email');
        $agents->office_address = $request->input('office_address');
        $agents->lat = $request->input('lat');
        $agents->lng = $request->input('lng');
        $agents->city = $request->input('city');
        $agents->photo = $fileName;
        $agents->save();

        return redirect()->back()->with('updatedProfile', 'You have successfully updated your profile!');
    }

    public function openBooking($booking_id, $package_id){

        $bookings = DB::table('bookings')
                    ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
                    ->join('bills', 'bookings.booking_id', '=', 'bills.booking_id')
                    ->where([['bookings.booking_id', $booking_id],
                            ['bookings.package_id', $package_id]])
                    ->get();

        return view ('Agent.OpenBooking')->with('bookings', $bookings);
    }

    public function deleteSlot(Request $request){
        $slot_id = $request->input('id');
        DB::table('slots')->where('id', $slot_id)->delete();

        return redirect()->back()->with('SlotDeleted', 'You have successfully deleted a slot!');
    }

    public function deleteBooking(Request $request){
        $booking_id = $request->input('booking_id');
        DB::table('bookings')->where('booking_id', $booking_id)->delete();

        return redirect()->back()->with('BookingDeleted', 'You have successfully deleted a booking request!');
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

    public function showEditProfile(){
        return view('Agent.EditProfile');
    }
    
}