<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Auth;
use DB;

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
        // return view('Traveler.Packages');
        //     $packages = Package::all();
        //     $packages = DB::select('SELECT * FROM packages');
        //     $packages = Package::orderBy('created_at', 'desc')->take(1)->get();
        //     $packages = Package::orderBy('created_at', 'desc')->get();

         $packages = Package::orderBy('created_at', 'desc')->paginate(10);
         return view('Traveler.packages')->with('packages', $packages);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function showPackages($package_id)
    {
        $package = Package::find($package_id);
        return view('Traveler.show')->with('package', $package);
    }

    public function edit($package_id)
    {
        //
    }

    public function update(Request $request, $package_id)
    {
        //
    }

    public function destroy($package_id)
    {
        //
    }

    public function showContactNow()
    {
        return view('/Traveler/ContactNow');
    }
}
