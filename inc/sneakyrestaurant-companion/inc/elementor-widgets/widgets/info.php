<?php
namespace sneakyrestaurantelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * sneakyrestaurant elementor counter section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Info extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-skill';
	}

	public function get_title() {
		return __( 'Info', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'info_section',
            [
                'label' => __( 'Info', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'info_image', [
                'label' => __( 'Feature Image', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::MEDIA,
                
            ]
        );
        $this->add_control(
            'info_content', [
                'label' => __( 'Content', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::WYSIWYG,
                
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style counter ------------------------------
        $this->start_controls_section(
            'style_counter', [
                'label' => __( 'Style Counter', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_countertitle', [
                'label' => __( 'Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-counter p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_number', [
                'label'     => __( 'Number Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-counter h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3898f8',
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .circle' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'sneakyrestaurant' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'sneakyrestaurant' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'sneakyrestaurant' ),
                'label_off' => __( 'Hide', 'sneakyrestaurant' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'sneakyrestaurant' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .counter-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'sneakyrestaurant' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .counter-area',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
    $settings = $this->get_settings();
 
    ?>
    <section class="info-area pb-120">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 no-padding info-area-left">
                    <?php
                        if( ! empty( $settings['info_image']['url'] ) ){
                            echo '<img class="img-fluid" src="'. $settings['info_image']['url'] .'" alt="'. __('Info Image', 'sneakyrestaurant') .'">';
                        }
                    ?>
                    
                </div>
                <div class="col-lg-6 info-area-right">
                    <?php
                        if( ! empty( $settings['info_content'] ) ){
                            echo wp_kses_post( $settings['info_content'] );
                        }
                    ?>
                </div>
            </div>
        </div>	
    </section>
 
    <?php

    }

}
