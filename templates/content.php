<?php
/**
 * @Packge     : Politis
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
global $a;
$articalClass = $a > 1 ? 'blog_item' : 'first_item';
$a++;
?>

<article id="<?php the_ID(); ?>" <?php post_class( esc_attr( $articalClass ) ); ?>>
	<?php 
	if( has_post_thumbnail() ) :
  	echo '<div class="blog_item_img">';
			/**
			 * Blog Post thumbnail
			 * @Hook  sneakyrestaurant_blog_posts_thumb
			 *
			 * @Hooked sneakyrestaurant_blog_posts_thumb_cb
			 *
			 *
			 */
			do_action( 'sneakyrestaurant_blog_posts_thumb' );

			/**
			 * Blog Post Date Meta
			 * @Hook  sneakyrestaurant_blog_post_date
			 *
			 * @Hooked sneakyrestaurant_blog_post_date_cb
			 *
			 *
			 */
			do_action( 'sneakyrestaurant_blog_post_date' );

		echo '</div>';
	endif;
	echo '<div class="blog_details">';
		/**
		 * Blog Post title
		 * @Hook  sneakyrestaurant_blog_posts_title
		 *
		 * @Hooked sneakyrestaurant_blog_posts_title_cb
		 *
		 *
		 */
		do_action( 'sneakyrestaurant_blog_posts_title' );

		/**
		 * Blog Excerpt With read more button
		 * @Hook  sneakyrestaurant_blog_posts_excerpt
		 *
		 * @Hooked sneakyrestaurant_blog_posts_excerpt_cb
		 *
		 *
		 */
		do_action( 'sneakyrestaurant_blog_posts_excerpt' );

		/**
		 * Blog Excerpt With read more button
		 * @Hook  sneakyrestaurant_blog_posts_bottom_meta
		 *
		 * @Hooked sneakyrestaurant_blog_posts_bottom_meta_cb
		 *
		 *
		 */
		do_action( 'sneakyrestaurant_blog_posts_bottom_meta' );
		?>
  </div>
</article>