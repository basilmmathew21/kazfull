<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['country_id','currency','status'];
	protected $table 	= 'currency';


}
