<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Customers;


class InviteFriendController  extends Controller
{ 
	public function __construct()
    {
        //$this->middleware('guest');
    }
	
    public function inviteFriend(Request $request)
	{
		if($request->isMethod('post')){
			$data = $request->all();
			
			Customers::create([
				'invitation_code' => $data['invitation_code'],
				'name' => $data['name'],
				'email_address' => $data['email'],
				'password' => Hash::make($data['password']),
				'country_id' => $data['country'],
				]);
				
			return redirect("inviteFriend")->with('message', 'Successfully registered User');		
			
		}
		return view("invite-friend.invite-login")->with(array('referer'=>request()->r));
	}
	
	

}
