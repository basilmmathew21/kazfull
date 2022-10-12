<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\City; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class CityController extends Controller 
{
	 public function getCity(Request $request) {
	 $country_id 		=	(int) $request->id;
	 $success			=	array();
	 if($country_id  > 0)
	 {
		 $cities 		= 	City::select('city.*')
								->where('city.status','1')
								->where('city.country_id','=',$country_id)
								->orderBy('city.name','ASC')->get();
		 $dataArray		= 	array();
		 foreach($cities as $key => $city)
		 {
			 $dataArray[$key]['id']				=	$city['id'];
			 $dataArray[$key]['name']			=	$city['name'];
			 $dataArray[$key]['name_somali']	=	$city['name_somali'];
			 $dataArray[$key]['status']			=	$city['status'];
			 $dataArray[$key]['created_at']		=	$city['created_at'];
			 $dataArray[$key]['updated_at']		=	$city['updated_at'];
			 
		 }
		 $success['data']		=	$dataArray;
		 $success['message'] 	= 	'Success';
		 $success['status'] 	= 	true;
		 $success['code'] 		= 	1001;
	 }
	 else{
		 $success['data']		=	[];
		 $success['message'] 	= 	'Fail';
		 $success['status'] 	= 	false;
		 $success['code'] 		= 	1006;
	 }
	 return response()->json($success,200); 
	 
	}
	
}
?>