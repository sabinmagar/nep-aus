<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a highlighted news block.
        acf_register_block_type(array(
            'name'              => 'highlighted_news',
            'title'             => __('Highlighted News'),
            'description'       => __('A custom highlighted news block.'),
            'render_template'   => 'template-parts/blocks/home/highlighted_news.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'highlight', 'main', 'top' ),
        ));

        // register a latest news block
        acf_register_block_type(array(
            'name'              => 'latest_news',
            'title'             => __('Latest News'),
            'description'       => __('A custom latest news block.'),
            'render_template'   => 'template-parts/blocks/home/latest_news.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'latest', 'new', 'top' ),
        ));

        // register a australia news block
        acf_register_block_type(array(
            'name'              => 'australia_news',
            'title'             => __('Australia News'),
            'description'       => __('A custom australia news block.'),
            'render_template'   => 'template-parts/blocks/home/australia_news.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'australia', 'news', 'country' ),
        ));

        // register a nepal news block
        acf_register_block_type(array(
            'name'              => 'nepal_news',
            'title'             => __('Nepal News'),
            'description'       => __('A custom nepal news block.'),
            'render_template'   => 'template-parts/blocks/home/nepal_news.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'nepal', 'news', 'country', 'nepali' ),
        ));

        // register a three columns news block
        acf_register_block_type(array(
            'name'              => 'three_columns_news',
            'title'             => __('Three Columns News'),
            'description'       => __('A custom three columns news block.'),
            'render_template'   => 'template-parts/blocks/home/three_columns_news.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'three', 'news', 'columns', 'blog' ),
        ));

        // register a slider news block
        acf_register_block_type(array(
            'name'              => 'slider_news',
            'title'             => __('Slider News'),
            'description'       => __('A custom slider news block.'),
            'render_template'   => 'template-parts/blocks/home/silder_news.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'slider', 'news', 'row'),
        ));

        // register a two news three columns block
        acf_register_block_type(array(
            'name'              => 'two_news_three_columns',
            'title'             => __('Two News Three Columns'),
            'description'       => __('A custom two news three columns block.'),
            'render_template'   => 'template-parts/blocks/home/two_news_three_columns.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'three', 'news', 'column', 'two'),
        ));

        // register a two news two columns block
        acf_register_block_type(array(
            'name'              => 'two_news_two_columns',
            'title'             => __('Two News Two Columns'),
            'description'       => __('A custom two news two columns block.'),
            'render_template'   => 'template-parts/blocks/home/two_news_two_columns.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'two', 'news', 'column', 'two', 'both'),
        ));

        // register a team block
        acf_register_block_type(array(
            'name'              => 'team_block',
            'title'             => __('Team'),
            'description'       => __('A custom team block.'),
            'render_template'   => 'template-parts/blocks/about/team_block.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'team', 'group', 'people', 'memeber'),
        ));

        // register a custom shortcode block
        acf_register_block_type(array(
            'name'              => 'custom_shortcode',
            'title'             => __('Custom Shortcode'),
            'description'       => __('A custom shortcode block.'),
            'render_template'   => 'template-parts/blocks/shortcode_block.php',
            'category'          => 'custom-blocks',
            'icon'              => 'embed-photo',
            'keywords'          => array( 'shortcode', 'custom', 'short', 'one line'),
        ));

    }
}