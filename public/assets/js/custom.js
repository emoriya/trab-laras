/*global jQuery:false */
jQuery(document).ready(function($) {
"use strict";



		//Navi hover
		$('ul.nav li.dropdown').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
		});

		//add some elements with animate effect

		$(".box").hover(
			function () {
			$(this).find('.ico').addClass("animated rotateIn");
			$(this).find('h4').addClass("animated fadeInUp");
			},
			function () {
			$(this).find('.ico').removeClass("animated rotateIn");
			$(this).find('h4').removeClass("animated fadeInUp");
			}
		);


		// tooltip
		$('.social-network li a, .options_box .color a').tooltip();


		//scroll to top
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();

				} else {
				$('.scrollup').fadeOut();

			}
		});
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
		});

});
