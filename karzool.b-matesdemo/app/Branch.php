<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['name','name_somali','country_id','city_id','email','phone','address','lattitude','longitude'];
	protected $table 	= 'branch';
}
