<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\CarType; 
use APP\CarBodytype;
use Illuminate\Support\Facades\Auth; 
use Validator;
class CarTypeController extends Controller 
{ 
	public function getCarType() {
	 $cartypes 			= 	CarType::select('car_type.*','car_bodytype.name as carname')
							->join('car_bodytype','car_type.car_body_type','=','car_bodytype.id')
							->where('car_type.status','1')->orderBy('car_type.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($cartypes as $key => $cartype)
	 {
		 $dataArray[$key]['id']						=	$cartype['id'];
		 $dataArray[$key]['name']					=	$cartype['name'];
		 $dataArray[$key]['name_in_somali']			=	$cartype['name_in_somali'];
		 $dataArray[$key]['carname']				=	$cartype['carname'];
		 $dataArray[$key]['car_body_type']			=	$cartype['car_body_type'];
		 $dataArray[$key]['cost_min_charge']		=	$cartype['cost_min_charge'];
		 $dataArray[$key]['km_charge']				=	$cartype['km_charge'];
		 $dataArray[$key]['min_waiting_charge']		=	$cartype['min_waiting_charge'];
		 $dataArray[$key]['waiting_charge']			=	$cartype['waiting_charge'];
		 $dataArray[$key]['icon']					=	url('/').'/upload-car-type-icon/'.$cartype['icon'];;
		 $dataArray[$key]['status']					=	$cartype['status'];
		 $dataArray[$key]['created_at']				=	$cartype['created_at'];
		 $dataArray[$key]['updated_at']				=	$cartype['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	}
	
}
?>