/*var windowHeight = $()window.height(), //浏览器窗口高度
    $(window).width();//获取浏览器可视区域窗口宽度
    $(document).scrollTop();//获取网页滚动的高度
    containOffTop = offset().top(),//容器距离浏览器顶部的距离
    scroll =      //浏览器滚动的距离
    containHeight =         //容器的总高度
    initHei = //元素最初的高度
    */


//;(function($) {
	//$.fn.fixhere = function() {
		//滚动定位器
		
		var scroller = function(params) {
			var target = params.target,
			    $scr = $(params.scr);//需要跟随转动的元素
			var windowHeight = $(window).height(),//获取浏览器可视区域窗口宽度
			    scroll,
			    containOffsetTop = target.offset().top,
			    containHeight = target.height(),
			    scrollMax = containHeight-windowHeight+containOffsetTop,
			    initHeight = -(containHeight/2-10),
			    scrheight =-(containHeight-(windowHeight/2) ),//目标元素定位，逆向定位//计算得到的需要设定给目标元素的高度
			    that;

			that = {
				init : function() {
					
				},

				start : function() {
				    //that.init();
				    that.getheight();
					$(document).bind('scroll' , function(){
						//console.log('jjj');
						that.getheight();
					} );
				},

				getheight : function() {
					scroll = $(document).scrollTop();
					//console.log(scroll);
					console.log(containOffsetTop+'容器顶部距离');
					
					console.log(scrollMax+'i am max');
					console.log(containHeight+'iam container');
					console.log(windowHeight+'wind');
					if(windowHeight<containHeight) {  

					    if( scroll>containOffsetTop && scroll<scrollMax ) {
						    console.log('a aa ');

						    scrollRang = scroll - containOffsetTop;
						    console.log(scrollRang+'scrollRang');
						    height = scrheight+scrollRang;//如果不用这个 scrheight,则会有累加问题
						    console.log(height+'margin-height');
						    that.setCss();
					        }
					    }else{

					    	height = initHeight;
					    	console.log('this'+height);
					    	that.setCss();
					    } 
				},

				setCss : function() {
					console.log($scr);
					$scr.removeClass('hidden').css('margin-top',height );
				},

				close : function() {
					$(document).unbind('scroll');       //去掉绑定
					$scr.addClass('hidden');
				}
			};
			return that;

		};
	
		/*
		return $(this).each(function(){
			var $here = $(this);
			scroller($here)

	};
}(jQuery);
*/

