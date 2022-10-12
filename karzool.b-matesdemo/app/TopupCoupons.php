<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupCoupons extends Model
{
    protected $fillable = ['topup_code','amount','status'];
	protected $table 	= 'topup_coupons';


}
