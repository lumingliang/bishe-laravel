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
    @yield('link')
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

    @yield('content')
    

    <!--footer-->
    <footer>
                <div class="copy-container">
                        Code licensed under <a href="/docs/#license">MIT</a>. Docs under <a href="https://tldrlegal.com/license/apache-license-2.0-(apache-2.0)">Apache 2</a>
                        <span>|</span> © 2015 <a href="http://lumin.com/">lumin</a>
                </div>
    </footer>

</div> <!--end all-->



    <script src="http://localhost/js/jquery.min.js"></script>
    <script src="http://localhost/js/bootstrap.min.js"></script>
    <script src="//localhost/js/autocomplete.min.js"></script>
    <script src="//localhost/js/autosize.min.js"></script>
    <script src="http://localhost/js/my.all.js"></script>
    @yield('script')
</body>
