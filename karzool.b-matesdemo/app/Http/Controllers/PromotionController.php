<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use DB;
use App\Promotion;


class PromotionController extends Controller
{
    
	
	
	public function index()
	{
		$allInput = Promotion::select('promotion.*')
		                    ->where('promotion.status','1')->orderBy('promotion.created_at','ASC')->get();
							
		return view("promotion.index")->with(array('allInput'=>$allInput));
		
	}
	
	public function add(Request $request)
	{
		
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$dataInsert		=	array('promotion_code'		=> $data['promo_code'],
									  'promotion_type' 		=> $data['promo_type'],
									  'discount_date_start'	=> date("Y-m-d",strtotime($data['start_date'])),
									  'discount_date_end'	=> date("Y-m-d",strtotime($data['end_date'])),
									  'status'				=> $data['status']);
			
			if($data['promo_type'] == "1")
			{
				$dataInsert['discount_amount']	=	@$data['dis_count'];
				
			}elseif($data['promo_type'] == "0")
			{
				$dataInsert['discount_percent']		=	@$data['percent'];
				$dataInsert['discount_max_amount']	=	@$data['max_amount'];
			}
			
			Promotion::create($dataInsert);
			return redirect("Promotion")->with('message', 'Promotion Successfully Added');
		}
		
		return view("promotion.add");

	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();
			$promo 			= 	Promotion::find($id);
			
			$dataInsert		=	array('promotion_code'		=> $data['promo_code'],
									  'promotion_type' 		=> $data['promo_type'],
									  'discount_date_start'	=> date("Y-m-d",strtotime($data['start_date'])),
									  'discount_date_end'	=> date("Y-m-d",strtotime($data['end_date'])),
									  'status'				=> $data['status']);
			
			if($data['promo_type'] == "1")
			{
				$dataInsert['discount_amount']	=	@$data['dis_count'];
				
			}elseif($data['promo_type'] == "0")
			{
				$dataInsert['discount_percent']		=	@$data['percent'];
				$dataInsert['discount_max_amount']	=	@$data['max_amount'];
			}
			
			// upload and resize using Intervention Image 
			
			$promo->update($dataInsert);
			return redirect("Promotion")->with('message', 'Promotion Successfully Edited');
		}
		
		$editInfo = Promotion::findOrFail($id);
		return view("promotion.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		
		$pt= Promotion::find($id);
        $pt->delete();
		
		return redirect("Promotion")->with('message', 'Promotion Successfully Deleted');
	}
	
	public function ajaxdeleteAllPromotion(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('promotion')->whereIn('id',$allIds)->delete();
	}
	
	

}
