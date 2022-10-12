<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUsersPermissions extends Model
{
    protected $fillable = ['resource','user_id','action_view','action_add','action_edit','action_delete'];
	protected $table 	= 'user_resources_permission';


}
