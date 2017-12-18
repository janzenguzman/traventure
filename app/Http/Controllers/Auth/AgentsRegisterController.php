<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;  

use App\Agents;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/Agent/HomePage';

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

        $agent = Agents::create([
            'company_name' => $data['company_name'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'job_position' => $data['job_position'],
            'contact_no' => $data['contact_no'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => 'Pending',
            'active' => '0',
        ]);
        
        return $agent;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect(route('AgentLogin'));
    }
}
