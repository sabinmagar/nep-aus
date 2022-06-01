<?php
global $post;
$nepalNewsEnable = get_field('nepal_news_enable_section');
if ( $nepalNewsEnable ) {
   $nepTaxonomyName = get_field('nepal_news_choose_category');
   $numberToShow = get_field('nepal_news_number_of_news_to_show');
   $nepNewsTitle = get_field('nepal_news_title');
   if ( $nepNewsTitle ) {
      $newsTitle = $nepNewsTitle;
   }
   else {
      $newsTitle = $nepTaxonomyName->name;
   }
   $nepNewsArgs = array(
      'cat'             => $nepTaxonomyName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => $numberToShow,
   );
   // cache for Query
   $parentNepNews = get_transient( 'nepal_news_transient' );
   if ( false === $parentNepNews ) {
      $parentNepNews = get_posts( $nepNewsArgs );      
      set_transient( 'nepal_news_transient', $parentNepNews, DAY_IN_SECONDS );
   }
   if ( $parentNepNews ) {
      ?>
      <!-- Nepal Content news -->
      <section class="bg-content bg-off-white">
         <div class="container">
          <div class="row">
             <div class="col-md-12">
                <!-- Popular news Category -->
                <div class="wrapper__list__article">
                   <h2 class="border_section"><?php echo $newsTitle; ?></h2>
                   <div class="row ">
                     <?php
                     $newsCount = 0;
                     foreach ( $parentNepNews as $post ) :
                        setup_postdata( $post );
                        $uniqueID = get_the_ID();
                        $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        $thumbnail = aq_resize( $imgURL, 386, 180, true );
                        if ( $thumbnail ) {
                           $thumbnailURL = $thumbnail;
                        }
                        else {
                           $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        }
                        if ( $newsCount < 3 ) {
                           $class = '';
                        }
                        else {
                           $class = 'mt-5';
                        }
                        ?>
                        <div class="col-lg-4 pd-0 <?php echo $class; ?>">
                         <!-- Post Article -->
                         <div class="article__entry">
                            <div class="article__image">
                               <a href="<?php echo esc_url( the_permalink() ); ?>">
                                  <img src="<?php echo esc_url( $thumbnailURL ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                               </a>
                            </div>
                            <div class="article__content">
                               <h4 class="news-title">
                                  <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                               </h4>
                               <p><?php echo wp_trim_words( get_the_content(), 15, '.....' ); ?></p>
                            </div>
                         </div>
                      </div>
                      <?php 
                      $newsCount++;
                   endforeach;
                   wp_reset_postdata();
                   ?>                
                </div>
             </div>
             <!-- Popular news Category -->
          </div>
       </div>
    </div>
 </section>
 <!-- End Nepal Content news -->
 <?php
}
unset( $parentNepNews );
}