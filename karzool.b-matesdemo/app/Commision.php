<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{
    protected $fillable = ['amount','percentage'];
	protected $table 	= 'commision';


}
