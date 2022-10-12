<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piracy extends Model
{
    protected $fillable = ['title','description','status'];
	protected $table 	= 'piracy_policy';


}
