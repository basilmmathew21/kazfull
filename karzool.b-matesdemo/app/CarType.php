<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $fillable = ['name','name_in_somali','car_body_type','cost_min_charge','km_charge','cost_per_min','min_fare','rider_no_show_fee','customer_cancellation_charge','min_waiting_charge','min_waiting_time','waiting_charge','icon','status'];
	protected $table 	= 'car_type';


}
