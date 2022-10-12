<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersOtp extends Model
{
    protected $fillable = ['mobile_number','role','country_id','otp','otp_verified'];
	protected $table 	= 'user_customer_otp';
}
