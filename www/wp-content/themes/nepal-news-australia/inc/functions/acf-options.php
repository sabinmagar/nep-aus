<?php
add_action( 'init', function() {
	// if ACF Custom Field is not active
	if ( !function_exists( 'acf_add_options_page' ) ) { return; }

	acf_add_options_page ( 
		[
			'page_title' 	=> 'Profile Information',
			'menu_title'	=> 'Profile',
			'menu_slug' 	=> 'profile',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'position'		=> 5,
			'icon_url'		=> 'dashicons-admin-network',
		]
	);
});