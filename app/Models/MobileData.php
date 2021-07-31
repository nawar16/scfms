<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileData extends Model
{
    protected $table = "mobile_data";
    protected $fillable = ['ip', 'device_id',
    'device_name', 'device_company', 
    'android_version', 'token'];
}
