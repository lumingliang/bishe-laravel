

@extends('iot.layout')
@section('admin-content')

<div class="am-u-sm-12 am-u-md-6">
	<form action="{{url('iot/sensor/'.$sensor->id)}}" method="post" class="am-form" >
  <fieldset>
    <legend>修改传感器</legend>
    <div class="am-form-group">
      <label for="name">名字</label>
	  <input type="text" name="name" id="" value="{{ $sensor->name }}" minlength="1" required/>
    </div>
    <div class="am-form-group">
      <label for="unit">单位</label>
	  <input type="text" name="unit" id="" value="{{ $sensor->unit }}" minlength="1" required/>
	</div>
    <div class="am-form-group">
      <label for="math">线性纠正数据</label>
	  <input type="text" name="math" id="" value="{{ $sensor->math }}" minlength="1" required />
	</div>
<input type="hidden" name="_method" value="PUT">
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
