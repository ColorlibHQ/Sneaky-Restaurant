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
class sneakyrestaurant_Pricing extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-pricing';
	}

	public function get_title() {
		return __( 'Pricing', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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

        //Pricing Table Content ===================================
        $this->start_controls_section(
            'pricing_table_sec',
            [
                'label' => __( 'Pricing Table', 'sneakyrestaurant' ),
            ]
        );

        $this->add_control(
            'pricing_table', [
                'label'         => __( 'Create Pricing Table', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ title }}}',
                'fields' => [
                    [
                        'name'        => 'title',
                        'label'       => __( 'Title', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Normal', 'sneakyrestaurant' )
                    ],
                    [
                        'name'        => 'sub_title',
                        'label'       => __( 'Sub-title', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Attend only first day', 'sneakyrestaurant' )
                    ],
                    [
                        'name'        => 'price',
                        'label'       => esc_html__( 'Price', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        
                    ],
                    [
                        'name'        => 'feature_list',
                        'label'       => esc_html__( 'Feature List', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::WYSIWYG,
                        'label_block' => true,
                        'default'     => wp_kses_post('<ul><li>Unlimited Entrance</li><li>Comfortable Seat</li><li>Paid Certificate</li><li>Day One Workshop</li><li>One Certificate</li></ul>')
                        
                    ],
                    [
                        'name'        => 'btn_label',
                        'label'       => esc_html__( 'Button Label', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Buy Now', 'sneakyrestaurant' )
                    ],
                    [
                        'name'        => 'btn_url',
                        'label'       => esc_html__( 'Button URL', 'sneakyrestaurant' ),
                        'type'        => Controls_Manager::URL,
                        'label_block' => true
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
        $this->end_controls_section(); //End ======================



        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_pricing_item', [
                'label' => esc_html__( 'Style Pricing Item', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'item_bg', [
                'label'     => esc_html__( 'Pricing Item Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .card-priceTable' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_bg', [
                'label'     => esc_html__( 'Pricing Item Hover Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .card-priceTable:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_buy_btn_bg', [
                'label'     => esc_html__( 'Pricing Item Button Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f7f7f7',
                'selectors' => [
                    '{{WRAPPER}} .priceTable-footer .button' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_buy_btn_hover_bg', [
                'label'     => esc_html__( 'Button Hover Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ea0763',
                'selectors' => [
                    '{{WRAPPER}} .card-priceTable:hover .button' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_buy_btn_border', [
                'label'     => esc_html__( 'Pricing Item Button Border', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#eeeeee',
                'selectors' => [
                    '{{WRAPPER}} .priceTable-footer .button' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_buy_btn_hover_border', [
                'label'     => esc_html__( 'Button Hover Border', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ea0763',
                'selectors' => [
                    '{{WRAPPER}} .card-priceTable:hover .button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $pricing  = $settings['pricing_table'];
    ?>
        <section class="section-padding bg-gray">
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
                    <?php
                    if( is_array( $pricing ) && $pricing > 0 ){
                        foreach ( $pricing as $price ) { ?>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="text-center card-priceTable">
                                    <div class="priceTable-header">
                                        <?php
                                        // Title
                                        if( !empty( $price['title'] ) ){
                                            echo '<h3>'. esc_html( $price['title'] ) .'</h3>';
                                        }
                                        // Sub-Title
                                        if( !empty( $price['sub_title'] ) ){
                                            echo '<p>'. esc_html( $price['sub_title'] ) .'</p>';
                                        }
                                        // Price
                                        if( !empty( $price['price'] ) ){
                                            echo '<h1 class="priceTable-price"><span>$</span> '. esc_html( $price['price'] ) .'</h1>';
                                        }

                                        ?>
                                    </div>
                                    <?php 
                                        if( !empty( $price['feature_list'] ) ){
                                            echo wp_kses_post( $price['feature_list'] );
                                        }
                                    ?>
                                    <div class="priceTable-footer">
                                        <?php 
                                            if( !empty( $price['btn_label'] ) ){
                                                echo '<a class="button" href="'. esc_url( $price['btn_url']['url'] ) .'">'. esc_html( $price['btn_label'] ) .'</a>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }

}
