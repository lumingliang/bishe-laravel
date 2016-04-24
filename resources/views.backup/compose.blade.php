@extends('app')

@section('link')


<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.min.css" />

<style>
.section{
	backgroun: linear-gradient(to right, #296ad4 0%, #4e8ef7 100%);
}



body {
    font-family: "Helvetica Neue", Helvetica, Microsoft Yahei, Hiragino Sans GB, WenQuanYi Micro Hei, sans-serif;

    font-size: 18px;
}
.icon-lg{
	font-size: 32em;
	color: red;
}
header {
	text-align: center;
	color: #fff;
    background: linear-gradient(to right, #88B1F5 0%, #4e8ef7 100%);	
}
header img{
	margin: 0 auto 20px;
}

header .container{
	padding-top:30px;
	padding-bottom:30px;
}

header .intro-text .name {
    display: block;
    text-transform: uppercase;
    
    font-size: 24px;
    font-weight: 500;
}


hr.star-light {
    margin: 25px auto 30px;
    padding: 0;
    max-width: 250px;	
    border-top: solid 5px;//hr的厚度
    text-align: center;//用了after后确保居中
}


hr.star-light:after {
    content: "\f005";
    display: inline-block;
    position: relative;
    top: -.75em;
    padding: 0 .25em;
    font-family: FontAwesome;
    font-size: 1.8em;
}




header .intro-text .skills {
    font-size: 1.25em;
    font-weight: 300;
}

.icon-md{
	font-size: 64px;
}

@media(min-width:768px) {
    header .container {
        padding-top: 50px;
        padding-bottom: 50px;
    }

    header .intro-text .name {
        font-size: 2em;
    }

    header .intro-text .skills {
        font-size: 1.75em;
    }
}

p{
	font-weight: 300;
	font-size: 18px;
}


.lead{
	font-weight: bold;
}
/**
 * <!-- 阿里妈妈字库，特殊字体，网页字体-->
 */

@font-face {font-family: 'webfont';
  src: url('//at.alicdn.com/t/yb77984ps9s2x1or.eot'); /* IE9*/
  src: url('//at.alicdn.com/t/yb77984ps9s2x1or.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
  url('//at.alicdn.com/t/yb77984ps9s2x1or.woff') format('woff'), /* chrome、firefox */
  url('//at.alicdn.com/t/yb77984ps9s2x1or.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
  url('//at.alicdn.com/t/yb77984ps9s2x1or.svg#NotoSansHans-Black') format('svg'); /* iOS 4.1- */
}

.web-font{
    font-family:"webfont" !important;
    font-size:16px;font-style:normal;
    -webkit-font-smoothing: antialiased;
    -webkit-text-stroke-width: 0.2px;
    -moz-osx-font-smoothing: grayscale;
}
/**
 * !--endalimamafont-->
 */

.background-img {
	background-image: url("img/profile.png");
    background-size: 130px auto;
    min-height: 300px;
    background-position: 0px  20px;
    background-repeat: no-repeat;
}

.background-img p{
	padding-left: 150px;
}

.expression{
	height: expression(document.getElementById('ee').offsetHeight+"px");
}


.footer {
    position: relative;
    z-index: 100;
    padding: 40px 0 0 0;
    background: #2b3442;
    color: #a4b3cd;
    text-align: center;
    font-size: 20px;
}


.footer .base-links dl {
    float: left;
    margin: 0;
    padding: 15px 10px 20px 10px;
    text-align: left;
    font-size: 0.9em;
}

.footer .base-links dt, .footer .newsletter-text {
    margin: 0;
    padding-bottom: 10px;
    color: #e2eeff;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: bold;
    font-size: 24px;
}
.footer .copy {
    padding: 18px;
    background: #202532;
}

.footer .copy-container {
    margin: 0 auto;
    max-width: 1170px;
}

.offcanvas-toggle{
	position: fixed;
	top:100px;
	right: 3%;
	background-color: blue;
	z-index: 1000;

}

@media(max-width: 760px){
.navbar-offcanvas{
	background-color: #f8f8f8;
    border-color: #e7e7e7;
}
}

.navbar-offcanvas{
	margin-top: 50px;
	padding-top:20px;
}

.well-lg {
    padding: 24px;
    border-radius: 6px;
    text-align: center;
    font-size: 24px;
    border-color: #909026;
    background-color: #ECECCD;
    color: #AD1530;
    font-weight: 700;
}
</style>



@endsection

@section('content')

<header class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <i class="icon-flag icon-md"></i>
                    <div class="intro-text">
                        <span class="name">任何时候都要保持简单</span>
                        <hr class="star-light">
                        <span class="skills">用心去感受世界</span>
                    </div>
                </div>
            </div>
        </div>
</header>


<div class="section">

<div class="container">
<div class="row">
<div class="col-md-2 navbar-offcanvas navbar-offcanvas-left navbar-offcanvas-touch navbar-offcanvas-fade" role="navigation" id="js-bootstrap-offcanvas-2">
  <ul class="list-group">
  <div class="dropdown">
  <a data-target="#"  data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
  <li class="list-group-item">Cras justo odio<span class="caret"></span></li>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel">
    <li>jjjj</li>
    <li>jfajsdf</li>
  </ul>
 </div>
  
  <a  data-toggle="collapse" href="#_1">
  <li class="list-group-item">Dapibus ac facilisis in</li>
  </a>
  <div class="collapse" id="_1">

  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  </div>

  <!-- 以下是所有标签-->
    @foreach ($tags as $tag)
    	<a href={{ "posts_by_tag/".$tag->id }}><li class="list-group-item">{{ $tag->name }}</li></a>`
    @endforeach
  
</ul>
</div>

  <div class="col-md-8" >
	<div class="row" id = 'posts' >
	
  	</div>

	<div id="post_title_container">
  	<div class="row" id = "page">

  		@foreach ($posts as $post)
			<a href={{ "articles/".$post->id }}>
    		<div class="well well-lg">
	    	{{$post->title}}
			</div>
			</a>
    	@endforeach
	</div>

	<?php echo $posts->render(); ?>
	</div>
	
  </div><!--endcol-8-->



  </div><!--endrow--> 
  </div>

 </div><!--endsection-->

 <div class="section-2">
 <div class="container">

 <div class="row">
<div class="col-md-8 col-md-offset-2">

	<h4 style="text-align:center"> Create mobile apps with the web technologies you love.</h4>

	<p>Free and open source, Ionic offers a library of mobile-optimized HTML, CSS and JS components, gestures, and tools for building highly interactive apps. Built with Sass and optimized for AngularJS.
	</p>

	<div class="row">

	<div class="col-md-6 expression" id="ee" style="text-align:center;line-height:100%;">
	<div style="width:100%;height:50%;border:1px solid red;"></div>
	<i class="icon-flag" style="font-size:100px ">
	</i>
	</div>

	<div class="col-md-6">
	<h4>Performance obsessed</h4>
	<p>Speed is important. So important that you only notice when it isn't there. Ionic is built to perform and behave great on the latest mobile devices. With minimal DOM manipulation, zero jQuery, and hardware accelerated transitions, one thing is for sure: You'll be impressed.
	</p>
	</div>

	</div>

	<div class="row">

	<div class="background-img">
		<h4>这是一个背静图片的例子，通过背景图片的位置定位{类似div的绝对定位、相对定位}达到居中，垂直居中，</h4>
		<p>A match made in heaven. Ionic utilizes Angular in order to create a powerful SDK most suited to develop rich and robust applications. Ionic not only looks nice, but its core architecture is built for serious app development, and Angular ties in perfectly.
		</p>
	</div>
	</div>
	</div>


</div>




	
		
</div>
</div>

<div class="row">
	<div class="container">
	<footer class="footr">
		<div class="col-sm-4 col-xs-6" style="display:inline-block;">
			<ul>
				<li><bold>我是标题</bold></li>
				<li>我是小项目</li>
				<li>我是3333</li>
				<li>我是小项目</li>
				<li>我是3333</li>
				<li>我是小项目</li>
				<li>我是3333</li>
			</ul>
		</div>
		<div class="col-sm-4 col-xs-6">
			<ul>
				<li><bold>我是标题</bold></li>
				<li>我是小项目</li>
				<li>我是3333</li>
				<li>我是小项目</li>
				<li>我是3333</li>
				<li>我是小项目</li>
				<li>我是3333</li>
			</ul>
		</div>
		<div class="col-sm-4  col-xs-6">
			<ul>
				<li><bold>我是标题</bold></li>
				<li>我是小项目</li>
				<li>我是3333</li>
				<li>我是小项目</li>
				<li>我是3333</li>
				<li>我是小项目</li>
				<li>我是3333</li>
			</ul>
		</div>
	</footer>
	</div>
</div>


	
		<footer class="footer">
				<div class="row">
				<div class="container">
				<div class="col-sm-4 col-xs-6">
				<dl class="">
					<dt>我的主题</dt>
					<dd><a href="http://ionicframework.com/docs/">文档</a></dd>
				    <dd><a href="http://ionicframework.com/getting-started/">开始</a></dd>
				    <dd><a href="http://ionicframework.com/docs/overview/">概览</a></dd>
				    <dd><a href="http://ionicframework.com/docs/components/">组件</a></dd>
				    <dd><a href="http://ionicframework.com/docs/api/">JavaScript</a></dd>
				    <dd><a href="http://ionicframework.com/submit-issue/">问题反馈</a></dd>
				</dl>
				</div>

				<div class="col-sm-4 col-xs-6">
				<dl class="">
					<dt>我的主题</dt>
					<dd><a href="http://ionicframework.com/docs/">文档</a></dd>
				    <dd><a href="http://ionicframework.com/getting-started/">开始</a></dd>
				    <dd><a href="http://ionicframework.com/docs/overview/">概览</a></dd>
				    <dd><a href="http://ionicframework.com/docs/components/">组件</a></dd>
				    <dd><a href="http://ionicframework.com/docs/api/">JavaScript</a></dd>
				    <dd><a href="http://ionicframework.com/submit-issue/">问题反馈</a></dd>
				</dl>
				</div>

				<div class="col-sm-4 col-xs-6">
				<dl class="">
					<dt>我的主题</dt>
					<dd><a href="http://ionicframework.com/docs/">文档</a></dd>
				    <dd><a href="http://ionicframework.com/getting-started/">开始</a></dd>
				    <dd><a href="http://ionicframework.com/docs/overview/">概览</a></dd>
				    <dd><a href="http://ionicframework.com/docs/components/">组件</a></dd>
				    <dd><a href="http://ionicframework.com/docs/api/">JavaScript</a></dd>
				    <dd><a href="http://ionicframework.com/submit-issue/">问题反馈</a></dd>
				</dl>
				</div>
				</div>
				</div>

				
		<div class="row">
		  <div class="copy">
		    <div class="copy-container">
		      <p class="authors">
		        Code licensed under <a href="/docs/#license">MIT</a>.
		        Docs under <a href="https://tldrlegal.com/license/apache-license-2.0-(apache-2.0)">Apache 2</a>
		        <span>|</span>
		        © 2013-2015 <a href="http://drifty.com/">Drifty Co</a>
		      </p>
		    </div>
		  </div>
		 </div>

		</footer>


<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="dropdown">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown trigger
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dLabel">
    <li>jjjj</li>
    <li>jfajsdf</li>
  </ul>
</div>

<div class="dropdown">
  <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    Dropdown trigger
    <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel">
    <li>jjjj</li>
    <li>jfajsdf</li>
  </ul>

</div>

  <div class="row">

  	<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Link with href
</a>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Button with data-target
</button>
<div class="collapse" id="collapseExample">
  <div class="well">
     我是谁
  </div>
</div>
</div>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

<button class="btn btn-primary offcanvas-toggle pull-left visible-xs" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas-2">
&nbsp&nbsp
</button>

<button class="btn btn-primary" onclick="post_create()"> 新增文章</button>
 @endsection

 @section('script')

 <script type="text/javascript">
 $('.pagination a').click(function(e) {
 	e.preventDefault();
 	var href = $(this).attr('href');
 	$.post(
 		href,
 		function(data) {
 		var	datas = eval('(' + data + ')');
 		//var obj = jQuery.parseJSON('{"name":"John"}');  //第二种解码字符串json为js对象/json方法
 			/*
 			data =[
 			 {
 				'jjj':'jfjsdjf',
 			'jfjdsj ' :	{
 					'kkfksdk' : 'fasjfjjsd' ,
 					'fkaskdfk' : 'jfjdsjf'
 				} ,
 			} , 
 			 'fjdjfj'
 			];

 			data = {
 				"jfjjd" : "dhfhh"
 			};*/

 			//alert(data);
 			//console.log(datas);
 			var pdata = datas.data;
 			//console.log(pdata[0].title);
 			var html = '' ;
 			$.each(pdata, function( i) {
 				var view_post_href ='/articles/'+pdata[i].id;
 				html+='<a href=" '+view_post_href+' " ><div class="well well-lg">'+pdata[i].title+'</div></a>';
 			});
 			$('#page').empty().html(html);
 		}

 		);
 });

function post_create() {
	var post_data = $('#post').html() ;
	$.ajax({
		type: 'POST',
		url: 'articles',
		data:  {
			data: post_data
		},
		success: function() {
			alert('新增成功');
		}

		});
}




	$('#page').delegate("a","click" ,
	function(e) {
	e.preventDefault();
	var href = $(this).attr('href');
	$.get(
		href,
		function(data) {
			//var	datas = eval('(' + data + ')');
			console.log(data);
			$('#post_title_container').html('');
			$('#posts').html(data);

		}
		);
});
 </script>

 @endsection