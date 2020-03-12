<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['taskname','taskdiscription', 'assign_date','target_date','status','leads_id','users_id','completion_date'];
}
