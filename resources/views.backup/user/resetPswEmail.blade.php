@extends('layaout')

@section('link')
<style>
.panel{
	margin-top: 80px;
}
</style>


@endsection

@section('content')

<div class="container re" id="con">

	<div class="row"> 
         
		<div class="col-md-8 col-md-offset-2 " >
			<div class="panel panel-default">
				<div class="panel-heading center"><h3><b>密码重置</b></h3></div>
				<div class="panel-body">
					<form class="form-horizontal" id="_1">
					<fieldset disable>

						<div class="form-group">
							<label class="col-md-4 control-label">输入您的邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" data-validType="email" name="email" value="{{ old('email') }}" data-url={{url('user/emailexist')}}>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
						        <button type="button" class="btn btn-primary btn-lg" id="submit" data-submitUrl="{{ url('password/emailsend') }}">
									发送验证码到您的邮箱
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
  <script src={{url("js/formValidater.js")}}></script>
  <script type="text/javascript">
  $(document).ready(function(){
	    var valid =  validForm({ form:$('#_1') });
        valid.start();
	    //$('#_1').validater();
	    //console.log($('#con').offset());
	    //console.log(valid.successIcon);
	    /*
	    valid.form().find('.submit').click(function(){ 
	    	var result = valid.submit();
	    	console.log(result+'all');
	    	if(result ) {
	    		console.log(' i can submit');
	    		var scroll = scroller({ 'target':$('#con'),'scr':$('#progress') });
	            scroll.start();
	            
	            $.post(
	            	'{{url('user/register')}}' ,
	            	$('#_1').serialize(),
	            	function(data) {
	            		scroll.close();
	            		if(data===0) {
	            			$('#_1').append('<div class="alert alert-danger " role="alert">出现错误！请刷新后操作！</div>');
	            		} else {
	            			var str = '<div class="alert alert-success"><h1>注册成功！请到您的邮箱激活！</h1></div>';
	            			$('form').empty().parent('.panel-body').append(str);
	            		}
	            	});
	    	} 
	
	            //scroll.close();
        });*/
	});
</script>


@endsection  