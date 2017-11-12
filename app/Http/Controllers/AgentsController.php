<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        return view('agents');
    }

    protected function showHomePage(){
        return view ('agentsHomePage');
    }
}
