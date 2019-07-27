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

/***********************************
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_general_options_section',
        'default'     => '#e22104',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'sneakyrestaurant_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'sneakyrestaurant' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'sneakyrestaurant' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'sneakyrestaurant_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Instagram api key field
$url = 'https://www.instagram.com/developer/authentication/';

Epsilon_Customizer::add_field(
	'sneakyrestaurant_igaccess_token',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Instagram Access Token', 'sneakyrestaurant' ),
		'description' => sprintf( __( 'Set instagram access token. To get access token %s click here %s.', 'sneakyrestaurant' ), '<a target="_blank" href="'.esc_url( $url ).'">', '</a>' ),
		'section' => 'sneakyrestaurant_general_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '',

	)
);

/***********************************
 * Header Section Fields
 ***********************************/

 //Call to Action Toggle
 Epsilon_Customizer::add_field(
    'sneakyrestaurant_cta_toggle_settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Call To Action Show/Hide', 'sneakyrestaurant' ),
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

Epsilon_Customizer::add_field(
	'sneakyrestaurant_cta_label',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Call To Action Button Label', 'sneakyrestaurant' ),
		'section' => 'sneakyrestaurant_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Get Ticket', 'sneakyrestaurant' ),

	)
);
Epsilon_Customizer::add_field(
	'sneakyrestaurant_cta_url',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Call To Action URL', 'sneakyrestaurant' ),
		'section' => 'sneakyrestaurant_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '',

	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Background Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'default'     => '',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'default'     => 'rgba(255,255,255, 0.95)',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'default'     => '#2a2a2a',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'default'     => '#e22104',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'default'     => '#2a2a2a',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_headertop_options_section',
        'default'     => '#e22104',
    )
);


// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fafafa',
    )
);


// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pageheader_subtitle',
    array(
        'type'        => 'textarea',
        'label'       => esc_html__( 'Page Header Sub-title', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => esc_html__( 'Air seed winged lights saw kind whales in sixth best a dont seas dron image so fish all tree on', 'sneakyrestaurant' )
    )
);

// Social Share Switcher
Epsilon_Customizer::add_field(
    'sneakyrestaurant-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Share Toggle', 'sneakyrestaurant' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Page Title Bar Meta
Epsilon_Customizer::add_field(
    'sneakyrestaurant-feature-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Title-bar Feature Toggle', 'sneakyrestaurant' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

//Feature Title One
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pageheader_feature_title_one',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Feature Title One', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
    )
);
// Page Titlebar Feature One Image
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pagetitlebar_feature_icon_one',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Titlebar Feature One Image', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors'
    )
);
//Feature Title Two
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pageheader_feature_title_two',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Feature Title Two', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors'
    )
);
// Page Titlebar Feature Two Image
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pagetitlebar_feature_icon_two',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Titlebar Feature Two Image', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors'
    )
);
//Feature Title Three
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pageheader_feature_title_three',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Feature Title Three', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors'
    )
);
// Page Titlebar Feature Three Image
Epsilon_Customizer::add_field(
    'sneakyrestaurant_pagetitlebar_feature_icon_three',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Titlebar Feature Three Image', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
    )
);



/***********************************
 * Blog Section Fields
 ***********************************/

// Post excerpt length field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'sneakyrestaurant' ),
        'description' => esc_html__( 'Set post excerpt length.', 'sneakyrestaurant' ),
        'section'     => 'sneakyrestaurant_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'sneakyrestaurant-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'sneakyrestaurant' ),
        'section'  => 'sneakyrestaurant_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'sneakyrestaurant' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'SNEAKYRESTAURANT_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'sneakyrestaurant-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'sneakyrestaurant' ),
        'section'     => 'sneakyrestaurant_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'sneakyrestaurant-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'sneakyrestaurant' ),
        'section'     => 'sneakyrestaurant_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'sneakyrestaurant-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'sneakyrestaurant' ),
		'section'  => 'sneakyrestaurant_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'sneakyrestaurant' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg'
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'sneakyrestaurant' ),
        'section'           => 'sneakyrestaurant_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'sneakyrestaurant' ),
        'section'           => 'sneakyrestaurant_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'sneakyrestaurant-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'sneakyrestaurant' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'sneakyrestaurant' ),
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'sneakyrestaurant' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'sneakyrestaurant-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'sneakyrestaurant' ),
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#fff8f7',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#2f2d4e',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#e22104',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#fff8f7',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#666',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#e22104',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'sneakyrestaurant_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'sneakyrestaurant' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'sneakyrestaurant_footer_options_section',
        'default'     => '#e22104',
    )
);
