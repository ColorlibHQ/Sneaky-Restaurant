<?php 
	$id     = get_the_ID();
	$bgopt  = get_post_meta( absint( $id ), '_sneakyrestaurant_builderpage_headerimg', true );

	$glob_class = ' global-banner';
	$setbgurl   = '';

	if ( $bgopt == 'featured' ) {
		$setbgurl  = get_the_post_thumbnail_url( absint( $id ) );
		$glob_class = '';
	}
	$pageSubTitle = get_post_meta( get_queried_object_id(), 'page_subtitle_meta', true);
	$pageSubTitle_theme = sneakyrestaurant_opt( 'sneakyrestaurant_pageheader_subtitle' );
	$headerBg     =  ! empty( get_header_image() ) ?  esc_url( get_header_image() ) : '';
	?>

	<section class="hero-banner hero-banner-sm <?php echo esc_attr( $glob_class  ); ?>">
		<div class="hero-wrapper">
			<div class="hero-left">
				<?php
					if ( is_archive() ) {
						the_archive_title('<h1 class="hero-title">', '</h1>');
					} elseif ( is_home() ) {
						echo '<h1 class="hero-title">'.esc_html__( 'Blog', 'sneakyrestaurant' ).'</h1>';
					}
					elseif( is_single() ){
						echo '<h1 class="hero-title">'.esc_html__( 'Blog Single', 'sneakyrestaurant' ).'</h1>';
					}
					elseif ( is_search() ) {
						echo '<h1 class="hero-title">'.esc_html__( 'Search Result', 'sneakyrestaurant' ).'</h1>';
					} else {
						the_title( '<h1 class="hero-title">', '</h1>' );
					} 

					//Page Sub Title
					if( $pageSubTitle ){
						echo '<p>'. esc_html( $pageSubTitle ) .'</p>';
					}elseif( ! empty( $pageSubTitle_theme ) ){
						echo '<p>'. esc_html( $pageSubTitle_theme ) .'</p>';
					}

				//Feature Switcher
				if( sneakyrestaurant_opt( 'sneakyrestaurant-feature-toggle' ) ){
					$fOneTitle	= sneakyrestaurant_opt( 'sneakyrestaurant_pageheader_feature_title_one' );
					$iconone 	= sneakyrestaurant_opt( 'sneakyrestaurant_pagetitlebar_feature_icon_one' );
					$fIconOne	= json_decode( $iconone );
					$fTwoTitle	= sneakyrestaurant_opt( 'sneakyrestaurant_pageheader_feature_title_two' );
					$icontwo 	= sneakyrestaurant_opt( 'sneakyrestaurant_pagetitlebar_feature_icon_two' );
					$fIconTwo 	= json_decode( $icontwo );
					$fThreeTitle= sneakyrestaurant_opt( 'sneakyrestaurant_pageheader_feature_title_three' );
					$iconthree 	= sneakyrestaurant_opt( 'sneakyrestaurant_pagetitlebar_feature_icon_three' );
					$fIconThree	= json_decode( $iconthree );
					
					?>
					<ul class="hero-info d-none d-md-block">
						<?php
						if( !empty( $fIconOne->url ) ){ ?>
							<li>
								<?php
								echo '<img src="'. esc_url( $fIconOne->url ) .'" alt="'. esc_html__( 'Feature One Icon', 'sneakyrestaurant' ) .'">';
								echo '<h4>'. esc_html( $fOneTitle ) .'</h4>';
								?>
							</li>
							<?php
						}
						if( !empty( $fIconTwo->url ) ){ ?>
							<li>
								<?php
								echo '<img src="'. esc_url( $fIconTwo->url ) .'" alt="'. esc_html__( 'Feature Two Icon', 'sneakyrestaurant' ) .'">';
								echo '<h4>'. esc_html( $fTwoTitle ) .'</h4>';
								?>
							</li>
							<?php
						}
						if( !empty( $fIconThree->url ) ){ ?>
							<li>
								<?php
								echo '<img src="'. esc_url( $fIconThree->url ) .'" alt="'. esc_html__( 'Feature Three Icon', 'sneakyrestaurant' ) .'">';
								echo '<h4>'. esc_html( $fThreeTitle ) .'</h4>';
								?>
							</li>
							<?php
						}
						?>
					</ul>
					<?php
				} ?>
			</div>
			<div class="hero-right">
				<div class="owl-carousel owl-theme w-100 hero-carousel">
					<div class="hero-carousel-item">
						<img class="img-fluid" src="<?php echo  $headerBg  ?>" alt="">
					</div>
				</div>
			</div>
			<?php 
			if( sneakyrestaurant_opt( 'sneakyrestaurant-social-share-toggle', false ) ){
				echo sneakyrestaurant_social_sharing_buttons('social-icons d-none d-lg-block');
			}
			?>
			
		</div>
	</section>