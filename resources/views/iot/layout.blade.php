<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
		@if( isset($mon))
		<meta name="iot-data" content="{{$data}}">
        @endif
		@if( isset($his))
		<meta name="iot-data" content="{{$data_all}}">
        @endif

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
  .admin-content {
	  padding: 50px;
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
		  <li><a href="{{ url('iot/monitor') }}"><span class="am-icon-home"></span>实时状态</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 历史数据 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
			@foreach($sensors as $sensor)
			<li><a href="{{ url('iot/history/'.$sensor->id) }}"><span class="am-icon-flag"></span>{{$sensor->name}}</a></li>
			@endforeach
          </ul>
        </li>
		<li><a href="{{url('iot/sensor/create')}}"><span class="am-icon-file"></span> 新增传感器</a></li>
				<li><a href="{{url('iot/manage')}}"><span class="am-icon-file"></span> 系统管理</a></li>
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
@if(isset($mon)|isset($his))
<script src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script>
@endif
<script src="{{url('js/date-patch.js')}}" ></script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>



<script type="text/javascript">
  console.log(new Date());
</script>

@yield('js')
</body>
</html>
