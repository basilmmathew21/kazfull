<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title','sub_title','description','image','promo_code','from_date','to_date','status'];
	protected $table 	= 'notification';


}
