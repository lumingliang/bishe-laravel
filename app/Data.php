<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'iot_data';
    protected $fillable = ['value', 'sensor_id'];
}
