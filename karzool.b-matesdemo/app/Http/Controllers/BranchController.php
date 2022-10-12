<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Countries;
use App\City;
use App\BranchBrand;
use DB;

class BranchController extends Controller
{
    public function index()
	{
		$allInput = Branch::select('branch.*','countries.name as cname','city.name as cityname')
							->join('countries', 'branch.country_id', '=', 'countries.id')
							->join('city', 'branch.city_id', '=', 'city.id')
		                    ->where('branch.status','1')->orderBy('branch.name','ASC')->get();
							
		return view("branch.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data = $request->all();
			
			$info = Branch::create([
				'name' => $data['name'],
				'name_somali' => $data['name_somali'],
				'country_id' => $data['country_id'],
				'city_id' => $data['city_id'],
				'email' => $data['email'],
				'phone' => $data['phone'],
				'address' => $data['address'],
				'lattitude' => $data['lattitude'],
				'longitude' => $data['longitude'],
			 ]);
			 
			 
			 
			 return redirect("Branch")->with('message', 'Branch Successfully Added');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$city = City::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		return view("branch.add")->with(array('country'=>$country,'city'=>$city));
		

	}
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$branch 	= Branch::find($id);
			
			
			$branch->update($data);
			return redirect("Branch")->with('message', 'Branch Successfully Edited');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$city = City::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		
		$editInfo = Branch::findOrFail($id);
		return view("branch.edit")->with(array('country'=>$country,'city'=>$city,'editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$cb = Branch::find($id);
        $cb->delete();
		return redirect("Branch")->with('message', 'Branch Successfully Deleted');
	}
	
	public function ajaxdeleteAllBranches(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('branch')->whereIn('id',$allIds)->delete();
	}
}
