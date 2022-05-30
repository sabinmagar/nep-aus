<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nepal_News_Australia
 */
$footerLogo = get_field('footer_logo','option');
if ( $footerLogo ) {
   $footerLogoUrl = $footerLogo['url'];
}
else {
   $footerLogo = get_template_directory_uri().'/images/logo.svg';
}
$socialMediaTitle = get_field('social_media_title','option');
?>
<!-- Footer -->
<section class="wrapper__section p-0">
   <div class="wrapper__section__components">
      <!-- Footer  -->
      <footer>
         <div class="wrapper__footer bg__footer ">
            <div class=" container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="widget__footer">
                        <!-- <h4 class="footer-title">company info</h4> -->
                        <figure>
                           <img src="<?php echo esc_url( $footerLogoUrl ); ?>" alt="Footer Logo" class="logo-footer">
                        </figure>
                     </div>
                     <div class="border-line"></div>
                     <div class="widget__footer">
                        <h4 class="footer-title"><?php echo $socialMediaTitle; ?></h4>
                           <!-- <p>
                              Follow us and stay in touch to get the latest news
                           </p> -->
                           <?php if ( have_rows('social_media','option') ) : ?>
                              <p>
                                 <?php while ( have_rows('social_media','option') ) :
                                    the_row();
                                    $icon = get_sub_field('social_icon','option');
                                    $iconLink = get_sub_field('social_link','option') ? get_sub_field('social_link','option') : '#';
                                    if ( $icon ) {
                                       $removeFAClass = str_replace( 'fa-', '', $icon );
                                       ?>
                                       <button class="btn btn-social btn-social-o <?php echo $removeFAClass; ?> mr-1">
                                          <i class="fa <?php echo $icon; ?>"></i>
                                       </button>
                                       <?php 
                                    }
                                 endwhile;
                                 ?>
                              </p>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- Category -->
                     <div class="col-md-4">
                        <div class="widget__footer">
                           <?php if ( is_active_sidebar('footer-widget') ) :
                              dynamic_sidebar('footer-widget');
                           endif;
                           ?>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="widget__footer">
                           <h4 class="footer-title">Follow us on Facebook</h4>
                           <!-- Form Newsletter -->
                           <div class="widget__form-newsletter ">
                              <iframe src="https://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/pages/Nepal-News-Australia/501181983250242?fref=ts;width=240&amp;height=220&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=473037302780699" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:220px;" allowTransparency="true"></iframe>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Footer Bottom -->
            <div class="bg__footer-bottom ">
               <div class="container">
                  <div class="row flex-column-reverse flex-md-row">
                     <div class="col-md-9">
                        <span>
                           <?php 
                           // inc/functions/helper.php
                           echo nepal_australia_news_copyright_text();
                           ?>
                        </span>
                     </div>
                     <div class="col-md-3">
                        <span>
                           Developed by: <a href="https://webtechnepal.com/" target="_blank">Webtech Nepal</a>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- End Footer  -->
      </div>
   </section>
   <!-- //Footer -->


   <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

   <?php wp_footer(); ?>
</body>
</html>
