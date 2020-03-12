<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    protected $fillable = ['parent_id', 'name'];

	public function children()
		{
		    return $this->hasMany('App\Regions', 'parent_id');
		}
}
