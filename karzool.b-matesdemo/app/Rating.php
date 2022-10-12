<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['trip_id','user_id','rating','description'];
	protected $table 	= 'rating';


}
