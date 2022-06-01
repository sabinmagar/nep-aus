<?php
get_header();
global $post;
$cat = get_queried_object();
$postFound = ( $cat->count );
$ppp = 12; // post you want to display and load multiplication of 3
$catID = $cat->term_id;
$catArgs = array(
   'cat' => $catID,
   'post_status'  => 'publish',
   'posts_per_page' => $ppp,
   'paged' => 1,
);
$parentSingle = get_posts( $catArgs );
?>
<section class="wrap__section bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="container">
             <div class="title-head">
               <div class="row justify-content-center">
                  <div class="col-md-6 col-sm-12 text-center">
                     <h1>
                        <?php echo $cat->name; ?>
                     </h1>
                  </div>
               </div>
            </div>
            <input type="hidden" id="ppp" data-value="<?php echo $ppp; ?>">
            <input type="hidden" id="catID" data-value="<?php echo $catID; ?>">  
            <input type="hidden" id="name" data-value="<?php echo 'category'; ?>">
            <div class="row" data-count="<?php echo ceil( $postFound / $ppp ); ?>" id="post_append">
               <?php 
               foreach ( $parentSingle as $post ) :
                  setup_postdata( $post );
                  $uniqueID = get_the_ID();
                  $imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
                  $thumbnail = aq_resize( $imgURL, 376, 298, true );
                  if ( $thumbnail ) {
                     $thumbnailURL = $thumbnail;
                  }
                  else {
                     $thumbnailURL = get_template_directory_uri().'/images/news-default.png';
                  }
                  ?>
                  <div class="col-lg-4">
                     <!-- Post Article -->
                     <div class="article__entry-new">
                        <div class="article__image articel__image__transition">
                           <a href="<?php echo esc_url( the_permalink() ); ?>">
                              <img src="<?php echo esc_url( $thumbnailURL ); ?>" alt="<?php echo esc_attr( the_title() ); ?>" class="img-fluid">
                           </a>
                        </div>
                        <div class="articel__content">
                           <div class="article__post__title">
                              <h3><a href="<?php echo esc_url( the_permalink() ); ?>">
                                 <?php the_title(); ?>
                              </a>
                           </h3>
                           <ul class="list-inline article__post__author">
                              <li class="list-inline-item">
                                 <i class="fa fa-calendar"></i>
                              </li>
                              <li class="list-inline-item">
                                 <span><?php echo get_the_date("F j, Y"); ?></span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <?php 
            endforeach;
            wp_reset_postdata();
            ?>
            <div class="clerfix"></div>
         </div>                     
      </div>
   </div>
   <?php if ( $postFound > $ppp ) : ?>
      <div class="col-md-12">
       <div class="container">
        <div class="col-md-12">
         <center><button class="btn btn-primary" id="loadmore_post">Load More</button>
            <div id="loader"><img src="<?php echo get_template_directory_uri(); ?>/images/infinity.svg" alt="Loading" style="display: none;" /></div></center>
      </div>
   </div>
</div>
<?php endif; ?>
</div>
</section>
<?php
get_footer();