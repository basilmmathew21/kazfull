<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use DB;
use App\CarColor;


class CarColorController extends Controller
{
    
	public function index()
	{
		$allInput = CarColor::select('car_color.*')
		                    ->where('car_color.status','1')->orderBy('car_color.name','ASC')->get();
							
		return view("carcolor.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			// upload and resize using Intervention Image 
			
			$data = $request->all();	
			
			CarColor::create([
				'name' => $data['name'],
				'name_somali' => $data['name_somali'],
				'icon_color' => $data['icon_color'],
			 ]);
			 
			 return redirect("CarColor")->with('message', 'Car Color Successfully Added');
		}
		
		return view("carcolor.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$cc 		= CarColor::find($id);
			// upload and resize using Intervention Image 
			$cc->update($data);
			return redirect("CarColor")->with('message', 'Car Color Successfully Edited');
		}
		
		$editInfo = CarColor::findOrFail($id);
		return view("carcolor.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$cc = CarColor::find($id);
        $cc->delete();
		
		return redirect("CarColor")->with('message', 'Car Color Successfully Deleted');
	}
	
	public function ajaxdeleteAllCarColor(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('car_color')->whereIn('id',$allIds)->delete();
	}
	
	

}
