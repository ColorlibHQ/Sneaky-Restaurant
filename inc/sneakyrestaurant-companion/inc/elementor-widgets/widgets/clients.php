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

class sneakyrestaurant_Clients extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-clients';
	}

	public function get_title() {
		return __( 'Clients', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-logo';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {
        
         // Start Section Title=====================================
         $this->start_controls_section(
            'schedule_heading', [
                'label' => esc_html__( 'Schedule Section Heading', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => esc_html__( 'Section Title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => esc_html__( 'Section Sub-title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );
        $this->add_control(
            'section_title_image', [
                'label' => esc_html__( 'Section Title Image', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::MEDIA,

            ]
        );
        $this->end_controls_section(); // End Section Title

        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'gold_sponsor',
			[
				'label' => __( 'Gold Sponsor', 'sneakyrestaurant' ),
			]
        );
        $this->add_control(
            'sponsor_title', [
                'label' => esc_html__( 'Sponsor Title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'default' => esc_html__( 'GOLD SPONSOR', 'sneakyrestaurant' ),
                'label_block' => true

            ]
        );
        $this->add_control(
            'gold_sponsor_logos', [
                'label' => esc_html__( 'Gold Sponsor Company Logos', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::GALLERY,

            ]
        );
		$this->end_controls_section(); // End Sponsor Company Logo
        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'silver_sponsor',
			[
				'label' => __( 'Silver Sponsor', 'sneakyrestaurant' ),
			]
        );
        $this->add_control(
            'silver_sponsor_title', [
                'label' => esc_html__( 'Sponsor Title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'default' => esc_html__( 'SILVER SPONSOR', 'sneakyrestaurant' ),
                'label_block' => true

            ]
        );
        $this->add_control(
            'silver_sponsor_logos', [
                'label' => esc_html__( 'Silver Sponsor Company Logos', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::GALLERY,

            ]
        );
		$this->end_controls_section(); // End Sponsor Company Logo


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'section_title_color', [
                'label' => __( 'Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .section-intro .primary-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_title',
                'selector'  => '{{WRAPPER}} .section-intro .primary-text',
            ]
        );
        $this->add_control(
            'section_subtitle_color', [
                'label' => __( 'Sub-title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .section-intro .section-intro__title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_subtitle',
                'selector'  => '{{WRAPPER}} .section-intro .section-intro__title',
            ]
        );
        $this->add_control(
            'section_bg_separetor',
            [
                'label' => __( 'Section Background', 'sneakyrestaurant' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'label' => __( 'Section Background Image', 'sneakyrestaurant' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .sponsor-bg',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    ?>

        <section class="section-padding--small sponsor-bg">
            <div class="container">
                <div class="section-intro text-center pb-98px">
                    <?php
                    if( !empty( $settings['sect_subtitle'] ) ){
                        echo '<p class="section-intro__title">'. esc_html( $settings['sect_subtitle'] ) .'</p>';
                    }

                    if( !empty( $settings['sect_title'] ) ){
                        echo '<h2 class="primary-text">'. esc_html( $settings['sect_title'] ) .'</h2>';
                    }

                    if( !empty( $settings['section_title_image']['url'] ) ){
                        echo '<img src="'. esc_url( $settings['section_title_image']['url'] ) .'" alt="">';
                    }
                    ?>
                </div>
            
                <div class="sponsor-wrapper mb-5 pb-4">
                    <?php 
                        if( !empty( $settings['sponsor_title'] ) ){
                            echo '<h3 class="sponsor-title mb-5">'. esc_html( $settings['sponsor_title'] ) .'</h3>';
                        }
                    ?>
                    <div class="row">

                    <?php
                        if( is_array( $settings['gold_sponsor_logos'] ) && count( $settings['gold_sponsor_logos'] ) > 0 ):
                            foreach( $settings['gold_sponsor_logos'] as $sponsor ): ?>
                                <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                    <div class="sponsor-single">
                                        <?php
                                            echo '<img class="img-fluid" src="'. $sponsor['url'] .'" alt="'. esc_html__( 'Gold sponsor company logo', 'sneakyrestaurant' ) .'">';
                                        ?>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?> 
                    </div>
                </div>
       

                <div class="sponsor-wrapper sponsor-wrapper--small">
                    <?php 
                    if( !empty( $settings['silver_sponsor_title'] ) ){
                        echo '<h3 class="sponsor-title mb-5">'. esc_html( $settings['silver_sponsor_title'] ) .'</h3>';
                    }
                    ?>
                    <div class="row">
                        <?php
                        if( is_array( $settings['silver_sponsor_logos'] ) && count( $settings['silver_sponsor_logos'] ) > 0 ):
                            foreach( $settings['silver_sponsor_logos'] as $sponsor ): ?>
                                <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                    <div class="sponsor-single">
                                        <?php
                                            echo '<img class="img-fluid" src="'. $sponsor['url'] .'" alt="'. esc_html__( 'Sliver sponsor company logo', 'sneakyrestaurant' ) .'">';
                                        ?>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>

    <?php

    }
	
}
