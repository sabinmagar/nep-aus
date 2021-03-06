<?php
/**
 * Template Name:About
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