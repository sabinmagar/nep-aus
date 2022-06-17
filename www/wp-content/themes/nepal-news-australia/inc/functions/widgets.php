<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nepal_news_australia_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nepal-news-australia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nepal-news-australia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget', 'nepal-news-australia' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'nepal-news-australia' ),
			'before_widget' => '<div class="link__category">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title mb-4">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'nepal_news_australia_widgets_init' );