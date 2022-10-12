<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = ['name','name_somali','flag','c_code'];
	protected $table 	= 'countries';


}
