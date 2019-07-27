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

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'sneakyrestaurant_preloader', 'sneakyrestaurant_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'sneakyrestaurant_header', 'sneakyrestaurant_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'sneakyrestaurant_footer', 'sneakyrestaurant_footer_area', 10 );
add_action( 'sneakyrestaurant_footer', 'sneakyrestaurant_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'sneakyrestaurant_wrp_start', 'sneakyrestaurant_wrp_start_cb', 10 );
add_action( 'sneakyrestaurant_wrp_end', 'sneakyrestaurant_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'sneakyrestaurant_page_wrp_start', 'sneakyrestaurant_page_wrp_start_cb', 10 );
add_action( 'sneakyrestaurant_page_wrp_end', 'sneakyrestaurant_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'sneakyrestaurant_blog_col_start', 'sneakyrestaurant_blog_col_start_cb', 10 );
add_action( 'sneakyrestaurant_blog_col_end', 'sneakyrestaurant_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'sneakyrestaurant_page_col_start', 'sneakyrestaurant_page_col_start_cb', 10 );
add_action( 'sneakyrestaurant_page_col_end', 'sneakyrestaurant_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'sneakyrestaurant_blog_posts_thumb', 'sneakyrestaurant_blog_posts_thumb_cb', 10 );
/**
 * Hook for blog posts Date Meta.
 */
add_action( 'sneakyrestaurant_blog_post_date', 'sneakyrestaurant_blog_post_date_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'sneakyrestaurant_blog_posts_title', 'sneakyrestaurant_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'sneakyrestaurant_blog_posts_meta', 'sneakyrestaurant_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'sneakyrestaurant_blog_posts_bottom_meta', 'sneakyrestaurant_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'sneakyrestaurant_blog_posts_excerpt', 'sneakyrestaurant_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'sneakyrestaurant_blog_posts_content', 'sneakyrestaurant_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'sneakyrestaurant_blog_sidebar', 'sneakyrestaurant_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'sneakyrestaurant_page_sidebar', 'sneakyrestaurant_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'sneakyrestaurant_blog_posts_share', 'sneakyrestaurant_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'sneakyrestaurant_blog_single_meta', 'sneakyrestaurant_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'sneakyrestaurant_blog_single_footer_nav', 'sneakyrestaurant_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'sneakyrestaurant_page_content', 'sneakyrestaurant_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'sneakyrestaurant_fof', 'sneakyrestaurant_fof_cb', 10 );
