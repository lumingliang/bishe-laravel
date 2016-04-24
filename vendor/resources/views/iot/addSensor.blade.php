@extends('iot.layout')
@section('admin-content')

<div class="am-u-sm-12 am-u-md-6">
<form action="{{url('iot/sensor')}}" method="post" class="am-form" >
  <fieldset>
    <legend>新增传感器</legend>
    <div class="am-form-group">
      <label for="name">为您的传感器起一个名字</label>
      <input type="text" name="name" id="" minlength="1" required/>
    </div>
    <div class="am-form-group">
      <label for="unit">为您的传感器设置单位</label>
      <input type="text" name="unit" id="" minlength="1" required/>
	</div>
    <div class="am-form-group">
      <label for="math">为您的传感器设置线性纠正数据</label>
      <input type="text" name="math" id="" minlength="1" required/>
	</div>

						<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="am-btn am-btn-secondary" type="submit">提交</button>
  </fieldset>
</form>
</div>
@if(isset($success))
添加成功，您的传感器凭证是，可以在右方点击查看
    <button class="am-btn am-btn-secondary" type="submit">继续添加</button>

@endif
@endsection
