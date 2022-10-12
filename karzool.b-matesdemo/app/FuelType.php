<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    protected $fillable = ['name','name_somali','icon'];
	protected $table 	= 'car_fuel';


}
