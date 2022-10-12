<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Notification; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class NotificationController extends Controller 
{ 
	public function getNotification() {
	 $piracys 			= 	Notification::select('notification.*')
							->where('notification.status','1')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($piracys as $key => $piracy)
	 {
		 $dataArray[$key]['id']						=	$piracy['id'];
		 $dataArray[$key]['title']					=	$piracy['title'];
		 $dataArray[$key]['sub_title']				=	$piracy['sub_title'];
		 $dataArray[$key]['description']			=	$piracy['description'];
		 $dataArray[$key]['image']					=	url('/')."/upload-notification/".$piracy['image'];
		 $dataArray[$key]['promo_code']				=	$piracy['promo_code'];
		 $dataArray[$key]['from_date']				=	$piracy['from_date'];
		 $dataArray[$key]['to_date']				=	$piracy['to_date'];
		 $dataArray[$key]['status']					=	$piracy['status'];
		 $dataArray[$key]['created_at']				=	$piracy['created_at'];
		 $dataArray[$key]['updated_at']				=	$piracy['updated_at'];
		 
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>