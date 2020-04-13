<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class VerificationController extends Controller
{
    public function verify($token)
    {
    	$user=User::where('remember_token',$token)->first();
    	if(!is_null($user)){
    		$user->status=1;
    		$user->remember_token=NULL;
    		$user->email_verified_at=Carbon::now();
    		$user->save();
    		session()->flash('success','You are registered successfuly !! Login Now');
    		return redirect('login');
    	}else{
    		session()->flash('errors','Sorry !! Your token  is not matched');
    		return redirect('/');
    	}

    }
}
