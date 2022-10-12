<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Jobtrip;
use App\Customers;
use App\Driver;
use App\InvitationTiming;
use App\Commision;

class JoblistController extends Controller
{
    
	public function index()
	{
		$allInput = Jobtrip::select('job_trip.*','driver.name as driver_name','users_customers.name as customer_name','users_customers.mobile_number')
							->leftJoin('users_customers', 'job_trip.customer_id', '=', 'users_customers.id')
							->leftJoin('driver','job_trip.driver_id','=','driver.id')
		                    ->orderBy('job_trip.job_number','DESC')->get();
							
		return view("joblist.index")->with(array('allInput'=>$allInput));
		
	}
	
	
	public function jobview(Request $request)
	{
		$data 		= 	$request->all();
		$id			=	$data['id'];
		$whereData 	= 	[['promotion.status', '1']];
		$allInput 	= 	Jobtrip::select('job_trip.*',
											'driver.name as driver_name','driver.email as driver_email','driver.phone as driver_phone','driver.phone as driver_phone',
											'driver_vehicle_info.vehicle_name',
											'car_bodytype.name as car_model',
											'car_brand.name as brand_name',
											'promotion_code','promotion_type','discount_amount','discount_percent','discount_max_amount','discount_date_start','discount_date_end',
											'car_type.km_charge','car_type.cost_per_min',
											'users_customers.name as customer_name','users_customers.email_address as customer_email_address','users_customers.mobile_number as mobile_number',
											'job_trip_detail.trip_start_time','job_trip_detail.trip_end_time',
											'currency.currency'
											)
							->leftJoin('job_trip_detail', 'job_trip.id', '=', 'job_trip_detail.job_id')
							->leftJoin('users_customers', 'job_trip.customer_id', '=', 'users_customers.id')
							->leftJoin('countries', 'users_customers.country_id', '=', 'countries.id')
							->leftJoin('currency', 'currency.country_id', '=', 'countries.id')
							->leftJoin('driver','job_trip.driver_id','=','driver.id')
							->leftJoin('driver_vehicle_info','driver_vehicle_info.driver_id','=','driver.id')
							->leftJoin('car_bodytype','driver_vehicle_info.car_body_type','=','car_bodytype.id')
							->leftJoin('car_brand','driver_vehicle_info.car_brand','=','car_brand.id')
							->leftJoin('promotion','job_trip.promotion_id','=','promotion.id')  
							->leftJoin('car_type','job_trip.car_type_id','=','car_type.id')  
							->where($whereData)
							->where('job_trip.id',$id)->get();
							
		$invitation = InvitationTiming::select('invitation_times.*')
									->orderBy('invitation_times.id','DESC')->where('invitation_times.status','1')->limit(1)->get();
		$commision 	= Commision::select('commision.*')
		                    ->where('commision.status','1')->first();					
		
		switch($allInput[0]['job_status'])
		{
			case 1:
			$jobStatus	=	"Requested";
			break;
			case 2:
			$jobStatus	=	"Accepted";
			break;
			case 3:
			$jobStatus	=	"InProgress";
			break;
			case 4:
			$jobStatus	=	"Driver Here";
			break;
			case 5:
			$jobStatus	=	"Completed";
			break;
			case 6:
			$jobStatus	=	"Cancelled";
			break;
			case 7:
			$jobStatus	=	"No Answer";
			break;
			
		}
		
		switch($allInput[0]['job_type'])
		{
			case 1:
			$jobType	=	"Now";
			break;
			case 2:
			$jobType	=	"Later";
			break;
		}
		
		
		$promotionInfo 		=	$this->calculatePromotion($allInput[0]);
		$grandTotal			=	$allInput[0]['total_charge'] - $allInput[0]['discount'] + $allInput[0]['tax'];
		$_result_main_html	= 	'<div class="row">
									<div class="col-md-3"><span>Job Number </span><span class="_val">: '.$allInput[0]['job_number'].'</span></div>
									<div class="col-md-3"><span>Job Status</span><span class="_val">: '.$jobStatus.'</span></div>
									<div class="col-md-3"><span>Job Type</span><span class="_val">: '.$jobType.'</span></div>
									<div class="col-md-3"><span>Reviews</span><span class="_val">: <a href="/Rating/'.$id.'">Ratings</a></span></div>
								</div>
					   <div class="row">
					   &nbsp;
					   </div>
					   <div class="row">
					   <div class="col-md-12">
					   <table width="100%" border="0">
						   <tr>
						   <td width="9%">
						   Pick Up
						   </td>
						   
						   <td width="91%"><span class="_val"> : '.$allInput[0]['pickup_addr'].'</span></</td>
					   </tr>
					   
					   <tr>
						   <td>
						   Drop Off
						   </td>
						   <td><span class="_val"> : '.$allInput[0]['dropoff_addr'].'</span></</td>
					   </tr>
					   
					   <tr>
						   <td>
						   Date
						   </td>
						   <td><span class="_val"> : '.date("d-m-Y",strtotime($allInput[0]['trip_start_time'])).'</span></</td>
					   </tr>
					   </table>
					   </div>
						</div>';
						
		$_result_sub_html	= 	'<div class="row">
									<div class="col-md-4"><span style="padding-right:15px;">Job Number</span><span class="_val" style="padding-right:25px;">: '.$allInput[0]['job_number'].'</span></div>
									<div class="col-md-8"><span>Job Status</span><span class="_val">: '.$jobStatus.'</span></div>
									
					   </div>
					   <div class="row">
					   <div class="col-md-12">
					   <table width="100%" border="0">
						   <tr>
							   <td width="10.45%" style="padding-right:15px;">
										Job Type
							   </td>
							   <td width="90%">
										<span class="_val">: '.$jobType.'</span>
								</td>
							</tr>
							<tr>
							   <td width="10.45%">
										Date
							   </td>
							   <td width="90%">
										<span class="_val">: '.date("d-m-Y",strtotime($allInput[0]['trip_start_time'])).'</span>
								</td>
							</tr>
							<tr>
							   <td width="10.45%">
										End Date
							   </td>
							   <td width="90%">
										<span class="_val">: '.date("d-m-Y H:i",strtotime($allInput[0]['trip_end_time'])).'</span>
								</td>
							</tr>
							<tr>
							   <td width="10.45%">
										Job Type
							   </td>
							   <td width="90%">
										<span class="_val">: '.$jobType.'</span>
								</td>
							</tr>
							<tr>
							   <td width="10.45%">
										Pick Up
							   </td>
							   <td width="90%">
										<span class="_val">: '.$allInput[0]['pickup_addr'].'</span>
								</td>
							</tr>
							<tr>
							   <td width="10.45%">
										Drop Off
							   </td>
							   <td width="90%">
										<span class="_val">: '.$allInput[0]['dropoff_addr'].'</span>
								</td>
							</tr>
							</table>
					   </div>
					   </div>
					   <div class="row">
							&nbsp;
						</div>
					   <div class="row">
									<div class="col-md-6">
										<div class="_head">Customer Details</div>
										<div class="_val">
											<table width="100%">
												<tr>
													<td width="35%">Name</td>	<td class="_val">: '.$allInput[0]['customer_name'].'</td>
												</tr>
												<tr>
													<td>Email</td> <td class="_val">: '.$allInput[0]['customer_email_address'].'</td>
												</tr>
												<tr>
													<td>Mobile</td> <td class="_val">: '.$allInput[0]['mobile_number'].'</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-md-6">
									<div class="_head">Driver Details :</div>
										<div class="_val">
											<table width="100%" border="0">
												
												<tr>
													<td width="35%">Name</td>	<td class="_val">: '.$allInput[0]['driver_name'].'</td>
												</tr>
												<tr>
													<td>Email</td> <td class="_val">: '.$allInput[0]['driver_email'].'</td>
												</tr>
												<tr>
													<td>Mobile</td> <td class="_val">: '.$allInput[0]['driver_phone'].'</td>
												</tr>
											</table>
										</div>
									</div>
						</div>
						<div class="row">
							&nbsp;
						</div>
						<div class="row">
									<div class="col-md-6">
										<div class="_head">Vehicle Details</div>
										<div class="_val">
											<table width="100%">
												<tr>
													<td width="35%">Car Name</td>	<td class="_val">: '.$allInput[0]['vehicle_name'].'</td>
												</tr>
												<tr>
													<td>Brand</td> <td class="_val">: '.$allInput[0]['brand_name'].'</td>
												</tr>
												<tr>
													<td>Model</td> <td class="_val">: '.$allInput[0]['car_model'].'</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-md-6">
									<div class="_head">Promotion</div>
										<div class="_val">
											<table width="100%" border="0">
												<tr>
													<td width="35%"> Code</td>	<td class="_val">: '.$promotionInfo['promotion_code'].'</td>
												</tr>
												<tr>
													<td>Discount</td>	<td class="_val">: '.$allInput[0]['currency'].$promotionInfo['discount_amount'].'</td>
												</tr>
												<tr>
													<td>Earned </td> <td class="_val">: '.$allInput[0]['currency'].$promotionInfo['earned_amount'].'</td>
												</tr>
											</table>
										</div>
									</div>
						</div>
						
						<div class="row">
							&nbsp;
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="_head">Trip Summary</div>
							</div>
						</div>
						
						<div class="row">
									<div class="col-md-6">
										<div>
											<table width="100%">
												<tr>
													<td width="40%">Total Km</td>	<td class="_val"  align="right"> <span>: '.$allInput[0]['total_km'].'</span></td>
												</tr>
												<tr>
													<td>Km Charge</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['currency'].$allInput[0]['km_charge'].'</span></td>
												</tr>
												<tr>
													<td>Waiting Charge</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['currency'].$allInput[0]['waiting_charge'].'</span></td>
												</tr>
												<tr>
													<td>Cost Per Minuite</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['currency'].$allInput[0]['cost_per_min'].'</span></td>
												</tr>
												
												<tr>
													<td>Total Charge</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['currency'].$allInput[0]['total_charge'].'</span></td>
												</tr>
												<tr>
													<td>Discount</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['currency'].$allInput[0]['discount'].'</span></td>
												</tr>
												<tr>
													<td>Tax (%)</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['tax'].'</span></td>
												</tr>
												<tr>
													<td>Commision Percentage</td> <td class="_val"  align="right">: <span  align="right">'.$commision['percentage'].'</span></td>
												</tr>
												<tr>
													<td>Invitation Cost</td> <td class="_val"  align="right">: <span  align="right">'.$allInput[0]['currency'].$invitation[0]['amount'].'</span></td>
												</tr>
												<tr>
													<td>&nbsp;</td> <td class="_val"  align="right"> <span  align="right">--------</span></td>
												</tr>
												<tr>
													<td>Grand Total</td> <td class="_val" align="right">: <span  align="right">'.$allInput[0]['currency'].$grandTotal.'</span></td>
												</tr>
												
											</table>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<table width="100%" border="0">
												<tr>
													<td width="35%">Waiting Time</td>	<td class="_val">: '.$allInput[0]['waiting_time'].'</td>
												</tr>
											</table>
										</div>
									</div>
						</div>
						
						<div class="row">
									<div class="col-md-12">
										&nbsp;
									</div>
						</div>
						
						<div class="row">
									<div class="col-md-12">
										<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAXRkyk_p6NNJAKK5-5oPQN2YrHOG2aP7I&amp;q='.$allInput[0]['dropoff_lat'].','.$allInput[0]['dropoff_long'].'" allowfullscreen="">
										</iframe>
									</div>
						</div>';
		
		$status = [
                'status'    		=> TRUE,
                'code'      		=> 1001,
                'message'   		=> 'Success',
                'data_first'      	=> $_result_main_html,
				'data_second'      	=> $_result_sub_html,
               ];       
        echo json_encode($status);
	}
	
	private function calculatePromotion($promotionInfo)
	{
		$promotionInfo['promotion_code'];
		$promotionInfo['promotion_type'];
		$promotionInfo['discount_amount'];
		$promotionInfo['discount_percent'];
		$promotionInfo['discount_max_amount'];
		$promotionInfo['discount_date_start'];
		$promotionInfo['discount_date_end'];
		$pomotionArray		=	array();
		if($promotionInfo['promotion_type'] == 1){
			//Fixed promotion
			if(1)
			{
				//$promotionInfo['discount_date_start'] <= $promotionInfo['trip_start_time'] && $promotionInfo['discount_date_end'] >= $promotionInfo['trip_start_time']
				$pomotionArray['promotion_code'] 	= $promotionInfo['promotion_code'];
				$pomotionArray['discount_amount'] 	= $promotionInfo['discount_amount'];
				$pomotionArray['earned_amount'] 	= $promotionInfo['discount_amount'];
			}
		}elseif($promotionInfo['promotion_type'] == 0)
		{
				$pomotionArray['promotion_code'] 	= $promotionInfo['promotion_code'];
				$discount_amount 	= $promotionInfo['discount_amount']*($promotionInfo['discount_percent']/100);
				if($discount_amount <= $promotionInfo['discount_max_amount'])
				{
					$pomotionArray['earned_amount'] = $discount_amount;
				}else{
					$pomotionArray['earned_amount'] = $promotionInfo['discount_max_amount'];
				}
				$pomotionArray['discount_amount'] 	= $pomotionArray['earned_amount'];
		}
		
		return $pomotionArray;
											
	}
	
	public function delete($id)
	{
		
		$cft = CarFeatures::find($id);
        $cft->delete();
		
		return redirect("CarFeatures")->with('message', 'Car Feature Successfully Deleted');
	}
	
	

}
