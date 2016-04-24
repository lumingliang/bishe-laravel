<?php namespace App\Http\Controllers\Iot;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Sensor;
use Session;

class MonitorController extends Controller {


	public function index() {
		// return view('echarts')->withTitle('监控系统主页');
		$userId = Auth::user()->id;
		$user = User::find($userId);
//		var_dump($user);
		$sensors = $user->sensors;
		session(['userId' => $userId, 'sensors' => $sensors, 'user' => $user]);

		//var_dump(Session::all());
//		var_dump($sensors);
		$data = ['userId' => $user->id, 'sensors' => $sensors];
		//var_dump(json_encode($data));
		return view('iot.index')->withTitle('监控系统主页')->with('user', $user)->with('sensors', $sensors)->with('data', json_encode($data))->with('mon', true);
	}

	public function show($id) {
		// $userId form auth
		$sensor = Sensor::find($id);
		// 为了让它是数组
		$data = ['userId' => session('userId'), 'sensors' => [$sensor]];
		//var_dump(json_encode($data));
		return view('iot.monitor')->withTitle($sensor->name.'数据监控状态')->with('user', session('user'))->with('sensors', session('sensors'))->with('data', json_encode($data))->with('mon', true)->with('sensor', $sensor);
		//var_dump($sensor->name);
	}

}
