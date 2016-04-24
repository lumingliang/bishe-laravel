<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use DB;

use App\Bg_Tag;
use App\Bg_Post;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Bg_Tag::all(); //  no method orderBy('updated_at' , 'desc');
		//Bg_Post::create(['title' => 'xinde']);
		//$posts = Bg_Tag::find(3)->posts()->orderBy('updated_at' , 'desc')->paginate(2);
		//$posts = DB::table('bg_posts')->orderBy('updated_at' , 'desc')->paginate(10);
		$posts = Bg_Post::select('id', 'title')->orderBy('updated_at', 'desc')->paginate(10);
		$posts->setPath('ajax_paginate');
		//var_dump($posts);

	//var_dump($posts);
	//$posts->setPath('my/url');
	//var_dump($posts);
	//echo '<br>'.$posts->count();
	
	//var_dump( $request->route('id') );
	return view('compose')->withTitle('分页')->withPosts($posts)->withTags($tags);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//var_dump( Request::all() );
	Bg_Post::create(['content' => Request::input('data') , 'title' => '新增的']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo Bg_Post::find($id)->content;
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
		//
	}

}
