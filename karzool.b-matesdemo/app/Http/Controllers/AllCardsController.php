<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

use App\TopupCoupons;
use DB;

class AllCardsController extends Controller
{
    public function index()
	{
		$allInput = TopupCoupons::select('topup_coupons.*','topup_coupons_used.topup_user_type','users_customers.name as customer_name','driver.name as driver_name')
								->leftJoin('topup_coupons_used', 'topup_coupons.id', '=', 'topup_coupons_used.topup_coupon_id')
								->leftJoin('users_customers', 'topup_coupons_used.customer_id', '=', 'users_customers.id')
								->leftJoin('driver','topup_coupons_used.driver_id','=','driver.id')
								->orderBy('topup_coupons.created_at','DESC')->get();
		
		return view("alltopup.index")->with(array('allInput'=>$allInput));
	}
		
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$coupon 	= TopupCoupons::find($id);
			$coupon->update($data);
			return redirect("AllCards")->with('message', 'Coupon Successfully Edited');
		}
		
		$editInfo = TopupCoupons::findOrFail($id);
		return view("alltopup.edit")->with(array('editInfo'=>$editInfo));
	}
	
	
	public function ajaxdeleteAllCards(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('topup_coupons')->whereIn('id',$allIds)->delete();
	}
	
	public function delete($id)
	{
		$coupon = TopupCoupons::find($id);
        $coupon->delete();
		return redirect("AllCards")->with('message', 'Coupon Successfully Deleted');
	}
}
