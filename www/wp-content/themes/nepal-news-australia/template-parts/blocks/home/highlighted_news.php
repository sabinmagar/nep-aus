<?php 
$highlightedEnable = get_field('home_top_banner_enable_section');
?>
<!-- Banner ads -->
<figure class="mt-4 mb-4 text-center">
   <a href="#">
      <img src="https://img.setopaty.com/uploads/bigyaapan/28446700.gif" alt="" class="img-fluid">
   </a>
</figure>
<!-- End Banner ads -->
<?php if ( $highlightedEnable ) {
   if ( have_rows('choose_highlighted_news') ) :
      ?>
      <!-- Highlighte News Start -->
      <section class="bg-content">
         <div class="container">
            <?php while ( have_rows('choose_highlighted_news') ) :
               the_row();
               $highlightNews = get_sub_field('highlighted_news');
               if ( $highlightNews ) {
                  $showImage = get_sub_field('highlighted_show_image');
                  ?>
                  <div class="highlights">
                     <h2>
                        <a href="<?php echo esc_url( get_permalink( $highlightNews ) );  ?>"><?php echo $highlightNews->post_title; ?></a>
                     </h2>
                     <?php if ( $showImage ) {
                        $imgURL = get_the_post_thumbnail_url( $highlightNews->ID );
                        $thumbnail = aq_resize( $imgURL, 833, 605, true );
                        if ( $thumbnail ) {
                           $thumbnailURL = $thumbnail;
                        }
                        else {
                           $thumbnailURL = get_the_post_thumbnail_url( $highlightNews->ID, 'full');
                        }
                        ?>
                        <center>
                           <img src="<?php echo esc_url( $thumbnailURL ); ?>" alt="<?php echo esc_attr( $highlightNews->name ); ?>">
                        </center>
                     <?php } ?>
                  </div>
                  <?php 
               }
            endwhile;
            ?>
         </div>
      </section>
      <!-- Highlighte News End -->
      <?php 
   endif;
}