<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','name_somali'];
	protected $table 	= 'countries';


}
