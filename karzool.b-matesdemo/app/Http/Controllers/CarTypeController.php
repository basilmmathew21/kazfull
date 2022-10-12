<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\CarType;
use App\CarBodytype;
use DB;

class CarTypeController extends Controller
{
   public function index()
	{
		$allInput = CarType::select('car_type.*')
							->orderBy('car_type.name','ASC')->get();
							
		return view("cartype.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data = $request->all();
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				$filename = 'icon-'.time().'.png';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-car-type-icon/".$filename, 80);
				$data['icon']	=	@$filename;
			}		
					
			CarType::create($data);
			return redirect("CarType")->with('message', 'Car Type Successfully added');
		}
		
		$cbt = CarBodytype::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		return view("cartype.add")->with(array('cbt'=>$cbt));;

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$ct 		= CarType::find($id);
			
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				$filename 		= 'icon-'.time().'.png';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-car-type-icon/".$filename, 80);
				
				$data['icon']  	= $filename;
				@unlink("upload-car-type-icon/".$data['icon-old']);
			}
			
			$ct->update($data);
			return redirect("CarType")->with('message', 'Car Type Successfully edited');
		}
		
		$cbt = CarBodytype::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$editInfo = CarType::findOrFail($id);
		return view("cartype.edit")->with(array('editInfo'=>$editInfo,'cbt'=>$cbt));
	}
	
	public function delete($id)
	{
		
		$ct = CarType::find($id);
        $ct->delete();
		
		return redirect("CarType")->with('message', 'Car Type Successfully deleted');
	}
	
	public function ajaxdeleteAllCarType(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('car_type')->whereIn('id',$allIds)->delete();
	}
	

}
