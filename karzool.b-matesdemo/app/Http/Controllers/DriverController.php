<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use App\Branch;
use App\Countries;
use App\City;
use App\Driver;
use App\Customers;
use App\DriverInfo;
use App\DriverVehicleInfo;
use App\CarBodytype;
use App\CarBrand;
use App\CarColor;
use App\FuelType;
use App\Jobtrip;
use DB;

class DriverController extends Controller
{
    public function index()
	{
		//dd(DB::getQueryLog());
		$allInput 			= Driver::select('driver.*','countries.name as cname','city.name as cityname','car_bodytype.name as cartype')
							->join('driver_vehicle_info','driver_vehicle_info.driver_id','=','driver.id')
							->leftJoin('car_bodytype','driver_vehicle_info.car_body_type','=','car_bodytype.id')
							->leftJoin('countries', 'driver.country_id', '=', 'countries.id')
							->leftJoin('city', 'driver.city_id', '=', 'city.id')
							->orderBy('driver.name','ASC')->get();
		return view("driver.index")->with(array('allInput'=>$allInput));
	}
	
	public function pending()
	{
		//dd(DB::getQueryLog());
		$allInput 			= Driver::select('driver.*','countries.name as cname','city.name as cityname')
							->join('countries', 'driver.country_id', '=', 'countries.id')
							->join('city', 'driver.city_id', '=', 'city.id')
							->where("driver.status",2)
							->orderBy('driver.name','ASC')->get();
		
		return view("driver.index")->with(array('allInput'=>$allInput));
	}
	
	public function add(Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data = $request->all();
			
			
			if($request->file('driving_licence'))
			{
				$filename1 = 'licence-'.time().'.jpg';
				Image::make($request->file('driving_licence'))
				->save("upload-driver-docs/".$filename1, 80);
			}
			
			if($request->file('vehicle_number'))
			{
				$filename2 = 'vehicle_number-'.time().'.jpg';
				Image::make($request->file('vehicle_number'))
				->save("upload-driver-docs/".$filename2, 80);
			}
			
			if($request->file('insurance'))
			{
				$filename3 = 'insurance-'.time().'.jpg';
				Image::make($request->file('insurance'))
				->save("upload-driver-docs/".$filename3, 80);
			}
			
			if($request->file('id_proof'))
			{
				$filename4 = 'id_proof-'.time().'.jpg';
				Image::make($request->file('id_proof'))
				->save("upload-driver-docs/".$filename4, 80);
			}
			
			if($request->file('address_proof'))
			{
				$filename5 = 'address_proof-'.time().'.jpg';
				Image::make($request->file('address_proof'))
				->save("upload-driver-docs/".$filename5, 80);
			}
			
			if($request->file('photo'))
			{
				$filename6 = 'photo-'.time().'.jpg';
				Image::make($request->file('photo'))
				->save("upload-driver-docs/".$filename6, 80);
			}
			
			if($request->file('profile_picture'))
			{
				$filename7 = 'profile_picture-'.time().'.jpg';
				Image::make($request->file('profile_picture'))
				->save("upload-driver-docs/".$filename7, 80);
			}
			$info = Driver::create([
				'name' => $data['whole_name'],
				'name_somali' => $data['whole_name_somali'],
				'gender' => $data['whole_gender'],
				'country_id' => $data['whole_country_id'],
				'city_id' => $data['whole_city_id'],
				'email' => $data['whole_email'],
				'phone' => $data['whole_phone'],
				'address' => $data['whole_address']
			 ]);
			 
			Customers::create([
				'name' => $data['whole_name'],
				'mobile_number' => $data['whole_phone'],
				'country_id' => $data['whole_country_id'],
				'email_address' => $data['whole_email'],
				'password' => Hash::make($data['whole_password']),
				'role' => 3,
				'country_id' => $data['whole_country_id']
			 ]); 
			 
		    DriverInfo::create([
							'driver_id' => $info->id,
							'driving_licence' => @$filename1,
							'vehicle_number' => @$filename2,
						    'insurance' => @$filename3,
							'id_proof' => @$filename4,
							'address_proof' => @$filename5,
							'photo' => @$filename6,
							'profile_picture' => @$filename7
							]);
		 
			
			DriverVehicleInfo::create([
							'driver_id' => $info->id,
							'car_body_type' => $data['whole_cbt'],
							'car_brand' => $data['whole_cb'],
						    'car_color' => $data['whole_cc'],
							'car_fuel' => $data['whole_cf'],
							'vehicle_number' => $data['whole_vehicle_number'],
							'vehicle_name' => $data['whole_vehicle_name'],
							'driving_issue' => date("Y-m-d",strtotime($data['driving_issue'])),
							'driving_expiry' => date("Y-m-d",strtotime($data['driving_expiry'])),
							'vehicle_issue' => date("Y-m-d",strtotime($data['vehicle_issue'])),
						    'vehicle_expiry' => date("Y-m-d",strtotime($data['vehicle_expiry'])),
							'insurance_issue' => date("Y-m-d",strtotime($data['insurance_issue'])),
							'insurance_expiry' => date("Y-m-d",strtotime($data['insurance_expiry'])),
							'id_issue' => date("Y-m-d",strtotime($data['id_issue'])),
							'id_expiry' => date("Y-m-d",strtotime($data['id_expiry'])),
							'address_issue' => date("Y-m-d",strtotime($data['address_issue'])),
							'address_expiry' => date("Y-m-d",strtotime($data['address_expiry']))
							]);				
			
			 return redirect("Driver")->with('message', 'Driver Details Successfully Added');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
							
		$cbt = CarBodytype::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
					
							
		$cb = CarBrand::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
							
		$cc = CarColor::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		
		$cf = FuelType::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
							
		return view("driver.add")->with(array('country'=>$country,'cbt'=>$cbt,'cb'=>$cb,'cc'=>$cc,'cf'=>$cf));
		

	}
	
	
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			
			if($request->file('driving_licence'))
			{
				$filename1 = 'licence-'.time().'.jpg';
				Image::make($request->file('driving_licence'))
				->save("upload-driver-docs/".$filename1, 80);
			}
			
			if($request->file('vehicle_number'))
			{
				$filename2 = 'vehicle_number-'.time().'.jpg';
				Image::make($request->file('vehicle_number'))
				->save("upload-driver-docs/".$filename2, 80);
			}
			
			if($request->file('insurance'))
			{
				$filename3 = 'insurance-'.time().'.jpg';
				Image::make($request->file('insurance'))
				->save("upload-driver-docs/".$filename3, 80);
			}
			
			if($request->file('id_proof'))
			{
				$filename4 = 'id_proof-'.time().'.jpg';
				Image::make($request->file('id_proof'))
				->save("upload-driver-docs/".$filename4, 80);
			}
			
			if($request->file('address_proof'))
			{
				$filename5 = 'address_proof-'.time().'.jpg';
				Image::make($request->file('address_proof'))
				->save("upload-driver-docs/".$filename5, 80);
			}
			
			if($request->file('photo'))
			{
				$filename6 = 'photo-'.time().'.jpg';
				Image::make($request->file('photo'))
				->save("upload-driver-docs/".$filename6, 80);
			}
			
			if($request->file('profile_picture'))
			{
				$filename7 = 'profile_picture-'.time().'.jpg';
				Image::make($request->file('profile_picture'))
				->save("upload-driver-docs/".$filename7, 80);
			}
			$datadriver = array('name' => $data['whole_name'],
				'name_somali' => $data['whole_name_somali'],
				'country_id' => $data['whole_country_id'],
				'gender' => $data['whole_gender'],
				'city_id' => $data['whole_city_id'],
				'email' => $data['whole_email'],
				'phone' => $data['whole_phone'],
				'address' => $data['whole_address']);
			
			$driver 	= Driver::find($id);
			$driver->update($datadriver);
			
			$datadriverInfo = array();
			if(@$filename1 != ""){
			$datadriverInfo['driving_licence']	=	$filename1;
			}
			if(@$filename2 != ""){
			$datadriverInfo['vehicle_number']	=	$filename2;
			}
			if(@$filename3 != ""){
			$datadriverInfo['insurance']	=	$filename3;
			}
			if(@$filename4 != ""){
			$datadriverInfo['id_proof']	=	$filename4;
			}
			if(@$filename5 != ""){
			$datadriverInfo['address_proof']	=	$filename5;
			}
			if(@$filename6 != ""){
			$datadriverInfo['photo']	=	$filename6;
			}
			if(@$filename7 != ""){
			$datadriverInfo['profile_picture']	=	$filename7;
			}
						
			$driverifo 	= DriverInfo::where('driver_id','=',$id)->first();
			$driverifo->update($datadriverInfo);
			
			////
			
			$datadriverInfo = array('car_body_type' => $data['whole_cbt'],
							'car_brand' => $data['whole_cb'],
						    'car_color' => $data['whole_cc'],
							'car_fuel' => $data['whole_cf'],
							'vehicle_number' => $data['whole_vehicle_number'],
							'vehicle_name' => $data['whole_vehicle_name'],
							'driving_issue' => date("Y-m-d",strtotime($data['driving_issue'])),
							'driving_expiry' => date("Y-m-d",strtotime($data['driving_expiry'])),
							'vehicle_issue' => date("Y-m-d",strtotime($data['vehicle_issue'])),
						    'vehicle_expiry' => date("Y-m-d",strtotime($data['vehicle_expiry'])),
							'insurance_issue' => date("Y-m-d",strtotime($data['insurance_issue'])),
							'insurance_expiry' => date("Y-m-d",strtotime($data['insurance_expiry'])),
							'id_issue' => date("Y-m-d",strtotime($data['id_issue'])),
							'id_expiry' => date("Y-m-d",strtotime($data['id_expiry'])),
							'address_issue' => date("Y-m-d",strtotime($data['address_issue'])),
							'address_expiry' => date("Y-m-d",strtotime($data['address_expiry'])));
			
			$driverifo 	= DriverVehicleInfo::where('driver_id','=',$id)->first();
			$driverifo->update($datadriverInfo);
			
			return redirect("Driver")->with('message', 'Driver Info Successfully Edited');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		
		$cbt = CarBodytype::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
					
							
		$cb = CarBrand::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
							
		$cc = CarColor::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		
		$cf = FuelType::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		
		
		$editInfo 		 = Driver::where('id',$id)->firstOrFail();
		$editVehicleInfo = DriverVehicleInfo::where('driver_id',$id)->first();
		
		
		$city = City::select('id','name')
		->where('status','1')
		->where('country_id',$editInfo['country_id'])
		->orderBy('name','ASC')->get();
							
		$countInput 		= 	Driver::select('driver.*','countries.name as cname','city.name as cityname')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','1')
							->groupBy('job_trip.driver_id')->count();
		
		$drvCostInput 		= 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','1')
							->sum('job_trip.driver_cost');
							
		$drvTotCanceledInput 		= 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','5')
							->groupBy('job_trip.driver_id')->count();
							
		$drvCountAttdInput 	= 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','4')
							->groupBy('job_trip.driver_id')->count();
		return view("driver.editdriver")->with(array('country'=>@$country,'cbt'=>@$cbt,'cb'=>@$cb,'cc'=>@$cc,'cf'=>@$cf,'editInfo'=>@$editInfo,'city'=>@$city,'editVehicleInfo'=>@$editVehicleInfo,'countInput' => $countInput,'drvCostInput' => $drvCostInput,'drvTotCanceledInput' => $drvTotCanceledInput,'drvCountAttdInput' => $drvCountAttdInput));
	}
	
	public function changeStatus(Request $request)
	{
		$data 		= $request->all();
		$status 	= $data['status']; 
		$id 		= $data['id'];
		$datadriver = array('is_varified' => $status);
		$driver 	= Driver::find($id);
		$res = $driver->update($datadriver);
	}
	
	public function ajaxPhoneValidate(Request $request)
	{
		$data 					= 	$request->all();
		$phone 					= 	$data['phone'];
		$phoneInfo 				= 	Customers::where('mobile_number',$phone)->first();
		$success['phone']		=	$phoneInfo['mobile_number'];;
		$success['message'] 	= 	'Success';
		
		return response()->json($success); 
	}
	
	public function delete($id)
	{
		
		$dv= Driver::find($id);
        $dv->delete();
		DB::statement('DELETE FROM driver_info WHERE driver_id = "'.$id.'"');
		DB::statement('DELETE FROM driver_vehicle_info WHERE driver_id = "'.$id.'"');
		return redirect("Driver")->with('message', 'Driver Successfully Deleted');
	}
	
	public function view($id)
	{
		
		$countInput 		= 	Driver::select('driver.*','countries.name as cname','city.name as cityname')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','1')
							->groupBy('job_trip.driver_id')->count();
		
		$drvCostInput 		= 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','1')
							->sum('job_trip.driver_cost');
							
		$drvTotCanceledInput 		= 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','5')
							->groupBy('job_trip.driver_id')->count();
							
		$drvCountAttdInput 	= 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','4')
							->groupBy('job_trip.driver_id')->count();
							
		$viewInfo 		 	= 	DriverInfo::select('driver_info.*')
								->where('driver_id',$id)->first();
								
		$editInfo 		 	=	Driver::where('id',$id)->firstOrFail();
		
		
		$country 		 	= 	Driver::select('driver.id','countries.name as country','city.name as city','currency.currency')
								->join('countries', 'driver.country_id', '=', 'countries.id')
								->join('city', 'driver.city_id', '=', 'city.id')
								->join('currency','currency.country_id','=','countries.id')
								->where('driver.id',$id)->first();
								
		$editVehicleInfo 	= 	DriverVehicleInfo::select('driver_vehicle_info.*',"car_bodytype.name","car_bodytype.icon",'car_brand.name as brand','car_brand.icon as brand_icon','car_color.name as color','car_color.icon_color','car_fuel.name as car_fuel')
											->leftJoin('car_bodytype','driver_vehicle_info.car_body_type','=','car_bodytype.id')
											->leftJoin('car_brand','driver_vehicle_info.car_brand','=','car_brand.id')
											->leftJoin('car_color','driver_vehicle_info.car_color','=','car_color.id')
											->leftJoin('car_fuel','driver_vehicle_info.car_fuel','=','car_fuel.id')
											->where('driver_id',$id)->firstOrFail();
											
		$allInput = Jobtrip::select('job_trip.*','driver.name as driver_name','users_customers.name as customer_name','users_customers.mobile_number')
							->join('users_customers', 'job_trip.customer_id', '=', 'users_customers.id')
							->join('driver','job_trip.driver_id','=','driver.id')
							->where('job_trip.driver_id',$id)
		                    ->orderBy('job_trip.job_number','DESC')->get();
		
		return view("driver.viewdriver")->with(array('country'=>$country,'editInfo'=>$editInfo,'editVehicleInfo'=>$editVehicleInfo,'viewInfo'=>$viewInfo,'countInput'=>$countInput,'drvCostInput'=>$drvCostInput,'drvTotCanceledInput'=>$drvTotCanceledInput,'drvCountAttdInput'=>$drvCountAttdInput,'allInput'=>$allInput));
		
	}
}
