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
 * sneakyrestaurant elementor Team Member section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Features extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-features';
	}

	public function get_title() {
		return __( 'Features', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        
        // Start Section Title=====================================
        $this->start_controls_section(
            'feature_heading',
            [
                'label' => esc_html__( 'Feature Section Heading', 'sneakyrestaurant' ),
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


		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'sneakyrestaurant' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Learn Online Courses', 'sneakyrestaurant')
                    ],
	                [
		                'name'  => 'desc',
		                'label' => __( 'Description', 'sneakyrestaurant' ),
		                'type'  => Controls_Manager::TEXTAREA
	                ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Feature Icon', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::ICON
                    ],
                    
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg',
                'label' => __( 'Feature Icon Background Image', 'sneakyrestaurant' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .card-feature .feature-icon',
            ]
        );
        $this->add_control(
            'btn_one_label', [
                'label' => esc_html__( 'Button One Label', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Learn More', 'sneakyrestaurant')

            ]
        );
        $this->add_control(
            'btn_one_url', [
                'label' => esc_html__( 'Button One URL', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true

            ]
        );
        $this->add_control(
            'btn_two_label', [
                'label' => esc_html__( 'Button Two Label', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Buy Ticket', 'sneakyrestaurant')

            ]
        );
        $this->add_control(
            'btn_two_url', [
                'label' => esc_html__( 'Button Two URL', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true

            ]
        );

		$this->end_controls_section(); // End features content


        //------------------------------ Style Section Title ------------------------------
        $this->start_controls_section(
            'style_section_heading', [
                'label' => __( 'Style Section Title', 'sneakyrestaurant' ),
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



        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#242424',
                'selectors' => [
                    '{{WRAPPER}} .card-feature h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_hover_title', [
                'label' => __( 'Feature Hover Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .card-feature:hover h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_feature_title',
                'selector'  => '{{WRAPPER}} .card-feature h3',
            ]
        );
        
        $this->add_control(
            'feature_desc_color', [
                'label' => __( 'Feature Description Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .card-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_feature_des',
                'selector'  => '{{WRAPPER}} .card-feature p',
            ]
        );


        $this->add_control(
            'feature_button',
            [
                'label'     => __( 'Feature Button Style ', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'feature_btn1_label_color', [
                'label' => __( 'Button One Label Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#242424',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn1_hover_label_color', [
                'label' => __( 'Button One Hover Label Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn1_border_color', [
                'label' => __( 'Button One Border Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn1' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn1_hover_border_color', [
                'label' => __( 'Button One Hover Border Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn1:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn1_bg', [
                'label' => __( 'Button One Background', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn1' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn1_hover_bg', [
                'label' => __( 'Button One Hover Background', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn1:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_button2',
            [
                'label'     => __( 'Feature Button Two Style ', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'feature_btn2_label_color', [
                'label' => __( 'Button One Label Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#242424',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn2_hover_label_color', [
                'label' => __( 'Button One Hover Label Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn2_border_color', [
                'label' => __( 'Button One Border Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn2' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn2_hover_border_color', [
                'label' => __( 'Button One Hover Border Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn2:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn2_bg', [
                'label' => __( 'Button One Background', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn2' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_btn2_hover_bg', [
                'label' => __( 'Button One Hover Background', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .feature_btn .btn2:hover' => 'background: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="section-margin">
        <div class="container">
            <div class="section-intro text-center pb-98px">
                
                <?php
                    if( !empty( $settings['sect_title'] ) ){
                        echo '<p class="section-intro__title">'. esc_html( $settings['sect_title'] ) .'</p>';
                    }

                    if( !empty( $settings['sect_subtitle'] ) ){
                        echo '<h2 class="primary-text">'. esc_html( $settings['sect_subtitle'] ) .'</h2>';
                    }

                    if( !empty( $settings['section_title_image']['url'] ) ){
                        echo '<img src="'. esc_url( $settings['section_title_image']['url'] ) .'" alt="">';
                    }
                ?>
                
                
            </div>
            <div class="d-lg-flex justify-content-between">
            <?php
                if( is_array( $settings['features_content'] ) && count( $settings['features_content'] ) > 0 ):
                    foreach( $settings['features_content'] as $feature ):
                        ?>
                        <div class="card-feature mb-5 mb-lg-0">
                            <div class="feature-icon">
                                <i class="<?php echo esc_html( $feature['icon'] ) ?>"></i>
                            </div>
                            <h3><?php echo esc_html( $feature['label'] ) ?></h3>
                            <p><?php echo esc_html( $feature['desc'] ) ?></p>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center feature_btn">
                    <?php
                        // Button One
                        if( !empty( $settings['btn_one_label'] ) ){
                            echo '<a class="button mr-3 mb-2 btn1" href="'. esc_url( $settings['btn_one_url']['url'] ) .'">'. $settings['btn_one_label'] .'</a>';
                        }
                        // Button Two
                        if( !empty( $settings['btn_two_label'] ) ){
                            echo '<a class="button mb-2 btn2" href="'. esc_url( $settings['btn_two_url']['url'] ) .'">'. $settings['btn_two_label'] .'</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php

    }

	
}
