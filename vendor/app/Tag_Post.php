<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use App\Bg_Tag;

class Tag_Post extends Model {
	protected $table = 'tag_post';
	protected $fillable = array('tagId' , 'postId'); 

	public static function postsListByTagId($id)
	{
		$posts = Bg_Tag::find($id)->posts()->orderBy('updated_at', 'desc')->paginate(10);
		return $posts;
	}
}
