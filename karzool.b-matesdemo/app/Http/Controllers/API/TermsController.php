<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Terms; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class TermsController extends Controller 
{ 
	public function getTerms() {
	 $terms 			= 	Terms::select('terms_conditions.*')
							->where('terms_conditions.status','1')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($terms as $key => $term)
	 {
		 $dataArray[$key]['id']					=	$term['id'];
		 $dataArray[$key]['title']				=	$term['title'];
		 $dataArray[$key]['description']		=	$term['description'];
		 $dataArray[$key]['status']				=	$term['status'];
	 }
	 $success['data']		=	$dataArray;
	 $success['message'] 	= 	'Success';
	 $success['status'] 	= 	true;
	 $success['code'] 		= 	1001;
	 
	 return response()->json($success,200); 
	 
	}
	
}
?>