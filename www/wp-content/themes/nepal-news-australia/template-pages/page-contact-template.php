<?php
/**
 * Template Name:Contact
 */
get_header();
?>

<!-- Breadcrumb  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Breadcrumb -->
                <ul class="breadcrumbs bg-light mb-4">
                    <li class="breadcrumbs__item">
                        <a href="index.html" class="breadcrumbs__url"> <i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumbs__item"> <a href="index.html" class="breadcrumbs__url">News</a> </li>
                    <li class="breadcrumbs__item breadcrumbs__item--current"> World </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb  -->

<!-- Form contact -->
<section class="wrap__contact-form">
    <div class="container">
        <?php if ( have_rows('information','option') ) : ?>
            <div class="row">
                <?php while ( have_rows('information','option') ) :
                    the_row();
                    $blockTitle = get_sub_field('info_title','option');
                    if ( $blockTitle ) {
                        ?>
                        <div class="col-md-4">
                            <h5><?php echo $blockTitle; ?></h5>
                            <?php if ( have_rows('info_content','option') ) : ?>
                                <div class="wrap__contact-form-office">
                                    <ul class="list-unstyled">
                                        <?php while ( have_rows('info_content','option') ) :
                                            the_row();
                                            $selectIcon = get_sub_field('choose_info','option');
                                            if ( $selectIcon ) {
                                                $selectContent = get_sub_field('choose_content','option');
                                                ?>
                                                <li> <span>
                                                    <i class="fa <?php echo $selectIcon; ?>"></i>
                                                </span><?php echo $selectContent; ?></li>
                                                <?php 
                                            }
                                        endwhile;
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>                
                        <?php 
                    }
                endwhile;
                ?>                
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- End Form contact  -->
<?php
get_footer();