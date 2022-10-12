<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Jobtrip;
use App\Driver; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;

class TripController extends Controller 
{
	 public function getTripHistory(Request $request) {
	 $user_id 			=	(int) $request->user_id;
	 $success			=	array();
	 if($user_id  > 0)
	 {
		$tripDet 		= 	Jobtrip::select('job_trip.*',
											'car_type.name as car_type_name','car_type.car_body_type','car_type.name_in_somali as name_in_somali','car_type.cost_min_charge as cost_min_charge','car_type.km_charge','car_type.cost_per_min','car_type.min_fare','car_type.rider_no_show_fee','car_type.customer_cancellation_charge','car_type.min_waiting_charge','car_type.min_waiting_time','car_type.waiting_charge','car_type.icon','car_type.status as cartype_status','car_type.created_at as cartype_created_at','car_type.updated_at as cartype_updated_at',
											'car_bodytype.name as car_bodytype_name','car_bodytype.name_somali as car_bodytype_name_somali','car_bodytype.icon as car_bodytype_icon','car_bodytype.status as car_bodytype_status','car_bodytype.created_at as car_bodytype_created_at','car_bodytype.updated_at as car_bodytype_updated_at',
											'promotion.id as promotion_id','promotion.promotion_code','promotion.promotion_type','promotion.discount_amount','promotion.discount_percent','promotion.discount_max_amount','promotion.discount_date_start','promotion.discount_date_end','promotion.status as promotion_status','promotion.created_at as promotion_created_at','promotion.updated_at as promotion_updated_at',
											'driver_info.vehicle_number','driver_info.profile_picture','driver.name as driver_name','users_customers.name as customer_name','users_customers.mobile_number')
							->join('users_customers', 'job_trip.customer_id', '=', 'users_customers.id')
							->join('driver','job_trip.driver_id','=','driver.id')
							->leftJoin('car_type','job_trip.car_type_id','=','car_type.id')
							->leftJoin('car_bodytype','car_type.car_body_type','=','car_bodytype.id')
							->leftJoin('driver_info','driver_info.driver_id','=','driver.id')
							->leftJoin('promotion','job_trip.promotion_id','=','promotion.id')
							->where('job_trip.customer_id','=',$user_id)
		                    ->get();
		$dataArray		= 	array();
		
		 foreach($tripDet as $key => $trip)
		 {
			 $dataArray[$key]['id']											=	$trip['id'];
			 $dataArray[$key]['job_number']									=	$trip['job_number'];
			 $dataArray[$key]['job_status']									=	$trip['job_status'];
			 
			 $dataArray[$key]['car_type_id']								=	$trip['car_type_id'];
			 $dataArray[$key]['car_type']['id']								=	$trip['car_type_id'];
			 $dataArray[$key]['car_type']['name']							=	$trip['car_type_name'];
			 $dataArray[$key]['car_type']['name_somali']					=	$trip['name_in_somali'];
			 $dataArray[$key]['car_type']['cost_min_charge']				=	$trip['cost_min_charge'];
			 $dataArray[$key]['car_type']['km_charge']						=	$trip['km_charge'];
			 $dataArray[$key]['car_type']['cost_per_min']					=	$trip['cost_per_min'];
			 $dataArray[$key]['car_type']['min_fare']						=	$trip['min_fare'];
			 $dataArray[$key]['car_type']['rider_no_show_fee']				=	$trip['rider_no_show_fee'];
			 $dataArray[$key]['car_type']['customer_cancellation_charge']	=	$trip['customer_cancellation_charge'];
			 $dataArray[$key]['car_type']['min_waiting_charge']				=	$trip['min_waiting_charge'];
			 $dataArray[$key]['car_type']['min_waiting_time']				=	$trip['min_waiting_time'];
			 $dataArray[$key]['car_type']['waiting_charge']					=	$trip['waiting_charge'];
			 $dataArray[$key]['car_type']['icon']							=	url('/')."upload-car-type-icon/".$trip['icon'];
			 $dataArray[$key]['car_type']['status']							=	$trip['cartype_status'];
			 $dataArray[$key]['car_type']['created_at']						=	$trip['cartype_created_at'];
			 $dataArray[$key]['car_type']['updated_at']						=	$trip['cartype_updated_at'];
			 
			 $dataArray[$key]['car_type']['car_body_type']					=	$trip['car_body_type'];
			 $dataArray[$key]['car_body_type']['id']						=	$trip['car_body_type'];
			 $dataArray[$key]['car_body_type']['name']						=	$trip['car_bodytype_name'];
			 $dataArray[$key]['car_body_type']['name_somali']				=	$trip['car_bodytype_name_somali'];
			 $dataArray[$key]['car_body_type']['icon']						=	url('/')."upload-icon/".$trip['car_bodytype_icon'];
			 $dataArray[$key]['car_body_type']['status']					=	$trip['car_bodytype_status'];
			 $dataArray[$key]['car_body_type']['created_at']				=	$trip['car_bodytype_created_at'];
			 $dataArray[$key]['car_body_type']['updated_at']				=	$trip['car_bodytype_updated_at'];
			
			
			 $dataArray[$key]['job_note']									=	$trip['job_note'];
			 $dataArray[$key]['job_type']									=	$trip['job_type'];
			 $dataArray[$key]['job_time']									=	$trip['job_time'];
			 $dataArray[$key]['total_km']									=	$trip['total_km'];
			 
			 $dataArray[$key]['km_charge']									=	$trip['km_charge'];
			 $dataArray[$key]['waiting_charge']								=	$trip['waiting_charge'];
			 $dataArray[$key]['discount']									=	$trip['discount'];
			 $dataArray[$key]['tax']										=	$trip['tax'];
			 $dataArray[$key]['total_km']									=	$trip['total_km'];
			 $dataArray[$key]['payment_method']								=	$trip['payment_method'];
			 $dataArray[$key]['waiting_time']								=	$trip['waiting_time'];
			 $dataArray[$key]['total_charge']								=	$trip['total_charge'];
			 $dataArray[$key]['driver_cost']								=	$trip['driver_cost'];
			 $dataArray[$key]['karzool_cost']								=	$trip['karzool_cost'];
			 
			 $dataArray[$key]['promotion_id']								=	$trip['promotion_id'];
			 
			 $dataArray[$key]['promotion']['id']							=	$trip['promotion_id'];
			 $dataArray[$key]['promotion']['promotion_code']				=	$trip['promotion_code'];
			 $dataArray[$key]['promotion']['promotion_type']				=	$trip['promotion_type'];
			 $dataArray[$key]['promotion']['discount_amount']				=	$trip['discount_amount'];
			 $dataArray[$key]['promotion']['discount_percent']				=	$trip['discount_percent'];
			 $dataArray[$key]['promotion']['discount_max_amount']			=	$trip['discount_max_amount'];
			 $dataArray[$key]['promotion']['discount_date_start']			=	$trip['discount_date_start'];
			 $dataArray[$key]['promotion']['discount_date_end']				=	$trip['discount_date_end'];
			 $dataArray[$key]['promotion']['promotion_status']				=	$trip['promotion_status'];
			 $dataArray[$key]['promotion']['created_at']					=	$trip['promotion_created_at'];
			 $dataArray[$key]['promotion']['updated_at']					=	$trip['promotion_updated_at'];
			 
			 $dataArray[$key]['vehicle_number']								=	$trip['vehicle_number'];
			 $dataArray[$key]['profile_picture']							=	url('/').'/upload-driver-docs/'.$trip['profile_picture'];
			 $dataArray[$key]['driver_name']								=	$trip['driver_name'];
			 $dataArray[$key]['customer_name']								=	$trip['customer_name'];
			 $dataArray[$key]['mobile_number']								=	$trip['mobile_number'];
			              
		}
		 $success['data']		=	$dataArray;
		 $success['message'] 	= 	'Success';
		 $success['status'] 	= 	true;
		 $success['code'] 		= 	1001;
	 }
	 else{
		 $success['message'] 	= 	'Fail';
		 $success['status'] 	= 	false;
		 $success['code'] 		= 	1006;
	 }
	 return response()->json($success,200); 
	 
	}
	
	
	
	public function getTripDetails(Request $request) {
	 $trip_id 			=	(int) $request->trip_id;
	 $success			=	array();
	 if($trip_id  > 0)
	 {
		$tripDetails 	= 	Jobtrip::select('job_trip.*','driver.name as driver_name','driver.email as driver_email','driver.phone as driver_phone','driver.phone as driver_phone',
									 'driver_vehicle_info.vehicle_name',
									 'car_bodytype.name as car_model',
									 'car_brand.name as brand_name',
									 'promotion_code','promotion_type','discount_amount','discount_percent','discount_max_amount','discount_date_start','discount_date_end',
									 'car_type.km_charge',
									 'users_customers.name as customer_name','users_customers.email_address as customer_email_address','users_customers.mobile_number as mobile_number',
									 'job_trip_detail.trip_start_time','job_trip_detail.trip_end_time')
							->leftJoin('job_trip_detail', 'job_trip.id', '=', 'job_trip_detail.job_id')
							->leftJoin('users_customers', 'job_trip.customer_id', '=', 'users_customers.id')
							->leftJoin('driver','job_trip.driver_id','=','driver.id')
							->leftJoin('driver_vehicle_info','driver_vehicle_info.driver_id','=','driver.id')
							->leftJoin('car_bodytype','driver_vehicle_info.car_body_type','=','car_bodytype.id')
							->leftJoin('car_brand','driver_vehicle_info.car_brand','=','car_brand.id')
							->leftJoin('promotion','job_trip.promotion_id','=','promotion.id')  
							->leftJoin('car_type','job_trip.car_type_id','=','car_type.id')  
							->where('job_trip.id',$trip_id)->get();
		
		$dataArray		= 	array();
		 foreach($tripDetails as $key => $trip)
		 {
			 $dataArray[$key]['id']						=	$trip['id'];
			 $dataArray[$key]['driver_id']				=	$trip['driver_id'];
			 $dataArray[$key]['car_type_id']			=	$trip['car_type_id'];
			 $dataArray[$key]['km_charge']				=	$trip['km_charge'];
			 $dataArray[$key]['waiting_charge']			=	$trip['waiting_charge'];
			 $dataArray[$key]['discount']				=	$trip['discount'];
			 $dataArray[$key]['tax']					=	$trip['tax'];
			 $dataArray[$key]['promotion_id']			=	$trip['promotion_id'];
			 $dataArray[$key]['payment_method']			=	$trip['payment_method'];
			 $dataArray[$key]['waiting_time']			=	$trip['waiting_time'];
			 $dataArray[$key]['created_at']				=	$trip['created_at'];
			 $dataArray[$key]['updated_at']				=	$trip['updated_at'];
			 $dataArray[$key]['driver_name']			=	$trip['driver_name'];
			 $dataArray[$key]['driver_email']			=	$trip['driver_email'];
			 $dataArray[$key]['driver_phone']			=	$trip['driver_phone'];
			 $dataArray[$key]['vehicle_name']			=	$trip['vehicle_name'];
			 $dataArray[$key]['car_model']				=	$trip['car_model'];
			 $dataArray[$key]['brand_name']				=	$trip['brand_name'];
			 $dataArray[$key]['promotion_code']			=	$trip['promotion_code'];
			 $dataArray[$key]['promotion_type']			=	$trip['promotion_type'];
			 $dataArray[$key]['discount_amount']		=	$trip['discount_amount'];
			 $dataArray[$key]['promotion_id']			=	$trip['promotion_id'];
			 $dataArray[$key]['discount_percent']		=	$trip['discount_percent'];
			 $dataArray[$key]['discount_max_amount']	=	$trip['discount_max_amount'];
			 $dataArray[$key]['discount_date_start']	=	$trip['discount_date_start'];
			 $dataArray[$key]['discount_date_end']		=	$trip['discount_date_end'];
			 $dataArray[$key]['customer_name']			=	$trip['customer_name'];
			 $dataArray[$key]['customer_email_address']	=	$trip['customer_email_address'];
			 $dataArray[$key]['mobile_number']			=	$trip['mobile_number'];
			 $dataArray[$key]['trip_start_time']		=	$trip['trip_start_time'];
			 $dataArray[$key]['trip_end_time']			=	$trip['trip_end_time'];
		}
		 $success['data']		=	$dataArray;
		 $success['message'] 	= 	'Success';
		 $success['status'] 	= 	true;
		 $success['code'] 		= 	1001;
	 }
	 else{
		 $success['message'] 	= 	'Fail';
		 $success['status'] 	= 	false;
		 $success['code'] 		= 	1006;
	 }
	 return response()->json($success,200); 
	}
	
	public function updateStatus(Request $request) {
	$data =	$request->all();
	$trip_id 		=	(int) $data['trip_id'];
	if($trip_id > 0)
	{
		$trip 			= 	Jobtrip::find($trip_id);
		if($request->status != "")
		{
			$data['job_status'] = $request->status;
		}
		$trip->update($data);
		$success['message'] 	= 	'Success';
		$success['status'] 		= 	true;
		$success['code'] 		= 	1001;
	}
	 else{
		 $success['message'] 	= 	'Fail';
		 $success['status'] 	= 	false;
		 $success['code'] 		= 	1006;
	 }
	 return response()->json($success,200);
	}
	
	public function totalEarnings(Request $request)
	{
		 $driver_id  	= 	(int) $request->driver_id;
		 $tripDet 		= 	DB::table('job_trip')
							->where('job_trip.driver_id','=',$driver_id)
							->where('job_status','=',4)
							->sum('job_trip.total_charge');
		 
		 $dataArray						= 	array();
		 $dataArray['total_charge'] 	=	$tripDet;
		 $success						=	array();
		 
		 if(!empty($tripDet))
		 {
			$success['code'] 		= 	1001;
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['data']		=	$dataArray;
			
		 }else{
		    $success['message'] 	= 	'Fail';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
		 }
		return response()->json($success,200);
	}
	
	public function getNearestCar(Request $request)
	{
		$pickup_lat  		= 	$request->pickup_lat;
		$pickup_long  		= 	$request->pickup_long;
		
		$allInput 			= Driver::select('driver.*','branch.lattitude','branch.longitude')
							->leftJoin('branch', 'driver.city_id', '=', 'branch.city_id')
							->get();
		
		$distanceArr		=	array();					
		foreach($allInput as $key => $input)
		{
			$miles 			= 	$this->distance($pickup_lat, $pickup_long, $input['lattitude'], $input['longitude']);
			$distanceArr['miles'][$miles][$input['id']] = $input['id'];
		}
		$shortestMile = array_key_first($distanceArr['miles']);
		$shortestCar  = array_key_first($distanceArr['miles'][$shortestMile]);
		
		if($shortestCar != "")
		 {
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			$success['data']['car_mile']			=	$shortestMile;
			$success['data']['car_driver_id']		=	$shortestCar;
		 }else{
		    $success['message'] 	= 	'Fail';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
		 }
		return response()->json($success,200);
		
	}
	
	
	private function distance($lat1, $lon1, $lat2, $lon2, $unit = 'M') {
	  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
		return 0;
	  }
	  else {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
		  return ($miles * 1.609344);
		} else if ($unit == "N") {
		  return ($miles * 0.8684);
		} else {
		  return $miles;
		}
	  }
	}
	
	public function getCurrentLiveJob()
	{
		$currentUser 	= Auth('api')->user()->id;
		$jodResult 		= Jobtrip::select('job_trip.*')
							->where('job_trip.customer_id','=',$currentUser)
							->orWhere('job_trip.job_status', '1')
							->orWhere('job_trip.job_status', '2')
							->orWhere('job_trip.job_status', '3')
							->orWhere('job_trip.job_status', '4')
							->get();
		if(!empty($jodResult)){
			$success['message'] 	= 	'Success';
			$success['data'] 		= 	$jodResult;
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'Job Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
	}
	
	public function acceptJob(Request $request)
	{
		$validator = Validator::make($request->all(),[ 
            'job_id' 	 => 'required' 
        ]);
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$result  = $this->checkJobExists($request->job_id);
		if($result === false)
		{	
			$success['message'] 	= 	'Job Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			
            return response()->json($success,200);
			
		}elseif($result['job_status'] != 2 && $result['job_status'] != 6){
			
			$success['message'] 	= 	'Job Already Accepted';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200);
		}
		
		$_result = $this->acceptNewJob($request->job_id);
		if($_result !== false){
			$success['message'] 	= 	'Success';
			$success['data'] 		= 	$_result;
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'Operation failed';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
	}
	
	private function acceptNewJob($jobId)
	{
		$this->status       = 4;
        $this->upd_date 	= time();
        $data = array(
                    'mid'       => Auth('api')->user()->id,
                    'job_status'    => $this->status,
                    'upd_date'  => $this->upd_date
                );
		$trip 				= Jobtrip::find($jobId);
		return $trip->update($data);
    }
	
	private function checkJobExists($jobId)
	{
		$jobResult 		=   Jobtrip::select('job_trip.*')
							->where('job_trip.id','=',$jobId)
							->first();
		if(!empty($jobResult)){
			return $jobResult;
		}else{
			return false;
		}
	}
	private function checkJobExistsUser($userId)
	{
		$jobResult 		=   Jobtrip::select('job_trip.*')
							->where('job_trip.customer_id','=',$userId)
							->get();
		if(!empty($jobResult)){
			return $jobResult;
		}else{
			return false;
		}
	}
	public function cancelJob(Request $request)
	{
		$validator = Validator::make($request->all(),[ 
            'job_id' 	 => 'required',
			'reason'	 => 'required'
        ]);
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$result  = $this->checkJobExists($request->job_id);
		if($result === false)
		{	
			$success['message'] 	= 	'Job Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			
            return response()->json($success,200);
			
		}
		
		$result  = $this->checkJobExistsUser(Auth('api')->user()->id);
		if(empty($result))
		{	
			$success['message'] 	= 	'Job Not Present For Current User';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			
            return response()->json($success,200);
		}
		
		$_result	=	$this->cancelNewJob($request->job_id,$request->reason);
		if($_result !== false){
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'Operation failed';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
	}
	
	private function cancelNewJob($jobId,$reason)
	{
		$this->status       = 5;
        $this->upd_date 	= time();
        $data = array(
                    'mid'       	=> Auth('api')->user()->id,
                    'job_status'    => $this->status,
					'cancel_reason'	=> $reason,
                    'upd_date'  	=> $this->upd_date
                );
		$trip 				= Jobtrip::find($jobId);
		return $trip->update($data);
    }
	
	private function changeNewStatus($jobId,$status)
	{
		$this->upd_date 	= time();
        $data = array(
                    'mid'       	=> Auth('api')->user()->id,
                    'job_status'    => $status,
					'upd_date'  	=> $this->upd_date
                );
		$trip 				= Jobtrip::find($jobId);
		return $trip->update($data);
    }
	
	public function changeStatus(Request $request)
	{
		$validator = Validator::make($request->all(),[ 
            'job_id' 	 => 'required',
			'status'	 => 'required'
        ]);
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$result  = $this->checkJobExists($request->job_id);
		if($result === false)
		{	
			$success['message'] 	= 	'Job Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			
            return response()->json($success,200);
			
		}
		
		$result  = $this->checkJobExistsUser(Auth('api')->user()->id);
		if(empty($result))
		{	
			$success['message'] 	= 	'Job Not Present For Current User';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			
            return response()->json($success,200);
		}
		
		$_result	=	$this->changeNewStatus($request->job_id,$request->status);
		if($_result !== false){
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'Operation failed';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
	}
}
?>