<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverInfo extends Model
{
    protected $fillable = ['driver_id','driving_licence','vehicle_number','insurance','id_proof','address_proof','photo','profile_picture'];
	protected $table 	= 'driver_info';
}
