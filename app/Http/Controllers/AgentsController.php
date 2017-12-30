<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Agents;
use Auth;

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

    public function showHomePage(){

        $lastSignedIn = new Carbon(Auth::guard('agents')->user()->last_signed_in);
        $now = Carbon::now();
        $diffHours = $lastSignedIn->diffInHours($now);

        if($diffHours <= 1){
            DB::table('agents')->where('id', auth()->user()->id)->update(['active' => '1']);
        }else{
            DB::table('agents')->where('id', auth()->user()->id)->update(['active' => '0']);
        }
        return view('\Agent\HomePage', compact('diffHours'));
    }

    // public function showRegisterForm(){
    //     return view ('agentsRegister');
    // }

    public function showBookings(){
        return view ('\Agent\Bookings');
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

        $id = $request->input('message_id');
        DB::table('messages')->where('id', $id)->update(['status' => 1]); 

        return redirect()->back()->with('messageSent', 'Message sent!');
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
        $agents->photo = $fileName;
        $agents->save();

        return redirect()->back()->with('updatedProfile', 'You have successfully updated your profile!');
    }
}
