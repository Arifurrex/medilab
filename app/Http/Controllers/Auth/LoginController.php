<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\verifyRegistration;

use App\Models\User;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    { 
        // dd('tt');
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // fnd user by ths email

        $user = User::Where('email',$request->email) ->first();

        if($user->status==1){

            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' =>  $request->password], $request->remember)){
               // log hm now
                return redirect()->intended(route('index'));
            }else{
                // send hm a token agan
           if(!is_null($user)){
            $user->notify( new verifyRegistration($user));
       session()->flash('success','A new confirmation email has sent to you ! Please check and confirm your email');
       return redirect('/');
           }else{
             session()->flash('error!','please log first !!');
       return redirect()->route('login');
           }
            }
        }
    }
}
