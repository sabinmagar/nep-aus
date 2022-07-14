<?php 
$forCubes = get_field('four_cube','option');
?>
<div class="col-md-3">
   <div class="sidebar-section">
      <?php if ( $forCubes ) { ?>
         <center>
            <div class="wrapper-box">
               <div class="cubic-area">
                  <?php
                  $cubeCounter = 1;
                  foreach ( $forCubes as $cube ) :
                     switch ( $cubeCounter ) {
                        case 1 :
                        $cubeClass = 'one';
                        break;

                        case 2 :
                        $cubeClass = 'two';
                        break;

                        case 3 :
                        $cubeClass = 'three';
                        break;

                        case 4 :
                        $cubeClass = 'four';
                        break;

                        default :
                        // code here
                     }
                     $cubeImage = aq_resize( $cube['url'], 200, 215, true );
                     if ( $cubeImage )
                     {
                        $cubeImageUrl = $cubeImage;
                     }
                     else {
                        $cubeImageUrl = $cube['url'];
                     }
                     if ( $cube['caption'] ) {
                        $cubeURL = $cube['caption'];
                     }
                     else {
                        $cubeURL = '#';
                     }
                     ?>
                     <div class="cubic-<?php echo $cubeClass; ?>">
                        <a target="_blank" href="<?php echo esc_url( $cubeURL ); ?>"><img src="<?php echo esc_url( $cubeImageUrl ); ?>"></a>
                     </div>
                     <?php
                     $cubeCounter++;
                  endforeach;
                  ?>
               </div>
            </div>
         </center>
         <?php
      }
      $belowCubeAds = get_field('below_four_cube__ads','option');
      if ( $belowCubeAds ) {
         ?>
         <!-- Banner news -->
         <aside class="wrapper__list__article">
            <?php 
            foreach ( $belowCubeAds as $belowAds ) :
               // $belowCubeImage = aq_resize( $belowAds['url'], 282, 188, true );
               // if ( $belowCubeImage ) {
               //    $belowCubeImageUrl = $belowAds['url'];
               // }
               // else {
               //    $belowCubeImageUrl = $belowAds['url'];
               // }
               $belowCubeImageUrl = $belowAds['url'];
               if ( $belowAds['caption'] ) {
                  $belowAdsUrl = $belowAds['caption'];
               }
               else {
                  $belowAdsUrl = '#';
               }
               ?>
               <a href="<?php echo esc_url( $belowAdsUrl ); ?>">
                <figure>
                  <img src="<?php echo esc_url( $belowCubeImageUrl ); ?>" alt="<?php echo esc_attr( $belowAds['alt'] ); ?>" class="img-fluid adsimg">
               </figure>
            </a>
            <?php 
         endforeach;
         ?>
      </aside>
      <!-- End Banner news -->
   <?php } ?>
</div>
</div>