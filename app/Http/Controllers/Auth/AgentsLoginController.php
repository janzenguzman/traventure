<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Travelers;
use App\Agents;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AgentsLoginController extends Controller
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
    protected $redirectTo = '/Agents/Packages';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agents')->except('logout');
    }

    public function login(Request $request)
    {
        //Validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        //Attempt to log the user in
        if(Auth::guard('agents')->attempt(['email' => $request->email,
                'password' => $request->password, 'status' => 'Accepted'], $request->remember))
        {
            //if successful to the intended location
            return redirect()->route('Agent.Packages');
        }elseif(Auth::guard('agents')->attempt(['email' => $request->email,
                    'password' => $request->password, 'status' => 'Pending'], $request->remember)){

                //if status is pending
                return redirect()->guest(route('AgentLogin'))->with('pending_status', 'Your sign up request is still pending. Please
                        wait for the admins email.');
        }else{
            // return $request->expectsJson()
            //     ? response()->json(['message' => $exception->getMessage()], 401)
            //     : redirect()->guest(route('AgentLogin'));
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
        
        //if unsuccessful redirect back to the login form
        //return redirect()->back()->withInputs($request->only('email', 'remember'));
        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ]);
    }

    public function showRegisterForm(){
        return view ('auth.AgentRegister');
    }

    public function showLoginForm(){
        return view ('auth.AgentLogin');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('agents')->logout();
        
        return view('landing');
    }
}
