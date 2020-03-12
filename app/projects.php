<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
	  protected $fillable = ['projectname','projectregion',];
    public function saveTicket($data)
	{
	    $this->projectname = $data['projectname'];
	    $this->region = $data['projectregion'];
	    $this->save();
	    return 1;
	}
	
	public function Graphicdesigner()
		{
		    return $this->belongsTo('App\Graphicdesigner');
		}
	
	
}
