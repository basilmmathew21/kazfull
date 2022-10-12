<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersMeta extends Model
{
    protected $fillable = ['uid','u_push_token','u_device_type'];
	protected $table 	= 'users_meta';


}
