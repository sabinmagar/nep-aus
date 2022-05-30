<?php
// full length advertisement
add_shortcode('full_length_advertisement',function() {
	$fullWidthAds = get_field('full_width_ads','option');
	if ( $fullWidthAds ) {
		if (  $fullWidthAds['caption'] ) {
			$fullWidthAdsUrl = $fullWidthAds['caption'];
		}
		else {
			$fullWidthAdsUrl = '#';
		}
		?>
		<!-- Advertisement -->
		<section class="bg-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<a href="<?php echo esc_url( $fullWidthAdsUrl ); ?>">
							<figure>
								<img src="<?php echo esc_url( $fullWidthAds['url'] ); ?>" alt="<?php echo esc_attr( $fullWidthAds['alt'] ); ?>" class="img-fluid">
							</figure>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Advertisement -->
		<?php
	}
});