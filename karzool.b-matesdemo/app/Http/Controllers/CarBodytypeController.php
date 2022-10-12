<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
Use DB;
use App\CarBodytype;


class CarBodytypeController extends Controller
{
    
	
	
	public function index()
	{
		$allInput = CarBodytype::select('car_bodytype.*')
		                    ->where('car_bodytype.status','1')->orderBy('car_bodytype.name','ASC')->get();
							
		return view("carbodytype.index")->with(array('allInput'=>$allInput));
		
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
				
			CarBodytype::create([
				'name' => $data['name'],
				'name_somali' => $data['name_somali'],
				'icon' => @$filename,
			 ]);
			 
			 return redirect("CarBodytype")->with('message', 'Car Body Type Successfully added');
		}
		
		return view("carbodytype.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$cbt 		= CarBodytype::find($id);
			
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				$filename 		= 'flag-'.time().'.jpg';
				Image::make($request->file('icon'))
				->fit(200, 200)
				->save("upload-icon/".$filename, 80);
				
				$data['icon']  	= $filename;
				@unlink("upload-icon/".$data['flag-old']);
			}
			
			$cbt->update($data);
			return redirect("CarBodytype")->with('message', 'Car Body Type Successfully edited');
		}
		
		$editInfo = CarBodytype::findOrFail($id);
		return view("carbodytype.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$cbt = CarBodytype::find($id);
        $cbt->delete();
		
		return redirect("CarBodytype")->with('message', 'Car Body Type Successfully deleted');
	}
	
	public function ajaxdeleteAllCarBody(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('car_bodytype')->whereIn('id',$allIds)->delete();
	}

}
