$(document).ready(function() {
	// var offset = 220;
	// var duration = 500;

	// $('.topclick').click(function(event) {
	// 	event.preventDefault();
	// 	jQuery('html, body').animate({scrollTop: 0}, duration);
	// 	return false;
	// });

	mainSlider();
	autoPlayChannel();

});

function mainSlider(){
	$('.main-bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 1,
		infiniteLoop: true,
		mode: 'fade',
		speed: 1000,
		controls: false,
		auto: false,
		pagerCustom: '#bx-pagers'
	});
}

function autoPlayChannel() {
	$.each($('#bx-pagers a'), function (index, value) { 
		var autoplay = "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
		var indexli;

		$(this).click(function () {
			indexli = $('.main-bxslider li:nth-child('+(index+1)+')');
			videoSRC = indexli.find("iframe").attr("data-video");
			var source = "";

			$.each($('.main-bxslider li'), function (index, value) {
				source = $(this).find("iframe").attr("data-video");
				$(this).find("iframe").attr("src", "");
				$(this).find("iframe").attr("src", source);
			});

			if (videoSRC != "" || videoSRC != undefined) {
				videoSRCauto = videoSRC + autoplay;

				indexli.find("iframe").attr("src", "");
				indexli.find("iframe").attr("src", videoSRCauto);
			}
		});
	});
}
