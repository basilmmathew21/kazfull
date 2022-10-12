<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\TopupCoupons;
use App\Exports\TopupExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;

class TopupCardsController extends Controller
{
    public function index(Request $request)
	{
		$allInput = TopupCoupons::select('topup_coupons.*')
								->orderBy('topup_coupons.created_at','DESC')->get();
								
		$request->session()->put('allInfo',$allInput);						
		//Session::set('allInfo', $allInput);
		return view("topup.index")->with(array('allInput'=>$allInput));
	}
	
	public function add(Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 			= 	$request->all();	
			$amount 		=	$data['amount'];
			$no_coupons 	=	$data['no_coupons'];
			
			if($no_coupons <= 1000)
			{
				for($count=1;$count<=$no_coupons;$count++)
				{
					$coupon_code =  $this->getMixCode().'-'.$this->getMixCode().'-'.$this->getMixCode().'-'.$this->getMixCode().'-'.$this->getMixCode();
					TopupCoupons::create([
					'topup_code' 	=> $coupon_code,
					'amount' 		=> $amount,
					'status' 		=> 1
					]);
				}
			}
			return redirect("TopupCards")->with('message', 'New Set Of Topup Coupons Generated');
		}
		
		return view("topup.add");

	}
	
	private function getMixCode($digits = 5)
	{
		return str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
	}
	
	public function edit($id,Request $request)
	{
		if ($request->isMethod('post')) {
			
			$data 		= $request->all();
			$coupon 	= TopupCoupons::find($id);
			$coupon->update($data);
			return redirect("TopupCards")->with('message', 'Coupon Successfully Edited');
		}
		
		$editInfo = TopupCoupons::findOrFail($id);
		return view("topup.edit")->with(array('editInfo'=>$editInfo));
	}
	
	public function delete($id)
	{
		$coupon = TopupCoupons::find($id);
        $coupon->delete();
		return redirect("TopupCards")->with('message', 'Coupon Successfully Deleted');
	}
	
	public function ajaxdeleteAllTopup(Request $request)
	{
		$data 		= $request->all();
		$allIds		= array();
		foreach($data['user_ids'] as $id)
		{
			array_push($allIds,$id);
		}
		DB::table('topup_coupons')->whereIn('id',$allIds)->delete();
	}
	
	public function downloadExcel($type,Request $request)
    {
		return Excel::download(new TopupExport,'topup.xlsx');
	}
	
}
