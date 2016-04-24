<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="{{url('assets/i/favicon.png')}}" />

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">
  <meta name="csrf-token" content="{{ csrf_token() }}" />


  <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
  <!--
  <link rel="canonical" href="http://www.example.com/">
  -->

  <link rel="stylesheet" href="{{url('assets/css/amazeui.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/admin.css')}}">
  <style type="text/css">
  .pagination{
    position: relative;
    text-align: center!important;
    padding-left: 0;
    margin: 1.5rem 0;
    list-style: none;
    color: #999;
  }
  .pagination>li {
    display: inline-block;
  }
  .pagination>li>a {
    position: relative;
    display: block;
    padding: .5em 1em;
    text-decoration: none;
    line-height: 1.2;
    background-color: #jfd;
    border: 1px solid #ddd;
    border-radius: 0;
    margin-bottom: 5px;
    margin-right: 5px;
  }
  .pagination>li>a:hover {
    background-color: #BCBFBC;
  }
  .pagination>li>span {
    position: relative;
    display: block;
    padding: .5em 1em;
    text-decoration: none;
    line-height: 1.2;
    border: 1px solid #ddd;
    border-radius: 0;
    margin-bottom: 5px;
    margin-right: 5px;
  }
  .active *{
    background-color: #2C89BF;
    color: white;
  }
  .disabled *{
    background-color: #ECF1EC;

  }
  .am-panel a {
    color: white;
  }

  .charts-width {
    height: 300px;
  }
  </style>
  @yield('css')
</head>
<body>

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>lumin</strong> <small>基于物联网web远程监控系统</small>
  </div>
</header>

<div class="am-g admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="#"><span class="am-icon-home"></span>实时状态</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 历史数据 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="#" ><span class="am-icon-check"></span>二氧化碳</a></li>
          </ul>
        </li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— lumin</p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> wiki</p>
          <p>Welcome to the lumin's time</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->

  <div class="admin-content">
  @yield('admin-content')
  <div class="am-g">
    <div class="am-u-lg-4" >
    <div id="co2" class="charts-width"></div>
    </div>
    <div class="am-u-lg-4">
    <div id="NH3" class="charts-width"></div>
    </div>
    <div class="am-u-lg-4">
    <a href="#"><div id="you" class="charts-width"></div></a>
    </div>
  </div>

  <div class="am-g">
  <div class="am-u-lg-3 am-u-lg-offset-1">
  <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
  <input type="text" class="am-form-field" placeholder="选择日期" readonly>
  <span class="am-input-group-btn am-datepicker-add-on">
    <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
  </span>
  </div>
  </div>
  </div>

  <div class="am-g">
  <div class="am-u-md-8 am-u-md-offset-1">
  <div class="am-panel am-panel-default">
  <div class="am-panel-hd am-text-center">
  <span class="am-icon-heart am-text-secondary  am-text-xl">数据表格</span>
  </div>
  <table class="am-table am-table-bd am-table-bdrs am-table-striped am-table-hover">
              <tbody>
              <tr>
                <th class="am-text-center">名称</th>
                <th>值</th>
                <th>时间</th>
              </tr>
              <tr>
                <td class="am-text-center"><span class="am-icon-qq">二氧化碳</span></td>
                <td>Google Chrome</td>
                <td>3,005</td>
              </tr>
              <tr>
                <td class="am-text-center"><img src="assets/i/examples/admin-firefox.png" alt=""></td>
                <td>Mozilla Firefox</td>
                <td>2,505</td>
              </tr>
              <tr>
                <td class="am-text-center"><img src="assets/i/examples/admin-ie.png" alt=""></td>
                <td>Internet Explorer</td>
                <td>1,405</td>
              </tr>
              <tr>
                <td class="am-text-center"><img src="assets/i/examples/admin-opera.png" alt=""></td>
                <td>Opera</td>
                <td>4,005</td>
              </tr>
              <tr>
                <td class="am-text-center"><img src="assets/i/examples/admin-safari.png" alt=""></td>
                <td>Safari</td>
                <td>505</td>
              </tr>
              </tbody>
            </table>
  </div>
  </div>
  </div>

  </div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<footer class="am-margin-top">
  <hr/>
  <p class="am-text-center">
    <small>power by lumin</small>
  </p>
</footer>
<!-- 以上页面内容 开发时删除 -->

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<!--<![endif]-->
<script src="{{url('assets/js/amazeui.min.js')}}"></script>
<!--<script src="{{url('js/echarts.min.js')}}"></script>-->
<script src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var t = $('#co2').width();
    console.log(t);
  });

  Date.prototype.getD = function(s) {
    var y = this.getFullYear().toString().substr(2,2);
    //y = y.substr(2,2);
    var d = (this.getDate+1 <10)?'0'+this.getDate():this.getDate();
    var cache = [this.getMonth(), this.getDate(), this.getHours(),this.getMinutes(),this.getSeconds()];
    for(var i = 0; i < cache.length; i++) {
      cache[i] = cache[i] < 10 ? '0'+cache[i]: cache[i];
    }
    if(s) {
      return cache[2]+':'+cache[3]+':'+cache[4];
    }
    return y+'-'+cache[0]+'-'+cache[1]+' '+cache[2]+':'+cache[3]+':'+cache[4];

  }
</script>

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

<script type="text/javascript">
  console.log(option1);
  console.log(new Date());
</script>

@yield('js')
</body>
</html>
