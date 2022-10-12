<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use DB;

use App\TopupCoupons;


class UnUsedCardsController extends Controller
{
    public function index()
	{
		$allInput = TopupCoupons::select('topup_coupons.*')
								->where('topup_coupons.status','3')
								->orderBy('topup_coupons.created_at','DESC')->get();
		
		return view("unusedtopup.index")->with(array('allInput'=>$allInput));
	}
		
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$coupon 	= TopupCoupons::find($id);
			$coupon->update($data);
			return redirect("UnUsedCards")->with('message', 'Coupon Successfully Edited');
		}
		
		$editInfo = TopupCoupons::findOrFail($id);
		return view("unusedtopup.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$coupon = TopupCoupons::find($id);
        $coupon->delete();
		return redirect("UnUsedCards")->with('message', 'Coupon Successfully Deleted');
	}
	
	public function changeStatus(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		$update['status']	=	"2";
		
		DB::table('topup_coupons')->whereIn('id',$allIds)->update($update);
	}
	
}
