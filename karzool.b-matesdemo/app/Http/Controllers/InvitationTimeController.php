<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\InvitationTiming;

class InvitationTimeController extends Controller
{
    
	
	
	public function index()
	{
		$allInput = InvitationTiming::select('invitation_times.*')
									->get();
		
		return view("invitationtime.index")->with(array('allInput'=>$allInput));
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$dataInsert		=	array('amount'		=> $data['amount'],
									  'status'		=> $data['status']);
			
			InvitationTiming::create($dataInsert);
			return redirect("InvitationTiming")->with('message', 'Invitation Timing Successfully Added');
		}
		
		return view("invitationtime.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$timing 		= 	InvitationTiming::find($id);
			$dataInsert		=	array('amount'		=> $data['amount'],
									  'status'		=> $data['status']);
			
			// upload and resize using Intervention Image 
			
			$timing->update($dataInsert);
			return redirect("InvitationTiming")->with('message', 'Invitation Timing Successfully Edited');
		}
		
		$editInfo = InvitationTiming::findOrFail($id);
		return view("invitationtime.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$it= InvitationTiming::find($id);
        $it->delete();
		
		return redirect("InvitationTiming")->with('message', 'Invitation Time Successfully Deleted');
	}
	
	private function dateCompare($date1,$date2)
	{
		//$date1	=	date('m/d/Y');
		$tempArr1	=	explode('/',$date1);
		$date1Cmp 	= 	date("m/d/Y", mktime(0, 0, 0, $tempArr1[0], $tempArr1[1], $tempArr1[2]));
		
		$tempArr2	=	explode('/', $date2);
		$date2 		= 	date("m/d/Y", mktime(0, 0, 0, $tempArr2[0], $tempArr2[1], $tempArr2[2]));
		
		if(strtotime($date1) >= strtotime($date2))
		   return false;
		else
		   return true;
	}
	
	

}
