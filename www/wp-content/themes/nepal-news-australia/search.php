<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nepal_News_Australia
 */

get_header();
global $post;
if ( $_GET['s'] && !empty( $_GET['s']) ) {
	$searchText = $_GET['s'];
	$query1 = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'paged' => 1, 'posts_per_page' => -1, 's' => $searchText, 'orderby' => 'rand'));
	$postFound = ( $query1->found_posts );
<<<<<<< HEAD
	$ppp = 21;
=======
<<<<<<< HEAD
	$ppp = 21;
=======
	$ppp = 18;
>>>>>>> dc6392853bf50cd22d0c2777eb3c9bebdfe86c9c
>>>>>>> 178793d3be64289653751dc74f4de45bb4e5f2e7
	$catID = '';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$searchArgs = array(
		'post_type'          => 'post',
		'posts_per_page'     => $ppp,
		'post_status'        => 'publish',
		'paged'        		 => 1,
		's'					 => $searchText,
		'orderby'			 => 'rand',
	);
	$parentSingle = get_posts( $searchArgs );
	if ( $parentSingle ) {
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
							<input type="hidden" id="name" data-value="<?php echo 'search'; ?>">
							<input type="hidden" id="s" data-value="<?php echo $searchText; ?>">
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
		}
		else { ?>
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="wrap__about-us">
								<h2>
									<span><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nepal_australia_news' ); ?></span>
								</h2>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
	}
	else { ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap__about-us">
							<h2>
								<span><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nepal_australia_news' ); ?></span>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
	get_footer();