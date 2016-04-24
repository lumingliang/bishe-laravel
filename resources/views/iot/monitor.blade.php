@extends('iot.layout')
@section('admin-content')
  <div class="am-g">
	<div class="am-u-lg-10">
		<a href="{{url('iot/monitor/'.$sensor->id)}}"><div id="{{'sensor_'.$sensor->id}}" class="charts-width"></div></a>
	</div>
	</div>


  <div class="am-g">
<div class="am-u-lg-10">

  <div class="am-panel am-panel-default">
  <div class="am-panel-hd am-text-center">
  <span class="am-icon-heart am-text-secondary  am-text-xl">实时数据</span>
  </div>
  <table class="am-table am-table-bd am-table-bdrs am-table-striped am-table-hover">
              <tbody >
              <tr id="{{'sensor_id:'.$sensor->id}}" >
                <th>值</th>
                <th>时间</th>
              </tr>

              </tbody>
  </table>
  </div>
</div>
</div>
	
@endsection

@section('js')
<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script src="{{url('js/iot/sensor.js')}}"></script>

<script>


var monitorAll = new monitor({type: 'line', dosomething: function(sensor_id, data) {
	console.log(sensor_id);
    var table = $(document.getElementById(sensor_id));
	var html = '<tr><td>'+ data.value + '</td><td>' + data.date + '</td></tr>';
	console.log(table);
	//table.prepend(html);
    table.after(html);
}});
monitorAll.start();

</script>
@endsection
