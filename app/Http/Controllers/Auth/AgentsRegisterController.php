<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;  

use App\Agents;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests; 

class AgentsRegisterController extends Controller
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
    protected $redirectTo = '/Agent/Packages';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agents'); 
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
            'company_name' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'job_position' => 'required|string|max:255',
            'contact_no' => 'required|string|min:11|max:11',
            'email' => 'required|string|email|max:255|unique:agents',
            'password' => 'required|string|min:6|confirmed',
            'office_address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Agents
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

        $agent = Agents::create([
            'company_name' => $data['company_name'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'job_position' => $data['job_position'],
            'contact_no' => $data['contact_no'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'photo' => $fileName,
            'status' => 'Pending',
            'active' => '0',
            'office_address' => $data['office_address'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'city' => $data['city'],
        ]);
        
        return $agent;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect(route('AgentsRegister'))->with('successful_signup', 'Sign up request was successfully sent! Please wait for the email from the admin.');
    }


}
