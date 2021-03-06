<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nepal_News_Australia
 */

?>
<!doctype html>
   <html <?php language_attributes(); ?>>
   <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- google fonts -->
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Poppins:ital,wght@0,300;0,500;0,700;1,300;1,400&display=swap"
    rel="stylesheet">
    <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?>>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
   <?php wp_body_open();
   $custom_logo_id = get_theme_mod( 'custom_logo' ); // API Call
   $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
   if ( is_home() || is_front_page() ) {
      $enableSkipAds = get_field('na_enable_skip_ads','option');
      if ( $enableSkipAds ) {
         ?>
         <!--<popup>-->
          <div class="modalbox" id="inner-jacket">
            <div class="modal_content">
              <div class="imagebox">
                <div class="logobox">
                  <?php 
                  if ( has_custom_logo() ) { ?>
<<<<<<< HEAD
                     <img src="<?php echo esc_url( $logo[0] ); ?>" alt="logo" />
=======
                     <img src="<?php echo esc_url( $logo[0] ); ?>" alt="logo">
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
                     <?php
                  }
                  else { ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo" />
                     <?php
                  }
                  ?>
               </div>
               <div class="close-box">
                  <a class="close_btn" href="javascript:void(0)" onclick="document.getElementById('inner-jacket').style.display='none'" title="Skip Ad">Skip Ad</a>
<<<<<<< HEAD
               </div>
               <?php 
               if ( !wp_is_mobile() ) {
                  $skipAdsImage = get_field('na_image_for_desktop','option');
                  ?>
                  <a href="<?php echo $skipAdsImage['caption']; ?>" title="" target="_blank" class="jacket-ad-desktop">
                     <img src="<?php echo esc_url( $skipAdsImage['url'] ); ?>" alt="<?php echo esc_attr( $skipAdsImage['alt'] ); ?>" />
                  </a>
                  <?php
               }
               else {
                  $skipAdsImage = get_field('na_image_for_mobile','option');
                  ?>
                  <a href="<?php echo $skipAdsImage['caption']; ?>" title="" target="_blank" class="jacket-ad-mobile">
                     <img src="<?php echo esc_url( $skipAdsImage['url'] ); ?>" alt="<?php echo esc_attr( $skipAdsImage['alt'] ); ?>" />
                  </a>
                  <?php
               }
               ?>         
=======
=======
   <?php wp_body_open(); ?>
   <?php 
   $enableSkipAds = get_field('na_enable_skip_ads','option');
   if ( $enableSkipAds ) {
      $desktopImage = get_field('na_image_for_desktop','option');
      $mobileImage = get_field('na_image_for_mobile','option');
      ?>
      <!--<popup>-->
       <div class="modalbox" id="inner-jacket">
         <div class="modal_content">
           <div class="imagebox">
             <div class="logobox">
               <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo" />
            </div>
            <div class="close-box">
               <a class="close_btn" href="javascript:void(0)" onclick="document.getElementById('inner-jacket').style.display='none'" title="Skip Ad">Skip Ad</a>
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
            </div>
         </div>
      </div>
      <!--</popup>-->
      <?php
   }
}
?>
<!-- Header news -->
<header>
   <!-- Navbar  -->
   <div class="topbar d-none d-sm-block">
      <div class="container ">
         <div class="row">
            <div class="col-sm-12 col-md-5">
               <div class="topbar-left">
                  <div class="topbar-text">
                     <?php echo date("l, F j, Y"); ?>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-7">
               <div class="list-unstyled topbar-right">
                  <?php if ( have_rows('top_left_page_links','option') ) : ?>
                     <ul class="topbar-link">
                        <?php while ( have_rows('top_left_page_links','option') ) :
                           the_row();
                           $topPages = get_sub_field('top_page_link','option');
                           if ( $topPages ) {
                              ?>
                              <li><a href="<?php echo esc_url( $topPages['url'] ); ?>" title="<?php echo esc_html( $topPages['title'] ); ?>" target="<?php echo esc_attr( $topPages['target'] ); ?>">
                                 <?php echo esc_html( $topPages['title'] ); ?>
                              </a></li>
                              <?php 
                           }
                        endwhile;
                        ?>
                     </ul>
                  <?php endif; ?>
                  <?php if ( have_rows('social_media','option') ) : ?>
                     <ul class="topbar-sosmed">
                        <?php while ( have_rows('social_media','option') ) :
                           the_row();
                           $icon = get_sub_field('social_icon','option');
                           $iconLink = get_sub_field('social_link','option') ? get_sub_field('social_link','option') : '#';
                           if ( $icon ) {
                              ?>
                              <li>
                                 <a href="<?php echo esc_url( $iconLink ); ?>" target="_blank"><i class="fa <?php echo $icon; ?>"></i></a>
                              </li>
                              <?php 
                           }
                        endwhile;
                        ?>
                     </ul>
                  <?php endif; ?>
>>>>>>> dc6392853bf50cd22d0c2777eb3c9bebdfe86c9c
               </div>
               <?php 
               if ( !wp_is_mobile() ) {
                  $skipAdsImage = get_field('na_image_for_desktop','option');
                  ?>
                  <a href="<?php echo $skipAdsImage['caption']; ?>" title="" target="_blank" class="jacket-ad-desktop">
                     <img src="<?php echo esc_url( $skipAdsImage['url'] ); ?>" alt="<?php echo esc_attr( $skipAdsImage['alt'] ); ?>" />
                  </a>
                  <?php
               }
               else {
                  $skipAdsImage = get_field('na_image_for_mobile','option');
                  ?>
                  <a href="<?php echo $skipAdsImage['caption']; ?>" title="" target="_blank" class="jacket-ad-mobile">
                     <img src="<?php echo esc_url( $skipAdsImage['url'] ); ?>" alt="<?php echo esc_attr( $skipAdsImage['alt'] ); ?>" />
                  </a>
                  <?php
               }
               ?>         
            </div>
         </div>
      </div>
<<<<<<< HEAD
      <!--</popup>-->
      <?php
   }
}
?>
<!-- Header news -->
<header>
   <!-- Navbar  -->
   <div class="topbar d-none d-sm-block">
      <div class="container ">
         <div class="row">
            <div class="col-sm-12 col-md-5">
               <div class="topbar-left">
                  <div class="topbar-text">
                     <?php echo date("l, F j, Y"); ?>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-7">
               <div class="list-unstyled topbar-right">
                  <?php if ( have_rows('top_left_page_links','option') ) : ?>
                     <ul class="topbar-link">
                        <?php while ( have_rows('top_left_page_links','option') ) :
                           the_row();
                           $topPages = get_sub_field('top_page_link','option');
                           if ( $topPages ) {
                              ?>
                              <li><a href="<?php echo esc_url( $topPages['url'] ); ?>" title="<?php echo esc_html( $topPages['title'] ); ?>" target="<?php echo esc_attr( $topPages['target'] ); ?>">
                                 <?php echo esc_html( $topPages['title'] ); ?>
                              </a></li>
                              <?php 
=======
   </div>
   <!-- logo -->
   <div class="bg-white ">
      <div class="container">
         <div class="row">
            <div class=" col-sm-12 col-md-4 my-auto d-none d-sm-block ">
<<<<<<< HEAD
=======
               <?php 
                     $custom_logo_id = get_theme_mod( 'custom_logo' ); // API Call
                     $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                     ?>
                     <figure class="mb-0">
                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                           <?php 
                           if ( has_custom_logo() ) { ?>
                              <img src="<?php echo esc_url( $logo[0] ); ?>" alt="Site Logo" class="img-fluid logo">
                              <?php
>>>>>>> dc6392853bf50cd22d0c2777eb3c9bebdfe86c9c
                           }
                        endwhile;
                        ?>
                     </ul>
                  <?php endif; ?>
                  <?php if ( have_rows('social_media','option') ) : ?>
                     <ul class="topbar-sosmed">
                        <?php while ( have_rows('social_media','option') ) :
                           the_row();
                           $icon = get_sub_field('social_icon','option');
                           $iconLink = get_sub_field('social_link','option') ? get_sub_field('social_link','option') : '#';
                           if ( $icon ) {
                              ?>
                              <li>
                                 <a href="<?php echo esc_url( $iconLink ); ?>" target="_blank"><i class="fa <?php echo $icon; ?>"></i></a>
                              </li>
                              <?php 
                           }
<<<<<<< HEAD
                        endwhile;
                        ?>
                     </ul>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- logo -->
   <div class="bg-white ">
      <div class="container">
         <div class="row">
            <div class=" col-sm-12 col-md-4 my-auto d-none d-sm-block ">
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
               <figure class="mb-0">
                  <a href="<?php echo esc_url( home_url('/') ); ?>">
                     <?php 
                     if ( has_custom_logo() ) { ?>
<<<<<<< HEAD
                        <img src="<?php echo esc_url( $logo[0] ); ?>" alt="Site Logo" class="img-fluid logo" />
                        <?php
=======
                        <img src="<?php echo esc_url( $logo[0] ); ?>" alt="Site Logo" class="img-fluid logo">
                        <?php
                     }
                     else { ?>
=======
                           ?>
                        </a>
                     </figure>
                  </div>
                  <?php 
                  $navbarAds = get_field('header_ads','option');
                  if ( $navbarAds ) {
                     if ( $navbarAds['caption'] ) {
                        $navbarAdsLink = $navbarAds['caption'];
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
                     }
                     else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="" class="img-fluid logo" />
                        <?php
                     }
                     ?>
                  </a>
               </figure>
            </div>
<<<<<<< HEAD
=======
         </div>
         <!-- end logo -->
         <!-- navbar -->
         <div class="navigation-wrap navigation-shadow bg-white">
            <nav class="navbar navbar-hover navbar-expand-lg navbar-soft  ">
               <div class="container">
                  <div class="offcanvas-header">
                     <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                     </div>
                  </div>
                  <figure class="mb-0 mx-auto d-block d-sm-none sticky-logo mt-4">
                     <a href="<?php echo esc_url( home_url('/') ); ?>">
>>>>>>> dc6392853bf50cd22d0c2777eb3c9bebdfe86c9c
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="" class="img-fluid logo">
                        <?php
                     }
                     ?>
                  </a>
               </figure>
            </div>
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
            <?php 
            $navbarAds = get_field('header_ads','option');
            if ( $navbarAds ) {
               if ( $navbarAds['caption'] ) {
                  $navbarAdsLink = $navbarAds['caption'];
               }
               else {
                  $navbarAdsLink = '#';
               }
               ?>
               <div class="col-md-8 d-none d-sm-block text-right">
                  <figure class="mt-3 ">
                     <a href="<?php echo esc_url( $navbarAdsLink ); ?>">
<<<<<<< HEAD
                        <img src="<?php echo esc_url( $navbarAds['url'] ); ?>" alt="<?php echo esc_attr( $navbarAds['alt'] ); ?>" class="img-fluid" />
=======
                        <img src="<?php echo esc_url( $navbarAds['url'] ); ?>" alt="<?php echo esc_attr( $navbarAds['alt'] ); ?>" class="img-fluid">
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
                     </a>
                  </figure>
               </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <!-- end logo -->
   <!-- navbar -->
   <div class="navigation-wrap navigation-shadow bg-white">
      <nav class="navbar navbar-hover navbar-expand-lg navbar-soft  ">
         <div class="container">
            <div class="offcanvas-header">
               <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                  <span class="navbar-toggler-icon"></span>
               </div>
            </div>
            <figure class="mb-0 mx-auto d-block d-sm-none sticky-logo mt-4">
               <a href="<?php echo esc_url( home_url('/') ); ?>">
<<<<<<< HEAD
                  <?php 
                     if ( has_custom_logo() ) { ?>
                        <img src="<?php echo esc_url( $logo[0] ); ?>" alt="Site Logo" class="img-fluid logo" />
                        <?php
                     }
                     else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="" class="img-fluid logo" />
                        <?php
                     }
                     ?>
=======
                  <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="" class="img-fluid logo">
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
               </a>
            </figure>
            <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
               <?php 
               wp_nav_menu( array(
                  'theme_location'  => 'menu-1',
                  'container'       => false,
                        'depth'           => 1, // 1 no dropdown
                        'menu_class'      => 'navbar-nav',
                        'menu_id'         => '',
                        'walker'          => new NepAus_Nav_Menu(),
                     ) );
                     ?> 
                     <!-- Search bar.// -->
                     <ul class="navbar-nav ">
                        <li class="nav-item search hidden-xs hidden-sm "> <a class="nav-link" href="#">
                           <i class="fa fa-search"></i>
                        </a>
                     </li>
                  </ul>
                  <!-- Search content bar.// -->
                  <div class="top-search navigation-shadow">
                     <div class="container">
                        <div class="input-group ">
                           <?php get_search_form(); ?>
                        </div>
                     </div>
                  </div>
                  <!-- Search content bar.// -->
               </div>
               <!-- navbar-collapse.// -->
            </div>
         </nav>
      </div>
      <?php if ( wp_is_mobile() ) : ?>
         <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-aside" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <div class="widget__form-search-bar">
                        <form method="GET" action="<?php echo esc_url( home_url('/') ); ?>">
                           <div class="row no-gutters">
                              <div class="col">
                                 <input class="form-control border-secondary border-right-0 rounded-0" placeholder="Search" name="s">
                              </div>
                              <div class="col-auto">
                                 <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" type="submit">
                                    <i class="fa fa-search"></i>
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <nav class="list-group list-group-flush">
                        <?php 
                        wp_nav_menu( array(
                           'theme_location'  => 'menu-1',
                           'container'       => false,
                           'depth'           => 1, // 1 no dropdown
                           'menu_class'      => 'navbar-nav',
                           'menu_id'         => '',
                           'walker'          => new NepAus_Nav_Menu(),
                        ) );
                        ?>
                     </nav>
                  </div>

               </div>
            </div>
            <!-- modal-bialog .// -->
         </div>
         <!-- modal.// -->
      <?php endif; ?>
      <!-- End Navbar  -->
      <?php
      $trendingTitle = get_field('trending_news_title','option');
      $trendingArgs = array(
         'post_type'        => 'post',
         'posts_per_page'   => 5,
         'meta_key'         => 'post_views_count',
         'orderby'          => 'meta_value_num',
         'order'            => 'DESC',
      );
      $parentTrendingArgs = get_posts( $trendingArgs );
      if ( $parentTrendingArgs ) {
         ?>
         <!-- Tranding News -->
         <div class="bg-white">
            <!-- Trending News Start -->
            <div class="trending-news pt-4 border-tranding">
               <div class="container">
                  <div class="row">
                     <div class="col">
                        <div class="trending-news-inner">
                           <div class="title">
                              <i class="fa fa-bolt"></i>
                              <strong><?php echo $trendingTitle; ?></strong>
                           </div>
                           <div class="trending-news-slider">
                              <?php
                              global $post;
                              foreach ( $parentTrendingArgs as $post ) :
                                 setup_postdata( $post );
                                 ?>
                                 <div class="item-single">
                                    <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?>
                                 </a>
                              </div>
                              <?php 
                           endforeach;
                           wp_reset_postdata();
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Trending News End -->
      </div>
      <!-- End Tranding News -->
   <?php } ?>
</header>
<!-- End Header news -->