<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Piracy; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class PiracyController extends Controller 
{ 
	public function getPiracy() {
	 $piracys 			= 	Piracy::select('piracy_policy.*')
							->where('piracy_policy.status','1')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($piracys as $key => $piracy)
	 {
		 $dataArray[$key]['id']					=	$piracy['id'];
		 $dataArray[$key]['title']				=	$piracy['title'];
		 $dataArray[$key]['description']		=	$piracy['description'];
		 $dataArray[$key]['status']				=	$piracy['status'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>