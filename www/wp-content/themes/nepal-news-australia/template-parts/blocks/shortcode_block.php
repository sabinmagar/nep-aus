<?php
$shortcodeEnable = get_field('shortcode_enable_section');
if ( $shortcodeEnable ) :
	$shorcode = get_field('write_your_short_code_here');
	switch ( $shorcode ) {
		case '[full_length_advertisement]':
		echo do_shortcode( $shorcode );
		break;
		default:
		// code...
		break;
	}
endif;