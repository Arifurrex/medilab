<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Division;
use App\Models\District;

class usersController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function dashboard(){
		$user=Auth::User();
		return view('Frontend.pages.users.dashboard',compact(
			'user'));
	}
	public function profile(){
		$user=Auth::User();
		$divisions =Division::orderBy('piority','asc')->get();
		$districts =district::orderBy('name','asc')->get();
		return view('Frontend.pages.users.profile',compact(
			'user','divisions','districts'));
	}

	public function profileupdate(Request $request){
    $user=Auth::user();


    $this->validate($request,[
    'first_name' =>'required|string|max:30',
    'last_name' =>'required|string|max:30',
    'username' =>'required|alpha_dash|max:100|unique:users,username,'.$user->id,
    'email' =>'required|string|email|max:100|unique:users,email,'.$user->id,
    'division_id' =>'required|numeric',
    'district_id' =>'required|numeric',
    'phone_no' =>'required|max:15|unique:users,phone_no,'.$user->id,
    'street_address' =>'required|max:100',


    ]);


        
		$user->first_name=$request->first_name;
		$user->last_name=$request->last_name;
		$user->username=$request->username;
		$user->phone_no=$request->phone_no;
		$user->division_id=$request->division_id;
		$user->district_id=$request->district_id;
		$user->street_address=$request->street_address;
		$user->shipping_address=$request->shipping_address;
		$user->ip_address=request()->ip();

		$user->save();
        session()->flash('success','user profile has updated succesfully');
		return back();
		  
	}


}