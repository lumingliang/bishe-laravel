<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }} </title>
    <link rel="bookmark" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="http://localhost/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/css/bootstrap.offcanvas.css" />
	<link rel="stylesheet" href="http://localhost/fonts/Font-Awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="http://localhost/css/my.all.css"> 
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
    </style>
    @yield('link')
</head>
</head>

<body onLoad="Loaded()">
<!--等待界面-->
<div class="loading center-load" id="load"></div>
<script>
	function Loaded() {
        document.getElementById("load").style.display = "none"
        document.getElementById("all").style.display = "";

    }
</script>

<input type="checkbox" class="hidden" id="tm" />

<div id="mobile_navbar">
    @yield('mobile_navbar')
</div>

<label for="tm" id="mask">
</label>

<label for="tm"></label>

<div id="all" style="display:none">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top_nav_collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top"><i class="icon-flag"></i><i class="icon-power-off"></i><span class="tt">晴子清</span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top_nav_collapse">
                <ul class="nav navbar-nav navbar-right">
                	<li>
                        <a href="#contact">首页</a>
                    </li>
                    <li>
                        <a href="#portfolio">我的文章</a>
                    </li>
                    <li>
                        <a href="#about">关于我</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- /.end顶导航栏-->

    <!--大标题栏        结束-->
	@yield('header')



    <!--中心内容
    <label id="label" for="tm">Click Me</label>-->
    <div class="container">

        <div id="left_slide_navbar">
            <!--侧边栏导航-->
            @yield('left_slide_navbar')
        </div>
        <div class="row">
            <div class="col-md-7 col-md-offset-4 col-lg-offset-3" id="main_content">
                <!--主内容-->
                @yield('main_content')
            </div>
        </div>
    </div>

    <!--footer-->
    <footer>
                <div class="copy-container">
                        Code licensed under <a href="/docs/#license">MIT</a>. Docs under <a href="https://tldrlegal.com/license/apache-license-2.0-(apache-2.0)">Apache 2</a>
                        <span>|</span> © 2015 <a href="http://lumin.com/">lumin</a>
                </div>
    </footer>

</div> <!--end all-->

@yield('extra')


    <script src="http://localhost/js/jquery.min.js"></script>
    <script src="http://localhost/js/bootstrap.min.js"></script>
    <script src="//localhost/js/autocomplete.min.js"></script>
    <script src="//localhost/js/autosize.min.js"></script>
    <script src="http://localhost/js/my.all.js"></script>
    @yield('js')
</body>
