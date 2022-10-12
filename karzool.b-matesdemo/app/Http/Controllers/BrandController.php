<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BrandsImport;
use DB;
use App\CarBrand;


class BrandController extends Controller
{
    
	
	
	public function index()
	{
		$allInput = CarBrand::select('car_brand.*')
		                    ->where('car_brand.status','1')->orderBy('car_brand.name','ASC')->get();
							
		return view("carbrand.index")->with(array('allInput'=>$allInput));
		
	}
	
	
	public function import() 
	{
		
		Excel::import(new BrandsImport,request()->file('file'));
		return back();
	}
	
	
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			// upload and resize using Intervention Image 
			/*
			if($request->file('icon'))
			{
				$filename = 'icon-'.time().'.jpg';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-icon/".$filename, 80);
			}
			*/
			$data = $request->all();	
			
			CarBrand::create([
				'name' => $data['name'],
				'name_somali' => $data['name_somali'],
				'icon' => $data['icon'],
			 ]);
			 
			 return redirect("Brand")->with('message', 'Car Brand Successfully Added');
		}
		
		return view("carbrand.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$cbt 		= CarBrand::find($id);
			
			// upload and resize using Intervention Image 
			/*
			if($request->file('icon'))
			{
				$filename 		= 'icon-'.time().'.jpg';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-icon/".$filename, 80);
				
				$data['icon']  	= $filename;
				
			}
			*/
			$cbt->update($data);
			@unlink("upload-brand/".$data['flag-old']);
			return redirect("Brand")->with('message', 'Car Brand Successfully Edited');
		}
		
		$editInfo = CarBrand::findOrFail($id);
		return view("carbrand.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$cb = CarBrand::find($id);
        $cb->delete();
		
		return redirect("Brand")->with('message', 'Car Brand Successfully Deleted');
	}
	
	public function ajaxdeleteAllCarBrand(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('car_brand')->whereIn('id',$allIds)->delete();
	}
	
	

}
