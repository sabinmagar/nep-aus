<?php

if ( !function_exists('nepal_news_australia_add_block_name') ) {
    add_filter( 'block_categories_all', 'nepal_news_australia_add_block_name', 10, 2 );
    function nepal_news_australia_add_block_name( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug'  => 'custom-blocks',
                    'title' => __( 'Custom Blocks', 'custom-blocks' ),
                ),
            )
        );
    }
}