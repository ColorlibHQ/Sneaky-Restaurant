<?php
namespace sneakyrestaurantelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 *
 * sneakyrestaurant elementor about page section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Contact extends Widget_Base {

    public function get_name() {
        return 'sneakyrestaurant-contact';
    }

    public function get_title() {
        return __( 'Contact', 'sneakyrestaurant' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'sneakyrestaurant-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  Map ------------------------------
        $this->start_controls_section(
            'contact_map',
            [
                'label' => __( 'Map Settings', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'map_switch',
            [
                'label' => __( 'Show Map', 'sneakyrestaurant' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'sneakyrestaurant' ),
                'label_off' => __( 'Hide', 'sneakyrestaurant' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );
        $this->add_control(
            'map_address',
            [
                'label'         => esc_html__( 'Address', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Rabindra Sorobor Dhanmondi Lake Rd', 'sneakyrestaurant' ),
                'description'   => esc_html__( 'Before use map widget make sure you are set google map api key from customizer -> theme options -> general -> google map api key', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'map_lat',
            [
                'label'       => esc_html__( 'Latitude', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( '23.745227', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'map_lng',
            [
                'label'       => esc_html__( 'Longitude', 'sneakyrestaurant' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( '90.377155', 'sneakyrestaurant' )
            ]
        );

        $this->end_controls_section(); // End Contact Section Heading

        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Contact Info', 'sneakyrestaurant' ),
            ]
        );

        $this->add_control(
            'info', [
                'label'         => __( 'Create Contact Info', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Contact Info', 'sneakyrestaurant' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Dhaka, Bangladesh', 'sneakyrestaurant' )
                    ],
                    [
                        'name'    => 'desc',
                        'label'   => __( 'Contact Descriptions', 'sneakyrestaurant' ),
                        'type'    => Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Write something...', 'sneakyrestaurant' )
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::ICON,
                        'options' => sneakyrestaurant_themify_icon()
                    ]

                ],
            ]
        );

        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Contact Form


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'sneakyrestaurant' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label'     => __( 'Address Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .contact-details h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Address Description Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .contact-details p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_icon', [
                'label'     => __( 'Icon Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f7631b',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-address .icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .contact-page-area .form-area .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovlc', [
                'label'     => __( 'Form Button Hover Label color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .contact-page-area .form-area .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

    $settings = $this->get_settings();


    ?>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <?php 
                        if( !empty( $settings['contact_formshortcode'] ) ){
                            echo do_shortcode( $settings['contact_formshortcode'] );
                        }
                    ?>
                </div>

                <div class="col-lg-4">
                    <?php 
                    if( is_array( $settings[ 'info' ] ) && count( $settings[ 'info' ] ) > 0 ):
                        foreach( $settings[ 'info' ] as $info ):
                        ?>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="<?php echo esc_attr( $info['icon'] ) ?>"></i></span>
                                <div class="media-body">
                                <h3><?php echo esc_html( $info['label'] ) ?></h3>
                                <p><?php echo esc_html( $info['desc'] ) ?></p>
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
