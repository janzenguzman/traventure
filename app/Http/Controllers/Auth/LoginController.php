<?php

namespace App\Http\Controllers\Auth;

use FarhanWazir\GoogleMaps\GMaps;
use Auth;
use App\Travelers;
use App\Agents;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
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
    protected $redirectTo = 'Traveler/Explore';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:travelers')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.TravelerLogin');
    }

    public function login(Request $request)
    {
        //Validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        //Attempt to log the user in
        if(Auth::guard('travelers')->attempt(['email' => $request->email,
                'password' => $request->password], $request->remember))
        {
            //if successful to the intended location
            return redirect()->route('Traveler.Explore');
        }else{
            // return $request->expectsJson()
            //     ? response()->json(['message' => $exception->getMessage()], 401)
            //     : redirect()->guest(route('AgentLogin'));
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }
    public function showRegisterForm(){
        return view ('auth.TravelerRegister');
    }

    public function logout(Request $request)
    {
        Auth::guard('travelers')->logout();
        
        return view('landing');
    }
}
