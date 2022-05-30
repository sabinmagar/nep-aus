<?php
global $post; 
$australiaNewsEnable = get_field('australia_news_enable_section');
if ( $australiaNewsEnable ) {
   $ausTaxonomyName = get_field('australia_news_choose_category');
   $numberToShow = get_field('aus_number_of_news_to_show');
   $ausNewsTitle = get_field('australia_news_title');
   if ( $ausNewsTitle ) {
      $newsTitle = $ausNewsTitle;
   }
   else {
      $newsTitle = $ausTaxonomyName->name;
   }
   $ausNewsArgs = array(
      'cat'             => $ausTaxonomyName->term_id,
      'post_status'     => 'publish',
      'posts_per_page'  => $numberToShow,
   );
   $parentAusNews = get_posts( $ausNewsArgs );
   if ( $parentAusNews ) {
      ?>
      <!-- Australia Content news -->
      <section class="bg-content bg-off-white">
        <div class="container">
           <div class="row">
              <div class="col-md-9">
                 <!-- Category news -->
                 <div class="wrapper__list__article">
                    <h2 class="border_section"><?php echo $newsTitle; ?></h2>
                    <div class="wrapp__list__article-responsive">
                     <?php
                     foreach ( $parentAusNews as $post ) :
                        setup_postdata( $post );
                        $uniqueID = get_the_ID();
                        $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                        $thumbnail = aq_resize( $imgURL, 360, 230, true );
                        if ( $thumbnail ) {
                           $thumbnailURL = $thumbnail;
                        }
                        else {
                           $thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
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
                                      <h3 class="news-title">
                                         <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                                      </h3>
                                      <p class="d-none d-lg-block d-xl-block mb-0">
                                       <?php echo wp_trim_words( get_the_content(), 30, '.....' ); ?>
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
      // sidebar ads
      get_template_part('template-parts/common/sidebar','ads');
      ?>
      <div class="clearfix"></div>
   </div>
</div>
</section>
<!-- End Australia Content news -->
<?php
}
unset( $parentAusNews );
}