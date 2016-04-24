<?php
namespace App\Http\Controllers\Iot;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Data;
use App\Sensor;

class HistoryController extends Controller {
	
	public function index() {
		return view('echarts')->withTitle('监控系统主页')->with('mon', true);

	}

	public function show($id, Request $request) {
		//echo 'from'.$from.' to'.$to;
		foreach( session('sensors') as $sen ) {
			if($sen->id == $id) {
				$sensor = $sen;
				//echo $sensor;
				break;
			}
		}

		if(isset($request->from)) {
			// 加入空格以便识别
			$from = $request->from.' '.'00:00:00';
			//$to = $request->to.'00:00:00';
			$to = $request->from.' '.'23:59:59';
			$date = $request->from;
			//echo $request->from;
		} else {
			$from = date('y-m-d ').'00:00:00';
			//$form = '16-02-27 ';
			$to = date('y-m-d ').'23:59:59';
			$date = date('y-m-d');
		}

		
		$data = Sensor::find($id)->datas()->whereBetween('created_at', [$from, $to])->orderBy('created_at', 'desc')->get();
		$t = json_encode([$data, $sensor]);
		//var_dump(json_encode($data));
		//var_dump($data);
		//降序
		return view('iot.history')->with('user', session('user'))->with('sensors', session('sensors'))->with('data_all', $t)->with('his', true)->withTitle('历史数据')->with('datas', $data)->with('sensor', $sensor)->withDate($date);
	}
}

