<?php
namespace sneakyrestaurantelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * sneakyrestaurant elementor section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_About extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-about';
	}

	public function get_title() {
		return __( 'About', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_sec',
			[
				'label' => __( 'About Us', 'sneakyrestaurant' ),
			]
        );
        $this->add_control(
            'intro_title',
            [
                'label'         => esc_html__( 'Title Intro', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'About Us', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'about_title',
            [
                'label'         => esc_html__( 'About Title', 'sneakyrestaurant' ),
                'description'   => esc_html__('Use <br> tag for line break', 'sneakyrestaurant'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__( 'We speak the good food language', 'sneakyrestaurant' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'about_content',
            [
                'label'         => esc_html__( 'Content', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label'         => esc_html__( 'Button Label', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Learn More', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'         => esc_html__( 'Button URL', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true
            ]
        );

        $this->add_control(
            'feature_img1',
            [
                'label'         => esc_html__( 'About Feature Image One', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'feature_img2',
            [
                'label'         => esc_html__( 'About Feature Image Two', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End about content
        

        // Section Style Setting
        $this->start_controls_section(
			'section_style',
			[
                'label' => __( 'Style', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
            'intro_title_color', [
                'label' => __( 'Intro Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-intro .intro-title' => 'color: {{VALUE}};',
                ],
                'default'   => '#e22104'
            ]
        );
        $this->add_control(
            'intro_border_color', [
                'label' => __( 'Intro Border Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-intro .intro-title::after' => 'background-color: {{VALUE}};',
                ],
                'default'   => '#3a414e'
            ]
        );
        $this->add_control(
            'title_color', [
                'label' => __( 'Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-intro h2' => 'color: {{VALUE}};',
                ],
                'default'   => '#2f2d4e'
            ]
        );
        $this->add_control(
            'about_btn_label_color', [
                'label' => __( 'Button Label Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about .button' => 'color: {{VALUE}};',
                ],
                'default'   => '#fff'
            ]
        );
        $this->add_control(
            'btn_hover_label_color', [
                'label' => __( 'Button Hover Label Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about .button:hover' => 'color: {{VALUE}};',
                ],
                'default'   => '#fff'
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label' => __( 'Button Background Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about .button' => 'background-color: {{VALUE}};',
                ],
                'default'   => '#e22104'
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label' => __( 'Button Hover Background Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about .button:hover' => 'background-color: {{VALUE}};',
                ],
                'default'   => '#ff0000'
            ]
        );
        $this->end_controls_section(); // End about content
        

	}

	protected function render() {
    $settings = $this->get_settings();
    $aboutFeature1 = $settings['feature_img1']['url'];
    $aboutFeature2 = $settings['feature_img2']['url'];
    $content     = $settings['about_content'];
    $about_title = $settings['about_title'];
    $buttonLabel = $settings['btn_label'];
    $intro_title = $settings['intro_title'];

    ?>
    <section class="about section-margin pb-xl-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
                    <div class="img-styleBox">
                        <?php
                        if( !empty( $aboutFeature1 ) ){
                            echo '<div class="styleBox-border">';
                                echo '<img class="styleBox-img1 img-fluid" src="'. esc_url( $aboutFeature1 ) .'" alt="'. esc_attr('About Imgae') .'">';
                            echo '</div>';
                        }
                        if( !empty( $aboutFeature2 ) ){
                            echo '<img class="styleBox-img2 img-fluid" src="'. esc_url( $aboutFeature2 ) .'" alt="'. esc_html__('About Feature Image', 'sneakyrestaurant') .'">';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
                    <div class="section-intro mb-lg-4">
                        <?php
                            // Intro
                            if( !empty( $intro_title ) ){
                                echo '<h4 class="intro-title">'. esc_html( $intro_title ) .'</h4>';
                            }
                            // Title
                            if( !empty( $about_title ) ){
                                echo '<h2>'. esc_html( $about_title ) .'</h2>';
                            }
                        ?>
                    </div>
                    <?php
                        // Content
                        if( !empty( $content ) ){
                            echo wp_kses_post($content);
                        }
                        // Button
                        if( !empty( $buttonLabel ) ){
                            echo '<a class="button button-shadow mt-2 mt-lg-4" href="'. esc_url( $settings['btn_url']['url'] ) .'">'. esc_html( $buttonLabel ) .'</a>';
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php

    }

}