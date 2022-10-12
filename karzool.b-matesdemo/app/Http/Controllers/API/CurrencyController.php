<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Currency; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class CurrencyController extends Controller 
{ 
	public function getCurrency() {
	 $currencys 			= 	Currency::select('currency.*')
							->where('currency.status','1')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($currencys as $key => $currency)
	 {
		 $dataArray[$key]['id']						=	$currency['id'];
		 $dataArray[$key]['country_id']				=	$currency['country_id'];
		 $dataArray[$key]['currency']				=	$currency['currency'];
		 $dataArray[$key]['status']					=	$currency['status'];
		 $dataArray[$key]['created_at']				=	$currency['created_at'];
		 $dataArray[$key]['updated_at']				=	$currency['updated_at'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	}
	
}
?>