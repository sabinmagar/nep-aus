/**
 * Theme main script.
 *
 * Contains all theme custom features.
 */
 var wtn;
 ( function($) {
 	wtn = {
 		init: function () {
 			this.normal_script();
 			this.loadmore_post();			
 		},
 		ie: function () {
 			try {
 				if (/MSIE (\d+\.\d+);/.test(navigator.userAgent) || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
 					$('body').addClass('ie-user');
 					return true;
 				}
 			} catch (err) {
 				console.log(err);
 			}
 			return false;
 		},
 		normal_script: function () {
 			jQuery('#menu-footer-menu').addClass('list-unstyled');
 			jQuery('#menu-footer-menu li').removeClass().addClass('list-inline-item');
 		},
 		loadmore_post: function() {
 			var ajaxURL = NEPAUSobj.ajaxurl;
 			var token = NEPAUSobj.security;		
 		}
 	};
 	$(function () {
 		wtn.init();
 	});
 })(jQuery);