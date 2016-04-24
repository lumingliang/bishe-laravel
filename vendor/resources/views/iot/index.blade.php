@extends('iot.layout')
@section('admin-content')
  <div class="am-g">
	@foreach($sensors as $sensor)
	<div class="am-u-lg-4">
		<a href="{{url('iot/monitor/'.$sensor->id)}}"><div id="{{'sensor_'.$sensor->id}}" class="charts-width"></div></a>
	</div>
	@endforeach
  </div>
@endsection

@section('js')
<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script src="{{url('js/iot/sensor.js')}}"></script>
<script>

var monitorAll = new monitor({type: 'gauge', dosomething: function(sensor_id, value) {
	console.log('i am the extend fun', sensor_id, value);
}});
monitorAll.start();
</script>
@endsection



