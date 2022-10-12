<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use DB;
use App\TopupCoupons;


class PrintedCardsController extends Controller
{
    public function index()
	{
		$allInput = TopupCoupons::select('topup_coupons.*')
								->where('topup_coupons.status','2')
								->orderBy('topup_coupons.created_at','DESC')->get();
		
		return view("printedtopup.index")->with(array('allInput'=>$allInput));
	}
		
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$coupon 	= TopupCoupons::find($id);
			$coupon->update($data);
			return redirect("PrintedCards")->with('message', 'Coupon Successfully Edited');
		}
		
		$editInfo = TopupCoupons::findOrFail($id);
		return view("printedtopup.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$coupon = TopupCoupons::find($id);
        $coupon->delete();
		return redirect("PrintedCards")->with('message', 'Coupon Successfully Deleted');
	}
	
	public function ajaxdeleteAllPrinted(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('topup_coupons')->whereIn('id',$allIds)->delete();
	}
}
