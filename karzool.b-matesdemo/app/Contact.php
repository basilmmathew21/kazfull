<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['sender_name','sender_email','message','mobile_number','country_id'];
	protected $table 	= 'contact';


}
