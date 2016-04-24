<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="bookmark" href="favicon.ico" />
    <title>xiaoyanzi</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-icon
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
    <!-- Custom styles for this template   background-image:url(1.png);-->
    <style type="text/css">
    /* 
    .navbar-brand{
      font-size: 40px;
     
    }
     .color-white{
      color: white;
    }
    .navbar{
      background-color: #0072c6;
      color: #ffffff;
    }
    .navbar-fixed-top{
     border-width: 0;
    }
    .navbar-nav li:hover{
       background-color:#00CC00;
    }
    .navbar-nav li a{
      font-size: 36px;
      font-weight: bold;
      color:inherit;
      line-height: 45px;
    } 

    @media (max-width: 767px) {
      .navbar-nav li{
        text-align: center;
        border: 1px solid #009933;
        font-weight: bold;

      }
    }*/
    
    .navbar-header {
        height: 100px;
    }
    
    .navbar img {
        height: 28px;
        width: auto;
    }
    
    .font-icon {
        font-size: 36px;
    }
    
    .text-center {
        text-align: center;
    }
    
    .navbar .navbar-header a {
        position: relative;
    }
    
    .jumbotron {
        background-color: #00CC33;
        margin-bottom: 0;
        text-align: center;
    }
    
    .jumbotron .btn {
        font-size: 48px;
        background-color: green;
    }
    
    .dise-1 {
        background: #77CEE7;
        position: relative;
        color: #fff;
        width: 100%;
        display: table;
        min-height: 800px;
    }
    
    .dise-2 {
        background: #4E1774;
        ;
        position: relative;
        color: #fff;
        width: 100%;
        display: table;
        min-height: 800px;
    }
    
    .dise-3 {
        background-color: blue;
        position: relative;
        color: #fff;
        width: 100%;
        display: table;
        min-height: 800px;
    }
    
    .radius {
        border-radius: 10px;
        border: 1px solid white;
    }
    
    .kuai {
        padding: 30px 0;
        font-size: 40px;
        font-weight: 900;
        border: 1px solid red;
        text-align: center;
    }
    /*
    .glyphicon{
       color: rgb(255, 140, 60);
       font-size: 50px;
    }*/
    
    #menu a {
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        color: blue;
        background-color: red;
    }
    
    .menu-reset {
        position: fixed;
        top: 0px;
        z-index: 10;
        background-color: red;
    }
    
    #menu-wrap {
        position: fixed;
        margin: 0 auto;
        top: 0px;
    }
    
    .font-lg {
        font-size: 20px !important
    }
    
    .test_box {
        max-height: 300px;
        padding: 3px;
        outline: 0;
        border: 1px solid #a0b3d6;
        font-size: 20px;
        line-height: 28px;
        padding: 5px;
        padding-left: 10px;
        word-wrap: break-word;
        overflow-x: hidden;
        overflow-y: auto;
        border-radius: 5px;
        border-color: rgba(82, 168, 236, 0.8);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(82, 168, 236, 0.6);
    }
    
    .jumbotron h1 {
        font-family: webfont;
    }
    
    .center {
        text-align: center;
    }
    
    .alert {
        margin-bottom: 0px;
    }
    </style>
    @yield('link')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img alt="nav" src="1.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">燕子科技</a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!--jumbotron start -->
    <div class="jumbotron" id="sss">
        <div class="container">
            <h1>明亮科技欢迎您!</h1>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
            <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
        </div>
        <!--end jumbotron container-->
    </div>
    <!-- end jumbotron-->
    <section class="dise-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2>Safari bug warning!</h2>
                    <p class="text-danger">As of v8.0, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                    <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <section class="dise-2">
        <div class="container">
            <div class="col-sm-6 col-md-4 col-lg-3 ">
                <div class="thumbnail">
                    <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/null.png?v2" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/codeguide.png" alt="Headroom.js"></a>
                    <div class="caption">
                        <h3> 
                <a href="http://codeguide.bootcss.com" title="Bootstrap 编码规范：编写灵活、稳定、高质量的 HTML 和 CSS 代码的规范。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'codeguide'])">Bootstrap 编码规范<br><small>by @mdo</small></a>
              </h3>
                        <p>Bootstrap 编码规范：编写灵烟子发建设的房间阿斯顿付款圣诞节发生的减肥就撒旦发卡萨飞</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 ">
                <div class="thumbnail">
                    <a href="http://www.jquery123.com/api/" title="jQuery API 中文文档/手册" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'jQueryAPI中文手册'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/null.png?v2" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/jqueryapi.png" alt="jQuery API 中文文档/手册"></a>
                    <div class="caption">
                        <h3> 
                <a href="http://www.jquery123.com/api/" title="jQuery API 中文文档/手册" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'jQueryAPI中文手册'])">jQuery API <br><small>中文手册</small></a>
              </h3>
                        <p>
                            根据最新的 jQuery 1.11.x 和 2.1.x 版本翻译的 jQuery API 中文文档/手册。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-md-4 col-lg-3 ">
                <div class="thumbnail">
                    <a href="http://www.bootcdn.cn/" title="Bootstrap中文网开放CDN服务" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'bootcdn'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/null.png?v2" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/opencdn.png" alt="Open CDN"></a>
                    <div class="caption">
                        <h3> 
                <a href="http://www.bootcdn.cn/" title="Bootstrap中文网开放CDN服务" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'bootcdn'])">Open CDN<br><small>开放CDN服务</small></a>
              </h3>
                        <p>Bootstrap中文网联合又拍云存储共同推出了开放CDN服务，我们对广泛的前端开源库提供了稳定的存储和带宽的支持，例如Bootstrap、jQuery等。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-md-4 col-lg-3 ">
                <div class="thumbnail">
                    <a href="http://expo.bootcss.com/" title="Bootstrap优站精选" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'youzhan'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/null.png?v2" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/expo.png" alt="Bootstrap优站精选"></a>
                    <div class="caption">
                        <h3> 
                <a href="http://expo.bootcss.com/" title="Bootstrap优站精选" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'youzhan'])">优站精选<br><small>Bootstrap网站实例</small></a>
              </h3>
                        <p>Bootstrap优站精选频道收集了众多基于 Bootstrap 构建、设计精美的、有创意的网站。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 ">
                <div class="thumbnail">
                    <a href="http://www.gulpjs.com.cn/" title="gulp.js - 基于流的自动化构建工具。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'gulpjs'])"><img class="lazy" src="http://static.bootcss.com/www/assets/img/null.png?v2" width="300" height="150" data-src="http://static.bootcss.com/www/assets/img/gulpjs.png" alt="gulpjs"></a>
                    <div class="caption">
                        <h3> 
                <a href="http://www.gulpjs.com.cn/" title="gulp.js - 基于流的自动化构建工具。" target="_blank" onclick="_hmt.push(['_trackEvent', 'tile', 'click', 'gulp'])">gulp.js<br><small>基于流的自动化构建工具。</small></a>
              </h3>
                        <p>哈哈gulp.js - 基于流(stream)的自动化构建工具。Grunt 采用配置文件的方式执行任务，而 Gulp 一切都通过代码实现。
                        </p>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <!-- /.container -->
    </section>
    <section class="">
        <div class="container " id="sss">
            <div class="row">
                <div class="col-sm-2 col-xs-12 ">
                    <div class="row">
                        <div class=" col-sm-12 col-xs-6">
                            <a class="list-group-item text-center"><span class="glyphicon glyphicon-plus font-icon"></span><br>上传商品</a>
                        </div>
                        <div class=" col-sm-12 col-xs-6">
                            <a class="list-group-item"><span class="glyphicon glyphicon-plus"></span><br>上传商品</a>
                        </div>
                        <div class=" col-sm-12 col-xs-6">
                            <a class="list-group-item"><span class="glyphicon glyphicon-plus"></span><br>上传商品</a>
                        </div>
                        <div class=" col-sm-12 col-xs-6">
                            <a class="list-group-item"><span class="glyphicon glyphicon-plus"></span><br>上传商品</a>
                        </div>
                    </div>
                </div>
                <!-- end col-lg-4-->
                <div class="col-sm-10 col-xs-12">
                    <div class="page-header col-sm-offset-1">
                        <h3>新增商品</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="form-group form-group-lg">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control font-lg" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control font-lg" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password hhhhhhhss</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                        <button type="button" class="btn btn-default btn-lg">
                                            <span class="glyphicon glyphicon-star ">&nbsp</span>
                                        </button>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-success has-feedback form-group-lg">
                            <label class="control-label col-sm-2" for="inputSuccess2">Input with success</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" id="inputSuccess2">
                                    <span class="glyphicon glyphicon-ok form-control-feedback hidden"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-2" for="te">编辑您的个人信息</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="te" rows="3"></textarea>
                                <textarea rows=1 cols=40 style='overflow:scroll;overflow-y:hidden;;overflow-x:hidden' onfocus="window.activeobj=this;this.clock=setInterval(function(){activeobj.style.height=activeobj.scrollHeight+'px';},200);" onblur="clearInterval(this.clock);"></textarea>
                                <div class="test_box" contenteditable="true"></div>
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end col-lg-8-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/subCHstring.js"></script>
    <script src="js/ellipsis.js"></script>
    <script>
    $('.navbar li').hover(function() {
            $(this).addClass('active');
            console.log('jjj');
        },
        function() {
            $(this).removeClass('active');
        }
    );
    $(function() {
        $(window).resize(resizeMenu);
        resizeMenu();

    });

    function resizeMenu() {
        var menu = $('#menu');
        menu.unwrap('#menu-wrap');

        /*
            menu.removeClass('menu-reset');
            menu.removeAttr('left');*/


        if ($(this).width() < 750) {
            var html = '<div id="menu-wrap"></div>';
            menu.wrap(html);

            /*
        var left=( $(this).width()-menu.width() )/2 ;
        console.log(left);
      menu.addClass('menu-reset') ;
      menu.css('left',left+'px'  );*/



        }

    }
    $('.text_box').keyup(function() {
        console.log($('.text_box').val());
    });

    $('.thumbnail .caption p').ellipsis(30);
    $(window).scroll(function() {
        var scroH = $(this).scrollTop();
        console.log(scroH);
        console.log($('#sss').offset().top);
    });
    </script>
    @yield('script')
</body>

</html>
