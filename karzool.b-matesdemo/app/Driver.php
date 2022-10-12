<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name','name_somali','gender','country_id','city_id','email','phone','address','status','is_varified'];
	protected $table 	= 'driver';
}
