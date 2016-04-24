<?php

namespace App\Http\Controllers\Iot;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Data;
use App\Sensor;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	// following is not use now
    public function index($sensor_id)
    {
        //echo $sensor_id;
		//echo date('y-m-d H:i:s');

		foreach( session('sensors') as $sen ) {
			if($sen->id == $sensor_id) {
				$sensor = $sen;
				//echo $sensor;
				break;
			}
		}

		$form = date('y-m-d ').'00:00:00';
		$form = '16-02-27 ';
		$to = date('y-m-d ').'23:59:59';
		
		$data = Sensor::find($sensor_id)->datas()->whereBetween('created_at', [$form, $to])->get();
		$t = json_encode([$data, $sensor]);
		//var_dump(json_encode($data));
		//var_dump($data);
		return view('iot.history')->with('user', session('user'))->with('sensors', session('sensors'))->with('data_all', $t)->with('his', true)->withTitle('历史数据')->with('datas', $data)->with('sensor', $sensor);
		
		// echo $form;
		// echo $to;
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		//var_dump($request->all());
		$all  = $request->all();
		// var_dump($all);
		// exit;
		foreach ( $all as $key => $val ) {
			foreach ( $val as $k => $v ) {
				$sensor_id = explode(':', $k)[1];
				//var_dump(explode(':', $k));
				//echo $sensorId;
				//var_dump($v);
				Data::create(['value' => $v['value'], 'sensor_id' => $sensor_id]);
				echo 'store '.$k.'sucess!';
			}
		}
		//Data::create('')
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
