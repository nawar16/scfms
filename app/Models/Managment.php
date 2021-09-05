<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Managment extends Model
{
    protected $table = "t_management";
    protected $fillable = [
        	'id', 'parent_id', 'name', 'position',
            'work_for',	'percent', 'the_order', 
            'name_en','position_en', 'work_for_en'
    ];
}
