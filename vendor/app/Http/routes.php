<?php

//这是一个全新的php路由

/// 用户登录，注册，密码找回路由

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('login', 'Auth\AuthController@getLogin');
// 认证路由...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
// // 注册路由...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');
// // 密码重置链接请求路由...
// Route::get('password/email', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');
// // 密码重置路由...
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');
// Route::get('out', function() {
	// Auth::logout();
// });

//以下是后台管理路由，分别管理两个资源tag和posts 

//路由组

Route::group(["namespace" => "Admin", "prefix" => "Admin"], function() {
//	Route::resource('post', 'PostsController');
	Route::get('/lumin', 'IndexController@index');
	Route::get('posts/tag/{tagId}', 'PostsController@postsListByTagId');
	Route::get('post/{postId}/{tagId?}', 'PostsController@show')->where('tagId', '[0-9]+')->where('postId', '[0-9]+');
	Route::post('/post/{postId}/destroy', 'PostsController@destroy');
	Route::get('/post/{postId}/edit/{tagEditId?}', 'PostsController@edit');
	Route::post('post/{postId}/update', 'PostsController@update');
	Route::get('post/create', 'PostsController@create');
	Route::post('post/store', 'PostsController@store');
	Route::get('tags/manage', 'TagsController@index');
	Route::any('tags/delete', 'TagsController@destroy');
	Route::any('tags/update', 'TagsController@update');
	Route::any('tags/create', 'TagsController@store');
});

Route::get('echarts', function() {
	return view('echarts')->withTitle('iot管理系统');
});


Route::group(["namespace" => "Iot", "prefix" => "iot", "middleware" => "auth.basic"], function() {
//Route::group(["namespace" => "Iot", "prefix" => "iot" ], function() {
	Route::get('/monitor', 'MonitorController@index');
	Route::get('/monitor/{id}', 'MonitorController@show')->where('id', '[0-9]+');
	Route::get('/sensor/create', 'SensorController@create');
	Route::post('/sensor', 'SensorController@store');
	Route::get('/sensor/{id}/edit', 'SensorController@edit');
	Route::put('/sensor/{id}', 'SensorController@update');

	Route::get('/history/{id}/{from?}/{to?}', 'HistoryController@show')->where('id', '[0-9]+')->where('from', '([0-9]{2}-){2}[0-9]{2}')->where('to', '([0-9]{2}-){2}[0-9]{2}');
	//Route::get('/data', 'DataController@store');
	Route::get('/data/{sensor_id}', 'DataController@index');
	Route::get('manage', 'manageController@index');
	Route::get('sensorDel/{id}', 'SensorController@destroy');
	//Route::get('/sensor/{sensor_id}/data/{day}', 'DataController@index');

	// Route::get('/data', function() {

		// //Data::create('sensor_id')
		// var_dump(Request::all());
	// });
});

Route::get('iot/data', 'Iot\DataController@store');

route::get('session', function() {
	var_dump(Session::all());
});

route::get('deleteData', function() {
	DB::table('iot_data')->delete();
});


use YuanChao\Editor\text;
Route::get('/', function() {
	var_dump(explode(':', '33:44'));
	exit;
	return view('iot.monitor');
	echo Markdown::text('<h2>welcom to the index !</h2>');  
});

Route::get('testMarkdown', function() {
	return view('markdown');
});

Route::post('upload', function() {

    $data = EndaEditor::uploadImgFile('endaEdit');
    return json_encode($data);            
});

use App\User, App\Data, App\Sensor;

Route::get('fill_iot_data', function() {
	DB::table('iot_users')->delete();
	DB::table('iot_data')->delete();
	DB::table('sensors')->delete();
	
	for($i = 0; $i < 10; $i++) {
		$user = User::create(['name' => '我是用户'.$i]);
		for($j = 0; $j < 3; $j++) {
			$sensor = Sensor::create(['name' => '传感器'.$j,'unit' => $j, 'math' => $j, 'user_id' => $user->id]);

			for($k = 0; $k < 100; $k++) {
				Data::create(['value' => $k, 'sensor_id' => $sensor->id]);
			}
		}
	}
	echo 'success';
});

use Carbon\Carbon;
Route::get('t', function() {
	// 测试一对多
	$sensors = User::find(16)->sensors()->where('created_at','>', '2016-02-26 12:09:03');//()->first();//->created_at();//->date;//getDates();//->take(10);
	$d = User::whereBetween('created_at', ['2016-02-28 00:00:00', '2016-03-27 00:00:00'])->get();
	$p = Sensor::find(35)->datas()->get();
	var_dump($p);

printf("Now: %s", Carbon::now());
});


