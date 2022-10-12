<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\InvitationTiming; 
use App\Commision;

class SettingController extends Controller 
{
	public $successStatus = 1001;
	
		
	
	public function getSetting()
	{
		$allInput 	=  InvitationTiming::select('invitation_times.*')
									->orderBy('invitation_times.id','ASC')->get();
		$commision 	=  Commision::select('commision.*')
		                    ->where('commision.status','1')->first();
							
		if(!empty($allInput)){
			$invitation		=	array();
			foreach($allInput as $key => $input){
				$invitation[$key]['amount']	= 	$input['amount'];					
			}
		}
		
		$success['data']['invitation_timings']			=	$invitation;
		$success['data']['commision']					=	$commision;
		$success['message'] 		= 	'Settings';
		$success['status'] 			= 	true;
		$success['code'] 			= 	1001;
		
		return response()->json($success,200); 
	}
	
}
?>