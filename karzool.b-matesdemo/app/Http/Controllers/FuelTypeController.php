<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use DB;
use App\FuelType;


class FuelTypeController extends Controller
{
    
	
	
	public function index()
	{
		$allInput = FuelType::select('car_fuel.*')
		                    ->where('car_fuel.status','1')->orderBy('car_fuel.name','ASC')->get();
							
		return view("carfuel.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				$filename = 'icon-'.time().'.jpg';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-icon/".$filename, 80);
			}
			$data = $request->all();	
				
			FuelType::create([
				'name' => $data['name'],
				'name_somali' => $data['name_somali'],
				'icon' => @$filename,
			 ]);
			 
			 return redirect("FuelType")->with('message', 'Car Fuel Type Successfully Added');
		}
		
		return view("carfuel.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$fuelt 		= FuelType::find($id);
			
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				$filename 		= 'icon-'.time().'.jpg';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-icon/".$filename, 80);
				
				$data['icon']  	= $filename;
				@unlink("upload-icon/".$data['flag-old']);
			}
			
			$fuelt->update($data);
			return redirect("FuelType")->with('message', 'Car Fuel Type Successfully Edited');
		}
		
		$editInfo = FuelType::findOrFail($id);
		return view("carfuel.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$ft= FuelType::find($id);
        $ft->delete();
		
		return redirect("FuelType")->with('message', 'Fuel Type Successfully Deleted');
	}
	
	public function ajaxdeleteAllFuelType(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('car_fuel')->whereIn('id',$allIds)->delete();
	}
	

}
