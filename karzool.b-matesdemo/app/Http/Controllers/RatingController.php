<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function index(Request $request)
	{
		$trip_id  		= (int) $request->trip_id;
		if($trip_id > 0)
		{
			$allInput 	=  Rating::select('rating.*','users_customers.name as cname')
						->leftJoin('users_customers','rating.user_id','=','users_customers.id')
						->where('rating.trip_id','=',$trip_id)
						->get();
		}else{
			$allInput 	= 	  Rating::select('rating.*','users_customers.name as cname')
						->leftJoin('users_customers','rating.user_id','=','users_customers.id')
						->get();
		}
						
		return view("rating.index")->with(array('allInput'=>$allInput));
	}
	
	public function delete($id)
	{
		$star	= Rating::find($id);
        $star->delete();
		
		return redirect("Rating")->with('message', 'Rating Successfully Deleted');
	}
	
	
}
