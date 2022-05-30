<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nepal_News_Australia
 */
get_header();
global $post;
if ( !is_user_logged_in() ) {
// update post view count
nepal_australia_news_setPostViews( get_the_ID() ); // inc/functions/helper.php
}
$thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
?>
<section class="pb-80">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Breadcrumb -->
				<?php
                // inc/functions/breadcrumb.php 
				echo nepal_australia_news_breadcrumb();
				?>
				<!-- end breadcrumb -->
			</div>
			<div class="col-md-9">
				<!-- content article detail -->
				<!-- Article Detail -->
				<div class="wrap__article-detail">
					<div class="wrap__article-detail-title">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
					<hr>
					<div class="wrap__article-detail-info">
						<ul class="list-inline">
							<li class="list-inline-item"> <i class="fa fa-calendar"></i> </li>
							<li class="list-inline-item"> <span class="text-dark text-capitalize ml-1">
								<?php echo get_the_date("F j, Y"); ?>
							</span> </li>
						</ul>
					</div>
					<hr>
					<center> <img src="http://www.nepalnewsaustralia.com.au/wp-content/uploads/web_banner_bottom-1.gif"> </center>
					<hr>
					<div class="wrap__article-detail-image mt-4">
						<figure>
							<img src="<?php echo esc_url( $thumbnailURL ); ?>" alt="<?php echo esc_attr( the_title() ); ?>" class="img-fluid">
						</figure>
					</div>
					<hr>
					<div class="wrap__article-detail-content">
						<?php the_content(); ?>
					</div>
				</div>
				<!-- end content article detail -->
				<?php
				$tagTerms = get_tags(array('hide_empty' => false));
				if ( $tagTerms ) {
					?>
					<!-- tags -->
					<!-- News Tags -->
					<div class="blog-tags">
						<ul class="list-inline">
							<li class="list-inline-item"> <i class="fa fa-tags">
							</i> </li>
							<?php
							foreach( $tagTerms as $termName ) :
								$tagLink = get_tag_link( $termName );
								?>
								<li class="list-inline-item"> <a href="<?php echo esc_url( $tagLink ); ?>">
									#<?php echo $termName->name; ?>
								</a> </li>
							<?php endforeach; ?>
						</ul>
					</div>
					<!-- end tags-->
				<?php } ?>				
				<hr>
				<!-- Shrare -->
				<div class="wrap__article-detail-content">
					<div class="total-views">
						<div class="total-views-read">
							<?php echo nepal_australia_news_getPostViews( get_the_ID() ); ?><span>
								views
							</span> </div>
							<ul class="list-inline"> <span class="share">share on:</span>
								<li class="list-inline-item">
									<a class="btn btn-social-o facebook" href="#"> <i class="fa fa-facebook-f"></i> <span>facebook</span> </a>
								</li>
								<li class="list-inline-item">
									<a class="btn btn-social-o twitter" href="#"> <i class="fa fa-twitter"></i> <span>twitter</span> </a>
								</li>
								<li class="list-inline-item">
									<a class="btn btn-social-o whatsapp" href="#"> <i class="fa fa-whatsapp"></i> <span>whatsapp</span> </a>
								</li>
								<li class="list-inline-item">
									<a class="btn btn-social-o telegram" href="#"> <i class="fa fa-telegram"></i> <span>telegram</span> </a>
								</li>
								<li class="list-inline-item">
									<a class="btn btn-linkedin-o linkedin" href="#"> <i class="fa fa-linkedin"></i> <span>linkedin</span> </a>
								</li>
							</ul>
						</div>
					</div>
					<!-- end Shrare-->
					<?php $relatedTitle = get_field('related_post_title','option'); ?>
					<div class="clearfix"></div>
					<div class="related-article">
						<h3><?php echo $relatedTitle; ?></h3>
						<div class="article__entry-carousel-three">
							<?php 
							$related = get_posts( 
								array( 
									'category__in' => wp_get_post_categories($post->ID), 
									'numberposts' => 10, 
									'post__not_in' => array($post->ID) 
								) 
							);
							if ( $related ) {
								foreach( $related as $post ) : 
									setup_postdata( $post );
									$uniqueID = get_the_ID();
									$imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
									$thumbnail = aq_resize( $imgURL, 284, 180, true );
									if ( $thumbnail ) {
										$thumbnailURL = $thumbnail;
									}
									else {
										$thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
									}
									?>
									<div class="item">
										<!-- Post Article -->
										<div class="article__entry">
											<div class="article__image">
												<a href="<?php echo esc_url( the_permalink() ); ?>"> <img src="<?php echo esc_url( $thumbnailURL ); ?>" alt="" class="img-fluid"> </a>
											</div>
											<div class="article__content">
												<h4 class="page-title">
													<a href="<?php echo esc_url( the_permalink() ); ?>">
														<?php the_title(); ?>
													</a>
												</h4> </div>
											</div>
										</div>
										<?php
									endforeach;
									wp_reset_postdata();
								}
								?>
							</div>
						</div>
					</div>
					<?php 
					// sidebar ads
					get_template_part('template-parts/common/sidebar','ads');
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
	get_footer();
