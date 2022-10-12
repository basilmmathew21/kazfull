<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\CarColor; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class CarColoursController extends Controller 
{
	public function getCarColor() {
	 
	 $carcolours 		= 	CarColor::select('car_color.*')
							->where('car_color.status','1')->orderBy('car_color.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($carcolours as $key => $colour)
	 {
		 $dataArray[$key]['id']				=	$colour['id'];
		 $dataArray[$key]['name']			=	$colour['name'];
		 $dataArray[$key]['name_somali']	=	$colour['name_somali'];
		 $dataArray[$key]['icon_color']		=	$colour['icon_color'];
		 $dataArray[$key]['status']			=	$colour['status'];
		 $dataArray[$key]['created_at']		=	$colour['created_at'];
		 $dataArray[$key]['updated_at']		=	$colour['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>