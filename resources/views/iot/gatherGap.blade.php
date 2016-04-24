
@extends('iot.layout')
@section('admin-content')

<div class="am-u-lg-6 am-u-md-12">

<form action="" id="edisonForm" method="" class="am-form" >

    <legend>edison 管理</legend>

    <p>在这里，您可以管理自己的edison开发板，包括可以修改传感器采集数据时，在本地存入 excel文件的时间间隔,单位为时每天; 还可以修改采集数据上传到远程数据库的时间间隔，单位为时每天;此外，还可以修改edison每天向您邮箱发送采集数据汇报excel文件的时间，格式为24小时制,时:分:秒,如22:00:00代表每天22点定时发送汇报邮件。</p>
    <br>

    <div class="am-form-group">
        <label for=""> 修改excel采集时间间隔day/h </label>
	    <input type="text" name="excel" id="" value="{{ $edison->excel }}" minlength="1" required/>
    </div>

    <div class="am-form-group">
        <label for=""> 修改数据库采集保存时间间隔day/h</label>
        <input type="text" name="db" id="" value="{{ $edison->db }}" minlength="1" required/>
    </div>

    <div class="am-form-group">
        <label for=""> 修改每日发送email时间/time/24</label>
        <input type="text" name="sendEmailTime" id="" value="{{ $edison->sendEmailTime }}" minlength="6" required/>
    </div>

        <input type="hidden" name="userId" id="" value="{{ 'user_id:'.$edison->userId}}" />

    <div class="am-form-group">
    <button type="button" id="excel" class="am-btn am-btn-secondary">确认</button>
    </div>


</form>

<div id="info">
</div>

</div>
@if(isset($success))
添加成功，您的传感器凭证是，可以在右方点击查看
    <button class="am-btn am-btn-secondary" type="submit">继续添加</button>

@endif
@endsection

@section('js')

<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script src="{{url('js/iot/edison.js')}}"></script>

@endsection
