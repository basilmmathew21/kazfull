<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvitationTiming extends Model
{
    protected $fillable = ['amount','status'];
	protected $table 	= 'invitation_times';


}
