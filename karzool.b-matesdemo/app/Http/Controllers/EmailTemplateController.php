<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

use App\EmailTemplate;

class EmailTemplateController extends Controller
{
    
	
	
	public function index()
	{
		
		
		$allInput = EmailTemplate::select('email_template.*')
										->get();
							
		return view("emailtemplate.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();	
			EmailTemplate::create($data);
			
			return redirect("EmailTemplate")->with('message', 'Email Template Successfully Added');
		}
		
		
		return view("emailtemplate.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$et 		= EmailTemplate::find($id);
			
			$et->update($data);
			return redirect("EmailTemplate")->with('message', 'Email Template Successfully Edited');
		}
		
		$editInfo = EmailTemplate::findOrFail($id);
		return view("emailtemplate.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$et = EmailTemplate::find($id);
        $et->delete();
		return redirect("EmailTemplate")->with('message', 'Email Template Successfully Deleted');
	}
}
