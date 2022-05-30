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

	acf_add_options_page(
		[
			'page_title' 	=> 'Ads Management',
			'menu_title'	=> 'Ads Management',
			'menu_slug' 	=> 'ads-management',
			'capability'	=> 'edit_posts',
			'icon_url'		 => 'dashicons-media-spreadsheet',
			'redirect'		=> false,
			'position'		=> 5
		]
	);
});