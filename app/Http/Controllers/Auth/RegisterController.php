<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;  

use Carbon\Carbon;
use App\Travelers;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Traveler/Explore';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'gender' => 'required|string|max:150',
            'username' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:travelers',
            'contact_no' => 'required|string|min:11|max:11',
            'password' => 'required|string|min:6|confirmed',
            'birthday' => 'required|date',
            //'photo' => 'required|string|max:191',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Travelers
     */
    protected function create(array $data)
    {
        $fileName = 'null';
        if (Input::file('photo')->isValid()) {
            $destinationPath = public_path('public/uploads/files/');
            $extension = Input::file('photo')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
    
            Input::file('photo')->move($destinationPath, $fileName);
        }
        
        $last_signed_in = Carbon::now();
        $traveler = Travelers::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'], 
            'gender' => $data['gender'],
            'username' => $data['username'],           
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'password' => bcrypt($data['password']),
            'birthday' => $data['birthday'],
            'photo' => $fileName,
            'last_signed_in' => $last_signed_in,
        ]);

        return $traveler;
    }

    



}
