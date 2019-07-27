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
 * sneakyrestaurant elementor few words section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Cta extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-cta';
	}

	public function get_title() {
		return __( 'Call to Action', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'sh_content',
            [
                'label' => __( 'Select Call to Action Style', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'select_cta',
            [
                'label'       => esc_html__( 'Select Call to Action Style', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::SELECT,
                'options'      => [
                    'style_1'   => esc_html__('Style One', 'sneakyrestaurant'),
                    'style_2'   => esc_html__('Style Two', 'sneakyrestaurant')
                ],
                'default'     => 'style_1'
            ]
        );
        $this->end_controls_section(); // End few words content

        // Single Column Call to Action Settings
        $this->start_controls_section(
            'single_cta_sec',
            [
                'label' => __( 'Call to Action', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'cta_title1',
            [
                'label'       => esc_html__( 'Title One', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( "Italian Pizza Offer", "sneakyrestaurant" )
            ]
        );
        $this->add_control(
            'cta_title2',
            [
                'label'       => esc_html__( 'Title Two', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( '50% OFF', 'sneakyrestaurant' ),
                
            ]
        );
        $this->add_control(
            'cta_btn_label',
            [
                'label'       => esc_html__( 'Button Label', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Read More', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'cta_btn_url',
            [
                'label'       => esc_html__( 'Button URL', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                
            ]
        );
        $this->add_control(
            'cta_bg_image',
            [
                'label'       => esc_html__( 'Background Image', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'condition'   => [
                    'select_cta' => 'style_1'
                ]
                
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'sneakyrestaurant' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cta-area',
                'condition'   => [
                    'select_cta' => 'style_2'
                ]
            ]
        );
        $this->end_controls_section();
        //End  Single Column Call to Action Settings


        //------------------------------ Style CTA Dual Column Settings ------------------------------
        $this->start_controls_section(
            'style_cta_1', [
                'label' => __( 'Style CTA', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_cta' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'color_cta_cl', [
                'label'     => __( 'Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .offer-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_title_typo_cl',
                'selector'  => '{{WRAPPER}} .offer-card h3',
            ]
        );

        $this->add_control(
            'color_cta_subt_cl', [
                'label'     => __( 'Sub-title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .offer-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_subt_typo_cl',
                'selector'  => '{{WRAPPER}} .offer-card h3',
            ]
        );
        $this->add_control(
            'color_cta_btn_cl', [
                'label'     => __( 'Button Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .offer-card .button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hover_cl', [
                'label'     => __( 'Button Hover Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .offer-card .button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_bg_cl', [
                'label'     => __( 'Button Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .offer-card .button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hbg_cl', [
                'label'     => __( 'Button Hover Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff0000',
                'selectors' => [
                    '{{WRAPPER}} .offer-card .button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();



        $this->start_controls_section(
            'style_cta_2', [
                'label' => __( 'Style CTA', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_cta' => 'style_2'
                ]
            ]
        );

        $this->add_control(
            'color_cta_c2', [
                'label'     => __( 'Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_title_typo_c2',
                'selector'  => '{{WRAPPER}} .cta-area h2',
            ]
        );

        $this->add_control(
            'color_cta_subt_c2', [
                'label'     => __( 'Sub-title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-area p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'cta_subt_typo_c2',
                'selector'  => '{{WRAPPER}} .cta-area p',
            ]
        );
        $this->add_control(
            'color_cta_btn_c2', [
                'label'     => __( 'Button Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-area .button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hover_c2', [
                'label'     => __( 'Button Hover Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-area .button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_bg_c2', [
                'label'     => __( 'Button Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#e22104',
                'selectors' => [
                    '{{WRAPPER}} .cta-area .button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_cta_btn_hbg_c2', [
                'label'     => __( 'Button Hover Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ff0000',
                'selectors' => [
                    '{{WRAPPER}} .cta-area .button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();




	}

	protected function render() {

        $settings = $this->get_settings();


        if( $settings['select_cta'] == 'style_1' ){
            ?>
            <section class="bg-lightGray section-padding">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-sm">
                            <?php
                            if( !empty( $settings['cta_bg_image']['url'] ) ){
                                echo '<img class="card-img rounded-0" src="'. esc_url( $settings['cta_bg_image']['url'] ) .'" alt="'. esc_html__( 'Feature Image', 'sneakyrestaurant' ) .'">';
                            }
                            ?>
                            
                        </div>
                        <div class="col-sm">
                            <div class="offer-card offer-card-position">
                                <?php
                                //Title One
                                if( !empty( $settings['cta_title1'] ) ){
                                    echo '<h3>'. esc_html( $settings['cta_title1'] ) .'</h3>';
                                }
                                // Title Two
                                if( !empty( $settings['cta_title2'] ) ){
                                    echo '<h2>'. esc_html( $settings['cta_title2'] ) .'</h2>';
                                }
                                // Button 
                                if( !empty( $settings['cta_btn_label'] ) ){
                                    echo '<a class="button" href="'. esc_url( $settings['cta_btn_url']['url'] ) .'">'. esc_html( $settings['cta_btn_label'] ) .'</a>';
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php 
        } 
        elseif( $settings['select_cta'] == 'style_2' ){ ?>
            <section class="cta-area text-center">
                <div class="container">
                    <?php
                    //Title One
                    if( !empty( $settings['cta_title1'] ) ){
                        echo '<p>'. esc_html( $settings['cta_title1'] ) .'</p>';
                    }
                    // Title Two
                    if( !empty( $settings['cta_title2'] ) ){
                        echo '<h2>'. esc_html( $settings['cta_title2'] ) .'</h2>';
                    }
                    // Button 
                    if( !empty( $settings['cta_btn_label'] ) ){
                        echo '<a class="button" href="'. esc_url( $settings['cta_btn_url']['url'] ) .'">'. esc_html( $settings['cta_btn_label'] ) .'</a>';
                    }
                    ?>

                </div>
            </section>
        <?php
        } 

    }
	
}