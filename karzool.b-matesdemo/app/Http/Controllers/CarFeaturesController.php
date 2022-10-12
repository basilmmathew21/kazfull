<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CarFeaturesImport;
use App\CarFeatures;
use DB;

class CarFeaturesController extends Controller
{
    public function index()
	{
		$allInput = CarFeatures::select('car_features.*')
		                    ->where('car_features.status','1')->orderBy('car_features.name','ASC')->get();
							
		return view("carfeatures.index")->with(array('allInput'=>$allInput));
		
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
				
			CarFeatures::create([
				'name' => $data['name'],
				'name_somali' => $data['name_somali'],
				'icon' => @$filename,
			 ]);
			 
			 return redirect("CarFeatures")->with('message', 'Car Features Successfully Added');
		}
		
		return view("carfeatures.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$cfs 		= CarFeatures::find($id);
			
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
			
			$cfs->update($data);
			return redirect("CarFeatures")->with('message', 'Car Features Successfully Edited');
		}
		
		$editInfo = CarFeatures::findOrFail($id);
		return view("carfeatures.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$cft = CarFeatures::find($id);
        $cft->delete();
		
		return redirect("CarFeatures")->with('message', 'Car Feature Successfully Deleted');
	}
	
	public function import() 
	{
		Excel::import(new CarFeaturesImport,request()->file('file'));
		return back();
	}
	
	public function ajaxdeleteAllCarFeatures(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('car_features')->whereIn('id',$allIds)->delete();
	}
	
	

}
