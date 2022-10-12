<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Rating; 
use DB;

class RatingController extends Controller 
{
	
	public function getTotalRating(Request $request)
	{
		$trip_id  		=   (int) $request->trip_id;
		if($trip_id > 0)
		{
			$tripDet 		= 	DB::table('rating')
								->where('rating.trip_id','=',$trip_id)
								->sum('rating.rating');
			$success['data']['total_rating']	=	$tripDet;
			$success['message'] 				= 	'Settings';
			$success['status'] 					= 	true;
		}
		else{
			 $success['data']		=	[];
			 $success['message'] 	= 	'Fail';
			 $success['status'] 	= 	false;
			 $success['code'] 		= 	1001;
		}
		return response()->json($success,200); 
	}
	
	public function rating(Request $request)
	{
		$data					= $request->all();
		$trip_id				= $data['trip_id'];
		$user_id				= $data['user_id'];
		$description			= $data['description'];
		$rating					= $data['rating'];
		
		if($trip_id > 0){
			$input['trip_id'] 		= $trip_id;
			$input['rating'] 		= $rating;
			$input['user_id'] 		= $user_id;
			$input['description'] 	= $description;
			Rating::create($input);
			
			$success['message'] 	= 	'Ratings';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
		}
		else{
			 $success['data']		=	[];
			 $success['message'] 	= 	'Fail';
			 $success['status'] 	= 	false;
			 $success['code'] 		= 	1006;
		}
		return response()->json($success,200); 
	}
	
	
}
?>