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
 * 404 page
 * @Hook sneakyrestaurant_fof
 * @Hooked sneakyrestaurant_fof_cb
 *
 */

do_action( 'sneakyrestaurant_fof' );

// Call Footer
get_footer();
