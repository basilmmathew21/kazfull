<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Notification;
use DB;
class NotificationController extends Controller
{
    
	public function index()
	{
		$allInput = Notification::select('notification.*')
		                    ->where('notification.status','1')->orderBy('notification.from_date','ASC')->get();
							
		return view("notification.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				if($_FILES['icon']['type'] == 'image/gif'){
					$filename = 'image-'.time().'.gif';
					@move_uploaded_file($_FILES['icon']['tmp_name'], "upload-notification/".$filename);
				}else{
					$filename = 'image-'.time().'.jpg';
					Image::make($request->file('icon'))
					->fit(1500,500)
					->save("upload-notification/".$filename, 80);
				}
			}
			$data = $request->all();	
			Notification::create([
				'title' 		=> $data['title'],
				'sub_title' 	=> $data['sub_title'],
				'description' 	=> $data['description'],
				'promo_code' 	=> $data['promo_code'],
				'from_date' 	=> date("Y-m-d",strtotime($data['from_date'])),
				'to_date' 		=> date("Y-m-d",strtotime($data['to_date'])),
				'image' 		=> $filename,
			 ]);
			 
			 return redirect("Notification")->with('message', 'Notification Successfully Added');
		}
		
		return view("notification.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$nt 		= Notification::find($id);
			$newdata	= array('title' 		=> $data['title'],
								'sub_title' 	=> $data['sub_title'],
								'description' 	=> $data['description'],
								'promo_code' 	=> $data['promo_code'],
								'from_date' 	=> date("Y-m-d",strtotime($data['from_date'])),
								'to_date' 		=> date("Y-m-d",strtotime($data['to_date'])));
			// upload and resize using Intervention Image 
			if($request->file('icon'))
			{
				if($_FILES['icon']['type'] == 'image/gif'){
					$filename = 'image-'.time().'.gif';
					@move_uploaded_file($_FILES['icon']['tmp_name'], "upload-notification/".$filename);
				}else{
					$filename = 'image-'.time().'.jpg';
					Image::make($request->file('icon'))
					->fit(1500,500)
					->save("upload-notification/".$filename, 80);
				}
				$newdata['image']  	= $filename;
				
			}
			
			$nt->update($newdata);
			@unlink("upload-notification/".$data['flag-old']);
			return redirect("Notification")->with('message', 'Notification Successfully Edited');
		}
		
		$editInfo = Notification::findOrFail($id);
		return view("notification.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$nt = Notification::find($id);
        $nt->delete();
		
		return redirect("Notification")->with('message', 'Notification Successfully Deleted');
	}
	
	public function ajaxdeleteAllNotification(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('notification')->whereIn('id',$allIds)->delete();
	}

}
