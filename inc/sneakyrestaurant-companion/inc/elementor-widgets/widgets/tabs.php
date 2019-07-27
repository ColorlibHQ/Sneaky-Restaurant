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
 * elementor food-menu-tab section widget.
 *
 * @since 1.0
 */
class Sneakyrestaurant_tabs extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-food-menu-tab';
	}

	public function get_title() {
		return __( 'Event Schedule', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

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


        // ----------------------------------------  Food Menu Content ------------------------------

        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Event Schedule', 'sneakyrestaurant' ),
            ]
        );

        $this->add_control(
            'schedules', [
                'label'         => __( 'Create Menu Tab Item', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ title }}}',
                'fields' => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Tag', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::DATE_TIME,
                        'picker_options'   => [
                            'dateFormat'  => 'F j Y',
                        ],
                    ],
                    [
                        'name'        => 'time_duration',
                        'label'       => __( 'Time Duration', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( '9.00 AM - 10.30 AM', 'sneakyrestaurant' )
                    ],
                    [
                        'name'        => 'title',
                        'label'       => __( 'Title', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Previous Year achivement', 'sneakyrestaurant' )
                    ],
                    [
                        'name'        => 'description',
                        'label'       => __( 'Description', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'And wherein Beginning of you cattle fly had was deep wherein darkness behold male called evening gathering moving bring fifth days he lights dry cattle you open seas midst let and in wherein beginning', 'sneakyrestaurant' )
                    ],
                    [
                        'name'        => 'speaker',
                        'label'       => esc_html__( 'Speaker Image', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::MEDIA,
                        'label_block' => true,
                        
                    ],
                    [
                        'name'        => 'speaker_name',
                        'label'       => esc_html__( 'Speaker Name', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__('Adam Jamsmith', 'sneakyrestaurant')
                        
                    ],
                    [
                        'name'        => 'speaker_designation',
                        'label'       => esc_html__( 'Speaker Name', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'UX/UI Designer', 'sneakyrestaurant' )
                        
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End food-menu-tab content

        //------------------------------ Style Section Heading ------------------------------
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
        $this->end_controls_section();



        //------------------------------ Style Tab Nav  ------------------------------
        $this->start_controls_section(
            'style_tab', [
                'label' => __( 'Style Tab Nav', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tab_item_color', [
                'label'     => __( 'Tab Item Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scheduleTab .nav-item a h4'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tab_item_background', [
                'label'     => __( 'Tab Item Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scheduleTab .nav-item a'  => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tab_item_active_color', [
                'label'     => __( 'Tab Item Active Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scheduleTab .nav-item a.active h4'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tab_item_active_background', [
                'label'     => __( 'Tab Item Active Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scheduleTab .nav-item a.active'  => 'background: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();
        
        //------------------------------ Style Tab Content  ------------------------------
        $this->start_controls_section(
            'schedule_desc', [
                'label' => __( 'Style Tab Content', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'schedule_title', [
                'label'     => __( 'Schedule Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .schedule-title h3'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_schedule_title',
                'selector'  => '{{WRAPPER}} .schedule-title h3',
            ]
        );
        $this->add_control(
            'speaker_bg', [
                'label'     => __( 'Speaker Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-identity'  => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'speaker_hover_bg', [
                'label'     => __( 'Speaker Hover Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .schedule-card:hover .card-identity'  => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'descriptio_color', [
                'label'     => __( 'Description Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .schedule-content p'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'descriptio_bg', [
                'label'     => __( 'Description Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .schedule-card'  => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_description',
                'selector'  => '{{WRAPPER}} .schedule-content p',
            ]
        );


               
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();


    $schedules = $settings['schedules'];

    $tags = array_column( $schedules, 'label' );
    $getTags = array_unique( $tags );
    // Total items count
    $totalItems = count( $schedules );

    $tab_data = return_tab_data( $getTags , $schedules );

    ?>
    <section class="section-margin mb-5 pb-5">
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

            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="scheduleTab">
                        <ul class="nav nav-tabs">
                            <?php
                            if( is_array( $schedules ) && $totalItems > 0 ){

                                $tags = array_column( $schedules, 'label' );
                                $getTags = array_unique( $tags );
                                $tabs = '';
                                $i = 0;
                                
                                foreach( $getTags as $tag ) {
                                    
                                    $tagforfilter = sanitize_title_with_dashes( $tag );
                                    $unique_id = str_replace('-', '', $tagforfilter);
                                    $day = date("l", strtotime($tag));
                                    $i++;
                                    $active = $i==1 ? 'active show' : '';
                                    $tabs .= '<li class="nav-item text-center"><a class="nav-link '.$active.' " id="tab-'.esc_attr( $unique_id ).'" data-toggle="tab" href="#a'.esc_attr( $unique_id ).'" ><h4>'. $day .'</h4><p>'.esc_html( $tag ).'</p></a></li>';
                                    
                                }
                                echo $tabs;
                            } ?>
                        </ul>
                
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php
                            if( !empty( $tab_data ) ) {
                                $i= 0;
                                foreach ( $tab_data as $key => $val ) {

                                    $tagforfilter = sanitize_title_with_dashes( $key );
                                    $unique_id = str_replace('-', '', $tagforfilter);
                                    $i++;
                                    $active = $i==1 ? 'active show' : '';
                                    ?>
                                    <div class="tab-pane <?php echo esc_attr($active) ?>" id="a<?php echo esc_attr( $unique_id ); ?>" >

                                        <?php
                                        foreach( $val as $data ){
                                        ?>
                                            <div class="schedule-card">
                                                <div class="row no-gutters">
                                                    <div class="col-md-3">
                                                    <div class="card-identity">
                                                        <?php 
                                                        if( !empty( $data['speaker']['url'] ) ){
                                                            echo '<img src="'. esc_url( $data['speaker']['url'] ) .'" alt="">';
                                                        }

                                                        if( !empty( $data['speaker_name'] ) ){
                                                            echo '<h3>'. esc_html( $data['speaker_name'] ) .'</h3>';
                                                        }

                                                        if( !empty( $data['speaker_designation'] )  ){
                                                            echo '<p>'. esc_html( $data['speaker_designation'] ) .'</p>';
                                                        }
                                                        ?>    
                                                    </div>
                                                    </div>
                                                    <div class="col-md-9 align-self-center">
                                                    <div class="schedule-content">
                                                        <?php
                                                        if( !empty( $data['time_duration'] )  ){
                                                            echo '<p class="schedule-date">'. esc_html( $data['time_duration'] ) .'</p>';
                                                        }
                                                        ?> 
                                                        
                                                        <a class="schedule-title" href="#">
                                                            <h3><?php echo esc_html( $data['title'] ); ?></h3>
                                                        </a>
                                                        <p><?php echo esc_html( $data['description'] ); ?></p>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    }
	
}
