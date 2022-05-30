<?php
/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts','nepal_news_australia_load_CSS');
add_action('wp_enqueue_scripts','nepal_news_australia_load_JS');
add_action( 'wp_enqueue_scripts', 'nepal_news_australia_load_others' );

// load All CSS Files
function nepal_news_australia_load_CSS() {
	// wp_enqueue_style( 'nepal-news-australia-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'nepal-news-australia-style', 'rtl', 'replace' );
	wp_enqueue_style( 'appStyle', get_template_directory_uri() . '/css/styles.css');
}

// load All JS Files
function nepal_news_australia_load_JS() {
	wp_enqueue_script( 'appScript', get_template_directory_uri() . '/js/index.bundle.js', array('jquery'), false, true );
	wp_enqueue_script( 'nepal-news-australia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

// load Other File
function nepal_news_australia_load_others() {
	wp_register_script( 'nepal-australia-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true );
	wp_enqueue_script( 'nepal-australia-custom' );
	wp_localize_script( 'nepal-australia-custom', 'NEPAUSobj', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'token'  => wp_create_nonce( '%NEPAL_AUSTRALIA%' ),
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}