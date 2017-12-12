$(document).ready(function() {
	var offset = 220;
	var duration = 500;

	$('.tips').tooltip();
	$( '.dropdown' ).hover (function(){$(this).children('.sub-menu').slideDown(200);},function(){$(this).children('.sub-menu').slideUp(200);});

	$('.topclick').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

	if($("a[rel^='prettyPhoto']").length > 0) {
		$("a[rel^='prettyPhoto']").prettyPhoto({
			theme: 'facebook', 
			slideshow:5000,
			deeplinking: false, 
			social_tools: false,
			autoplay_slideshow:false
		});
	}

	if (window.matchMedia('(min-width: 320px)').matches) {

	}

	if (window.matchMedia('(min-width: 100px)').matches && window.matchMedia('(max-width: 1200px)').matches) {
		$(".navbar-toggle").click(function(event) {
			$("#navbar-collapse").addClass("collapse");
		});
	}

	if (window.matchMedia('(max-width: 480px)').matches) {
		
	}
	else if (window.matchMedia('(max-width: 767px)').matches) {
		$("#widget-submenu").insertAfter("#main-side > .panel");
	}
	else if (window.matchMedia('(max-width: 991px)').matches) {
		$("#widget-submenu").insertAfter("#main-side > .panel");
	}
	else if (window.matchMedia('(max-width: 1200px)').matches) {

	}
	else {

	}

	mainSlider();
	seclinkSlide();
	SetHArticles();
	SetHlpse();
});

function mainSlider(){
	var pauseTime = 6000; 
	var timeoutId;

	$('.main-bxslider').bxSlider({
		slideWidth: 2000,
		minSlides: 1,
		maxSlides: 1,
		mode: 'fade',
		auto: true,
		pause: pauseTime,
		speed: 1000,
		controls: false,
		infiniteLoop: true,
		pager: true
	});
}

function ExcerptListProduct() {
	$.each($('.widget_list.list_product .item'), function (index, value) { 
		var ETxtVar = $(this).find('.list_excerpt');
		var GetText = ETxtVar.text();
		if (ETxtVar.length > 0) {
			if (GetText.length > 130) {
				ETxtVar.text(GetText.substring(0, 129)+"...");
			}
		}
	});
}

function seclinkSlide() {
	$('#widget-sitelink ul').bxSlider({
		nextSelector: '.nav-next._1st',
		prevSelector: '.nav-prev._1st',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		slideWidth: 2000,
		minSlides: 4,
		maxSlides: 4,
		moveSlides: 1,
		auto: false,
		pause: 6000,
		speed: 300,
		infiniteLoop: true,
		pager: false
	});
}

function SetHArticles() {
	var list_h = new Array();
	var temp = 0;
	var max_h;

	$.each($('#main-container > .container > .row'), function (index, value) {
		$.each($(this).find('.col-md-6'), function (index, value) {
			$(this).find('.panel-theme > .panel-body').map(function() {
				list_h.push($(this).height());
			});
		});
		
		for (var i = 0; i < list_h.length; i++) {
			if(temp < list_h[i]) {
				temp = list_h[i];
			}
		}
		$(this).find('.col-md-6 .panel-theme > .panel-body').height(temp);
		console.log("array = " + list_h + " temp = " + temp);
		
		list_h = [];
		temp = 0;
	});
}

function SetHlpse() {
	var getH = $('#widget-lpse .panel-body .col-md-6 > .list-info').height();
	$('#widget-lpse .panel-body .col-md-6 > .lpse-wrap').animate({
		height: getH-15
	}, 1500);

	$('#widget-lpse .panel-body .col-md-6 > .lpse-wrap > .lpse-mid > .fa').animate({
		fontSize: "5em"
	}, 1500);
}