<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Travelers;
use App\Agents;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/foo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])){   
                if(Agents::where('email', $request->email)->first()){
                    return redirect()->route('Agent.HomePage');
                }else if(Travelers::where('email', $request->email)->first()){
                    return redirect()->route('Traveler.HomePage');
                }   
            }
            else{
                return redirect()->route('login');
            }
    }
    
}
