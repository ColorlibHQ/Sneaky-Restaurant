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

function sneakyrestaurant_widgets_init() {
    // sidebar widgets register
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'sneakyrestaurant' ),
            'id'            => 'sneakyrestaurant-post-sidebar',
            'before_widget' => '<aside id="%1$s" class="single_sidebar_widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget_title">',
            'after_title'   => '</h4>',
        )
    );
    
    // footer widgets register
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'sneakyrestaurant' ),
            'id'            => 'footer-1',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'sneakyrestaurant' ),
            'id'            => 'footer-2',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'sneakyrestaurant' ),
            'id'            => 'footer-3',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'sneakyrestaurant' ),
            'id'            => 'footer-4',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Five', 'sneakyrestaurant' ),
            'id'            => 'footer-5',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        )
    );


}
add_action( 'widgets_init', 'sneakyrestaurant_widgets_init' );
