<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\CarBodytype; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class CarBodyTypeController extends Controller 
{
	public function getCarBodyType() {
	 
	 $bodytypes 		= 	CarBodytype::select('car_bodytype.*')
							->where('car_bodytype.status','1')->orderBy('car_bodytype.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($bodytypes as $key => $bodytype)
	 {
		 $dataArray[$key]['id']				=	$bodytype['id'];
		 $dataArray[$key]['name']			=	$bodytype['name'];
		 $dataArray[$key]['name_somali']	=	$bodytype['name_somali'];
		 $dataArray[$key]['icon']			=	url('/').'/upload-icon/'.$bodytype['icon'];
		 $dataArray[$key]['status']			=	$bodytype['status'];
		 $dataArray[$key]['created_at']		=	$bodytype['created_at'];
		 $dataArray[$key]['updated_at']		=	$bodytype['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>