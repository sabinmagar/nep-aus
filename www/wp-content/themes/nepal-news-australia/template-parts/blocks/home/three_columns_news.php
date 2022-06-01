<?php 
global $post;
$threeColNewsEnable = get_field('three_column_enable_section');
if ( $threeColNewsEnable ) {
   $threeColTaxonomyName = get_field('three_column_choose_category');
   $numberToShow = get_field('three_column_number_of_news_to_show');
   $nepNewsTitle = get_field('three_column_title');
   if ( $nepNewsTitle ) {
      $newsTitle = $nepNewsTitle;
   }
   else {
      $newsTitle = $threeColTaxonomyName->name;
   }
   $threeColNewsArgs = array(
      'cat'             => $threeColTaxonomyName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => 3,
   );
   // cache for Query
   $parentThreeColNews = get_transient( 'three_col1_news_transient' );
   if ( false === $parentThreeColNews ) {
      $parentThreeColNews = get_posts( $threeColNewsArgs );      
      set_transient( 'three_col1_news_transient', $parentThreeColNews, DAY_IN_SECONDS );
   }
   $newsColumnIDs = array();
   ?>
   <!-- Australia Content news -->
   <section class="bg-content">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <!-- Popular news Category -->
               <div class="wrapper__list__article">
                  <h2 class="border_section"><?php echo $newsTitle; ?></h2>
                  <div class="row ">
                     <div class="col-lg-4 pd-0">
                        <?php
                        $firstNewsCount = 1;
                        foreach ( $parentThreeColNews as $post ) :
                           setup_postdata( $post );
                           $uniqueID = get_the_ID();
                           // for next column to igonre first column posts
                           array_push( $newsColumnIDs, $uniqueID );
                           $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                           if ( $firstNewsCount == 1 ) {
                              $thumbnail = aq_resize( $imgURL, 386, 180, true );
                              if ( $thumbnail ) {
                                 $thumbnailURL = $thumbnail;
                              }
                              else {
                                 $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                              }
                              ?>
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
                                        <?php the_title(); ?>
                                     </a>
                                  </h4>
                                  <p><?php echo wp_trim_words( get_the_content(), 15, '.....' ); ?></p>
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
                   unset( $threeColNewsArgs );
                   unset( $parentThreeColNews );
                   $firstNewsCount = 1;
                   ?>
                </div>
                <?php 
                $threeColNewsArgs = array(
                  'cat'             => $threeColTaxonomyName->term_id,
                  'post_status'     => 'publish',
                  'post__not_in'    => $newsColumnIDs,
                  'posts_per_page'  => 3,
               );
                // cache for Query
                $parentThreeColNews = get_transient( 'three_col2_news_transient' );
                if ( false === $parentThreeColNews ) {
                  $parentThreeColNews = get_posts( $threeColNewsArgs );       
                  set_transient( 'three_col2_news_transient', $parentThreeColNews, DAY_IN_SECONDS );
               }
                ?>
                <div class="col-lg-4 pd-0">
                  <?php
                  $firstNewsCount = 1;
                  foreach ( $parentThreeColNews as $post ) :
                     setup_postdata( $post );
                     $uniqueID = get_the_ID();
                     // for next column to igonre first column posts
                     array_push( $newsColumnIDs, $uniqueID );
                     $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                     if ( $firstNewsCount == 1 ) {
                        $thumbnail = aq_resize( $imgURL, 386, 180, true );
                        if ( $thumbnail ) {
                           $thumbnailURL = $thumbnail;
                        }
                        else {
                           $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                        }
                        ?>
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
                                  <?php the_title(); ?>
                               </a>
                            </h4>
                            <p><?php echo wp_trim_words( get_the_content(), 15, '.....' ); ?></p>
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
             unset( $threeColNewsArgs );
             unset( $parentThreeColNews );
             $firstNewsCount = 1;
             ?>
          </div>
          <?php 
          $threeColNewsArgs = array(
            'cat'             => $threeColTaxonomyName->term_id,
            'post_status'     => 'publish',
            'post__not_in'    => $newsColumnIDs,
            'posts_per_page'  => 3,
         );
          // cache for Query
          $parentThreeColNews = get_transient( 'three_col3_news_transient' );
          if ( false === $parentThreeColNews ) {
            $parentThreeColNews = get_posts( $threeColNewsArgs );       
            set_transient( 'three_col3_news_transient', $parentThreeColNews, DAY_IN_SECONDS );
         }
          ?>
          <div class="col-lg-4 pd-0">
            <?php
            $firstNewsCount = 1;
            foreach ( $parentThreeColNews as $post ) :
               setup_postdata( $post );
               $uniqueID = get_the_ID();
               $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
               if ( $firstNewsCount == 1 ) {
                  $thumbnail = aq_resize( $imgURL, 386, 180, true );
                  if ( $thumbnail ) {
                     $thumbnailURL = $thumbnail;
                  }
                  else {
                     $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                  }
                  ?>
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
                            <?php the_title(); ?>
                         </a>
                      </h4>
                      <p><?php echo wp_trim_words( get_the_content(), 15, '.....' ); ?></p>
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
       unset( $threeColNewsArgs );
       unset( $parentThreeColNews );
       ?>
    </div>
 </div>
</div>
</div>
<!-- Popular news Category -->
</div>
<!-- End Category news -->
<div class="clearfix"></div>
</div>
</div>
</section>
<!-- End Australia Content news -->
<?php
}