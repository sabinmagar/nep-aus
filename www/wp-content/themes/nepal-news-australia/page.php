<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nepal_News_Australia
 */

get_header();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Breadcrumb -->
                <?php
                    // inc/functions/breadcrumb.php 
                echo nepal_australia_news_breadcrumb();
                ?>
                <!-- End breadcrumb -->
                <div class="wrap__about-us">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
