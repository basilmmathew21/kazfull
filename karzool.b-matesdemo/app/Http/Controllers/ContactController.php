<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;


class ContactController extends Controller
{
    public function index()
	{
		$allInput = Contact::select('contact.*')
		                 ->orderBy('contact.created_at','ASC')->get();
							
		return view("contact.index")->with(array('allInput'=>$allInput));
		
	}
	
		
	public function delete($id)
	{
		$prcy	= Contact::find($id);
        $prcy->delete();
		
		return redirect("Contact")->with('message', 'Contact Successfully Deleted');
	}
	
}
