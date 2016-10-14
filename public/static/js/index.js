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
var banner = {
	init:function(){
		var swiper = new Swiper('#banner-swiper', {
		    pagination: '.swiper-pagination',  
		    paginationClickable: true,
		    loop:true,
		    autoplay:5000000,
		    autoplayDisableOnInteraction:false,
		    autoHeight:true,
		    noSwiping:true
		});
	},
}
var index = {
	init:function(){
		this.listnerBinder();
		this.prepareAnimation();
	},
	listnerBinder:function(){
		$(document).on('click', '.show-contact-layer', function(event) {
			$('.contact-layer').toggleClass('active');
			$('.show-contact-layer').toggleClass('active');
		});
		$(document).on('click', '.close-contact-layer', function(event) {
			$('.contact-layer,.show-contact-layer').removeClass('active');
		});		
		$(document).on('click', '.back-top', function(event) {
			var scrollTop = $(window).scrollTop();
			$("body,html").animate({"scrollTop":0}, 300+scrollTop/6);
			
		});
		$(document).on('click', '.section-social-service .tab-title', function(event) {
			var target = $(this).data("target");
			$(this).addClass('active').siblings('.tab-title').removeClass('active')
			$('#'+target).addClass('active').siblings('.tab-item').removeClass('active')
		});
		$(document).on('click', '.platform-container .platform-item', function(event) {
			$(this).addClass('active').siblings('.platform-item').removeClass('active')
		});
		$(document).on('click', '.step-header ul li', function(event) {
			var index = $(this).index()
			$(this).addClass('active').siblings('li').removeClass('active');
			$('.step-content').eq(index).addClass('active').siblings('.step-content').removeClass('active')
		});
		$('.contacter a').on('click', function(event) {
			var w = $(window).width()/2
			var url = $(this).attr("href")
			event.preventDefault();
			myWindow=window.open('','','width=600,height=400,left='+(w-300)+',top=200');
			myWindow.window.location.href = url;
			myWindow.focus();
			/* Act on the event */
		});		
	    var swiper = new Swiper('#partner-swiper', {
	        slidesPerView: 4,
	        slidesPerGroup:1,
		    loop:true,
		    autoplay:3000
	    });
	},
	prepareAnimation:function(){
		var tops = [];
		$('.section-slide').each(function(index, el) {
			tops.push($(this).offset().top)
		});
		// setTimeout(function(){
		// 	$('.section-slide').css('display', 'none');
		// },50)
		$(window).on('scroll', function(event) {
			var h = $(window).scrollTop();
			for(var i = 0;i<tops.length;i++){
				if (h<tops[i]) {
					$('.section-slide').eq(i).animateCss("slideInUp");
					return;
				}
			}
		});
		$("body,html").animate({"scrollTop":0}, 300);
	}
}
jQuery(document).ready(function($) {
	banner.init();
	index.init()

});