<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['mobile_number','name','email_address','password','role','country_id','invitation_code','gender','profile_picture','notification_status','otp','otp_varified','status'];
	protected $table 	= 'users_customers';


}
