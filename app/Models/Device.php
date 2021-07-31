<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $connection = 'mysql2';
    protected $table = "devices";
    protected $fillable = ['ip', 'device_id',
    'device_name', 'device_company', 
    'android_version', 'token'];
}
