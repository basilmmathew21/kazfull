<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverVehicleInfo extends Model
{
    protected $fillable = ['driver_id','car_body_type','car_brand','car_color','car_fuel','vehicle_number','vehicle_name','driving_issue','driving_expiry','vehicle_issue','vehicle_expiry','insurance_issue','insurance_expiry','id_issue','id_expiry','address_issue','address_expiry'];
	protected $table 	= 'driver_vehicle_info';
}
