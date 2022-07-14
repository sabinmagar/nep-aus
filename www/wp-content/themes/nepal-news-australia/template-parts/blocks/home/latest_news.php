<?php 
global $post;
$latestNewsEnable = get_field('latest_news_enable_section');
if ( $latestNewsEnable ) {
   $latestNewsTitle = get_field('latest_news_title');
   $latestNewsArgs = array(
     'post_type' => 'post',
     'post_status'  => 'publish',
     'posts_per_page' => 1,
  );
   // cache for Query
   $parentLatestNews = get_transient( 'latest_news_transient' );
   if ( false === $parentLatestNews ) {
      $parentLatestNews = get_posts( $latestNewsArgs );       
      set_transient( 'latest_news_transient', $parentLatestNews, DAY_IN_SECONDS );
   }
   ?>
   <!-- Popular Content news -->
   <section class="bg-content">
      <div class="container">
         <div class="row">
           <div class="col-md-12">
             <div class="wrapper__list__article">
               <h2 class="border_section"><?php echo $latestNewsTitle; ?></h2>
            </div>
         </div>
         <div class="col-md-8">
            <!-- Popular news carousel -->
            <div class="card__post-carousel">
               <div class="item">
                  <?php 
                  foreach ( $parentLatestNews as $post ) :
                     setup_postdata( $post );
                     $uniqueID = get_the_ID();
                     $thumbnail = get_the_post_thumbnail_url( $uniqueID, 'full');
                     if ( $thumbnail ) {
                        $thumbnailURL = $thumbnail;
                     }
                     else {
                        $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                     }
                     ?>
                     <!-- Post Article -->
                     <div class="card__post">
                        <div class="card__post__body">
                           <a href="<?php echo esc_url( the_permalink() ); ?>">
                              <img loading="lazy" src="<?php echo esc_url( $thumbnailURL ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                           </a>
                           <div class="card__post__content bg__post-cover">
                              <div class="card__post__title">
                                 <h2>
                                    <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                                 </h2>
                              </div>
                              <div class="card__post__author-info">
                                 <ul class="list-inline">
                                    <li class="list-inline-item">
                                       <span>
                                          <?php echo get_the_date("F j, Y"); ?>
                                       </span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php 
                  endforeach;
                  wp_reset_postdata();
                  unset( $latestNewsArgs );
                  unset( $thumbnail );
                  unset( $parentLatestNews );
                  ?>
               </div>
            </div>
            <!-- End Popular news carousel -->
            <?php 
            $newsAds = get_field('below_samachar_ads','option');
            if ( $newsAds ) {
               if ( $newsAds['caption'] ) {
                  $newsAdsLink = $newsAds['caption'];
               }
               else {
                  $newsAdsLink = '#';
               }
               ?>
               <!-- Banner ads -->
               <figure class="mt-4 mb-4 text-center">
                  <a href="<?php echo esc_url( $newsAdsLink ); ?>" target="_blank">
                     <img src="<?php echo esc_url( $newsAds['url'] ); ?>" alt="<?php echo esc_attr( $newsAds['alt'] ); ?>" class="img-fluid">
                  </a>
               </figure>
               <!-- End Banner ads -->
            <?php } ?>
         </div>
         <!-- End Category news -->
         <?php 
         $latestNewsShow = get_field('latest_news_number_of_news_to_show');
         $latestNewsArgs = array(
           'post_type'      => 'post',
           'post__not_in'   => array($uniqueID),
           'post_status'    => 'publish',
           'posts_per_page' => $latestNewsShow,
        );
         $parentLatestNews = get_posts( $latestNewsArgs );
         ?>
         <div class="col-md-4">
            <aside class="wrapper__list__article">
               <div class="wrapper__list__article-small">
                  <?php foreach( $parentLatestNews as $post ) :
                     setup_postdata( $post );
                     $uniqueID = get_the_ID();
                     $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                     $thumbnail = aq_resize( $imgURL, 108, 80, true );
                     if ( $thumbnail ) {
                        $thumbnailURL = $thumbnail;
                     }
                     else {
                        $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                     }
                     ?>
                     <div class="mb-3">
                        <!-- Post Article -->
                        <div class="card__post card__post-list">
                           <div class="image-sm">
                              <a href="<?php echo esc_url( the_permalink() ); ?>">
                                 <img src="<?php echo esc_url( $thumbnailURL ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                              </a>
                           </div>
                           <div class="card__post__body ">
                              <div class="card__post__content">
                                 <div class="card__post__author-info mb-2">
                                    <ul class="list-inline">
                                       <li class="list-inline-item">
                                          <span class="text-dark text-capitalize">
                                             <?php echo get_the_date("F j, Y"); ?>
                                          </span>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="card__post__title">
                                    <h4>
                                       <a href="<?php echo esc_url( the_permalink() ); ?>" class="news-title">
                                          <?php the_title(); ?>
                                       </a>
                                    </h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                  endforeach;
                  wp_reset_postdata();
                  unset( $latestNewsArgs );
                  unset( $thumbnail );
                  unset( $parentLatestNews );
                  ?>                        
               </div>
            </aside>
         </div>
      </div>
   </section>
   <!-- End Popular Content news -->
   <?php
}