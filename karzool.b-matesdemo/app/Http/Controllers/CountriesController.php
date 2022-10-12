<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CountryImport;
use App\Countries;
use App\City;
use DB;

class CountriesController extends Controller
{
    public function index()
	{
		$resourceInfo 	= parent::resourceInfo('Country');
		$allInput    	= Countries::select('countries.*')
									->where('countries.status','1')->orderBy('countries.name','ASC')->get();
							
		return view("countries.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			// upload and resize using Intervention Image 
			if($request->file('flag'))
			{
				$filename = 'flag-'.time().'.jpg';
			    Image::make($request->file('flag'))
				->fit(200, 200)
				->save("upload-flag/".$filename, 80);
			}
			$data = $request->all();	
				
			Countries::create([
				'name' 			=> $data['name'],
				'name_somali' 	=> $data['name_somali'],
				'c_code' 		=> $data['c_code'],
				'flag' 			=> @$filename,
			 ]);
			 
			 return redirect("countries")->with('message', 'Country Successfully Added');
		}
		
		return view("countries.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$country 	= Countries::find($id);
			
			// upload and resize using Intervention Image 
			if($request->file('flag'))
			{
				$filename 		= 'flag-'.time().'.jpg';
				Image::make($request->file('flag'))
				->fit(200, 200)
				->save("upload-flag/".$filename, 80);
				
				$data['flag']  	= $filename;
				@unlink("upload-flag/".$data['flag-old']);
			}
			
			$country->update($data);
			return redirect("countries")->with('message', 'Country Successfully Edited');
		}
		
		$editInfo = Countries::findOrFail($id);
		return view("countries.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$country = Countries::find($id);
        $country->delete();
		return redirect("countries")->with('message', 'Country Successfully Deleted');
	}
	
	public function import() 
	{
		Excel::import(new CountryImport,request()->file('file'));
		return back();
	}
	
	public function selectCity(Request $request)
	{
		$data = $request->all();
		
		$city = City::select('id','name')
		->where('status','1')
		->where('country_id',$data['id'])
		->orderBy('name','ASC')->get();
	
		return view("countries.ajaxCity")->with(array('city'=>$city));
	}
	
	public function ajaxdeleteAllCountries(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('countries')->whereIn('id',$allIds)->delete();
	}
	
}
