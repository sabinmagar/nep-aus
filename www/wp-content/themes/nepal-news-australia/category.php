<?php
get_header();
$cat = get_queried_object();
$postFound = ( $cat->count );
$ppp = 6; // post you want to display and load
$catID = $cat->term_id;
$catArgs = array(
   'cat' => $catID,
   'post_status'  => 'publish',
   'posts_per_page' => 1,
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
                        व्यक्ति/व्यक्तित्व
                     </h1>
                  </div>
               </div>
            </div>
            <input type="hidden" id="ppp" data-value="<?php echo $ppp; ?>">
            <input type="hidden" id="catID" data-value="<?php echo $catID; ?>">  
            <div class="row" data-count="<?php echo ceil( $postFound / $ppp ); ?>" id="post_append">
               <div class="col-lg-4">
                  <!-- Post Article -->
                  <div class="article__entry-new">
                     <div class="article__image articel__image__transition">
                        <a href="news-details.html">
                           <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/kkkafle.jpg" alt="" class="img-fluid">
                        </a>
                     </div>
                     <div class="articel__content">
                        <div class="article__post__title">
                           <h3><a href="news-details.html">
                              कोरोना कहरमा विध्यार्थीलाई हेरम :श्रेष्ठ 
                           </a>
                        </h3>
                        <ul class="list-inline article__post__author">
                           <li class="list-inline-item">
                              <i class="fa fa-calendar"></i>
                           </li>
                           <li class="list-inline-item">
                              <span>May 09, 2022</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-4">
               <!-- Post Article -->
               <div class="article__entry-new">
                  <div class="article__image articel__image__transition">
                     <a href="news-details.html">
                        <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/kkkaaa-1.jpg" alt="" class="img-fluid">
                     </a>
                  </div>
                  <div class="articel__content">
                     <div class="article__post__title">
                        <h3><a href="news-details.html">
                           सकसपुर्ण यात्रापछिको अस्ट्रेलिया आगमन 
                        </a>
                     </h3>
                     <ul class="list-inline article__post__author">
                        <li class="list-inline-item">
                           <i class="fa fa-calendar"></i>
                        </li>
                        <li class="list-inline-item">
                           <span>May 09, 2022</span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-4">
            <!-- Post Article -->
            <div class="article__entry-new">
               <div class="article__image articel__image__transition">
                  <a href="news-details.html">
                     <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/amar1.jpg" alt="" class="img-fluid">
                  </a>
               </div>
               <div class="articel__content">
                  <div class="article__post__title">
                     <h3><a href="news-details.html">
                        अमर महर्जनको व्यवसायिक फड्को 
                     </a>
                  </h3>
                  <ul class="list-inline article__post__author">
                     <li class="list-inline-item">
                        <i class="fa fa-calendar"></i>
                     </li>
                     <li class="list-inline-item">
                        <span>May 09, 2022</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-4">
         <!-- Post Article -->
         <div class="article__entry-new">
            <div class="article__image articel__image__transition">
               <a href="#">
                  <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/ashok1.jpg" alt="" class="img-fluid">
               </a>
            </div>
            <div class="articel__content">
               <div class="article__post__title">
                  <h3><a href="#">
                     कर्मभूमिमा रमाएका अशोक ओली  
                  </a>
               </h3>
               <ul class="list-inline article__post__author">
                  <li class="list-inline-item">
                     <i class="fa fa-calendar"></i>
                  </li>
                  <li class="list-inline-item">
                     <span>May 09, 2022</span>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <div class="col-lg-4">
      <!-- Post Article -->
      <div class="article__entry-new">
         <div class="article__image articel__image__transition">
            <a href="#">
               <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/bhim1.jpg" alt="" class="img-fluid">
            </a>
         </div>
         <div class="articel__content">
            <div class="article__post__title">
               <h3><a href="#">
                भिम न्यौपानेको व्यवसायिक फड्को 
             </a>
          </h3>
          <ul class="list-inline article__post__author">
            <li class="list-inline-item">
               <i class="fa fa-calendar"></i>
            </li>
            <li class="list-inline-item">
               <span>May 09, 2022</span>
            </li>
         </ul>
      </div>
   </div>
</div>
</div>

<div class="col-lg-4">
   <!-- Post Article -->
   <div class="article__entry-new">
      <div class="article__image articel__image__transition">
         <a href="#">
            <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/megha1.jpg" alt="" class="img-fluid">
         </a>
      </div>
      <div class="articel__content">
         <div class="article__post__title">
            <h3><a href="#">
               युवा उद्यमी मेघराजको व्यवसायिक फड्को  
            </a>
         </h3>
         <ul class="list-inline article__post__author">
            <li class="list-inline-item">
               <i class="fa fa-calendar"></i>
            </li>
            <li class="list-inline-item">
               <span>May 09, 2022</span>
            </li>
         </ul>
      </div>
   </div>
</div>
</div>

<div class="clerfix"></div>
</div>                     
</div>
</div>

<div class="col-md-12">
  <div class="container">
    <div class="col-md-12">
      <center><button type="submit" class="btn btn-primary">Load More</button></center>
   </div>
</div>
</div>

</div>



</section>
<?php
get_footer();