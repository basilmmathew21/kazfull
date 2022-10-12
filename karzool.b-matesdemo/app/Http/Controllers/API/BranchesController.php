<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Branch; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class BranchesController extends Controller 
{ 
	public function Branches() {
	 $branches 		= 	Branch::select('branch.*')
							->where('branch.status','1')->orderBy('branch.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($branches as $key => $branch)
	 {
		 $dataArray[$key]['id']					=	$branch['id'];
		 $dataArray[$key]['name']				=	$branch['name'];
		 $dataArray[$key]['name_somali']		=	$branch['name_somali'];
		 $dataArray[$key]['country_id']			=	$branch['country_id'];
		 $dataArray[$key]['city_id']			=	$branch['city_id'];
		 $dataArray[$key]['email']				=	$branch['email'];
		 $dataArray[$key]['phone']				=	$branch['phone'];
		 $dataArray[$key]['address']			=	$branch['address'];
		 $dataArray[$key]['lattitude']			=	$branch['lattitude'];
		 $dataArray[$key]['longitude']			=	$branch['longitude'];
		 $dataArray[$key]['status']				=	$branch['status'];
		 $dataArray[$key]['created_at']			=	$branch['created_at'];
		 $dataArray[$key]['updated_at']			=	$branch['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>