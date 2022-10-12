<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResources extends Model
{
    protected $fillable = ['resource_name','action_view','action_add','action_edit','action_delete'];
	protected $table 	= 'user_resources';


}
