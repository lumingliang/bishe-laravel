@extends('iot.layout')
@section('admin-content')
<div class="am-g">



	<div class="am-u-lg-6">

<div class="am-panel am-panel-default">
          <div class="am-panel-hd am-cf" data-am-collapse="{target: '#sensor-info'}">传感器信息<span class="am-icon-chevron-down am-fr" ></span></div>

          <div id="sensor-info" class="am-panel-bd am-collapse am-in">

                <strong><span class="am-icon-upload"></span>您拥有以下传感器</strong>

<ul class="am-list admin-content-file">
	<!-- <li><strong><span class="am-icon-upload"></span>您拥有以下传感器</strong> </li> -->
	@foreach( $sensors as $sensor )
              <li>
				  <strong><span class="am-icon-upload"></span>{{ $sensor->name }}</strong>
				<br/><br>
				<p><button class="am-btn am-btn-primary" data-am-popover="{content: '{{ 'sensor_id:'.$sensor->id }}'}">点击显示专有id</button></p>
				<div class="am-cf">
                  <div class="am-fr">
					  <a role="button" href="{{ url('iot/sensor/'.$sensor->id.'/edit') }}" type="button" class="am-btn am-btn-primary am-btn-xs"><span class="am-icon-pencil"></span></a>
					  <a role="button" href="{{ url('iot/sensorDel/'.$sensor->id) }}" class="am-btn am-btn-primary am-btn-xs ">删除</a>

                  </div>
                </div>



              </li>
	@endforeach

	</ul>
    </div>
	<!-- end user-info-panel-bd -->

	</div>
	<!-- end user-info-panel -->
</div> <!-- end lg-6 -->


	<div class="am-u-lg-6">

<div class="am-panel am-panel-default">
          <div class="am-panel-hd am-cf" data-am-collapse="{target: '#user-info'}">用户信息<span class="am-icon-chevron-down am-fr" ></span></div>

          <div id="user-info" class="am-panel-bd am-collapse am-in">

<ul class="am-list admin-content-file">
              <li>
                <strong><span class="am-icon-upload"></span>用户专有id</strong>
				<br/><br>
				<p><button class="am-btn am-btn-primary" data-am-popover="{content: '{{ 'user_id:'.$user->id }}'}">点击显示专有id</button></p>
              </li>

              <li>
                <strong><span class="am-icon-check"></span>个性签名</strong>
				<br><br>
				<div class="admin-task-bd">
                <p>输出user个性签名</p>
                </div>
				  
				<div class="am-cf">
                  <div class="am-btn-toolbar am-fl">
                    <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-check"></span></button>
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-pencil"></span></button>
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-times"></span></button>
                    </div>
                  </div>
                  <div class="am-fr">
                    <button type="button" class="am-btn am-btn-default am-btn-xs">删除</button>
                  </div>
                </div>
              </li>
	</ul>
    </div>
	<!-- end user-info-panel-bd -->

	</div>
	<!-- end user-info-panel -->
</div> <!-- end lg-6 -->


	<div class="am-u-lg-6">

<div class="am-panel am-panel-default">
          <div class="am-panel-hd am-cf" data-am-collapse="{target: '#edison-manage'}">edison系统管理<span class="am-icon-chevron-down am-fr" ></span></div>

          <div id="edison-manage" class="am-panel-bd am-collapse am-in">

<ul class="am-list admin-content-file">
                <p> 点击以下按钮管理您的edison</p>
                <br>
                <a role="button" href="{{ url('iot/manage/gatherGap') }}"  class="am-btn am-btn-primary am-btn-xs"> 管理</a>
                <hr>

	</ul>
    </div>
	<!-- end user-info-panel-bd -->

	</div>
	<!-- end user-info-panel -->
</div> <!-- end lg-6 -->

</div> 
<!-- end am-g -->

@endsection

