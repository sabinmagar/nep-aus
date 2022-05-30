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
                    <ul class="breadcrumbs bg-light mb-4">
                      <li class="breadcrumbs__item">
                         <a href="<?php echo esc_url( home_url('/') ); ?>" class="breadcrumbs__url"> <i class="fa fa-home"></i> होमपेज</a>
                      </li>
                      <li class="breadcrumbs__item breadcrumbs__item--current"> विचार/ब्लग </li>
                   </ul>
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