<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        return view ('\Agent\HomePage');
    }

    public function showRegisterForm(){
        return view ('agentsRegister');
    }

    public function dateNow(){

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
}
