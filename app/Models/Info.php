<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = "t_info";
    protected $fillable = [

        	'id',	'parent_id', 'name', 'code',	'activity',	'address', 'phone', 'fax',
            'email', 'website',	'manager', 'addition_date', 'company_creation_date'	,
            'start_date',	'log_date',	'log_id', 'capital_declared', 'capital_paid',
            'shares_numbers', 'auditor', 'name_en',	'activity_en', 'address_en',
            'manager_en', 'auditor_en'
    ];
    
}
