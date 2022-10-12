<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['promotion_code','promotion_type','discount_amount','discount_percent','discount_max_amount','discount_date_start','discount_date_end','status'];
	protected $table 	= 'promotion';


}
