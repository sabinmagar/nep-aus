<?php

/**
 * Load All Required Files
 */
$files_loader = array(
	'inc/functions/setup.php',
	'inc/functions/assets.php',
	'inc/functions/widgets.php',
	'inc/functions/acf-options.php',
	'inc/functions/navwalker.php',
	'inc/functions/aq_resizer.php',
	'inc/functions/custom_shortcodes.php',
	'inc/functions/helper.php',
	'inc/custom-header.php',
	'inc/template-tags.php',
	'inc/template-functions.php',
	'inc/template-functions.php',
	'inc/customizer.php',
	'inc/blocks/add_category_to_block.php',
	'inc/blocks/acf_blocks.php',
);

/**
 * Load The File
 */
foreach ( $files_loader as $file ) 
{
	if ( file_exists( get_template_directory() . '/' . $file ) ) 
	{
		locate_template( $file, true, true );
	}
}
unset( $file );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

