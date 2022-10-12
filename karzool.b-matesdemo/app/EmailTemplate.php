<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = ['name','email_type','subject','template_body','status'];
	protected $table 	= 'email_template';


}
