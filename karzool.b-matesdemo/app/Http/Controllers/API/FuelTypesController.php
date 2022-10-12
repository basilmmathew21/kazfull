<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\FuelType; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class FuelTypesController extends Controller 
{
	public function getFuelType() {
	 $fueltypes 		= 	FuelType::select('car_fuel.*')
							->where('car_fuel.status','1')->orderBy('car_fuel.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($fueltypes as $key => $fueltype)
	 {
		 $dataArray[$key]['id']				=	$fueltype['id'];
		 $dataArray[$key]['name']			=	$fueltype['name'];
		 $dataArray[$key]['name_somali']	=	$fueltype['name_somali'];
		 $dataArray[$key]['icon']			=	url('/').'/upload-icon/'.$fueltype['icon'];;
		 $dataArray[$key]['status']			=	$fueltype['status'];
		 $dataArray[$key]['created_at']		=	$fueltype['created_at'];
		 $dataArray[$key]['updated_at']		=	$fueltype['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>