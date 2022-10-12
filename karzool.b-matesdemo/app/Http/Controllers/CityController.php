<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CityImport;
use App\City;
use App\Countries;
use DB;

class CityController extends Controller
{
    public function index()
	{
							
		$allInput = City::select('city.*','countries.name as countryname')
		                    ->join('countries', 'city.country_id', '=', 'countries.id')
		                    ->where('city.status','1')->orderBy('city.name','ASC')->get();
						
		return view("city.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data = $request->all();
			City::create([
				'name' 			=> $data['name'],
				'name_somali' 	=> $data['name_somali'],
				'country_id' 	=> $data['country_id'],
			 ]);
			 
			 return redirect("city")->with('message', 'City Successfully Added');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		return view("city.add")->with(array('country'=>$country));

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$city 		= City::find($id);
			
			$city->update($data);
			return redirect("city")->with('message', 'City Successfully Edited');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$editInfo = City::findOrFail($id);
		return view("city.edit")->with(array('editInfo'=>$editInfo,'country'=>$country));
	}
	
	public function delete($id)
	{
		$city = City::find($id);
        $city->delete();
		return redirect("city")->with('message', 'City Successfully Deleted');
	}
	
	public function import() 
	{
		Excel::import(new CityImport,request()->file('file'));
		return back();
	}
	
	public function ajaxdeleteAllCity(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('city')->whereIn('id',$allIds)->delete();
	}
}
