<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    protected $fillable = ['name','name_somali','icon_color'];
	protected $table 	= 'car_color';


}
