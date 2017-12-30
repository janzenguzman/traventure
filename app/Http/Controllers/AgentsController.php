<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Packages;
use App\Itineraries;
use App\Slots;
use App\Bookings;
use App\Travels;
use App\Agents as Agents;
use DB;
use View;

class AgentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showBookings(){
        $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.package_id')
            ->orderBy('bookings.created_at', 'desc')
            ->get();

        return view('\Agent\Bookings')->with('bookings', $bookings);
    }

    public function showMessages(){
        return view ('\Agent\Messages');
    }

    public function storePackage(Request $request){
        $categoriesString = implode(",", $request->get('categories'));
        $packages = new Packages(array(
            'package_name' => $request->get('package_name'),
            'days' => $request->get('days'),
            'adult_price' => $request->get('adult_price'),
            'child_price' => $request->get('child_price'),
            'infant_price' => $request->get('infant_price'),
            'excess_price' => $request->get('excess_price'),
            'type' => $request->get('type'),
            'pax1' => $request->get('pax1'),
            'pax1_price' => $request->get('pax1_price'),
            'pax2' => $request->get('pax2'),
            'pax2_price' => $request->get('pax2_price'),
            'pax3' => $request->get('pax3'),
            'pax3_price' => $request->get('pax3_price'),
            'inclusions' => $request->get('inclusions'),
            'add_info' => $request->get('add_info'),
            'reminders' => $request->get('reminders'),
            'categories' => $categoriesString
        ));

        $packages->save();

        return view('Agent.CreateItineraries')->with('packages', $packages);
    }

    public function storeItineraries(Request $request){
        $day1_photo = 'null';
        // if (Input::file('day1_photo')->isValid()) {
        if ($request->hasFile('day1_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day1_photo')->getClientOriginalExtension();
            $day1_photo = uniqid().'.'.$extension;
    
            Input::file('day1_photo')->move($destinationPath, $day1_photo);
        }

        $day2_photo = 'null';
        // if (Input::file('day2_photo')->isValid()) {
            if ($request->hasFile('day2_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day2_photo')->getClientOriginalExtension();
            $day2_photo = uniqid().'.'.$extension;
    
            Input::file('day2_photo')->move($destinationPath, $day2_photo);
        }

        $day3_photo = 'null';
        // if (Input::file('day3_photo')->isValid()) {
            if ($request->hasFile('day3_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day3_photo')->getClientOriginalExtension();
            $day3_photo = uniqid().'.'.$extension;
    
            Input::file('day3_photo')->move($destinationPath, $day3_photo);
        }

        $day4_photo = 'null';
        // if (Input::file('day4_photo')->isValid()) {
            if ($request->hasFile('day4_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day4_photo')->getClientOriginalExtension();
            $day4_photo = uniqid().'.'.$extension;
    
            Input::file('day4_photo')->move($destinationPath, $day4_photo);
        }

        $day5_photo = 'null';
        // if (Input::file('day5_photo')->isValid()) {
            if ($request->hasFile('day5_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day5_photo')->getClientOriginalExtension();
            $day5_photo = uniqid().'.'.$extension;
    
            Input::file('day5_photo')->move($destinationPath, $day5_photo);
        }

        $packages = Packages::all();
        $itineraries =  new Itineraries;
        $itineraries->package_id = $request->input('package_id');

        // Day 1
        $itineraries->day1_starttime1 = $request->input('day1_starttime1');
        $itineraries->day1_endtime1 = $request->input('day1_endtime1');
        $itineraries->day1_destination1 = $request->input('day1_destination1');
        $itineraries->day1_starttime2 = $request->input('day1_starttime2');
        $itineraries->day1_endtime2= $request->input('day1_endtime2');
        $itineraries->day1_destination2 = $request->input('day1_destination2');
        $itineraries->day1_starttime3 = $request->input('day1_starttime3');
        $itineraries->day1_endtime3= $request->input('day1_endtime3');
        $itineraries->day1_destination3 = $request->input('day1_destination3');
        $itineraries->day1_starttime4 = $request->input('day1_starttime4');
        $itineraries->day1_endtime4= $request->input('day1_endtime4');
        $itineraries->day1_destination4 = $request->input('day1_destination4');
        $itineraries->day1_starttime5 = $request->input('day1_starttime5');
        $itineraries->day1_endtime5= $request->input('day1_endtime5');
        $itineraries->day1_destination5 = $request->input('day1_destination5');
        $itineraries->day1_photo = $day1_photo;

        // Day 2
        $itineraries->day2_starttime1 = $request->input('day2_starttime1');
        $itineraries->day2_endtime1= $request->input('day2_endtime1');
        $itineraries->day2_destination1 = $request->input('day2_destination1');
        $itineraries->day2_starttime2 = $request->input('day2_starttime2');
        $itineraries->day2_endtime2= $request->input('day2_endtime2');
        $itineraries->day2_destination2 = $request->input('day2_destination2');
        $itineraries->day2_starttime3 = $request->input('day2_starttime3');
        $itineraries->day2_endtime3= $request->input('day2_endtime3');
        $itineraries->day2_destination3 = $request->input('day2_destination3');
        $itineraries->day2_starttime4 = $request->input('day2_starttime4');
        $itineraries->day2_endtime4= $request->input('day2_endtime4');
        $itineraries->day2_destination4 = $request->input('day2_destination4');
        $itineraries->day2_starttime5 = $request->input('day2_starttime5');
        $itineraries->day2_endtime5= $request->input('day2_endtime5');
        $itineraries->day2_destination5 = $request->input('day2_destination5');
        $itineraries->day2_photo = $day2_photo;

        // Day 3
        $itineraries->day3_starttime1 = $request->input('day3_starttime1');
        $itineraries->day3_endtime1= $request->input('day3_endtime1');
        $itineraries->day3_destination1 = $request->input('day3_destination1');
        $itineraries->day3_starttime2 = $request->input('day3_starttime2');
        $itineraries->day3_endtime2= $request->input('day3_endtime2');
        $itineraries->day3_destination2 = $request->input('day3_destination2');
        $itineraries->day3_starttime3 = $request->input('day3_starttime3');
        $itineraries->day3_endtime3= $request->input('day3_endtime3');
        $itineraries->day3_destination3 = $request->input('day3_destination3');
        $itineraries->day3_starttime4 = $request->input('day3_starttime4');
        $itineraries->day3_endtime4= $request->input('day3_endtime4');
        $itineraries->day3_destination4 = $request->input('day3_destination4');
        $itineraries->day3_starttime5 = $request->input('day3_starttime5');
        $itineraries->day3_endtime5= $request->input('day3_endtime5');
        $itineraries->day3_destination5 = $request->input('day3_destination5');
        $itineraries->day3_photo = $day3_photo;

        // Day 4
        $itineraries->day4_starttime1 = $request->input('day4_starttime1');
        $itineraries->day4_endtime1= $request->input('day4_endtime1');
        $itineraries->day4_destination1 = $request->input('day4_destination1');
        $itineraries->day4_starttime2 = $request->input('day4_starttime2');
        $itineraries->day4_endtime2= $request->input('day4_endtime2');
        $itineraries->day4_destination2 = $request->input('day4_destination2');
        $itineraries->day4_starttime3 = $request->input('day4_starttime3');
        $itineraries->day4_endtime3= $request->input('day4_endtime3');
        $itineraries->day4_destination3 = $request->input('day4_destination3');
        $itineraries->day4_starttime4 = $request->input('day4_starttime4');
        $itineraries->day4_endtime4= $request->input('day4_endtime4');
        $itineraries->day4_destination4 = $request->input('day4_destination4');
        $itineraries->day4_starttime5 = $request->input('day4_starttime5');
        $itineraries->day4_endtime5= $request->input('day4_endtime5');
        $itineraries->day4_destination5 = $request->input('day4_destination5');
        $itineraries->day4_photo = $day4_photo;

        // Day 5
        $itineraries->day5_starttime1 = $request->input('day5_starttime1');
        $itineraries->day5_endtime1= $request->input('day5_endtime1');
        $itineraries->day5_destination1 = $request->input('day5_destination1');
        $itineraries->day5_starttime2 = $request->input('day5_starttime2');
        $itineraries->day5_endtime2= $request->input('day5_endtime2');
        $itineraries->day5_destination2 = $request->input('day5_destination2');
        $itineraries->day5_starttime3 = $request->input('day5_starttime3');
        $itineraries->day5_endtime3= $request->input('day5_endtime3');
        $itineraries->day5_destination3 = $request->input('day5_destination3');
        $itineraries->day5_starttime4 = $request->input('day5_starttime4');
        $itineraries->day5_endtime4= $request->input('day5_endtime4');
        $itineraries->day5_destination4 = $request->input('day5_destination4');
        $itineraries->day5_starttime5 = $request->input('day5_starttime5');
        $itineraries->day5_endtime5= $request->input('day5_endtime5');
        $itineraries->day5_destination5 = $request->input('day5_destination5');
        $itineraries->day5_photo = $day5_photo;
        
        $itineraries->save();

        return view('\Agent\Packages')->with('packages', $packages);
    }
    
    public function showPackages(){
        $packages =  Packages::all();
        return view('\Agent\Packages')->with('packages', $packages);
    }

    public function editItineraries($package_id){
        $itineraries = Itineraries::find($package_id);
        $packages = Packages::find($package_id);
 
        return view('\Agent\EditItineraries')->with(['itineraries' => $itineraries, 'packages' => $packages]);
     }

    public function updateItineraries(Request $request, $package_id){
        $day1_photo = 'null';
        // if (Input::file('day1_photo')->isValid()) {
        if ($request->hasFile('day1_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day1_photo')->getClientOriginalExtension();
            $day1_photo = uniqid().'.'.$extension;
    
            Input::file('day1_photo')->move($destinationPath, $day1_photo);
        }

        $day2_photo = 'null';
        // if (Input::file('day2_photo')->isValid()) {
            if ($request->hasFile('day2_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day2_photo')->getClientOriginalExtension();
            $day2_photo = uniqid().'.'.$extension;
    
            Input::file('day2_photo')->move($destinationPath, $day2_photo);
        }

        $day3_photo = 'null';
        // if (Input::file('day3_photo')->isValid()) {
            if ($request->hasFile('day3_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day3_photo')->getClientOriginalExtension();
            $day3_photo = uniqid().'.'.$extension;
    
            Input::file('day3_photo')->move($destinationPath, $day3_photo);
        }

        $day4_photo = 'null';
        // if (Input::file('day4_photo')->isValid()) {
            if ($request->hasFile('day4_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day4_photo')->getClientOriginalExtension();
            $day4_photo = uniqid().'.'.$extension;
    
            Input::file('day4_photo')->move($destinationPath, $day4_photo);
        }

        $day5_photo = 'null';
        // if (Input::file('day5_photo')->isValid()) {
            if ($request->hasFile('day5_photo')){
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('day5_photo')->getClientOriginalExtension();
            $day5_photo = uniqid().'.'.$extension;
    
            Input::file('day5_photo')->move($destinationPath, $day5_photo);
        }

        $itineraries = Itineraries::find($package_id);
        $itineraries->package_id = $request->input('package_id');

        // Day 1
        $itineraries->day1_starttime1 = $request->input('day1_starttime1');
        $itineraries->day1_endtime1 = $request->input('day1_endtime1');
        $itineraries->day1_destination1 = $request->input('day1_destination1');
        $itineraries->day1_starttime2 = $request->input('day1_starttime2');
        $itineraries->day1_endtime2= $request->input('day1_endtime2');
        $itineraries->day1_destination2 = $request->input('day1_destination2');
        $itineraries->day1_starttime3 = $request->input('day1_starttime3');
        $itineraries->day1_endtime3= $request->input('day1_endtime3');
        $itineraries->day1_destination3 = $request->input('day1_destination3');
        $itineraries->day1_starttime4 = $request->input('day1_starttime4');
        $itineraries->day1_endtime4= $request->input('day1_endtime4');
        $itineraries->day1_destination4 = $request->input('day1_destination4');
        $itineraries->day1_starttime5 = $request->input('day1_starttime5');
        $itineraries->day1_endtime5= $request->input('day1_endtime5');
        $itineraries->day1_destination5 = $request->input('day1_destination5');
        $itineraries->day1_photo = $day1_photo;

        // Day 2
        $itineraries->day2_starttime1 = $request->input('day2_starttime1');
        $itineraries->day2_endtime1= $request->input('day2_endtime1');
        $itineraries->day2_destination1 = $request->input('day2_destination1');
        $itineraries->day2_starttime2 = $request->input('day2_starttime2');
        $itineraries->day2_endtime2= $request->input('day2_endtime2');
        $itineraries->day2_destination2 = $request->input('day2_destination2');
        $itineraries->day2_starttime3 = $request->input('day2_starttime3');
        $itineraries->day2_endtime3= $request->input('day2_endtime3');
        $itineraries->day2_destination3 = $request->input('day2_destination3');
        $itineraries->day2_starttime4 = $request->input('day2_starttime4');
        $itineraries->day2_endtime4= $request->input('day2_endtime4');
        $itineraries->day2_destination4 = $request->input('day2_destination4');
        $itineraries->day2_starttime5 = $request->input('day2_starttime5');
        $itineraries->day2_endtime5= $request->input('day2_endtime5');
        $itineraries->day2_destination5 = $request->input('day2_destination5');
        $itineraries->day2_photo = $day2_photo;

        // Day 3
        $itineraries->day3_starttime1 = $request->input('day3_starttime1');
        $itineraries->day3_endtime1= $request->input('day3_endtime1');
        $itineraries->day3_destination1 = $request->input('day3_destination1');
        $itineraries->day3_starttime2 = $request->input('day3_starttime2');
        $itineraries->day3_endtime2= $request->input('day3_endtime2');
        $itineraries->day3_destination2 = $request->input('day3_destination2');
        $itineraries->day3_starttime3 = $request->input('day3_starttime3');
        $itineraries->day3_endtime3= $request->input('day3_endtime3');
        $itineraries->day3_destination3 = $request->input('day3_destination3');
        $itineraries->day3_starttime4 = $request->input('day3_starttime4');
        $itineraries->day3_endtime4= $request->input('day3_endtime4');
        $itineraries->day3_destination4 = $request->input('day3_destination4');
        $itineraries->day3_starttime5 = $request->input('day3_starttime5');
        $itineraries->day3_endtime5= $request->input('day3_endtime5');
        $itineraries->day3_destination5 = $request->input('day3_destination5');
        $itineraries->day3_photo = $day3_photo;

        // Day 4
        $itineraries->day4_starttime1 = $request->input('day4_starttime1');
        $itineraries->day4_endtime1= $request->input('day4_endtime1');
        $itineraries->day4_destination1 = $request->input('day4_destination1');
        $itineraries->day4_starttime2 = $request->input('day4_starttime2');
        $itineraries->day4_endtime2= $request->input('day4_endtime2');
        $itineraries->day4_destination2 = $request->input('day4_destination2');
        $itineraries->day4_starttime3 = $request->input('day4_starttime3');
        $itineraries->day4_endtime3= $request->input('day4_endtime3');
        $itineraries->day4_destination3 = $request->input('day4_destination3');
        $itineraries->day4_starttime4 = $request->input('day4_starttime4');
        $itineraries->day4_endtime4= $request->input('day4_endtime4');
        $itineraries->day4_destination4 = $request->input('day4_destination4');
        $itineraries->day4_starttime5 = $request->input('day4_starttime5');
        $itineraries->day4_endtime5= $request->input('day4_endtime5');
        $itineraries->day4_destination5 = $request->input('day4_destination5');
        $itineraries->day4_photo = $day4_photo;

        // Day 5
        $itineraries->day5_starttime1 = $request->input('day5_starttime1');
        $itineraries->day5_endtime1= $request->input('day5_endtime1');
        $itineraries->day5_destination1 = $request->input('day5_destination1');
        $itineraries->day5_starttime2 = $request->input('day5_starttime2');
        $itineraries->day5_endtime2= $request->input('day5_endtime2');
        $itineraries->day5_destination2 = $request->input('day5_destination2');
        $itineraries->day5_starttime3 = $request->input('day5_starttime3');
        $itineraries->day5_endtime3= $request->input('day5_endtime3');
        $itineraries->day5_destination3 = $request->input('day5_destination3');
        $itineraries->day5_starttime4 = $request->input('day5_starttime4');
        $itineraries->day5_endtime4= $request->input('day5_endtime4');
        $itineraries->day5_destination4 = $request->input('day5_destination4');
        $itineraries->day5_starttime5 = $request->input('day5_starttime5');
        $itineraries->day5_endtime5= $request->input('day5_endtime5');
        $itineraries->day5_destination5 = $request->input('day5_destination5');
        $itineraries->day5_photo = $day5_photo;
        
        $itineraries->save();

        return redirect('Agent/Packages')->with('itineraries', $itineraries);
        

    }

    public function editPackage($package_id){
        $packages = Packages::find($package_id);
        $itineraries = Itineraries::find($package_id);
 
        return view('\Agent\EditPackage')->with(['packages' => $packages, 'itineraries' => $packages]);
    }
    
    public function updatePackage(Request $request, $package_id){
        $categoriesString = implode(",", $request->get('categories'));
        $itineraries= Itineraries::find($package_id);
        $packages = Packages::find($package_id);
        $packages->package_name = $request->input('package_name');
        $packages->days = $request->input('days');
        $packages->adult_price = $request->input('adult_price');
        $packages->child_price = $request->input('child_price');
        $packages->infant_price = $request->input('infant_price');
        $packages->excess_price = $request->input('excess_price');
        $packages->type = $request->input('type');
        $packages->pax1 = $request->input('pax1');
        $packages->pax1_price = $request->input('pax1_price');
        $packages->pax2 = $request->input('pax2');
        $packages->pax2_price = $request->input('pax2_price');
        $packages->pax3 = $request->input('pax3');
        $packages->pax3_price = $request->input('pax3_price');
        $packages->inclusions = $request->input('inclusions');
        $packages->add_info = $request->input('add_info');
        $packages->reminders = $request->input('reminders');
        $packages->categories = $categoriesString;
        $packages->save();
        
        return view('Agent.EditItineraries')->with(['packages' => $packages, 'itineraries' => $itineraries]);
    }

    public function deletePackage($package_id){
        DB::table('packages')->where('package_id', $package_id)->delete();
        DB::table('itineraries')->where('package_id', $package_id)->delete();
        return redirect()->route('Agent.Packages');
    }

    public function declineBooking($booking_id){
        Bookings::where('booking_id', $booking_id)->update(array('status' => 'Declined'));

        return redirect()->route('Agent.Bookings');
    }
    
    public function acceptBooking($booking_id){
        Bookings::where('booking_id', $booking_id)->update(array('status' => 'Accepted'));

        return redirect()->route('Agent.Bookings');
    }

    public function itinerary(){
        return view ('\Agent\Itinerary');
    }

    public function createPackage(){
        return view ('\Agent\CreatePackage');
    }

    public function createItineraries(){
        $packages = Packages::all();
        return view ('\Agent\CreateItineraries')->with('packages', $packages);
    }

    public function showAgents(){
        $agents =  Agents::all();
        return view('\Agent\Agents')->with('agents', $agents);
    }

    public function viewProfile($id){
        $agents =  Agents::find($id);
        return view('\Agent\ViewProfile')->with('agents', $agents);
    }

    public function viewPackage($package_id){
        $packages =  Packages::find($package_id);
        $itineraries = Itineraries::find($package_id);
        return View::make('\Agent\PackageDetails', ['packages' => $packages, 'itineraries' => $itineraries]);
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

        $packages = Packages::all();

        $slots = new Slots;
        $slots->package_id = $request->input('package_id');      
        $slots->date_to = $request->input('date_to');
        $slots->date_from = $request->input('date_from');
        $slots->slots = $request->input('slots');

        $slots->save();
        
        return redirect('Agent/Packages')->with('packages', $packages);
    }
}