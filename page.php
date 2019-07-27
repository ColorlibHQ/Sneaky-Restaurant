<?php 
/**
 * @Packge 	   : sneakyrestaurant
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

//  Call Header
get_header();

/**
 * 
 * Hook for Blog, single, page, search, archive pages
 * wrapper start with wrapper div, container, row.
 *
 * Hook sneakyrestaurant_wrp_start
 *
 * @Hooked sneakyrestaurant_wrp_start_cb
 *  
 */
do_action( 'sneakyrestaurant_page_wrp_start' );

/**
 * 
 * Hook for Blog, single, search, archive pages
 * column start.
 *
 * Hook sneakyrestaurant_blog_col_start
 *
 * @Hooked sneakyrestaurant_page_col_start_cb
 *  
 */
do_action( 'sneakyrestaurant_page_col_start' );

if( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		// Post Contant
		get_template_part( 'templates/content', 'page' );
	}
	// Reset Data
	wp_reset_postdata();
} else {
	get_template_part( 'templates/content', 'none' );
}

/**
 * 
 * Hook for Blog, single, search, archive pages
 * column end.
 *
 * Hook sneakyrestaurant_blog_col_end
 *
 * @Hooked sneakyrestaurant_page_col_end_cb
 *  
 */
do_action( 'sneakyrestaurant_page_col_end' );

/**
 * 
 * Hook for Blog, single blog, search, archive pages sidebar.
 *
 * Hook sneakyrestaurant_blog_sidebar
 *
 * @Hooked sneakyrestaurant_blog_sidebar_cb
 *  
 */
do_action( 'sneakyrestaurant_page_sidebar' );
	
/**
 * Hook for Blog, single, page, search, archive pages
 * wrapper end with wrapper div, container, row.
 *
 * Hook sneakyrestaurant_wrp_end
 * @Hooked  sneakyrestaurant_wrp_end_cb
 *
 */
do_action( 'sneakyrestaurant_page_wrp_end' );
	
// Call Footer
get_footer();
