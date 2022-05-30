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
            var page = 2;
            var ppp = jQuery('#ppp').data('value');
            var catID = jQuery('#catID').data('value');
            var name = jQuery('#name').data('value');
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
                };
                $.ajax({ // you can also use $.post here
            url : ajaxURL, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); 
            },
            success : function( response ){
                if( response ) { 
                    button.text( 'Load More' ); 
                    jQuery('#post_append').append(response.data);
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