<?php namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

use App\Bg_Tag;
use Request;
use DB;
use App\Bg_Post;


class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//echo '返回文章新增表单';
		//$tagsJson = Bg_Tag::all()->toJson();
		//$a=array(1=>'a',2=>'b');//php 去掉数组键名
		//	unset($a[1]);
		/*
		$array = array('a'=>'aa','b'=>'bb');

$array = array_value($array);

print_r($array);

		 */
		//$hh = array('jj'=>'fdf' , 'fdsf' => 'dffd');
		$tags = DB::table('bg_tags')->select('id' , 'name' )->get();
		$tagss = array();
	    //var_dump($tags);
	    foreach ($tags as $key => $value) {
	    	$tagss[$key] = array('value' => '' , 'data' => array('id' => '' , 'query' => '') );
	    	$tagss[$key]['value'] = $value->name;

	    	$tagss[$key]['data']['id'] = $value->id;
	    	$tagss[$key]['data']['query'] = $key;

	    }
	   // var_dump($tagss);
		/*
		foreach($tags as $key => $val){
    		$tags = $val;
    		unset($tags[$key]);
			}*/
		
		
		$tags = json_encode($tagss);
		//var_dump($tags); 
		return view('user.createArticle')->withTitle('新增文章')->withTags($tags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		var_dump(Request::all() );
		if(Request::input('flag') == 0 ){
			Bg_Post::create(['title' => Request::input('title') , 'content' => Request::input('content') ,
				'bg_tagId' => Request::input('id') ]);
		} else {
			echo '新增的';
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bg_Post::find($id)->delete();
		return;
		
	}

}
