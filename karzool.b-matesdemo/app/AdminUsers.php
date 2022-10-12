<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{
    protected $fillable = ['name','branch_id','email','password','role','status'];
	protected $table 	= 'users';


}
