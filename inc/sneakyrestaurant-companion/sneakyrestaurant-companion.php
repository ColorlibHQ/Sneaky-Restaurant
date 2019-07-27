<?php
/**
 * @Packge     : sneakyrestaurant Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_VERSION' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_DIR_PATH' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_DIR_PATH', get_parent_theme_file_path().'/inc/sneakyrestaurant-companion/' );
}

// Define inc dir path constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_INC_DIR_PATH' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_INC_DIR_PATH', SNEAKYRESTAURANT_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_SW_DIR_PATH' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_SW_DIR_PATH', SNEAKYRESTAURANT_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH', SNEAKYRESTAURANT_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_DEMO_DIR_PATH', SNEAKYRESTAURANT_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'SNEAKYRESTAURANT_THEME_DIR_URL' ) ) {
    define( 'SNEAKYRESTAURANT_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_DIR_URL' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_DIR_URL', SNEAKYRESTAURANT_THEME_DIR_URL . '/inc/sneakyrestaurant-companion/' );
}

// Define inc dir url constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_INC_DIR_URL' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_INC_DIR_URL', SNEAKYRESTAURANT_COMPANION_DIR_URL . 'inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_META_DIR_URL' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_META_DIR_URL', SNEAKYRESTAURANT_COMPANION_INC_DIR_URL . 'sneakyrestaurant-meta/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_EW_DIR_URL' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_EW_DIR_URL', SNEAKYRESTAURANT_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'SNEAKYRESTAURANT_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'SNEAKYRESTAURANT_COMPANION_DEMO_DIR_URL', SNEAKYRESTAURANT_COMPANION_INC_DIR_URL . 'demo-data/' );
}

