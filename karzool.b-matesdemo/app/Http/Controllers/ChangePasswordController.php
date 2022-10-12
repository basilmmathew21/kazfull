<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function index()
	{
		return view("changepassword.list");
	}
	
	
	public function edit(Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$changeInfo = array("password" => Hash::make($data['password']));
			$user 		= User::find(Auth::user()->id);
			
			$user->update($changeInfo);
			return redirect("/ChangePassword")->with('message', 'Password Successfully Changed');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$city = City::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		
		$editInfo = Branch::findOrFail($id);
		return view("branch.edit")->with(array('country'=>$country,'city'=>$city,'editInfo'=>$editInfo));
	}
	
	
}
