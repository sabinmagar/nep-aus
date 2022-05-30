<?php
// support svg image
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
	echo '<style type="text/css">
	.attachment-266x266, .thumbnail img {
		width: 100% !important;
		height: auto !important;
	}
	</style>';
}
add_action( 'admin_head', 'fix_svg' );

// remove default class and id from menu
add_filter('nav_menu_item_id', 'filter_menu_id');
function filter_menu_id(){
	return; 
}

// Copyright text
if ( !function_exists('nepal_australia_news_copyright_text') ) :
function nepal_australia_news_copyright_text() {
	$copyright = get_field('copyright_text', 'option');

	if ( empty( $copyright ) ) return;

	if ( false !== strpos( $copyright, '%copy%' ) ) {
		$copyright = str_replace( '%copy%', '&copy;', $copyright );
	}

	if ( false !== strpos( $copyright, '%latest_year%' ) ) {
		$copyright = str_replace( '%latest_year%', date( 'Y' ), $copyright );
	}

	if ( false !== strpos( $copyright, '%sitename%' ) ) {
		$copyright = str_replace( '%sitename%', get_bloginfo( 'name' ), $copyright );
	}

	return $copyright;
}
endif;

// set popular post view count
function nepal_australia_news_setPostViews($postID) {
	$countKey = 'post_views_count';
	$count = get_post_meta( $postID, $countKey, true );
	if( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $countKey );
		add_post_meta( $postID, $countKey, '0' );
	}
	else {
		$count++;
		update_post_meta( $postID, $countKey, $count );
	}
}

// set popular post view count
function nepal_australia_news_getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta( $postID, $count_key, true );
	if( $count == '' ){
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
		return "0 View";
	}
	return $count;
} 