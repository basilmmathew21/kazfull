<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $fillable = ['name','name_somali','icon'];
	protected $table 	= 'car_brand';


}
