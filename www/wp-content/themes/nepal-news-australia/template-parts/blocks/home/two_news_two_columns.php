<?php 
global $post;
$twoNewsTwoColEnable = get_field('two_news_two_columns_enable_section');
if ( $twoNewsTwoColEnable ) {
   $twoNewsTwoColTaxoName = get_field('two_news_two_columns_choose_first_category');
   $twoNewsTwoColTitle = get_field('two_news_two_columns_first_news_title');
   if ( $twoNewsTwoColTitle ) {
      $newsTitleFirstCol = $twoNewsTwoColTitle;
   }
   else {
      $newsTitleFirstCol = $twoNewsTwoColTaxoName->name;
   }
   $firstNewsColArgs = array(
      'cat'             => $twoNewsTwoColTaxoName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => 3,
   );
   // cache for Query
   $parentFirstNewsCol = get_transient( 'two_news_two_col1_transient' );
   if ( false === $parentFirstNewsCol ) {
      $parentFirstNewsCol = get_posts( $firstNewsColArgs );      
      set_transient( 'two_news_two_col1_transient', $parentFirstNewsCol, DAY_IN_SECONDS );
   }
   ?>
   <!-- Byaapar Content news -->
   <section class="bg-content bg-off-white">
      <div class="container">
         <div class="row">
            <?php if ( $parentFirstNewsCol ) { ?>
               <div class="col-md-8">
                  <!-- Category news -->
                  <div class="wrapper__list__article">
                     <h2 class="border_section"><?php echo $newsTitleFirstCol; ?></h2>
                     <div class="wrapp__list__article-responsive">
                        <?php
                        foreach ( $parentFirstNewsCol as $post ) :
                           setup_postdata( $post );
                           $uniqueID = get_the_ID();
                           $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                           $thumbnail = aq_resize( $imgURL, 317, 230, true );
                           if ( $thumbnail ) {
                              $thumbnailURL = $thumbnail;
                           }
                           else {
                              $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                           }
                           ?>
                           <!-- Post Article List -->
                           <div class="card__post card__post-list card__post__transition mt-30">
                              <div class="row ">
                                 <div class="col-md-5">
                                    <div class="card__post__transition">
                                       <a href="<?php echo esc_url( the_permalink() ); ?>">
                                        <img src="<?php echo esc_url( $thumbnailURL ); ?>" class="img-fluid w-100" alt="<?php echo esc_attr( the_title() ); ?>">
                                     </a>
                                  </div>
                               </div>
                               <div class="col-md-7 my-auto pl-0">
                                 <div class="card__post__body ">
                                    <div class="card__post__content  ">
                                       <div class="card__post__title">
                                          <h4 class="news-title">
                                             <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                                          </h4>
                                          <p class="d-none d-lg-block d-xl-block mb-0">
                                             <?php echo wp_trim_words( get_the_content(), 30, '' ); ?>
                                          </p>
                                       </div>
                                    </div>
                                 </div>
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
            <!-- End Category news -->
            <?php
         }
         $twoNewsSecTaxoName = get_field('two_news_two_columns_choose_second_category');
         $secondColTitle = get_field('two_news_two_columns_second_news_title');
         if ( $secondColTitle ) {
            $newsTitleSecondCol = $secondColTitle;
         }
         else {
            $newsTitleSecondCol = $twoNewsSecTaxoName->name;
         }
         $secondNewsColArgs = array(
            'cat'             => $twoNewsSecTaxoName->term_id,
            'post_status'     => 'publish',
            'posts_per_page'  => 5,
         );
         // cache for Query
         $parentSecondNewsCol = get_transient( 'two_news_two_col2_transient' );
         if ( false === $parentSecondNewsCol ) {
            $parentSecondNewsCol = get_posts( $secondNewsColArgs );      
            set_transient( 'two_news_two_col2_transient', $parentSecondNewsCol, DAY_IN_SECONDS );
         }
         if ( $parentSecondNewsCol ) {
            ?>
            <div class="col-md-4">
               <aside class="wrapper__list__article">
                  <h2 class="border_section"><?php echo $newsTitleSecondCol; ?></h2>

                  <div class="wrapper__list__article-small">
                     <?php
                     $rowCount = 1;
                     foreach ( $parentFirstNewsCol as $post ) :
                        setup_postdata( $post );
                        $uniqueID = get_the_ID();
                        $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        if ( $rowCount == 1 ) {
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
                                 <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                              </h4>
                              <p>
                                 <?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
                              </p>
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
                                       <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                                    </h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  $rowCount++;
               endforeach;
               wp_reset_postdata();
               ?>
            </div>
         </aside>
         <div class="clearfix"></div>
      </div>
   <?php } ?>
</div>
</section>
<!-- End Byaapar Content news -->
<?php
}