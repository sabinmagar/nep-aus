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
 			jQuery('#menu-footer-widget').addClass('list-unstyled');
 			jQuery('#menu-footer-widget li').removeClass().addClass('list-inline-item');
 		},
 		loadmore_post: function() {
            var page = 2;
            var ppp = jQuery('#ppp').data('value');
            var catID = jQuery('#catID').data('value'); // for category and tag
            var name = jQuery('#name').data('value'); // for category and tag
            var s = jQuery('#s').data('value'); // for search page
            var post_count = jQuery('#post_append').data('count')
            var ajaxURL = NEPAUSobj.ajaxurl;
            var token = NEPAUSobj.token;	
            jQuery('#loadmore_post').click(function(e) {
                e.preventDefault();
                var button = $(this),
                data = {
                    'action'    : 'nepal_australia_news_loadmore_post',
                    'page'      : page,
                    'ppp'       : ppp,
                    'cat'       : catID,
                    'security'  : token,
                    'name'      : name,
                    's'         : s,
                };
                $.ajax({ // you can also use $.post here
            url : ajaxURL, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                jQuery('#loader img').show();
                jQuery('#loadmore_post').hide();
            },
            success : function( response ){
                if( response ) { 
                    setTimeout(function() {
                        jQuery('#post_append').append(response.data);
                        jQuery('#loader img').hide();
                        jQuery('#loadmore_post').show();
                    }, 1000);
                    if ( page == post_count ) {
                        button.remove(); 
                    }
                } else {
                    button.remove(); 
                }
                page = page + 1;
            }
        });

            });
        }
    };
    $(function () {
     wtn.init();
 });
})(jQuery);