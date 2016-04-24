<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Bg_Tag extends Model {

	protected $table = 'bg_tags';

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	public function posts() {

		return $this->belongsToMany('App\Bg_Post' , 'tag_post', 'tagId', 'postId' );
	}

}
