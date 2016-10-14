;var banner = {
	now:0,
	count:0,
	dom:$("#banner"),
	delay:3000,//切换间隔ms
	time:500,//切换时间ms
	start:0,//初始化第几张n-1
	keyboard:false,//键盘控制
	touchable:true,
	auto:true,
	goNext:function() {
		banner.now+=1;
		if(this.now>=this.count){
			banner.goTo(0);
			return false;
		}
		banner.goTo(banner.now)
	},
	goPrev:function(){
		banner.now-=1;
		if (this.now<0) {
			banner.goTo(this.count-1)
			return false;
		}
		banner.goTo(banner.now)
	},
	goTo:function(which,func){
		var which = which||0;
		this.dom.find('.banner-list').animate({'marginLeft':"-"+(Number(which)*100)+"%"},banner.time);
		this.dom.find('.banner-counter li').eq(which).addClass('active').siblings().removeClass('active');
		this.dom.find('.banner-control-count .up').html(which+1)
		banner.now=which;
		switch (which) {
			case 0:
				this.dom.find(".banner-one-animate").animateCss("zoomInDown")
				break;
			default:
				// statements_def
				break;
		}		
		if(func){
			func();
		}
	},
	resize:function(){
		var counter = banner.dom.find('.banner-counter');
		var w = 100;
		var windowW = $(window).width();
		banner.dom.find('.banner-list').css('width', w*banner.count+"%").css("height",windowW*0.33+100+"px");
		banner.dom.find('.banner-list li').css('width',w/banner.count+"%").css("height",windowW*0.33+100+"px");
		banner.dom.find('.banner-list li .banner-back').css('width',"100%");
		counter.css('marginLeft', "-"+counter.width()/2+"px");
	},
	init:function(option){
		if (option) {
			for(var prop in option){
				if (banner.hasOwnProperty(prop)) {
					this[prop] = option[prop];
				}
			}
		}
		var selector = $(option.selector).length?option.selector:false||"#banner";
		var count = $(selector).find('.banner-list').find('li').length;
		this.dom = $(selector);
		this.selector = selector;
		this.count = count;
		this.dom.find('.banner-control-count .down').html(count);
 		this.dom.find('.banner-counter').empty().css('bottom', '20px');
 		var counterDom = this.dom.find('.banner-counter')
		for(var i=0;i<count;i++){
			counterDom.append('<li title="'+(i+1)+'"></li>');
		}
		this.listnerBinder();
		this.resize();
		this.goTo(this.start>=count?0:this.start);
		if (this.auto) {
			this.timer = setInterval(function(){banner.goNext()},banner.delay);
		}
		if(!navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i)&&count>1){
 			$(selector).find('.banner-control').css('display', 'block');
		}else if(navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i)){
			// banner.initTouch(navigator.userAgent);
			if (option.touchable) {
				this.initTouch();
			}
		}
	},
	GetSlideAngle:function(dx, dy) {
	    return Math.atan2(dy, dx) * 180 / Math.PI;
	},	
	GetSlideDirection:function(startX, startY, endX, endY) {
	    var dy = startY - endY;
	    var dx = endX - startX;
	    var result = 0;
	 	
	    //如果滑动距离太短
	    if (Math.abs(dx) < 2 && Math.abs(dy) < 2) {
	        return result;
	    }
	 
	    var angle = this.GetSlideAngle(dx, dy);
	    if (angle >= -45 && angle < 45) {
	        result = 4;
	    } else if (angle >= 45 && angle < 135) {
	        result = 1;
	    } else if (angle >= -135 && angle < -45) {
	        result = 2;
	    }
	    else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {
	        result = 3;
	    }
	 
	    return result;
	},	
	initTouch:function(e){
		var startX,startY;
		var selector = banner.dom;
		selector.on("touchstart",function(ev){
		 	startX = ev.originalEvent.touches[0].pageX;
		    startY = ev.originalEvent.touches[0].pageY;   			
		})
		selector.on('touchend', function(ev) {
			 var endX, endY;
			    endX = ev.originalEvent.changedTouches[0].pageX;
			    endY = ev.originalEvent.changedTouches[0].pageY;
			    var direction = banner.GetSlideDirection(startX, startY, endX, endY);
			    switch (direction) {
			        case 4:
			            banner.goPrev()
			            break;
			        case 3:
			           	banner.goNext()
			            break;
			        default:            
			    }   
		});
	},
	listnerBinder:function(){
		var keyTimer;
		$(document).on('click', '.banner-right', function(event) {
			banner.goNext();
		});
		$(document).on('click', '.banner-left', function(event) {
			banner.goPrev();
		});
		$(document).on('click', '.banner-counter li', function(event) {
			event.preventDefault();
			banner.goTo($(this).index())
		});
		if (this.auto) {
			$(document).on('mouseenter',banner.selector, function(event) {
				clearInterval(banner.timer);
				banner.timer = ""
			});
			$(document).on('mouseleave',banner.selector, function(event) {
				banner.timer = setInterval(function(){banner.goNext()},banner.delay);
			});
		}
		$(window).on('resize', function(event) {
			event.preventDefault();
			banner.resize();
		});
		if (this.keyboard) {
			$(document).on('keyup', function(event) {
				var code = event.keyCode|| event.which.keyCode;
				clearTimeout(keyTimer)
				if (code==37) {
					keyTimer = setTimeout(function(){
						banner.goPrev();
					}, 200)
					return false;
				}else if(code==39){
					keyTimer = setTimeout(function(){
						banner.goNext();
					}, 200)
					return false;
				}else{
					return;
				}
			});
		}
	}

}