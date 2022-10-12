<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

use App\Commision;


class CommisionController extends Controller
{
    
	public function index()
	{
		
		$commision = Commision::select('commision.*')
		                    ->where('commision.status','1')->first();
					
		return view("commision.index")->with(array('commision'=>$commision));
	}
	
	public function edit(Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			
			$commision 	= Commision::find($data['id']);
			$commision->update($data);
			return redirect("Commision")->with('message', 'Commision Successfully Edited');
		}
		
	}
	
}
