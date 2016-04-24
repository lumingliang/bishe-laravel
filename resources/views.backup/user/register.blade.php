@extends('app')

@section('link')
<style>
	.panel{
		margin-top: 30px;
	}
	.center{
		text-align: center;
	}
	.alert{ 
		margin-bottom: 0px;
	}
	.panel-body{
		opaciy:0.5;
	}
	.pro{
		width: 100px;
	}
	
	.re{
		position: relative;
	}
	.float{
		margin-top: -300px;
		opacity: 1 !important;	
	}
	.sst{
		position: static;
	}
	 .absolute{
		position: absolute;		
		width: 100%;
        margin-right: -15px;
        margin-left: -15px;	
        padding:0 15px;
	}
	.ab{
		margin-top: -300px;
		margin:0 25%;
	}
	@media (min-width: 768px) {
  .cont {
    width: 100%;
    margin-right: -15px;
    margin-left: -15px;
  }
}
@media (min-width: 992px) {
  .con {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .con {
    width: 1170px;
  }
}
@media (max-width: 768px){
	.cont {
		width: 100%;
		margin-right: -15px;
		margin-left: -15px;
	}
}
</style>

@endsection

@section('content')

<div class="container re" id="con">

	<div class="row"> 
         
		<div class="col-md-8 col-md-offset-2 " >
			<div class="panel panel-default">
				<div class="panel-heading center"><h3>欢迎您注册</h3></div>
				<div class="panel-body">
					<form class="form-horizontal" id="_1" role="form"  >
					<fieldset>
						<div class="form-group has-feedback">
							<label class="col-md-4 control-label">输入您的名字</label>
							<div class="col-md-6">
								<input type="text" class="form-control check" data-validType="require" data-url={{url('jj')}}  name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">输入您的邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control check" data-validType="email" data-url={{url('user/emailexist')}} name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group" id="h">
							<label class="col-md-4 control-label">输入您的密码</label>
							<div class="col-md-6">
								<input type="password" data-validType="pwd" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group hidden">
							<label class="col-md-4 control-label">密码强度</label>
							<div class="col-md-8">
							<div class="progress" style="width: 73%;height:10px; margin-top:12px;">
                                <div class="progress-bar progress-bar-danger" style="width: 20%">
                                </div>
                            </div>
                            </div>
						</div>

						<div class="form-group">
							<label class="col-md-4  control-label">再次输入密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" data-validType="pwd2" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
						    <label class="col-md-4 control-label">输入验证码</label>
						    <div class="col-md-3">
						        <input type="text" class="form-control" data-validType="captcha" data-url="{{ URL('captchaCheck') }}" name="captcha">
						    </div>

						</div>

						<div class="form-group">
						    <div class="col-md-3 col-md-offset-4">
						        <img src="{{ URL('captcha/1') }}"  class="img-responsive" disabled id="captcha" >
						    </div>
						</div>

						

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
						        <button type="button" id="submit" class="btn btn-primary btn-lg " data-submitUrl="{{url('user/register')}}">
									点我注册
								</button>
							</div>
						</div>
					</fieldset>
					</form>
				</div>
			</div>
		</div>
		<button id="subtext"> 测试提交</button>
</div>

<div class="re hidden" id="progress">
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
          <span class="sr-only">45% Complete</span>
        </div>
    </div>
</div>


</div>





 

@endsection

@section('script')
  <script src=" {{url("js/formValidater.js") }}" ></script>
  
<script type="text/javascript">
    //var f=$('#h').next().find('.progress-bar');	
	$(document).ready(function(){
	    var valid =  validForm({ form:$('#_1') });
        valid.start();});
	$('#subtext').click(function() {
		$.ajax({
			url:$('#submit').attr('data-url'),
			type:'post',
			success: function(data) {
                console.log(data);
			},
			error: function() {
				console.log(error);
			}
		});
	});
	    
</script>

@endsection
