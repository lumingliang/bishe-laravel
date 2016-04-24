<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Edison extends Model {

	protected $table = 'edison';

	//use SoftDeletes;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['excel', 'db', 'sendEmailTime'];

	public function user() {

        return $this->belongsTo('App\User', 'userId', 'id');
	}

}
