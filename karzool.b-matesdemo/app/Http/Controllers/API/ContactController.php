<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Contact;
use Validator;

class ContactController extends Controller 
{
	public function createContact(Request $request)
	{
		$validator = Validator::make($request->all(), [ 
            'sender_name'  => 'required',
			'sender_email' => 'required|email',
			]);
		
		if ($validator->fails()) { 
			return response()->json(['error'=>$validator->errors()],200);            
		}
		else{
			$input['sender_name'] 		= 	$request->sender_name;
			$input['sender_email'] 		= 	$request->sender_email;
			$input['mobile_number'] 	= 	$request->mobile_number;
			$input['country_id'] 		= 	$request->country_id;
			$input['message'] 			= 	$request->message;
			
			Contact::create($input);
			$success['message'] 		= 	'Success';
			$success['status'] 			= 	true;
			$success['code'] 			= 	1001;
		}
		
		return response()->json($success,200); 
	}
	
	
}
?>