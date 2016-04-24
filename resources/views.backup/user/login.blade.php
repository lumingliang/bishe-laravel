@extends('layout')

@section('link')
<style>
	.panel{
		margin-top: 30px;
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
input[type=checkbox] {
	visibility: hidde;
}
.checkbox1 {
	width: 40px;
	height: 10px;
	background: #555;

	position: relative;
	border-radius: 3px;
	display: inline-block;
}
.checkbox1 label {
	display: block;
	width: 16px;
	height: 16px;
	border-radius: 50%;
	-webkit-transition:all .5s ease;
	-moz-transition:all .5s ease;
	-o-transition:all .5s ease;
	transition:all .5s ease;
	cursor: pointer;
	position: absolute;
	top: -3px;
	left: -3px;

	background: #ccc;
}
.checkbox1 input[type=checkbox]:checked + label {
	left: 27px;
}

</style>

@endsection

@section('content')

<div class="container re" id="con">

	<div class="row"> 
         
		<div class="col-md-8 col-md-offset-2 " >
			<div class="panel panel-default">
				<div class="panel-heading center"><h3>欢迎您登录</h3></div>
				<div class="panel-body">
					<form class="form-horizontal" id="_1" role="form" >
					<fieldset disable>

						<div class="form-group">
							<label class="col-md-4 control-label">输入您的邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" data-validType="email" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">输入您的密码</label>
							<div class="col-md-6">
								<input type="password" data-validType="pwd" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							    <div class="checkbox">
							        <input type="checkbox"  id="remember" name="remember"  class="hidde">
							        <label for="remeber" class="btn btn-primary" >点我</label>

							    </div>
							    <b>点击记住我</b>
							   
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
						        <button type="button" class="btn btn-primary btn-lg submit">
									点我登录
								</button>
							</div>
						</div>
						<label for="remeber" class="btn btn-primary" >点我</label>

					</fieldset>
					</form>
				</div>
			</div>
		</div>
</div>


<!--
<div class="row hidden">
<div class="sm-col-12">
<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
    <span class="sr-only">45% Complete</span>
  </div>
</div>
</div>
</div>-->



 

@endsection

@section('script')
  <script src="{{url("js/formValidater.js")}}"></script>
<script type="text/javascript">
$('#remember').click(function( ) {
	console.log('click');
});
    

	//$(document).ready(function(){
	//var width = $('.float').parents('.float-parent').width();
	//console.log(width);
	//console.log(width);

	//var t = $('.row')[0];
	//console.log(t.style.top );
	//console.log($('.row')[1]);

	/*
	var $obj = $('.panel-body'),
        wid = $obj.width(),
        hei = $obj.height();
        console.log(hei);*/
	  //  objStyle = $obj[0].style;
	    //width = objStyle.width,
	    //height = objStyle.height;

	  //  console.log(wid+','+hei);
	   // console.log(height+','+width);
	  //  objStyle.position = "relative";
	  //  console.log($('.pro'));
/*
	    $('.pro').removeClass('hidden').css(
	    {
	    	"width":wid/2+"px",
	    	"height":hei/2+"px",
	    	"position":"absolute",
	    	"top":hei/2+"px",
	    	"left":wid/4+"px",
	    	"display":"block",
	    	"z-index":10,
	    	"opacity":1
	    }).clone().prependTo($obj);
*/
	    /*
	    $obj.append(hh).find('.progress').css(
	    {
	    	"width":width,
	    	"height":height,
	    	"position":absolute,
	    	"top":0;
	    	"left":0
	    });*/
	    

	//$('form').find('input').each(valid);
	/*
	function valid(){
	    errorIcon = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' ,

		$('form').delegate('input' , 'keyup' ,function(){
		   var ele = $(this);
           eleParent = ele.parents('.form-group');
            var jj = eleParent.removeClass('has-error has-feedback').find('.alert , .glyphicon');
                        jj.remove();
            console.log(jj);

           //eleParent.find('.glyphicon').remove();
           val = ele.val();
           //console.log(val);
           validType = ele.attr('validType');
           if(val === ''){
           	ele.after(errorIcon);
           	//console.log(eleParent.find('.col-md-6') );
            eleParent.addClass('has-error has-feedback');
           	ele.after('<div class="alert alert-danger hidden" role="alert">错误</div>' );
           }
		});
	}
	valid();
	/*

	var text = function(params) {
        var ff = 'i am a text',
        that ;
        that = {
        	jj: function() {
        		console.log('i am the func');
        		console.log(ff);
        	},

        	pp:function() {
        		//that.jj;
        		that.jj();
        	}

        };

        return that;

	};

	var textpro = function(name) {
		var that = text();
		console.log(that);
		that.actio = function() {
			return 'i mmm'+name;
		};
		return that;
	};
	//var hhh = text().pp() ;
	var kk = textpro('ming').actio();
	console.log(kk);
	//kk.actio();*/
	
	$(document).ready(function(){
	    var valid =  validForm({ form:$('#_1') });
        valid.start();
    });
        /*
        valid.option({ajaxCan:true});
	    //$('#_1').validater();
	    //console.log($('#con').offset());
	    //console.log(valid.successIcon);
	    valid.form().find('.submit').click(function(){ 
	    	var result = valid.submit();
	    	console.log(result+'all');
	    	if(result ) {
	    		console.log(' i can submit');
	    		var scroll = scroller({ 'target':$('#con'),'scr':$('#progress') });
	            scroll.start();
	            
	            $.post(
	            	'{{url('user/login')}}' ,
	            	$('#_1').serialize(),
	            	function(data) {
	            		console.log('i am re'+data);
	            		scroll.close();
	            		if(data==0) {
	            			console.log(data+'hh');
	            			$('#_1').append('<div class="alert alert-danger" role="alert"> 您的账号或密码有误！</div>');
	            		}
	            	});
	    	} 
	
	            //scroll.close();
        });
	});
	
	/*
	$(document).bind('scroll' , function(){
		console.log('ssss');
	} );*/
</script>

@endsection
