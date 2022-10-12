<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;


class TermsConditionsController extends Controller
{
    public function index()
	{
		$allInput = Terms::select('terms_conditions.*')
		                    ->orderBy('terms_conditions.created_at','ASC')->get();
							
		return view("terms.index")->with(array('allInput'=>$allInput));
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$dataInsert		=	array('title'		=> $data['title'],
									  'description' => $data['description'],
									  'status'		=> $data['status']);
			Terms::create($dataInsert);
			return redirect("TermsConditions")->with('message', 'Terms And Condition Successfully Added');
		}
		
		return view("terms.add");
	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$promo 			= 	Terms::find($id);
			
			$dataInsert		=	array('title'				=> $data['title'],
									  'description' 		=> $data['description'],
									  'status'				=> $data['status']);
			$promo->update($dataInsert);
			return redirect("TermsConditions")->with('message', 'Terms And Condition Successfully Edited');
		}
		
		$editInfo = Terms::findOrFail($id);
		return view("terms.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$trms	= Terms::find($id);
        $trms->delete();
		
		return redirect("TermsConditions")->with('message', 'Terms And Conditions Successfully Deleted');
	}
	
	public function changeStatus(Request $request)
	{
		$data 		= $request->all();
		$status 	= $data['status']; 
		$id 		= $data['id'];
		$datadriver = array('status' => $status);
		$terms 	= Terms::find($id);
		$res = $terms->update($datadriver);
	}
	
	

}
