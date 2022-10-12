<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Customers;
use App\Countries;
use App\Jobtrip;
use App\EmailTemplate;
use Mail;

class CustomersController extends Controller
{
    
	
	
	public function index()
	{
		$allInput = Customers::select('users_customers.*','countries.name as cname')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->orderBy('users_customers.name','ASC')->get();
							
		return view("customers.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			// upload and resize using Intervention Image 
			if($request->file('profile_picture'))
			{
				$filename = 'profile-'.time().'.jpg';
				Image::make($request->file('profile_picture'))
				->fit(200, 200)
				->save("upload-customer/".$filename, 80);
			}
				$data = $request->all();
				
				Customers::create([
				'mobile_number' => $data['mobile'],
				'name' => $data['name'],
				'email_address' => $data['email'],
				'password' => Hash::make($data['password']),
				'country_id' => $data['country_id'],
				'gender' => $data['gender'],
				'role' => 2,
				'profile_picture' => @$filename,
			 ]);
			 
			 /*  Send email- to the user
			 */
			 
			 $emailTemp = EmailTemplate::select('*')
						->where('email_type','1')
						->first();
			
			$data['body'] 	= $emailTemp['template_body'];
			Mail::send('customers.welcome-email',$data,function($message) use ($emailTemp,$data)  {
						$message->to($data['email'],$data['name'])
								->subject($emailTemp['subject']);
					  });
 
			 /*
			[id] => 1
            [name] => Test
            [email_type] => 1
            [subject] => Test sma
            [template_body] 
			 */
			 return redirect("Customers")->with('message', 'Customer Successfully Added');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		return view("customers.add")->with(array('country'=>$country));;

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$cfs 		= Customers::find($id);
			$editDta	= array('mobile_number' => $data['mobile'],
								'name' => $data['name'],
								'email_address' => $data['email'],
								'country_id' => $data['country_id'],
								'gender' => $data['gender'],
								'status' => $data['status']
								);
			
			// upload and resize using Intervention Image 
			if($request->file('profile_picture'))
			{
				$filename 		= 'profile-'.time().'.jpg';
				Image::make($request->file('profile_picture'))
				->fit(200, 200)
				->save("upload-customer/".$filename, 80);
				
				$editDta['profile_picture']  	= $filename;
				@unlink("upload-customer/".$data['profile-old']);
			}
			
			$cfs->update($editDta);
			return redirect("Customers")->with('message', 'Customer Successfully Edited');
		}
		
		$country = Countries::select('id','name')
		->where('status','1')
		->orderBy('name','ASC')->get();
		
		$editInfo = Customers::findOrFail($id);
		return view("customers.edit")->with(array('country'=>$country,'editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$cst = Customers::find($id);
        $cst->delete();
		return redirect("Customers")->with('message', 'Customer Successfully Deleted');
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
							
		$drvTotCanceledInput = 	Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','5')
							->groupBy('job_trip.driver_id')->count();
							
		$drvCountAttdInput 	=  Driver::select('driver.*')
							->join('job_trip', 'driver.id', '=', 'job_trip.driver_id')
							->where('job_trip.job_status','4')
							->groupBy('job_trip.driver_id')->count();
		
		/*					
		$viewInfo 		 	=  DriverInfo::select('driver_info.*')
								->where('driver_id',$id)->first();
		*/						
		$editInfo 		 	=  Customers::where('id',$id)->firstOrFail();
		
		
		$country 		 	=  Customers::select('users_customers.id','countries.name as country')
								->join('countries', 'users_customers.country_id', '=', 'countries.id')
								->where('users_customers.id',$id)->first();
		/*						
		$editVehicleInfo 	=  DriverVehicleInfo::select('driver_vehicle_info.*',"car_bodytype.name","car_bodytype.icon",'car_brand.name as brand','car_brand.icon as brand_icon','car_color.name as color','car_color.icon_color','car_fuel.name as car_fuel')
											->leftJoin('car_bodytype','driver_vehicle_info.car_body_type','=','car_bodytype.id')
											->leftJoin('car_brand','driver_vehicle_info.car_brand','=','car_brand.id')
											->leftJoin('car_color','driver_vehicle_info.car_color','=','car_color.id')
											->leftJoin('car_fuel','driver_vehicle_info.car_fuel','=','car_fuel.id')
											->where('driver_id',$id)->firstOrFail();
											
		$allInput 			=  Jobtrip::select('job_trip.*','driver.name as driver_name','users_customers.name as customer_name','users_customers.mobile_number')
							->join('users_customers', 'job_trip.customer_id', '=', 'users_customers.id')
							->join('driver','job_trip.driver_id','=','driver.id')
							->where('job_trip.driver_id',$id)
		                    ->orderBy('job_trip.job_number','DESC')->get();
		*/
		return view("customers.viewcustomer")->with(array('country'=>$country,'editInfo'=>$editInfo,'countInput'=>$countInput,'drvCostInput'=>$drvCostInput,'drvTotCanceledInput'=>$drvTotCanceledInput,'drvCountAttdInput'=>$drvCountAttdInput));
		
	}
	
	

}
