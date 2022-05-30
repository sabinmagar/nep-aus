<?php
// loadmore category's post
add_action( 'wp_ajax_nepal_australia_news_loadmore_post', 'nepal_australia_news_loadmore_post' );
add_action( 'wp_ajax_nopriv_nepal_australia_news_loadmore_post', 'nepal_australia_news_loadmore_post' );
function nepal_australia_news_loadmore_post() {
	global $post;
	$token = $_POST['security'];
	if ( wp_verify_nonce( $token, '%NEPAL_AUSTRALIA%' ) ) {
		$name = $_POST['name'];
		$catID = $_POST['catID'];
		$ppp = $_POST['ppp'];
		$pageNumber = $_POST['page'];
		if ( $name == 'category' ) {
			$catArgs = array(
				'cat' => $catID,
				'post_status'  => 'publish',
				'posts_per_page' => $ppp,
				'paged' => $pageNumber,
			);
			$parentSingle = get_posts( $catArgs );
		}
		elseif ( $name == 'tag' ) {
			$tagArgs = array(
				'tag_id' => $catID,
				'post_status'  => 'publish',
				'posts_per_page' => $ppp,
				'paged' => $pageNumber,
			);
			$parentSingle = get_posts( $tagArgs );
		}
		elseif ( $name == 'search' ) {
			$searchText = $_POST['s'];
			$searchArgs = array(
				'post_type'          => 'post',
				'posts_per_page'     => $ppp,
				'post_status'        => 'publish',
				'paged'        		 => $pageNumber,
				's'					 => $searchText,
				'orderby'			 => 'rand',
			);
			$parentSingle = get_posts( $searchArgs );
		}
		else {

		}
		// make buffer for json
		ob_start();
		foreach ( $parentSingle as $post ) :
			setup_postdata( $post );
			$uniqueID = get_the_ID();
			$imgURL = get_the_post_thumbnail_url( $uniqueID, 'full');
			$thumbnail = aq_resize( $imgURL, 376, 298, true );
			if ( $thumbnail ) {
				$thumbnailURL = $thumbnail;
			}
			else {
				$thumbnailURL = get_the_post_thumbnail_url( $uniqueID, 'full');
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
	// send json to ajax
	wp_send_json_success(ob_get_clean());
}
else {
	return false;
}
wp_die(); // always use to terminate ajaxrequest
}