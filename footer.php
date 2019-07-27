<?php 
/**
 * @Packge     : sneakyrestaurant
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook sneakyrestaurant_footer
 *
 * @Hooked  sneakyrestaurant_footer_area 10
 * @Hooked  sneakyrestaurant_back_to_top 20
 *
 */

do_action( 'sneakyrestaurant_footer' );

wp_footer(); 
?>
</body>
</html>