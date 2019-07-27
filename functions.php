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
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'SNEAKYRESTAURANT_DIR_URI' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'SNEAKYRESTAURANT_DIR_ASSETS_URI' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_ASSETS_URI', SNEAKYRESTAURANT_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'SNEAKYRESTAURANT_DIR_CSS_URI' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_CSS_URI', SNEAKYRESTAURANT_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'SNEAKYRESTAURANT_DIR_JS_URI' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_JS_URI', SNEAKYRESTAURANT_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'SNEAKYRESTAURANT_DIR_PATH' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'SNEAKYRESTAURANT_DIR_PATH_INC' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_PATH_INC', SNEAKYRESTAURANT_DIR_PATH.'inc/' );
}

//Sneakyrestaurant libraries Folder Directory
if( ! defined( 'SNEAKYRESTAURANT_DIR_PATH_LIBS' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_PATH_LIBS', SNEAKYRESTAURANT_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'SNEAKYRESTAURANT_DIR_PATH_CLASSES' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_PATH_CLASSES', SNEAKYRESTAURANT_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'SNEAKYRESTAURANT_DIR_PATH_HOOKS' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_PATH_HOOKS', SNEAKYRESTAURANT_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'SNEAKYRESTAURANT_DIR_PATH_WIDGET' ) ) {
	define( 'SNEAKYRESTAURANT_DIR_PATH_WIDGET', SNEAKYRESTAURANT_DIR_PATH_INC.'widgets/' );
}


// Admin Enqueue script
function sneakyrestaurant_admin_script(){
    wp_enqueue_script( 'sneakyrestaurant_admin', get_template_directory_uri().'/assets/js/sneakyrestaurant_admin.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'sneakyrestaurant_admin_script' );

/**
 * Include File
 *
 */

require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'sneakyrestaurant-companion/sneakyrestaurant-companion.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'sneakyrestaurant-companion/sneakyrestaurant-init.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'widgets-reg.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'sneakyrestaurant-functions.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'commoncss.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'support-functions.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_HOOKS . 'hooks.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( SNEAKYRESTAURANT_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate Sneakyrestaurant object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */
//

$obj = new Sneakyrestaurant();



// User profile settings
add_action( 'wp_ajax_course_star_review', 'umeetevent_course_star_review' );
add_action( 'wp_ajax_nopriv_course_star_review', 'umeetevent_course_star_review' );
function umeetevent_course_star_review() {

	if( isset( $_POST['userdata'] ) ){
		if( is_user_logged_in() ){

			parse_str( $_POST['userdata'], $getData );

			$userdata = get_user_by( 'id',  $getData['userid'] );
			$time = current_time('mysql');
		
			$data = array(
				'comment_post_ID' => absint( $getData['postid'] ),
				'comment_author' => $userdata->data->user_login,
				'comment_author_email' => $userdata->data->user_email,
				'comment_content' => wp_kses_post( $getData['feedback'] ),
				'user_id' => $userdata->data->ID,
				'comment_date' => $time,
				'comment_approved' => 1,
			);

			$commentsId = wp_insert_comment($data);


			$args = array(
				'post_id' => absint( $getData['postid'] ),   // Use post_id, not post_ID
			);
			$reviews = get_comments( $args );
			 $reviewCount = count( $reviews );

			$avgreview = get_post_meta( absint( $getData['postid'] ), 'umeetevent_course_avgreview', true );

			$avgreview =  $avgreview +  $getData['ratingvalue'];

			update_post_meta( absint( $getData['postid'] ), 'umeetevent_course_avgreview', $avgreview );

			update_comment_meta( absint( $commentsId ), 'umeetevent_course_review', $getData['ratingvalue'] );

			echo 'success';
		}else{
			echo 'Error';
		}


	}


	die();
}
