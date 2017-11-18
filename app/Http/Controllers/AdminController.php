<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showHomePage(){
        return view ('\Admin\HomePage');
    }

    public function showRequestsPage(){
        return view ('\Admin\RequestsPage');
    }

    public function showStatusPage(){
        return view ('\Admin\StatusPage');
    }

    public function showRegisterForm(){
        return view ('\Admin\Register');
    }

    public function showRequests(){
        $requests = DB::table('agents')->get();
        return view('\Admin\RequestsPage', compact('requests'));
    }
}
