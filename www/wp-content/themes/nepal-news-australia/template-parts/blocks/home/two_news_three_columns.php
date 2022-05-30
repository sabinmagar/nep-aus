<?php 
global $post;
$twoNewsThreeColEnable = get_field('two_news_three_columns_enable_section');
if ( $twoNewsThreeColEnable ) {
   $firstNewsTaxonomyName = get_field('two_news_choose_first_category');
   $firstNewsTitle = get_field('two_news_first_news_title');
   if ( $firstNewsTitle ) {
      $newsTitleFirst = $firstNewsTitle;
   }
   else {
      $newsTitleFirst = $firstNewsTaxonomyName->name;
   }
   $firstNewsArgs = array(
      'cat'             => $firstNewsTaxonomyName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => 3,
   );
   $parentFirstNews = get_posts( $firstNewsArgs );
   $firstNewsID = array();
   ?>
   <!-- Manoranjan Content news -->
   <section class="bg-content">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <!-- Popular news Category -->
               <div class="wrapper__list__article">
                  <h2 class="border_section"><?php echo $newsTitleFirst; ?></h2>
                  <div class="row ">
                   <div class="col-lg-6 pd-0">
                     <?php
                     $firstNewsCount = 1;
                     foreach ( $parentFirstNews as $post ) :
                        setup_postdata( $post );
                        $uniqueID = get_the_ID();
                        // for next column to igonre first column posts
                        array_push( $firstNewsID, $uniqueID );
                        $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        if ( $firstNewsCount == 1 ) {
                           $thumbnail = aq_resize( $imgURL, 386, 180, true );
                           if ( $thumbnail ) {
                              $thumbnailURL = $thumbnail;
                           }
                           else {
                              $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                           }
                           ?>
                           <!-- Post Article -->
                           <div class="article__entry">
                              <div class="article__image">
                                 <a href="<?php echo esc_url( the_permalink() ); ?>">
                                    <img src="<?php echo esc_url( $thumbnail ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                                 </a>
                              </div>
                              <div class="article__content">
                                 <h4 class="news-title">
                                    <a href="<?php echo esc_url( the_permalink() ); ?>"> <?php the_title(); ?> </a>
                                 </h4>
                                 <p>
                                    <?php echo wp_trim_words( get_the_content(), 13, '...' ); ?>
                                 </p>
                                 <a href="<?php echo esc_url( the_permalink() ); ?>" class="btn btn-outline-primary mb-4 text-capitalize"> read more</a>
                              </div>
                           </div>
                           <?php 
                        }
                        else {
                           $thumbnail = aq_resize( $imgURL, 108, 80, true );
                           if ( $thumbnail ) {
                              $thumbnailURL = $thumbnail;
                           }
                           else {
                              $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                           }
                           ?>
                           <div class="mb-3">
                              <!-- Post Article -->
                              <div class="card__post card__post-list">
                                 <div class="image-sm">
                                    <a href="<?php echo esc_url( the_permalink() ); ?>">
                                       <img src="<?php echo esc_url( $thumbnail ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                                    </a>
                                 </div>
                                 <div class="card__post__body ">
                                    <div class="card__post__content">
                                       <div class="card__post__title">
                                          <h4 class="news-title">
                                             <a href="<?php echo esc_url( the_permalink() ); ?>">
                                               <?php the_title(); ?>
                                            </a>
                                         </h4>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          <?php
                       }
                       $firstNewsCount++;
                    endforeach;
                    wp_reset_postdata();
                    unset( $firstNewsArgs );
                    unset( $parentFirstNews );
                    $firstNewsCount = 1;
                    ?>
                 </div>
                 <!-- next column start -->
                 <?php 
                 $firstNewsArgs = array(
                  'cat'             => $firstNewsTaxonomyName->term_id,
                  'post_status'     => 'publish',
                  'post__not_in'    => $firstNewsID,
                  'posts_per_page'  => 3,
               );
                 $parentFirstNews = get_posts( $firstNewsArgs );
                 ?>
                 <div class="col-lg-6 pd-0">
                  <?php
                  $firstNewsCount = 1;
                  foreach ( $parentFirstNews as $post ) :
                     setup_postdata( $post );
                     $uniqueID = get_the_ID();
                     $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                     if ( $firstNewsCount == 1 ) {
                        $thumbnail = aq_resize( $imgURL, 386, 180, true );
                        if ( $thumbnail ) {
                           $thumbnailURL = $thumbnail;
                        }
                        else {
                           $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        }
                        ?>
                        <!-- Post Article -->
                        <div class="article__entry">
                           <div class="article__image">
                              <a href="<?php echo esc_url( the_permalink() ); ?>">
                                 <img src="<?php echo esc_url( $thumbnail ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                              </a>
                           </div>
                           <div class="article__content">
                              <h4 class="news-title">
                                 <a href="#"> <?php the_title(); ?> </a>
                              </h4>
                              <p>
                                 <?php echo wp_trim_words( get_the_content(), 13, '...' ); ?>
                              </p>
                              <a href="#" class="btn btn-outline-primary mb-4 text-capitalize"> read more</a>
                           </div>
                        </div>
                        <?php 
                     }
                     else {
                        $thumbnail = aq_resize( $imgURL, 108, 80, true );
                        if ( $thumbnail ) {
                           $thumbnailURL = $thumbnail;
                        }
                        else {
                           $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        }
                        ?>
                        <div class="mb-3">
                           <!-- Post Article -->
                           <div class="card__post card__post-list">
                              <div class="image-sm">
                                 <a href="<?php echo esc_url( the_permalink() ); ?>">
                                    <img src="<?php echo esc_url( $thumbnail ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                                 </a>
                              </div>
                              <div class="card__post__body ">
                                 <div class="card__post__content">
                                    <div class="card__post__title">
                                       <h4 class="news-title">
                                          <a href="./card-article-detail-v1.html">
                                            <?php the_title(); ?>
                                         </a>
                                      </h4>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <?php
                    }
                    $firstNewsCount++;
                 endforeach;
                 wp_reset_postdata();
                 $firstNewsCount = 1;
                 ?>
              </div>
           </div>
        </div>
        <!-- Popular news Category -->
     </div>
     <!-- End Category news -->
     <?php 
     $secondNewsTaxonomyName = get_field('two_news_choose_second_category');
     $secondNewsTitle = get_field('two_news_second_news_title');
     if ( $secondNewsTitle ) {
      $newsTitleSecond = $secondNewsTitle;
   }
   else {
      $newsTitleSecond = $secondNewsTaxonomyName->name;
   }
   $secondNewsArgs = array(
      'cat'             => $secondNewsTaxonomyName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => 3,
   );
   $parentSecondNews = get_posts( $secondNewsArgs );
   if ( $parentSecondNews ) {
      ?>
      <div class="col-md-4">
         <aside class="wrapper__list__article">
            <h2 class="border_section"><?php echo $newsTitleSecond; ?></h2>

            <div class="wrapper__list__article-small">
               <?php
               $secondColumnCount = 1;
               foreach ( $parentSecondNews as $post ) :
                  setup_postdata( $post );
                  $uniqueID = get_the_ID();
                  $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                  if ( $secondColumnCount == 1 ) {
                     $thumbnail = aq_resize( $imgURL, 386, 180, true );
                     if ( $thumbnail ) {
                        $thumbnailURL = $thumbnail;
                     }
                     else {
                        $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                     }
                     ?>
                     <!-- Post Article -->
                     <div class="article__entry">
                        <div class="article__image">
                           <a href="<?php echo esc_url( the_permalink() ); ?>">
                              <img src="<?php echo esc_url( $thumbnail ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                           </a>
                        </div>
                        <div class="article__content">

                           <h4 class="news-title">
                              <a href="<?php echo esc_url( the_permalink() ); ?>">
                                 <?php the_title(); ?>
                              </a>
                           </h4>
                           <p><?php echo wp_trim_words( get_the_content(), 30, '.....' ); ?></p>
                        </div>
                     </div>
                     <?php 
                  }
                  else {
                     $thumbnail = aq_resize( $imgURL, 108, 80, true );
                     if ( $thumbnail ) {
                        $thumbnailURL = $thumbnail;
                     }
                     else {
                        $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                     }
                     ?>
                     <div class="mb-3">
                        <!-- Post Article -->
                        <div class="card__post card__post-list">
                           <div class="image-sm">
                              <a href="<?php echo esc_url( the_permalink() ); ?>">
                                 <img src="<?php echo esc_url( $thumbnail ); ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
                              </a>
                           </div>
                           <div class="card__post__body ">
                              <div class="card__post__content">

                                 <div class="card__post__title">
                                    <h4 class="news-title">
                                       <a href="<?php echo esc_url( the_permalink() ); ?>">
                                        <?php the_title(); ?>
                                     </a>
                                  </h4>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <?php
                }
                $secondColumnCount++;
             endforeach;
             wp_reset_postdata();
             ?>
          </div>
       </aside>
    </div>
 <?php } ?>
 <div class="clearfix"></div>
</div>
</div>
</section>
<!-- End Manoranjan Content news -->
<?php
}