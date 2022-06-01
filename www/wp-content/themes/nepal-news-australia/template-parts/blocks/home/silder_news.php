<?php 
global $post;
$slideNewsEnable = get_field('slider_news_enable_section');
if ( $slideNewsEnable ) {
   $slideNewsTaxonomyName = get_field('slider_news_choose_category');
   $numberToShow = get_field('slider_number_of_news_to_slide');
   $sliderNewsTitle = get_field('slider_news_title');
   if ( $sliderNewsTitle ) {
      $newsTitle = $sliderNewsTitle;
   }
   else {
      $newsTitle = $slideNewsTaxonomyName->name;
   }
   $sliderNewsArgs = array(
      'cat'             => $slideNewsTaxonomyName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => $numberToShow,
   );
   // cache for Query
   $parentSliderNews = get_transient( 'slider_news_transient' );
   if ( false === $parentSliderNews ) {
      $parentSliderNews = get_posts( $sliderNewsArgs );      
      set_transient( 'slider_news_transient', $parentSliderNews, DAY_IN_SECONDS );
   }
   if ( $parentSliderNews ) {
      ?>
      <!-- Australia Content news -->
      <section class="bg-content bg-off-white">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <!-- Popular 3 news carousel -->
                  <div class="wrapper__list__article">
                     <h2 class="border_section"><?php echo $newsTitle; ?></h2>
                     <div class="row ">
                        <div class="col-lg-12 pd-0">
                           <div class="article__entry-carousel-four">
                              <?php 
                              foreach ( $parentSliderNews as $post ) :
                                 setup_postdata( $post );
                                 $uniqueID = get_the_ID();
                                 $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                                 $thumbnail = aq_resize( $imgURL, 256, 180, true );
                                 if ( $thumbnail ) {
                                    $thumbnailURL = $thumbnail;
                                 }
                                 else {
                                    $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                                 }
                                 ?>
                                 <div class="item">
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                       <div class="article__image">
                                          <a href="<?php echo esc_url( the_permalink() ); ?>">
                                           <img src="<?php echo esc_url( $thumbnailURL ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                                        </a>
                                     </div>
                                     <div class="article__content">
                                       <h4 class="news-title">
                                          <a href="<?php echo esc_url( the_permalink() ); ?>">
                                             <?php echo wp_trim_words( get_the_title(), 5, '...' ); ?>
                                          </a>
                                       </h4>
                                    </div>
                                 </div>
                              </div>
                              <?php 
                           endforeach;
                           wp_reset_postdata();
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Popular 3 news carousel -->
            </div>
            <!-- End Category news -->
            <div class="clearfix"></div>
         </div>
      </div>
   </section>
   <!-- End Australia Content news -->
   <?php
}
unset( $parentSliderNews );
}