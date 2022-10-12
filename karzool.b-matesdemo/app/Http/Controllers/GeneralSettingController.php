<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\InvitationTiming;
use App\Commision;

class GeneralSettingController extends Controller
{
    
	public function index()
	{
		$allInput 	= InvitationTiming::select('invitation_times.*')
									->orderBy('invitation_times.id','DESC')->limit(1)->get();
		$commision 	= Commision::select('commision.*')
		                    ->where('commision.status','1')->first();
		
		return view("invitationtime.index")->with(array('amount'=>$allInput,'commision'=>$commision));
	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			//$timing 		= 	InvitationTiming::find($id);
			$dataInsert		=	array('amount'		=> $data['amount'],
									  'status'		=> $data['status']);
			
			// upload and resize using Intervention Image 
			
			InvitationTiming::create($dataInsert);
			return redirect("GeneralSetting")->with('message', 'Amount Successfully Added');
		}
		
		$editInfo = InvitationTiming::findOrFail($id);
		return view("invitationtime.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function editPercentage($id,Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			
			$commision 	= Commision::find($data['id']);
			$commision->update($data);
			return redirect("GeneralSetting")->with('message', 'Commision Successfully Edited');
		}
		
		$editInfo = Commision::findOrFail($id);
		return view("invitationtime.editpercentage")->with(array('editInfo'=>$editInfo));
	}
	
	public function viewAmountHistory()
	{
		$allInput 	= InvitationTiming::select('invitation_times.*')
									->orderBy('invitation_times.id','ASC')->get();
		
		return view("invitationtime.viewAmountHistory")->with(array('amounts'=>$allInput));
	}

	
	public function viewPercenatageHistory()
	{
		$commision 	= Commision::select('commision.*')
		                    ->where('commision.status','1')->first();
		
		return view("invitationtime.viewPercenatgeHistory")->with(array('commision'=>$commision));
	}
	

}
