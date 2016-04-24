var monitor = function(option) {
	var d = $('meta[name="iot-data"]').attr('content'); 
	var iot_data =eval("("+ d+")");
	var sensors_data = iot_data.sensors;
//	将sensors_data转换为key(sensor_id) => value形式,以便统一历遍
	var sensors_data_obj = {};
	console.log(iot_data);
	var user_id = 'user_id:' + iot_data.userId;
	var that;
	// sensors用于生成图形实例
	var sensors = {};
	var sensor_options = {};
	// 所有在线的sensor的id值
	var sensors_id = [];
	var socket; 

	that = {
		
		init: function() {
			for(var key in sensors_data) {
				sensors['sensor_id:' + sensors_data[key].id] = echarts.init(document.getElementById('sensor_'+sensors_data[key].id) );
				sensors_data_obj['sensor_id:' + sensors_data[key].id] = sensors_data[key];
				sensors_id[key] = 'sensor_id:' + sensors_data[key].id;
				delete sensors_data;
				console.log(sensors);
			}
		},

		initOption: function() {
			for(var key in sensors) {
				if(option.type == 'gauge') {
					sensor_options[key] = {
						toolbox: {
							show : true,
							feature : {
								saveAsImage : {show: true}
							}
						},
						series : [
							{
								type:'gauge',
								data:[{value: 0, name: sensors_data_obj[key].name}],
                                detail: { formatter: sensors_data_obj[key].unit, textStyle: { fontSize: 8 }, },
                                min: (function () {
                                    var min = sensors_data_obj[key].gap.split(',')[0];
                                    min = parseInt(min);
                                    console.log(min);
                                    if(min) {
                                        return min;
                                    } else {
                                        return 0;
                                    }
                                })(),
                                max: (function () {
                                    var max = sensors_data_obj[key].gap.split(',')[1];
                                    max = parseInt(max);
                                    console.log(max);
                                    if(max) {
                                        return max;
                                    } else {
                                        return 30;
                                    }
                                })(),
							}
						]
					}
				} else if(option.type = 'line') {
					sensor_options[key] = {
						title: {
                            text: sensors_data_obj[key].name + ':单位-' + sensors_data_obj[key].unit
						},
						tooltip: {
							trigger: 'axis'
						},
						toolbox: {
							show: true,
							feature: {
								saveAsImage: {show: true}
							}
						},
						xAxis: {
						type: 'category',
							boundaryGap: false,
							data: []
						},
						yAxis: {
							type: 'value'
						},
						series: [{
							name: '',
							type: 'line',
                            //markPoint: { data: [ name => '测试' ], },
							smooth: true,
							data: [],
						}]
					}
				}
			}
		},

		updateData: function() {
			socket = io.connect('http://localhost:3000');
			socket.emit('addUsers', {"user_id": user_id, "online_sensors": sensors_id});
			socket.on('updateData', function(data) {
				console.log(data);
				for( var key in data ) {
					console.log(key, sensor_options[key]);
					if(option.type == 'line') {
						sensor_options[key].series[0].data.push(data[key].value);
						var date = data[key].date.split(' ')[1];
						console.log(date);
						sensor_options[key].xAxis.data.push(date);
					} else {
						sensor_options[key].series[0].data[0].value = data[key].value.toString().substring(0,4);
					}
					sensors[key].setOption(sensor_options[key]);
					if(option.dosomething) {
						// 向外部函数传递当前key(用于操作sensor_id 的DOM),并传递当前更新值
						option.dosomething(key, data[key]);
					}
				}
				
			});
		},



		start: function() {
			that.init();
			that.initOption();
			for(key in sensors) {
				sensors[key].setOption(sensor_options[key]);
			}
			that.updateData();

		}

	};

	return that;

}


