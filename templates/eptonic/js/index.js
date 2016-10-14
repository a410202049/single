;jQuery(document).ready(function($) {
	banner.init({
		"time":400,
		"selector":"#banner",
		"delay":7000,
		"start":0,
		"keyboard":true,
		"touchable":true,
		"auto":true
	});
	var rem = parseInt($("html").css('fontSize'));

	$(document).on('click', '.section-news .news-img,.news-info', function(event) {
		event.preventDefault();
		$(this).toggleClass('active');
	});

	$(document).on('mouseenter', '.platform-item,.partner-item', function(event) {
		var src = $(this).find('img').attr("src");
		var target = $(this).find('img').attr("data-change")
		$(this).find('img').attr("data-change",src);
		$(this).find('img').attr("src",target);
	});
	$(document).on('mouseleave', '.platform-item,.partner-item', function(event) {
		var src = $(this).find('img').attr("src");
		var target = $(this).find('img').attr("data-change")
		$(this).find('img').attr("data-change",src);
		$(this).find('img').attr("src",target);;
	});	
	$(window).on('scroll', function(event) {
		var top = $(window).scrollTop();
		if (top>$(".banner").height()/2) {
			$('.global-item').each(function(index, el) {
				setTimeout(function(){
					$(el).animateCss("bounceInUp");
				},index*150)
			});
		}
		if (top>35*rem) {
			$('.section-cloud-img').animateCss("fadeInUp")
		}
		if (top>56*rem) {
			$('.section-platform .platform-item').each(function(index, el) {
				setTimeout(function(){
					$(el).animateCss("bounceInUp")
				}, index*150)
				
			});
			$('.section-platform .platform-info').each(function(index, el) {
				setTimeout(function(){
					$(el).animateCss("bounceInUp")
				}, index*150)
				
			});


		}
		if (top>85*rem) {
			$('.section-stat').css('backgroundColor', '#0a90e2');
			$('.section-stat .stat-item').animateCss("bounceInUp")
			$('.section-stat .counter').each(function(index, el) {
				var timer;
				var counter=0;
				var val = $(this).attr("data-count").replace(/[^0-9]/g,"");
				var after = $(this).attr("data-count").replace(/[0-9]/g,"")
				var time = 3000/(val/3);
				var ele=$(el).find('.counter-p');
				timer = setInterval(function(){
					var r = Math.random().toFixed(1)*10;
					ele.html(counter+r+after)
					counter+=r;
					if (counter>=val) {
						clearInterval(timer);
						ele.html(val+after);
						return false;
					}
				}, time);
				$(this).removeClass('counter')
			});
		}
		if (top>100*rem) {
			$('.section-news .row-md div').animateCss("bounceInUp")
		}
		if (top>115*rem) {
			$('.partner-item').animateCss("bounceInRight",function(){

			})
		}
		/* Act on the event */
	});
	var partner = new slider({
		time:4000
	});
	partner.init()
});
