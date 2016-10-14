$.fn.extend({
    animateCss: function (animationName,func) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            //$(this).removeClass('animated ' + animationName);
            if(func){
            	func();	
            }
        });
    }
});
$.getUrlParam = function(name){
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");  
    var r = window.location.search.substr(1).match(reg);  
    if (r != null) return unescape(r[2]); return null;
} 
$.isMobile = !!navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i);
Array.prototype.unique = function(func) {
    var res = [], hash = {};
    for(var i=0, elem; (elem = this[i]) != null; i++)  {
        if (!hash[elem])
        {
            res.push(elem);
            hash[elem] = true;
        }
    }
    if(func){
    	func(res);
    	return false;
    }
    return res;
}
var common = function(){};
common.prototype.listnerBinder = function() {
	$(document).on('click', '.nav-control', function(event) {
		event.preventDefault();
		$(this).toggleClass('active');
		$('.nav-list-mobile').toggle('fast', function() {
			
		});
		/* Act on the event */
	});
	$(window).on('scroll',function(){
		if ($.isMobile) {return;}
		var rem = parseInt($("html").css('fontSize'));
		var top = $(window).scrollTop();		
		if(top<4*rem){
			$('.nav').removeClass('scroll')
		}
		if (top>4*rem) {
			$('.nav').addClass('scroll');
		}
	})
	$(document).on('copy',function(){
		if (typeof window.getSelection == "undefined") return; 
 		var body_element = document.getElementsByTagName('body')[0]; 
 		var selection = window.getSelection(); //if the selection is short let's not annoy our users 
 		if (("" + selection).length < 30) return; //create a div outside of the visible area 
 		alert("Eptonic.All rights reserved.\n转载注明出处")
 		var newdiv = document.createElement('div'); 
 		newdiv.style.position = 'absolute'; 
 		newdiv.style.left = '-99999px'; 
 		body_element.appendChild(newdiv); 
 		newdiv.appendChild(selection.getRangeAt(0).cloneContents()); //we need a <pre> tag workaround //otherwise the text inside "pre" loses all the line breaks! 
 		if (selection.getRangeAt(0).commonAncestorContainer.nodeName == "PRE") { 
 			newdiv.innerHTML = "<pre>" + newdiv.innerHTML + "</pre>"; 
 		} 
 		newdiv.innerHTML += "<br /><br />Origin:Eptonic Inc. <a href='" + document.location.href + "'>" + document.location.href + "</a>"; 
 		selection.selectAllChildren(newdiv); 
 		window.setTimeout(function () { body_element.removeChild(newdiv); }, 200);
	})
	$(document).on('mouseenter',".footer-home .contact-wechat", function(event) {
		event.preventDefault();
		$(this).children('.wechat-code').animateCss("fadeIn");
	});
	$(document).on('mouseleave','.footer-home .contact-wechat', function(event) {
		event.preventDefault();
		var that = $(this).children('.wechat-code')
		that.animateCss("fadeOut",function(){
			that.removeClass('animated fadeOut');
		});
	});	
    $(document).on('click','.change-lang',function(){
        var lang = $(this).data('lang');
        $.cookie('language', lang,{ path: "/"}); // 存储 cookie
        window.location.reload()
    });	
    $(document).on('click','.nav-list .dropdown',function(){
    	$('.second-nav-container').slideToggle("fast");
    	$(this).toggleClass('active').find('.second-nav-list').toggle('fast')
    })
    $(document).on('click','.nav-list-mobile .has-child',function(){
    	var target = $(this).data("target")
    	$("#"+target).slideToggle('fast')
    })    

};
common.prototype.init = function(){
	if ($('.second-nav-list').find(".active").length) {
		$('.nav-item.dropdown').eq(0).click()
	};
    var path = window.location.pathname;
    $('.language-control .button').each(function(index, el) {
 		$(this).attr("href",$(this).attr("href")+path)   	
    });
}
var con = new common()
con.listnerBinder();
con.init();
var slider = function(option){
	this.ele = $("#slider");
	this.count = this.ele.find(".slider-item").length;
	this.current = 0;
	this.time = 3000;
	if (option) {
		for(var prop in option){
			if (this.hasOwnProperty(prop)) {
				this[prop] = option[prop];
			}
		}
	}
};
slider.prototype.init = function(){
	var that = this;
	that.rem = Number($('html').css("fontSize").replace(/[^0-9]/g,""))
	that.ele.find(".slider-container").css("width",that.count*8+"rem");
	that.play();
	$(window).on("resize",function(){
	that.rem = Number($('html').css("fontSize").replace(/[^0-9]/g,""))
		
	})
	
}
slider.prototype.play = function(){
	var that = this;
	var timer = setInterval(function(){
		var current = that.ele.find('.slider-item').eq(0);
		// that.ele.find(".slider-container").append(current.clone(false));
		that.ele.find(".slider-container").css("transform","translateX("+(-8*that.rem*that.current)+"px)");

		// current.remove()
		if (that.current>=that.count/2) {
			that.current=0;
			that.ele.find(".slider-container").css("transform","translateX(0px)");
		}
		++that.current;
	},that.time)
}