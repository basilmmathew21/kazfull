<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CurrencyImport;
use App\Countries;
use App\Currency;

class CurrencyController extends Controller
{
    
	
	
	public function index()
	{
		
		
		$allInput = Currency::select('currency.*','countries.name as country')
							->join('countries','currency.country_id','=','countries.id')
		                    ->where('currency.status','1')->get();
							
		return view("currency.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();	
			Currency::create([
				'country_id' 	=> $data['country_id'],
				'currency' 		=> $data['currency'],
			]);
			
			return redirect("Currency")->with('message', 'Currency Successfully Added');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		return view("currency.add")->with(array('country'=>$country));;

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$currency 	= Currency::find($id);
			
			$currency->update($data);
			return redirect("Currency")->with('message', 'Currency Successfully Edited');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$editInfo = Currency::findOrFail($id);
		return view("currency.edit")->with(array('editInfo'=>$editInfo,'country'=>$country));
	}
	
	public function delete($id)
	{
		$country = Currency::find($id);
        $country->delete();
		return redirect("Currency")->with('message', 'Currency Successfully Deleted');
	}
	
	public function import() 
	{
		Excel::import(new CurrencyImport,request()->file('file'));
		return back();
	}
}
