<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentWritter extends Model
{
    protected $fillable = 		                ['AssignDate','Assign_To','TargetDate','Project','Content_Type','Topic','Primary_Keywords','Long_Tail_Keywords','LSI_Keywords','Keyword_Density','Word_Count','Reference','Remark','Required_By','Date_Of_Completion','status'];
}
