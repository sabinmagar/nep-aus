<?php 
$highlightedEnable = get_field('home_top_banner_enable_section');
$highlightedAds = get_field('homepage_highlighted_ads','option');
$numberToShow = get_field('na_number_of_news_to_show');
$highlightNewsArgs = array(
  'post_type' => 'post',
  'post_status'  => 'publish',
  'posts_per_page' => $numberToShow,
);
$parentHighlight = get_posts( $highlightNewsArgs );
if ( $highlightedAds ) :
   if ( $highlightedAds['caption'] ) {
      $highlightedAdsLink = $highlightedAds['caption'];
   }
   else {
      $highlightedAdsLink = '#';
   }
   ?>
   <!-- Banner ads -->
   <figure class="mt-4 mb-4 text-center">
      <a href="<?php echo esc_url( $highlightedAdsLink ); ?>">
         <img src="<?php echo esc_url( $highlightedAds['url'] ); ?>" alt="<?php echo esc_attr( $navbarAds['alt'] ); ?>" class="img-fluid">
      </a>
   </figure>
   <!-- End Banner ads -->
   <?php
endif;
if ( $highlightedEnable ) {
   ?>
   <!-- Highlighte News Start -->
   <section class="bg-content">
      <div class="container">    
         <?php 
         global $post;
         foreach ( $parentHighlight as $post ) :
            setup_postdata( $post );
            $tickHighlight = get_field('na_tick_highlighted',$post->ID);
            if ( $tickHighlight ) {
               $showImage = get_field('na_show_image',$post->ID);
               ?>  
               <div class="highlights">
                  <h2>
                     <a href="<?php echo esc_url( the_permalink() );  ?>"><?php the_title(); ?></a>
                  </h2>
                  <?php
                  if ( $showImage ) {
                     $imgURL = get_the_post_thumbnail_url( $post->ID );
                     $thumbnail = aq_resize( $imgURL, 833, 605, true );
                     if ( $thumbnail ) {
                        $thumbnailURL = $thumbnail;
                     }
                     else {
                        $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                     }
                     ?>
                     <center>
                        <img src="<?php echo esc_url( $thumbnailURL ); ?>" alt="<?php echo esc_attr( $highlightNews->name ); ?>">
                     </center>
                  <?php } ?>
               </div>
               <?php 
            }
         endforeach;
         wp_reset_postdata();
         ?>
      </div>
   </section>
   <!-- Highlighte News End -->
   <?php 
}