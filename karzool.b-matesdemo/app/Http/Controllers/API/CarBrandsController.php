<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\CarBrand; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class CarBrandsController extends Controller 
{
	public function getCarBrands() {
	 
	 $carbrands 		= 	CarBrand::select('car_brand.*')
							->where('car_brand.status','1')->orderBy('car_brand.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($carbrands as $key => $carbrand)
	 {
		 $dataArray[$key]['id']				=	$carbrand['id'];
		 $dataArray[$key]['name']			=	$carbrand['name'];
		 $dataArray[$key]['name_somali']	=	$carbrand['name_somali'];
		 $dataArray[$key]['icon']			=	url('/').'/upload-brand/'.$carbrand['icon'];
		 $dataArray[$key]['status']			=	$carbrand['status'];
		 $dataArray[$key]['created_at']		=	$carbrand['created_at'];
		 $dataArray[$key]['updated_at']		=	$carbrand['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>