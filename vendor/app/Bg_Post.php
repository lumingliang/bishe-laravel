<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bg_Post extends Model {

	protected $table = 'bg_posts';

	protected $fillable = [ 'title' , 'content'  ];

	public function getTags() {

		return $this->belongsToMany('App\Bg_Tag' , 'tag_post', 'postId', 'tagId' );
	}

}
