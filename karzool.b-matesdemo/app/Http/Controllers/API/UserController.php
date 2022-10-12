<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; 
use App\Customers; 
use App\DriverInfo;
use App\DriverVehicleInfo;
use App\CustomersOtp;
use App\Countries;
use App\Driver;
use App\UsersMeta;
use Illuminate\Support\Facades\Auth; 
use Validator;
use JWTAuth;
use DB;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller 
{
	public $successStatus = 1001;
	
	/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
	public function authenticate(Request $request)
    {
			$credentials = $request->only('email_address', 'password','role');

            try {
                if (! $token = Auth::guard('api')->attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            return response()->json(compact('token'),200);
    }
	
    public function login(Request $request)
	{ 
		$validator = Validator::make($request->all(), [ 
            'country_id' 	=> 'required', 
            'mobile_number' => 'required|numeric', 
            'password' 		=> 'required',
			'role'			=> 'required'
        ]);
		
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()],404);            
		}
		
		$phoneInfo 		=	Customers::select('users_customers.mobile_number','users_customers.invitation_code','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at','currency.currency')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->leftJoin('currency','currency.country_id','=','countries.id')
							->where('users_customers.mobile_number',$request->mobile_number)
							->where('countries.id',$request->country_id)
							->where('users_customers.role',$request->role)
							->first(); 
		if(!empty($phoneInfo))
		{
			if($token 	= 	Auth::guard('api')->attempt(['mobile_number' => $phoneInfo->mobile_number,'password' => $request->password,'role' => $phoneInfo->role]))
			{
				$success['status'] 					= 	true;
				$success['code'] 					= 	1001;
				$success['message'] 				= 	'Success';
				
				$dataArray									=	array();
				$dataArray['id']							=	$phoneInfo['id'];
				$dataArray['role']							=	$phoneInfo['role'];
				$dataArray['email_address']					=	$phoneInfo['email_address'];
				$dataArray['mobile_number']					=	$phoneInfo['mobile_number'];
				$dataArray['name']							=	$phoneInfo['name'];
				$dataArray['invitation_code']				=	$phoneInfo['invitation_code'];
				$dataArray['gender']						=	$phoneInfo['gender'];
				$dataArray['profile_picture']				=	url('/').'/upload-customer/'.$phoneInfo['profile_picture'];
				$dataArray['country']                       =  	array();
				$dataArray['country']['id']					=	$phoneInfo['cid'];
				$dataArray['country']['name']				=	$phoneInfo['country_name'];
				$dataArray['country']['name_somali']		=	$phoneInfo['name_somali'];
				$dataArray['country']['currency']			=	$phoneInfo['currency'];
				$dataArray['country']['c_code']				=	$phoneInfo['c_code'];
				$dataArray['country']['flag']				=	url('/').'/upload-flag/'.$phoneInfo['flag'];
				$dataArray['country']['status']				=	$phoneInfo['cstatus'];
				$dataArray['country']['created_at']			=	$phoneInfo['created_at'];
				$dataArray['country']['updated_at']			=	$phoneInfo['updated_at'];
				$dataArray['token']							=	$token;
				$success['data'] 							= 	$dataArray;
				
				return response()->json($success,200); 
			} 
			else{ 
				$success['message'] 		= 'Invalid Credentials';
				$success['status'] 			= false;
				$success['code'] 			= 1006;
				return response()->json($success,200); 
			}
		}else{
				$success['message'] 		= 'Invalid Credentials';
				$success['status'] 			= false;
				$success['code'] 			= 1006;
				return response()->json($success,200); 
		}
			
    }
	
	
	private function getCountry() {
	 
	 $countries 		= 	Countries::select('countries.*')
							->where('countries.status','1')->orderBy('countries.name','ASC')->get();
	 $dataArray			= 	array();
	 $success			=	array();
	 foreach($countries as $key => $country)
	 {
		 $dataArray[$key]['id']				=	$country['id'];
		 $dataArray[$key]['name']			=	$country['name'];
		 $dataArray[$key]['name_somali']	=	$country['name_somali'];
		 $dataArray[$key]['c_code']			=	$country['c_code'];
		 $dataArray[$key]['flag']			=	url('/').'/upload-flag/'.$country['flag'];
		 $dataArray[$key]['status']			=	$country['status'];
		 $dataArray[$key]['created_at']		=	$country['created_at'];
		 $dataArray[$key]['updated_at']		=	$country['updated_at'];
		 
	 }
	 
	return $dataArray;  
	}
	
	
	public function userExists(Request $request){ 
        
		$validator = Validator::make($request->all(),[
			'country_id' 	=> 'required', 
            'mobile_number' => 'required|numeric',
			'role'          => 'required'
        ]);
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		$phoneInfo 			=   Customers::select('users_customers.mobile_number','users_customers.role','countries.name as country_name')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->where('users_customers.mobile_number',$request->mobile_number)
							->where('countries.id',$request->country_id)
							->where('users_customers.role',$request->role)
							->first();
							
		if(!empty($phoneInfo)){
			$success['message'] 	= 	'User Exists';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'User Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
    }
	
	public function loginCheck(Request $request){ 
        
		$validator = Validator::make($request->all(), [ 
            'country_code' 	=> 'required', 
            'mobile_number' => 'required|numeric', 
        ]);
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		$phoneInfo 	=	Customers::select('users_customers.mobile_number','users_customers.role','countries.name as country_name')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->where('users_customers.mobile_number',$request->mobile_number)
							->where('countries.c_code',$request->country_code)
							->first();
							
		if(!empty($phoneInfo)){
			$success['message'] 	= 	'User Exists';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'User Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
    }
	
	
	public function changePassword(Request $request)
	{
		$validator = Validator::make($request->all(), [ 
            'password' 		=> 'required', 
            'c_password' 	=> 'required|same:password', 
        ]);
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$currentUser = Auth('api')->user()->id;
		
		
		$phoneInfo 			=	Customers::select('users_customers.id','users_customers.mobile_number','users_customers.role','countries.name as country_name')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->where('users_customers.id',$currentUser)
							->first();
							
		if(!empty($phoneInfo)){
			$customers 				= Customers::find($phoneInfo->id);					
			$data['password'] 		= Hash::make($request->password);
			
			$customers->update($data);
			$success['message'] 	= 	'Password Updated';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
        } 
        else{ 
			$success['message'] 	= 	'User Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 
	}
	
	
	/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' 			=> 'required',
			//'name_somali'	=> 'required',
			'mobile_number' => 'required|numeric',
            'password' 		=> 'required',
			'role'	   		=> 'required',
			'country_id'	=> 'required|numeric'            
        ]);
		if ($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$input['name'] 			= $request->name;
		$input['mobile_number'] = $request->mobile_number;
		//$input['name_somali'] = $request->name_somali;
		$input['email_address'] = $request->email_address;
		$input['password'] 		= Hash::make($request->password);
		$input['role'] 			= $request->role;
		$input['country_id'] 	= $request->country_id;
		
		
		$phoneInfo 	=	Customers::select('users_customers.mobile_number','users_customers.role','countries.name as country_name')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->where('users_customers.mobile_number',$request->mobile_number)
							->where('countries.id',$request->country_id)
							->where('users_customers.role',$request->role)
							->first();
							
		if(!empty($phoneInfo)){
			$success['message'] 	= 	'User Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			return response()->json($success,200); 
        } 
		
		$user  		=	Customers::create($input);
	
		$phoneInfo 	=	Customers::select('users_customers.mobile_number','users_customers.invitation_code','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at','currency.currency')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->leftJoin('currency','currency.country_id','=','countries.id')
							->where('users_customers.id',$user->id)
							->first();
		
		if($token 	= 	Auth::guard('api')->attempt(['mobile_number' => $request->mobile_number,'password' => $request->password,'role' => $request->role]))
		{
			$dataArray									=	array();
			$dataArray['id']							=	$phoneInfo['id'];
			$dataArray['role']							=	$phoneInfo['role'];
			$dataArray['email_address']					=	$phoneInfo['email_address'];
			$dataArray['mobile_number']					=	$phoneInfo['mobile_number'];
			$dataArray['name']							=	$phoneInfo['name'];
			$dataArray['gender']						=	$phoneInfo['gender'];
			$dataArray['invitation_code']				=	$phoneInfo['invitation_code'];
			$dataArray['profile_picture']				=	url('/').'/upload-customer/'.$phoneInfo['profile_picture'];
			$dataArray['country']['id']			=	$phoneInfo['cid'];
			$dataArray['country']['name']				=	$phoneInfo['country_name'];
			$dataArray['country']['currency']			=	$phoneInfo['currency'];
			$dataArray['country']['name_somali']		=	$phoneInfo['name_somali'];
			$dataArray['country']['c_code']				=	$phoneInfo['c_code'];
			$dataArray['country']['flag']				=	url('/').'/upload-flag/'.$phoneInfo['flag'];
			$dataArray['country']['status']				=	$phoneInfo['cstatus'];
			$dataArray['country']['created_at']			=	$phoneInfo['created_at'];
			$dataArray['country']['updated_at']			=	$phoneInfo['updated_at'];
			$dataArray['token']							=	$token;
			$success['data'] 							= 	$dataArray;
			
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
		} 
		else{ 
			$success['message'] 	= 	'Failed';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 		
		
    }
	
	public function updateProfile(Request $request)
	{
		$userId			=	Auth('api')->user()->id;
		$customers 		= 	Customers::find($userId);
		if($userId > 0 && !empty($customers))
		{
			if($request->email_address != "")
			{
				$data['email_address'] 	= $request->email_address;
			}
			if($request->name != "")
			{
				$data['name'] 		= $request->name;
			}
			if($request->gender != "")
			{
				$data['gender'] 	= $request->gender;
			}
			if($request->u_profile_pic != "")
			{
				$filename 	=  'profile-'.time().'.jpg';
				$upload_dir	=  "upload-customer/";
				$isFile		=  $this->base64_to_jpeg($request->u_profile_pic,$upload_dir.$filename);
				if($isFile)
				{
					$data['profile_picture'] 	=	$filename;
				}
			}
			$customers->update($data);
			
			$phoneInfo 		=	Customers::select('users_customers.mobile_number','users_customers.invitation_code','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at','currency.currency')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->leftJoin('currency','currency.country_id','=','countries.id')
							->where('users_customers.id',$userId)
							->first();
							
			$dataArray									=	array();
			$dataArray['id']							=	$phoneInfo['id'];
			$dataArray['role']							=	$phoneInfo['role'];
			$dataArray['email_address']					=	$phoneInfo['email_address'];
			$dataArray['mobile_number']					=	$phoneInfo['mobile_number'];
			$dataArray['name']							=	$phoneInfo['name'];
			$dataArray['gender']						=	$phoneInfo['gender'];
			$dataArray['invitation_code']				=	$phoneInfo['invitation_code'];
			$dataArray['profile_picture']				=	url('/').'/upload-customer/'.$phoneInfo['profile_picture'];
			$dataArray['country']['id']			=	$phoneInfo['cid'];
			$dataArray['country']['name']				=	$phoneInfo['country_name'];
			$dataArray['country']['name_somali']		=	$phoneInfo['name_somali'];
			$dataArray['country']['c_code']				=	$phoneInfo['c_code'];
			$dataArray['country']['currency']			=	$phoneInfo['currency'];
			$dataArray['country']['flag']				=	url('/').'/upload-flag/'.$phoneInfo['flag'];
			$dataArray['country']['status']				=	$phoneInfo['cstatus'];
			$dataArray['country']['created_at']			=	$phoneInfo['created_at'];
			$dataArray['country']['updated_at']			=	$phoneInfo['updated_at'];
			$success['data'] 							= 	$dataArray;
			
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200);
		}
		else{ 
			$success['message'] 	= 	'Failed';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 	
	}
	
	private function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' );

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        $result = fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        
        // clean up the file resource
        $rs = fclose( $ifp ); 
        if($result !== FALSE)
            return TRUE; 
        else
            return FALSE;
    }
	
	public function getProfile(Request $request)
	{
		$userId		=	(int) $request->user_id;
		if($userId > 0)
		{
			$customerInfo 		= Customers::find($userId);
			if(!empty($customerInfo)){
				
				$phoneInfo 		=	Customers::select('users_customers.mobile_number','users_customers.invitation_code','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at','currency.currency')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->leftJoin('currency','currency.country_id','=','countries.id')
							->where('users_customers.id',$userId)
							->first();
							
				$dataArray									=	array();
				$dataArray['id']							=	$phoneInfo['id'];
				$dataArray['role']							=	$phoneInfo['role'];
				$dataArray['email_address']					=	$phoneInfo['email_address'];
				$dataArray['mobile_number']					=	$phoneInfo['mobile_number'];
				$dataArray['name']							=	$phoneInfo['name'];
				$dataArray['gender']						=	$phoneInfo['gender'];
				$dataArray['invitation_code']				=	$phoneInfo['invitation_code'];
				$dataArray['profile_picture']				=	url('/').'/upload-customer/'.$phoneInfo['profile_picture'];
				$dataArray['country']['id']			=	$phoneInfo['cid'];
				$dataArray['country']['name']				=	$phoneInfo['country_name'];
				$dataArray['country']['name_somali']		=	$phoneInfo['name_somali'];
				$dataArray['country']['c_code']				=	$phoneInfo['c_code'];
				$dataArray['country']['currency']			=	$phoneInfo['currency'];
				$dataArray['country']['flag']				=	url('/').'/upload-flag/'.$phoneInfo['flag'];
				$dataArray['country']['status']				=	$phoneInfo['cstatus'];
				$dataArray['country']['created_at']			=	$phoneInfo['created_at'];
				$dataArray['country']['updated_at']			=	$phoneInfo['updated_at'];
				$success['data'] 							= 	$dataArray;
			
				$success['message'] 		= 	'Profile Information';
				$success['status'] 			= 	true;
				$success['code'] 			= 	1001;
			
			return response()->json($success,200); 
			} 
			else{ 
				$success['message'] 	= 	'User Not Exists';
				$success['status'] 		= 	false;
				$success['code'] 		= 	1006;
				return response()->json($success,200); 
			} 
		}
	}
	
	public function getUser() {
	 $user = Auth::user();
	 return response()->json(['success' => $user],200); 
	}
	
	
	public function sentOtp(Request $request){ 
        
		$validator = Validator::make($request->all(), [ 
            'country_id' 	=> 'required', 
            'mobile_number' => 'required|numeric',
			'role' 			=> 'required'
        ]);
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$otp 					=	rand(1111,9999);
		$input['mobile_number'] = 	$request->mobile_number;
		$input['role'] 			= 	$request->role;
		$input['country_id'] 	= 	$request->country_id;
		$input['otp_verified'] 	= 	2;
		$input['otp'] 			= 	$otp;
		
		$phoneInfo 	=	Customers::select('users_customers.mobile_number','users_customers.role')
							->where('users_customers.mobile_number',$request->mobile_number)
							->where('users_customers.country_id',$request->country_id)
							->where('users_customers.role',$request->role)
							//->where('users_customers.otp_varified',1)
							->first();
							
		if(!empty($phoneInfo)){
			$success['message'] 	= 	'Mobile Number Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			return response()->json($success,200); 
        } 
		
			CustomersOtp::create($input);
			
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			$success['data']['otp']	=	$otp;
			return response()->json($success,200); 
    }
	
	
	public function varifyOtp(Request $request){ 
        
		$validator = Validator::make($request->all(), [ 
            'country_id' 	=> 'required', 
            'mobile_number' => 'required|numeric',
			'role' 			=> 'required',
			'otp'			=>	'required'
        ]);
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$phoneInfo 		=	CustomersOtp::select('user_customer_otp.mobile_number','user_customer_otp.role','user_customer_otp.id','user_customer_otp.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at')
							->join('countries', 'user_customer_otp.country_id', '=', 'countries.id')
							->where('user_customer_otp.mobile_number',$request->mobile_number)
							->where('countries.id',$request->country_id)
							->where('user_customer_otp.role',$request->role)
							->where('user_customer_otp.otp',$request->otp)
							->where('user_customer_otp.otp_verified',2)
							->orderBy('user_customer_otp.id', 'desc')
							->first();
		
		if(!empty($phoneInfo))
		{
				$success['status'] 		= 	true;
				$success['code'] 		= 	1001;
				$success['message'] 	= 	'Success';
				
				$customersOtpVerify 	= 	CustomersOtp::find($phoneInfo->id);					
				$data['otp_verified'] 	= 	1;
				$customersOtpVerify->update($data);
				
				return response()->json($success,200); 
		}else{
				$success['message'] 		= 'Unauthorised';
				$success['status'] 			= false;
				$success['code'] 			= 1006;
				return response()->json($success,200); 
		} 
		
    }
	
	public function updateUserInfo(Request $request)
	{
		$userId		=	(int) $request->id;
		if($userId > 0)
		{
			$phoneInfo 		=	Customers::select('users_customers.mobile_number','users_customers.password','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at')
								->join('countries', 'users_customers.country_id', '=', 'countries.id')
								->where('users_customers.id',$request->id)
								->first();
			
			if($request->password != "")
			{
				$data['password'] 		= Hash::make($request->password);
			}
			if($request->email_address != "")
			{
				$data['email_address'] 	= $request->email_address;
			}
			if($request->name != "")
			{
				$data['name'] 		= $request->name;
			}
			$customers 		= Customers::find($request->id);
			
			if($request->gender != "")
			{
				$data['gender'] 	= $request->gender;
			}
			
			$data['otp_varified'] 	= 1;
			
			$customers->update($data);
			
			$phoneInfo 		=	Customers::select('users_customers.mobile_number','users_customers.invitation_code','users_customers.password','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at','currency.currency')
								->join('countries', 'users_customers.country_id', '=', 'countries.id')
								->leftJoin('currency','currency.country_id','=','countries.id')
								->where('users_customers.id',$request->id)
								->first();
			
			if($token 	= 	Auth::guard('api')->attempt(['mobile_number' => $phoneInfo->mobile_number,'password' => $request->password,'role' => $phoneInfo->role,'otp_varified' => 1]))
			{
				$success['status'] 					= 	true;
				$success['code'] 					= 	1001;
				$success['message'] 				= 	'Success';
				
				$dataArray									=	array();
				$dataArray['id']							=	$phoneInfo['id'];
				$dataArray['role']							=	$phoneInfo['role'];
				$dataArray['email_address']					=	$phoneInfo['email_address'];
				$dataArray['mobile_number']					=	$phoneInfo['mobile_number'];
				$dataArray['name']							=	$phoneInfo['name'];
				$dataArray['gender']						=	$phoneInfo['gender'];
				$dataArray['invitation_code']				=	$phoneInfo['invitation_code'];
				$dataArray['profile_picture']				=	url('/').'/upload-customer/'.$phoneInfo['profile_picture'];
				$dataArray['country']['id']			=	$phoneInfo['cid'];
				$dataArray['country']['name']				=	$phoneInfo['country_name'];
				$dataArray['country']['name_somali']		=	$phoneInfo['name_somali'];
				$dataArray['country']['c_code']				=	$phoneInfo['c_code'];
				$dataArray['country']['currency']			=	$phoneInfo['currency'];
				$dataArray['country']['flag']				=	url('/').'/upload-flag/'.$phoneInfo['flag'];
				$dataArray['country']['status']				=	$phoneInfo['cstatus'];
				$dataArray['country']['created_at']			=	$phoneInfo['created_at'];
				$dataArray['country']['updated_at']			=	$phoneInfo['updated_at'];
				$dataArray['token']							=	$token;
				$success['data'] 							= 	$dataArray;
				
				return response()->json($success,200); 
			} 
			else{ 
				$success['message'] 		= 'Unauthorised';
				$success['status'] 			= false;
				$success['code'] 			= 1006;
				return response()->json($success,200); 
			}
			
		}
		else{ 
			$success['message'] 	= 	'Failed';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
            return response()->json($success,200); 
        } 	
	}
	
	public function updateNotificationStatus(Request $request)
	{
		$notification_status	= $request->notification_status;
		
		$validator = Validator::make($request->all(), [ 
            'notification_status' => 'required'
        ]);
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$currentUser 	= 	Auth('api')->user()->id;
		$customers 		= 	Customers::find($currentUser);
		$data['u_notification_status'] 	= 	$notification_status;
		$data['upd_date'] 				= 	time();	
		$status 						=	$customers->update($data);
		if($customers == true){ 
			$success['status'] 			= 	true;
			$success['code'] 			= 	1001;
			$success['message'] 		= 	'Success';
			return response()->json($success,200); 
		}else{	
			$success['message'] 		= 	'Unauthorised';
			$success['status'] 			= 	false;
			$success['code'] 			= 	1006;
			return response()->json($success,200); 
		}
		 	
	}
	
	
	public function updateMobileOtpMethod(Request $request){ 
        
		$validator = Validator::make($request->all(), [ 
            'old_country_id' 	=> 'required', 
            'old_mobile_number' => 'required|numeric',
			'new_country_id' 	=> 'required', 
            'new_mobile_number' => 'required|numeric',
		]);
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		
		$userId		=	Auth('api')->user()->id;
		$role		=	Auth('api')->user()->role;
		
		$phoneInfo 	=	Customers::select('users_customers.mobile_number','users_customers.role')
							->where('users_customers.mobile_number',$request->new_mobile_number)
							->where('users_customers.country_id',$request->new_country_id)
							->where('users_customers.role',$role)
							->first();
							
		if(!empty($phoneInfo)){
			$success['message'] 	= 	'Mobile Number Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			return response()->json($success,200); 
        }
		
		$phoneInfo 	=	Customers::select('users_customers.mobile_number','users_customers.role')
							->where('users_customers.mobile_number',$request->old_mobile_number)
							->where('users_customers.country_id',$request->old_country_id)
							->where('users_customers.role',$role)
							->first();
							
		if(empty($phoneInfo)){
			$success['message'] 	= 	'Mobile Number Not Exists';
			$success['status'] 		= 	false;
			$success['code'] 		= 	1006;
			return response()->json($success,200); 
        }

		$otp 					=	rand(1111,9999);
		$input['mobile_number'] = 	$request->new_mobile_number;
		$input['role'] 			= 	$role;
		$input['country_id'] 	= 	$request->new_country_id;
		$input['otp_verified'] 	= 	2;
		$input['otp'] 			= 	$otp;
		
		CustomersOtp::create($input);
			
		$success['message'] 	= 	'Success';
		$success['status'] 		= 	true;
		$success['code'] 		= 	1001;
		$success['data']['otp']	=	$otp;
		return response()->json($success,200); 
    }
	
	
	public function updateMobileVarifyOtp(Request $request){ 
        
		$validator = Validator::make($request->all(), [ 
            'new_country_id' 	=> 'required', 
            'new_mobile_number' => 'required|numeric',
			'otp'				=>	'required'
        ]);
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$userId			=	Auth('api')->user()->id;
		$role			=	Auth('api')->user()->role;
		
		$phoneInfo 		=	CustomersOtp::select('user_customer_otp.mobile_number','user_customer_otp.role','user_customer_otp.id','user_customer_otp.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at')
							->join('countries', 'user_customer_otp.country_id', '=', 'countries.id')
							->where('user_customer_otp.mobile_number',$request->new_mobile_number)
							->where('countries.id',$request->new_country_id)
							->where('user_customer_otp.role',$role)
							->where('user_customer_otp.otp',$request->otp)
							->where('user_customer_otp.otp_verified',2)
							->orderBy('user_customer_otp.id', 'desc')
							->first();
		if(!empty($phoneInfo))
		{
				$customersOtpVerify 	= 	CustomersOtp::find($phoneInfo->id);					
				$data['otp_verified'] 	= 	1;
				$customersOtpVerify->update($data);
				
				$Customers 					= 	Customers::find($userId);					
				$dataNew['mobile_number'] 	= 	$request->new_mobile_number;
				$dataNew['country_id'] 		= 	$request->new_country_id;
				$Customers->update($dataNew);
				
				$success['status'] 		= 	true;
				$success['code'] 		= 	1001;
				$success['message'] 	= 	'Success';
				
				$success['data']		=	$this->loginInfo($request->new_mobile_number,$request->new_country_id,$role);
				
				return response()->json($success,200); 
		}else{
				$success['message'] 		= 'Unauthorised';
				$success['status'] 			= false;
				$success['code'] 			= 1006;
				return response()->json($success,200); 
		} 
	}
	
	
	private function loginInfo($mobile_number,$country_id,$role)
	{
		
		$phoneInfo 		=	Customers::select('users_customers.mobile_number','users_customers.invitation_code','users_customers.role','users_customers.id','users_customers.email_address','users_customers.name','users_customers.gender','users_customers.profile_picture','users_customers.role','countries.name as country_name','countries.id as cid','countries.name as cname','countries.name_somali','countries.c_code','countries.flag','countries.status as cstatus','countries.created_at','countries.updated_at','currency.currency')
							->join('countries', 'users_customers.country_id', '=', 'countries.id')
							->leftJoin('currency','currency.country_id','=','countries.id')
							->where('users_customers.mobile_number',$mobile_number)
							->where('countries.id',$country_id)
							->where('users_customers.role',$role)
							->first();
		$dataArray		=	array();
		
		if(!empty($phoneInfo))
		{
				$dataArray									=	array();
				$dataArray['id']							=	$phoneInfo['id'];
				$dataArray['role']							=	$phoneInfo['role'];
				$dataArray['email_address']					=	$phoneInfo['email_address'];
				$dataArray['mobile_number']					=	$phoneInfo['mobile_number'];
				$dataArray['name']							=	$phoneInfo['name'];
				$dataArray['invitation_code']				=	$phoneInfo['invitation_code'];
				$dataArray['gender']						=	$phoneInfo['gender'];
				$dataArray['profile_picture']				=	url('/').'/upload-customer/'.$phoneInfo['profile_picture'];
				$dataArray['country']                       =  	array();
				$dataArray['country']['id']					=	$phoneInfo['cid'];
				$dataArray['country']['name']				=	$phoneInfo['country_name'];
				$dataArray['country']['name_somali']		=	$phoneInfo['name_somali'];
				$dataArray['country']['currency']			=	$phoneInfo['currency'];
				$dataArray['country']['c_code']				=	$phoneInfo['c_code'];
				$dataArray['country']['flag']				=	url('/').'/upload-flag/'.$phoneInfo['flag'];
				$dataArray['country']['status']				=	$phoneInfo['cstatus'];
				$dataArray['country']['created_at']			=	$phoneInfo['created_at'];
				$dataArray['country']['updated_at']			=	$phoneInfo['updated_at'];
		}
		return $dataArray;
	}
	
	public function registerDriver(Request $request){ 
        
		$validator = Validator::make($request->all(), [ 
            'name' 	 			=> 'required', 
            'gender' 			=> 'required',
			'email'	 			=>	'required',
			'phone' 	 		=> 'required', 
            'password' 			=> 'required',
			'country_id'		=>	'required',
			'city_id' 			=> 'required',
			'vehicle_name'		=>	'required',
			'carbodytype' 		=> 'required',
			'carbrand'	 		=>	'required',
			'carcolor' 			=> 'required',
			'carfueltype'	 	=>	'required',
			'driving_issue' 	=> 'required',
			'driving_expiry'	=>	'required',
			'vehicle_issue' 	=> 'required',
			'vehicle_expiry'	=>	'required',
			'insurance_issue' 	=> 'required', 
            'insurance_expiry' 	=> 'required',
			'id_issue'	 		=>	'required',
			'id_expiry' 		=> 'required',
			'address_issue'	 	=>	'required',
			'address_expiry' 	=> 'required'			
        ]);
		
		
		             
		         
		
		if($validator->fails()) { 
					return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$data = $request->all();
		$info = Driver::create([
				'name' 			=> $data['name'],
				'gender' 		=> $data['gender'],
				'country_id' 	=> $data['country_id'],
				'city_id' 		=> $data['city_id'],
				'email' 		=> $data['email'],
				'phone' 		=> $data['phone'],
				'address' 		=> $data['address']
			 ]);
			 
		Customers::create([
				'name' => $data['name'],
				'mobile_number' => $data['phone'],
				'gender' => $data['gender'],
				'country_id' => $data['country_id'],
				'email_address' => $data['email'],
				'password' => Hash::make($data['password']),
				'role' => 3,
			]);

			if($request->driving_licence != "")
			{
				$filename 	=  'licence-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->driving_licence,$upload_dir.$filename);
				if($isFile)
				{
					$img_licence 	=	$filename;
				}
			}
			
			if($request->vehicle_number != "")
			{
				$filename 	=  'vehicle_number-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->vehicle_number,$upload_dir.$filename);
				if($isFile)
				{
					$img_vehicle_number 	=	$filename;
				}
			}
			
			if($request->insurance != "")
			{
				$filename 	=  'insurance-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->insurance,$upload_dir.$filename);
				if($isFile)
				{
					$img_insurance 	=	$filename;
				}
			}
			
			if($request->id_proof != "")
			{
				$filename 	=  'id_proof-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->id_proof,$upload_dir.$filename);
				if($isFile)
				{
					$img_id_proof 	=	$filename;
				}
			}
			
			if($request->address_proof != "")
			{
				$filename 	=  'address_proof-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->address_proof,$upload_dir.$filename);
				if($isFile)
				{
					$img_address_proof 	=	$filename;
				}
			}
			
			if($request->photo != "")
			{
				$filename 	=  'photo-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->photo,$upload_dir.$filename);
				if($isFile)
				{
					$img_photo 	=	$filename;
				}
			}
			
			if($request->profile_picture != "")
			{
				$filename 	=  'profile_picture-'.time().'.jpg';
				$upload_dir	=  "upload-driver-docs/";
				$isFile		=  @$this->base64_to_jpeg($request->profile_picture,$upload_dir.$filename);
				if($isFile)
				{
					$img_profile_picture 	=	$filename;
				}
			}
		
			 
		    DriverInfo::create([
							'driver_id' => $info->id,
							'driving_licence' => @$img_licence,
							'vehicle_number' => @$img_vehicle_number,
						    'insurance' => @$img_insurance,
							'id_proof' => @$img_id_proof,
							'address_proof' => @$img_address_proof,
							'photo' => @$img_photo,
							'profile_picture' => @$img_profile_picture
							]);
		  
			DriverVehicleInfo::create([
							'driver_id' => $info->id,
							'car_body_type' => $data['carbodytype'],
							'car_brand' => $data['carbrand'],
						    'car_color' => $data['carcolor'],
							'car_fuel' => $data['carfueltype'],
							'vehicle_number' => $data['vehicle_number'],
							'vehicle_name' => $data['vehicle_name'],
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
							
			$success['message'] 	= 	'Success';
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			return response()->json($success,200); 
		
	}
	
	public function updatePushToken(Request $request)
	{
		$validator = Validator::make($request->all(), [ 
            'push_token' 	 => 'required', 
            'device_type' 	 => 'required'	
        ]);
		
		if($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()], 200);            
		}
		
		$currentUser 	= 	Auth('api')->user()->id;
		$infoMeta 		= 	UsersMeta::where('uid',$currentUser)->first();
		if(!empty($infoMeta)){
			$data = array(
                'u_push_token'     	=> $request->push_token,
                'u_device_type'     => $request->device_type
            );
			
			UsersMeta::where('uid',$currentUser)->update($data);
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			$success['message'] 	= 	'Success';
			return response()->json($success,200); 
        } 
        else{ 
				
			UsersMeta::create([	'uid' 	=> $currentUser,
							'u_push_token' 	=> $request->push_token,
							'u_device_type' => $request->device_type
							]);
							
			$success['status'] 		= 	true;
			$success['code'] 		= 	1001;
			$success['message'] 	= 	'Success';
            return response()->json($success,200); 
        } 
	}
	
}
?>