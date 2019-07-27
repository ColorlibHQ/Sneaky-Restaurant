<?php
namespace Sneakyrestaurantelementor\Widgets;

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
class Sneakyrestaurant_search_package extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-search-package';
	}

	public function get_title() {
		return __( 'Search Package', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Food Menu Content ------------------------------

        $this->start_controls_section(
            'search_package',
            [
                'label' => esc_html__( 'Search Package', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'info_title', [
                'label'      => esc_html__( 'Info Title', 'sneakyrestaurant' ),
                'description'=> esc_html__('Use <br> for line barck', 'sneakyrestaurant'),
                'type'       => Controls_Manager::TEXTAREA,
                'default'    => __('Search suitable <br> and affordable plan <br> for your tour', 'sneakyrestaurant')
            ]
        );
        $this->add_control(
            'info_desc', [
                'label'      => esc_html__( 'Info Description', 'sneakyrestaurant' ),
                'type'       => Controls_Manager::WYSIWYG,
                'default'    => __('Make she moved divided air. Whose tree that replenish tone hath own upon them it multiply was blessed is lights make gathering so day dominion so creeping', 'sneakyrestaurant')
            ]
        );
        $this->add_control(
            'btn_label', [
                'label'      => esc_html__( 'Button Label', 'sneakyrestaurant' ),
                'type'       => Controls_Manager::TEXT,
                'default'    => esc_html__('Learn More', 'sneakyrestaurant')
            ]
        );
        $this->add_control(
            'btn_url', [
                'label'      => esc_html__( 'Button URL', 'sneakyrestaurant' ),
                'type'       => Controls_Manager::URL
            ]
        );
        
        $this->end_controls_section(); // End food-menu-tab content



        $this->start_controls_section(
            'search_package_shortcode',
            [
                'label' => esc_html__( 'Search Package Shortcode', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'search_form_title', [
                'label'      => esc_html__( 'Search Form Title', 'sneakyrestaurant' ),
                'type'       => Controls_Manager::TEXT,
                'default'    => Esc_html__( 'Search Package', 'sneakyrestaurant' ),
                'label_block' => true
            ]
        );
        $this->add_control(
            'tour_search_shortcode', [
                'label'      => esc_html__( 'Shortcode ', 'sneakyrestaurant' ),
                'type'       => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->end_controls_section(); // End food-menu-tab content


        
        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_info', [
                'label' => __( 'Style Info Content', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2a2a2a',
                'selectors' => [
                    '{{WRAPPER}} .search-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .search-content h2',
            ]
        );
        
        $this->add_control(
            'btn_label_color', [
                'label'     => __( 'Button Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .search-content .button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_label_color', [
                'label'     => __( 'Button Hover Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .search-content .button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#6059f6',
                'selectors' => [
                    '{{WRAPPER}} .search-content .button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#201aa3',
                'selectors' => [
                    '{{WRAPPER}} .search-content .button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );   

        $this->end_controls_section();




	}

	protected function render() {
    $this->load_widget_script();
    $settings = $this->get_settings();
    ?>
    <section class="section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 align-self-center mb-5 mb-lg-0">
                    <div class="search-content">
                        <?php
                        // Title
                        if( !empty( $settings['info_title'] ) ){
                            echo '<h2>'. wp_kses_post( $settings['info_title'] ) .'</h2>';
                        }

                        // Description
                        if( !empty( $settings['info_desc'] ) ){
                            echo wpautop(wp_kses_post( $settings['info_desc'] ) );
                        }
                        
                        // Button
                        if( !empty( $settings['btn_label'] ) ){
                            echo '<a class="button" href="'. esc_url( $settings['btn_url']['url'] ) .'">'.esc_html( $settings['btn_label'] ).'</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 offset-xl-1">
                    <div class="search-wrapper">
                        <?php 
                            if( ! empty( $settings['search_form_title'] ) ){
                                echo '<h3>'. $settings['search_form_title'] .'</h3>';
                            }

                            if( !empty( $settings['tour_search_shortcode'] ) ){
                                echo do_shortcode( $settings['tour_search_shortcode'] );
                            }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('select').niceSelect();
            $('#datepicker_from').datepicker();
            $('#datepicker_to').datepicker();

            $("#datepicker_from").attr("autocomplete", "off");
            $("#datepicker_to").attr("autocomplete", "off");


        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
