<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    protected $fillable = ['title','description','status'];
	protected $table 	= 'terms_conditions';


}
