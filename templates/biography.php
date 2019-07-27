<?php 
/**
 *
 * @Packge      sneakyrestaurant
 * @Author      Colorlib
 * @Author URL  https//www.Colorlib.com
 * @version     1.0
 *
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>

<div class="blog-author-wrap">
	<div class="blog-author media align-items-center">
		<?php
		// show avatar
		$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
		if( $avatar  ) {
			echo wp_kses_post( $avatar );
		}
		?>
		<div class="media-body">
			<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
			<p><?php esc_html( the_author_meta('description') ); ?></p>
		</div>
	</div>
</div>
