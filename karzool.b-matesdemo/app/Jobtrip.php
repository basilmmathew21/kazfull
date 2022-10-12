<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobtrip extends Model
{
    protected $fillable = ['job_number','job_status','cancel_reason','customer_id','driver_id','mid','pickup_lat','pickup_long','pickup_addr','dropoff_lat','dropoff_long','dropoff_addr','car_type_id','job_note','job_type','job_time','total_km','km_charge','waiting_charge','discount','tax','total_charge','promotion_id','payment_method','waiting_time','driver_cost','karzool_cost','upd_date'];
	protected $table 	= 'job_trip';
}
