<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//require_once('../testRoute.php	');
Route::get('layout', function() {
	return view('index')->withTitle('总体布局');
});
use Gregwar\Captcha\CaptchaBuilder;

//use YuanChao\Editor\text;
Route::get('/', function() {
	echo Markdown::text('welcom to the index !');  
});

Route::get('markdown', function() {
	return view('markdown');
});
/*
Route::get('home', function($results) {
	return view('user.home')->withResults($results);
});*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	//'password' => 'Auth\PasswordController',
]);

Route::get('registerEmailCheck' , 'User\UserController@registerEmailCheck');

Route::post('jj' , function(){
	//return Request::input('email') ;
	//sleep(8);
	//abort(503);
	return 0;
});


Route::get('red' , function(){
	echo 'i am a redirect !';
});

Route::get('all' , function(){
	return view('all');
});


Route::get('textRegister' , function(){
	return view('user.register')->withTitle('测试 ');
} );

//下面是应用的真正路由

//管理用户注册，登录，密码找回
Route::controllers([
	'user' => 'User\UserController' ,
	'password' => 'User\PasswordController' ,
]);

use App\User;

Route::get('rom' , function() {
	/*
	//$users = User::all();
	//print($users);
	echo $users[0]->email;
	foreach ($users as $user) {
		var_dump($user->email);
	}
	//var_dump(User::all() );
	$som = User::where('email', '=', '15644898@qq.com')->firstOrFail();
	print_r($som);
	if($som->id){
		echo 'i';
	} else {
		echo 'jj';
	}*/
	$user = DB::table('users')->where('email', '156448398@qq.com')->first()->email;
	//->pluck('name') ;
	print_r($user);
	echo $user;
});
Route::get('session' , function(){
	var_dump(Session::all() );
});

Route::get('rojm', function() {
	 $obj = User::where('email' , '=' , '156448398@qq.com' )->first();//用first方法得到的是对象，用get方法得到的是数组
     var_dump($obj);
});

Route::get('redc' , function() {
	return view('user.home')->withResults(['kdfjdsk','iiii'])->withTitle('djfkdsj') ;
});

//Route::get('vieww' , 'User\UserController@view');
Route::get('vieww' , function() {
	return view('user.home')->withTitle('kdfasjf')->withResults( true );
});

Route::get('cookie' , function() {
	//echo Request::cookie('remember_token');
	//var_dump( Request::cookie() );
	//echo $_COOKIE["user"];

// A way to view all cookies
print_r($_COOKIE);
});

Route::get('abd' , function() {
	abort(404);
	echo 'fsdhfsd';
});

Route::get('captcha/{tmp}',   'CaptchaController@captcha' );
Route::post('captchaCheck' , 'CaptchaController@check' );

Route::get('compose', function() {
	$tags = array("name" => "kfjds", "id" => 2);
	var_dump([$tags]);
	// ['name' => 'kdfjds','id' => 'kfjdsk']
	return view('compose')->withTitle('compose sample')->withTags([$tags]);
});


use App\Bg_Tag;

Route::get('seed' ,function() {
	DB::table('bg_tags')->delete();

    for ($i=0; $i < 5000; $i++) {
      Bg_Tag::create([
        'name' => '中华'.$i
      ]);
    }
    echo 'seed complete!';
});

use App\Bg_Post;

Route::get('Bg_PostSeed' ,function() {
	DB::table('bg_posts')->delete();

	for($i=0; $i<100 ; $i++) {
		if($i/2==0) {
			$tagId = $i/2;
		}else {

			$tagId = ($i-1)/2;
			
		}

		Bg_Post::create(['title' => '我是标题'.$tagId , 'content' => '文章内容'.$i ,
				'bg_tagId' => $tagId ]);
	}

	echo '添加成功！';
});

use xinfeng\Type;
use xinfeng\Good;
use xinfeng\Type_Good;

Route::get('type_good_seed' , function() {
	DB::table('types')->delete();
	DB::table('goods')->delete();

	for($i=0; $i<20 ; $i++ ) {
		Type::create(['name' => '商品类型'.$i ]);
		
	}

	for($i=0; $i<50 ; $i++ ) {
		$good = Good::create(['name' => '商品名'.$i , 'title' => '商品标题'.$i ]);
		$j = rand(0,20);//产生随机数模拟新增商品时候类型的选择
		$a = rand(0,5)+$j;

        //模拟每次新增商品选择两种类型	
		Type_Good::create(['goodId' => $good->id , 'typeId' => $j]);

		Type_Good::create(['goodId' => $good->id , 'typeId' => $a]);
	} 
	echo 'sucess!';
	
});






/**
 * 以下是对eloquent	的探索.
 * 
 */

Route::get('eloquent' , function() {
	/*$results= Bg_Tag::all();
	foreach($results as $e) {
		var_dump( $e.'<br>' );
	} 
	var_dump(Bg_Tag::findOrFail(10)->name );*/

	//var_dump(Bg_Tag::find(3)->posts()->first()->title );
	//var_dump(Bg_Post::find(5)->tag()->get() );
	//测试一对多
	$results = Type::find(20)->goods()->get() ;
	foreach ($results as $result) {
		echo $result->id.'商品名'.$result->name.'商品所属类型'.$result->pivot->typeId.$result->pivot->created_at.'<br>';
	}
	//测试反向多对多.查找该商品所有的类型
	$results = Good::find(20)->types()->get() ;
	var_dump($results->toJson());
	foreach ($results as $result) {
		echo $result->id.'类型名'.$result->name.'商品id'.$result->pivot->goodId.'<br>';
	}
	
});

//模拟分页
//use Illuminate\Http\Request;
Route::get('paginate' , function(Request $request) {
	//echo 'jj';
	$tags = Bg_Tag::all(); //  no method orderBy('updated_at' , 'desc');
	//Bg_Post::create(['title' => 'xinde']);
	$posts = Bg_Tag::find(3)->posts()->orderBy('updated_at' , 'desc')->paginate(2);
	$posts = DB::table('bg_posts')->orderBy('updated_at' , 'desc')->paginate(10);
	$posts->setPath('ajax_paginate');

	//var_dump($posts);
	//$posts->setPath('my/url');
	//var_dump($posts);
	//echo '<br>'.$posts->count();
	
	//var_dump( $request->route('id') );
	return view('compose')->withTitle('分页')->withPosts($posts)->withTags($tags);


});

Route::any('ajax_paginate' , function() {
	//$posts = DB::table('bg_posts')->orderBy('updated_at' , 'desc')->paginate(10)->lists('title');//->toJson();//取得单一列并转为json
	//$posts = DB::table('bg_posts')->select('id' , 'title')->take(10);
	$posts = DB::table('bg_posts')->select('id', 'title')->orderBy('updated_at', 'desc')->paginate(10)->toJson();
	//也可以用Bg_Post::select()
	//var_dump($users);

	//$posts = Bg_Post::take(10)->get()->toJson();
	/*
	$data = array('jjjj' => 'jfjasdfjjs' , 'fshfhsh' => array( array('fjasjdj' => 'fkskf' ,'jjjj') , 'hfdshfh' => 'fjsdjfj' ) ); 
	echo json_encode($data);*/
	//echo '我是谁';
	//var_dump(json_encode($data) );
	// $posts);
//echo 	json_encode($posts);
	//var_dump( $posts);
	echo $posts;
});
//use Request;
/*
Route::any('post/create' , function() {
	//echo Request::input('data');

	var_dump( Request::all() );
	//Bg_Post::create(['content' => Request::input('data') , 'title' => '新增的']);
});*/


/**
 * 以下是简单文章功能的标签文章一对多实现
 */
//Route::resource('photos', 'PhotoController');

Route::resource('articles' , 'PostController');
Route::get('posts_by_tag/{id}' , function($id) {
/*
	function my_error(){
		echo '错误';
	}*/

	//set_error_handler('my_error');
	//try{
	$posts = Bg_Tag::find($id)->posts()->select('id' , 'title')->orderBy('updated_at' , 'desc')->paginate(10)->toJson();
//}
	//catch(Exception $e) {
	//function error($errno,$errstr) {
		//if($errno==E_NOTICE){  
        //echo "错误:",$errstr;  
    	//}
	//}


	echo $posts;
});

//以下是管理文章后台
//
Route::get('userIndex' , function() {
	$posts = DB::table('bg_posts')->orderBy('updated_at' , 'desc')->paginate(10);
	$tags = Bg_Tag::all();
	return view('user.index')->withTitle('后台主页')->withPosts($posts)->withTags($tags);
});
Route::group([ 'namespace' => 'User' , 'prefix' => 'User' ], function() {
	Route::resource('articles', 'PostController');
	Route::resource('tags', 'TagController' );
	
	Route::get('viewArticlesByTag/{id}', function($id) {
		$posts = $posts = Bg_Tag::find($id)->posts()->select('id' , 'title')->orderBy('updated_at' , 'desc')->paginate(10);
		$tags = Bg_Tag::all();
	return view('user.index')->withTitle('后台主页')->withPosts($posts)->withTags($tags);
	});
});

// some test 

Route::get('tt' , function () {
	$a = array() ;
	$a[1] = 'jfdjf';
	$a[2] = 'fjdjf';
	$a[0][0] = 'fdjfj';
	var_dump($a[0]);
});

Route::get('redis' ,function () {
	$redis = Redis::connection();
	echo $redis->get('lumin');
});

use App\Http\Controllers\CommentController;
Route::get('jjj' , function() {
	$comments = new CommentController();
$id = $comments->save(1, "Redis is awesome!", "Mikushi", 42);
	$otherId = $comments->save(1, "i know!", "Asiendra", 43, $id);
		$_3 = $comments->save(1, "yeeha!", "Mikushi", 42, $otherId);
		$comments->save(1, "mehehehe!", "Pythian", 44, $otherId);
			$comments->save(1,'yah,i am 4 lever', 'lumin', 32, $_3);

	$p = $comments->save(1, "I'm jaleous!", "MongoDB", 45, $id);
		$comments->save(1,'i am new ttt' , 'new' , 34, $p);
	$comments->save(1, "Me too!", "Memcached", 45, $id);
$comments->save(1, "Redis is the shit!", "Me", 46);
$comments->save(1, "Correction, Redis is The shit!", "OtherMe", 47);
/*
$id = $comments->save(1, "hi!", "lumin", 42);
	$o = $comments->save(1,'hello' , 'juk', 34, $id);
*/
$myComments = $comments->getComments(1);

//print_r($myComments);
$comments->printComments($myComments[1], 0, $myComments);
 

});

Route::get('testA', function() {
	$com = new CommentController();
	$comments = $com->mul('item:1:comments');
	foreach ($comments as   $comment) {	
		var_dump($comment);
	}
});



// just for test rom,2016.1.27

Route::get('user', function() {
	//rom 的得到的是一个rom实例，但是可以作为数组使用
	$users =Bg_Tag::all();

	// 获取数组元素多少,这里就当做他是数组来用
	var_dump(count($users));
	echo '<br>';
	echo date("y--m--d h--i--s", time());
//	var_dump(Bg_Tag::findOrFail(40));
	echo '<br>';
	// 这里如果找不到会抛出异常,可以在exception handler 中注册一个逻辑，当异常来临时会处理它
//	var_dump(Bg_Tag::where('id', '<', 3)->firstOrFail());

//可以无限的连接下去，take(10)并不能立即取出数据集，需要通过后续处理
//	var_dump(Bg_Tag::where('id', '>', 3)->take(10)->take(3)->get());
//	var_dump(Bg_Tag::where('id', '>', 3)->count());
	/*
	Bg_Tag::chunk(1, function($users) {
		foreach ($users as $key => $user) {
			echo $user->id;
			echo '<br>';
		}
	});*/
//上面会选择一个表的所有数据
/*
$tags = new Bg_Tag;
$tags->name = 'dfjdskf';
$g = $tags->save();
echo $g;
var_dump(Bg_Tag::find(5051));
*/

//Bg_Tag::where('id', '<', 55)->update(['name' => 'lumin']);
//var_dump(Bg_Tag::where('id', '<', 55)->get());
// Bg_Tag::where('id', '<', 90)->delete();
// 测试软删除
//$t = Bg_Tag::where('id', '<', 90)->get();
//var_dump($t);

//测试强制软删除查询
$t = Bg_Tag::withTrashed()->where('id', '<', 82)->get();
var_dump($t);
});

//测试多对多

Route::get('emptyAllData', function() {
	DB::table('bg_tags')->delete();
	DB::table('bg_posts')->delete();
});

use App\Tag_Post;
Route::get('inserPost', function() {
	// 插入10个标签到数据库以供文章选择

for($i = 0; $i < 10; $i++) {
	Bg_Tag::create(['name' => '标签云'.$i]);
}

  // 模拟插入十个文章到数据库，每个文章选择多个标签
  for($i = 0; $i < 40; $i++) {
  	$post = Bg_Post::create(['title' => '我是文章标题'.$i, '我是文章内容' => '啦啦啦啦啦就'.$i]);

  	//往枢纽表插入关系
	$j = rand(0,10);//产生随机数模拟新增商品时候类型的选择
	$a = rand(0,10);

	Tag_Post::create(['tagId' => $j, 'postId' => $post->id]);
	Tag_Post::create(['tagId' => $a, 'postId' => $post->id]);
  }
});

/*
重新排序方法
ALTER  TABLE  `table_name` DROP
`id`;
2，添加新主键字段：


1

ALTER  TABLE  `table_name` ADD
`id` MEDIUMINT( 8 ) NOT
NULL  FIRST;
3，设置新主键：


1

ALTER  TABLE  `table_name` MODIFY
COLUMN  `id` MEDIUMINT( 8 ) NOT
NULL  AUTO_INCREMENT,ADD
PRIMARY  KEY(id);
*/

Route::get('findPostByTag', function() {
	$tagId = 1;
	$posts = Bg_Tag::find($tagId);
	var_dump($posts);

});