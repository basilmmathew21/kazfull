<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchBrand extends Model
{
    protected $fillable = ['branch_id','brand_id'];
	protected $table 	= 'branch_brands';
}
