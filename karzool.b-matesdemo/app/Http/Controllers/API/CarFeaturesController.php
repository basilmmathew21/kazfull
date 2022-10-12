<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\CarFeatures; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class CarFeaturesController extends Controller 
{ 
	public function getCarFeature() {
	 $carfeatures 		= 	CarFeatures::select('car_features.*')
							->where('car_features.status','1')->orderBy('car_features.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($carfeatures as $key => $carfeature)
	 {
		 $dataArray[$key]['id']				=	$carfeature['id'];
		 $dataArray[$key]['name']			=	$carfeature['name'];
		 $dataArray[$key]['name_somali']	=	$carfeature['name_somali'];
		 $dataArray[$key]['icon']			=	url('/').'/upload-icon/'.$carfeature['icon'];;
		 $dataArray[$key]['status']			=	$carfeature['status'];
		 $dataArray[$key]['created_at']		=	$carfeature['created_at'];
		 $dataArray[$key]['updated_at']		=	$carfeature['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>