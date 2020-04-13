<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\VerifyRegistration;
use App\Models\User;
use Illuminate\Http\Request;
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

        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required',
        ]);
        //Find user by this email
        $user=User::where('email',$request->email)->first();
        // dd($user);
        
        // if($user->status == 1){
        //     if(Auth::/*guard('wed')->*/attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
        //         return redirect()->intended(route('index'));
        //     }
        // }else{
        //     if(!is_null($user)){
        //         $user->notify(new VerifyRegistration($user));
        //         session()->flash('success','A new congirmation email has send to you... Please check and comfirm your email');
        //         return redirect('/login');
        //     }else{
        //         session()->flash('errors','Please login first');
        //         return redirect()->route('login');

        //     }
        // }
        
        if(isset($user)){
            if($user->status==1){
                if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
                    return redirect()->intended(route('index'));
                }
            }else{
                $user->notify(new VerifyRegistration($user));
                
                return redirect('/')->with('success','A new congirmation email has send to you... Please check and comfirm your email');
            }
        }else{
            
            return redirect()->route('login')->with('errors','Please login first');
        }


    }
        
}
