@extends('layaout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 " >
			<div class="panel panel-default">
				<div class="panel-heading center"><h3>请重置您的密码</h3></div>
				<div class="panel-body">
					<form class="form-horizontal" id="_1" >
					<fieldset disable>
					    <input  class="hidden" name="code" value="{{session('code')}}">
						<div class="form-group">
							<label class="col-md-4 control-label">输入您的新密码</label>
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
						        <img src="{{ URL('captcha/1') }}"  class="img-responsive"  id="captcha" >
						    </div>
						</div>

						

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
						        <button type="button" id="submit" class="btn btn-primary btn-lg " data-submitUrl="{{url('password/reset')}}">
									点我重置
								</button>
							</div>
						</div>

					</fieldset>

				</form>

			</div>

		</div>
	</div>
  </div>
</div>

@endsection

@section('script')
  <script src="{{url("js/formValidater.js")}}"></script>
  
<script type="text/javascript">
	$(document).ready(function(){
	    var valid =  validForm({ form:$('#_1') });
        valid.start();});
	    
</script>

@endsection