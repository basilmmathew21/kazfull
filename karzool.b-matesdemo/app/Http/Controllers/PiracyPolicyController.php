<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Piracy;


class PiracyPolicyController extends Controller
{
    public function index()
	{
		$allInput = Piracy::select('piracy_policy.*')
		                 ->orderBy('piracy_policy.created_at','ASC')->get();
							
		return view("piracy.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$dataInsert		=	array('title'		=> $data['title'],
									  'description' => $data['description'],
									  'status'		=> $data['status']);
			Piracy::create($dataInsert);
			return redirect("PiracyPolicy")->with('message', 'Piracy Policy Successfully Added');
		}
		
		return view("piracy.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$promo 			= 	Piracy::find($id);
			
			$dataInsert		=	array('title'				=> $data['title'],
									  'description' 		=> $data['description'],
									  'status'				=> $data['status']);
			$promo->update($dataInsert);
			return redirect("PiracyPolicy")->with('message', 'Piracy Policy Successfully Edited');
		}
		
		$editInfo = Piracy::findOrFail($id);
		return view("piracy.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$prcy	= Piracy::find($id);
        $prcy->delete();
		
		return redirect("PiracyPolicy")->with('message', 'Piracy Policy Successfully Deleted');
	}
	
	public function changeStatus(Request $request)
	{
		$data 		= $request->all();
		$status 	= $data['status']; 
		$id 		= $data['id'];
		$datadriver = array('status' => $status);
		$prcy 		= Piracy::find($id);
		$prcy->update($datadriver);
	}
	
	

}
