<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Travelers;
use App\Agents;
use App\Comment;
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
    protected $redirectTo = 'Traveler/Explore';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.TravelerLogin');
    }

    // Janzen
    public function showRegisterForm()
    {
        return view('auth.TravelerRegister');
    }

    public function login(Request $request){
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])){   
                if(Agents::where('email', $request->email)->first()){
                    return redirect()->route('Agent.Packages');
                }else if(Travelers::where('email', $request->email)->first()){
                    return redirect()->route('Traveler.Explore');
                }   
            }
            else{
                return redirect()->route('login');
            }
    }

    //ajax sample
    public function storeComment(Request $req){
        if($req->ajax()){
           
            $comment = Comment::create($req->all());
            return response($comment);
        }
    }

    public function showAjax(){
        $comments = Comment::all();
        return view('auth/ajax')->with('comments',$comments);
    }
    
}
