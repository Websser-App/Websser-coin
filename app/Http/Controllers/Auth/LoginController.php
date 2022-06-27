<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }  

    public function loginForm(Request $request){
        $validator = $request->validate([
            'phone' => 'required',
        ]);

        $user = User::where('phone', $request->phone)->first();
        if(!is_null($user)){
            if($user->isActive == 1){
                if($user->email != null && $user->password != null){
                    if($user->name != null && $user->surname != null && $user->second_surname != null && $user->country != null && $user->gender != null){
                        if($user->ine_front != null && $user->ine_back != null){
                            $credentials = $request->only('phone', 'password');
                            if (Auth::attempt($credentials)) {
                                Session::flash('message', __('Successful login'));
                                return redirect()->intended('home');
                                
                            } else {
                                Session::flash('message', __('Wrong phone and/or passwords'));
                                return redirect("login");
                            }
                            
                            } else {
                                Session::flash('message', __('Complete your registration to access'));
                            return view('auth.completedRegister')->with('user', $user);
                        }
                    } else {
                        Session::flash('message', __('Complete your registration to access'));
                        return view('auth.completedRegister')->with('user', $user);
                    }
                } else {
                    Session::flash('message', __('Complete your registration to access'));
                    return view('auth.completedRegister')->with('user', $user);
                }
            } else {
                $registerCode = new RegisterController;
                $registerCode->resendCode($user->id);
                Session::flash('message', __('Code forwarded'));
                return view('auth.resendCode')->with('user', $user)->with('message', __('Code forwarded'));
            }
        } else {
            Session::flash('message', __('Unregistered phone'));
            return redirect("login");
        }
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
        Session::flash('message', __('User logged out successfully'));
        return Redirect('login');
    }
}
