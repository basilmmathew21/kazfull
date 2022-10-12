<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Countries; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class CountryController extends Controller 
{
	public function getCountry() {
	 $countries 		= 	Countries::select('countries.*','currency.currency')
							->leftJoin('currency','currency.country_id','=','countries.id')
							->where('countries.status','1')->orderBy('countries.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($countries as $key => $country)
	 {
		 $dataArray[$key]['id']				=	$country['id'];
		 $dataArray[$key]['name']			=	$country['name'];
		 $dataArray[$key]['name_somali']	=	$country['name_somali'];
		 $dataArray[$key]['c_code']			=	$country['c_code'];
		 $dataArray[$key]['currency']		=	$country['currency'];
		 $dataArray[$key]['flag']			=	url('/').'/upload-flag/'.$country['flag'];
		 $dataArray[$key]['status']			=	$country['status'];
		 $dataArray[$key]['created_at']		=	$country['created_at'];
		 $dataArray[$key]['updated_at']		=	$country['updated_at'];
		 
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	
	 return response()->json($success,200); 
	 
	}
}

?>


