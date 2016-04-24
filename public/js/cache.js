
<script type="text/javascript">
  var co2 = document.getElementById('co2');
  var co2Chart = echarts.init(co2);
//  co2Chart.showLoading();
  var app = {};
 option = {
			title: {
				text: '实时数据'
			},
			tooltip: {},
			legend: {
				data:['销量']
			},
			xAxis: {
				data: [new Date().getD()]
			},
			yAxis: {},
			series: [{
				name: new Date().getD(),
				type: 'bar',
				data: [5, 20, 36, 10, 10, 20]
			}]
		};

		// 使用刚指定的配置项和数据显示图表。
	   // co2Chart.setOption(option);
	  
   app.t1 = setInterval(function() {
	option.series[0].data.push(34);
	co2Chart.setOption(option);
  }, 5000);
	 clearInterval(app.t1);


  var NH3 = document.getElementById('NH3');
  var NH3Chart = echarts.init(NH3);
  var t = new Date().getD(1).toString();
  var option1 = {
	title: {
		text: 'CO2实时状况'
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
		data: [t, 'jdkfj', 'jj', t]
	},
	yAxis: {
		type: 'value'
	},
	series: [{
		name: '',
		type: 'line',
		smooth: true,
		data: [10, 12, 21, 54]
	}]
};

NH3Chart.setOption(option1, true);

var you = document.getElementById('you');
var youChart = echarts.init(you);
 option2 = {
	toolbox: {
		show : true,
		feature : {
			saveAsImage : {show: true}
		}
	},
	series : [
		{
			type:'gauge',
			data:[{value: 12, name: 'CO2'}],
			min: 0,
			max: 30
		}
	]
};
clearInterval(app.t2);
app.t2 = setInterval(function () {
	option2.series[0].data[0].value = (Math.random() * 10).toFixed(2) - 0;
	youChart.setOption(option2);
},5000);


</script>
