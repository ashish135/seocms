<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;


class Leads extends Model
{
    protected $fillable = ['Project', 'Region','Main_Category','Sub_Category','Keyword','Activity_Type','Location','Targeted_URL','URL_After_Submission','DA','PA','SS','Username','Password','Email','Status'];

    public function users(){

		return $this->hasMany('Bitfumes\Multiauth\Model\Admin;');

	}

}
