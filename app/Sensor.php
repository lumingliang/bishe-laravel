<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $table = 'sensors';


    protected $fillable = ['name', 'math', 'unit', 'user_id'];
	public function datas() {
		return $this->hasMany('App\Data', 'sensor_id', 'id');
	}
}

