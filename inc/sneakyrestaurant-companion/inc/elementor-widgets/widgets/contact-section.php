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
 * sneakyrestaurant elementor about page section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Contact_Section extends Widget_Base {

    public function get_name() {
        return 'sneakyrestaurant-contact-section';
    }

    public function get_title() {
        return __( 'Contact Section', 'sneakyrestaurant' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'sneakyrestaurant-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_sec',
            [
                'label' => esc_html__( 'Contact Section Content', 'sneakyrestaurant' ),
            ]
        );
	    $this->add_control(
		    'content_title',
		    [
			    'label'         => esc_html__( 'Title', 'sneakyrestaurant' ),
			    'type'          => Controls_Manager::TEXT,
			    'label_block'   => true,
			    'default'       => __( 'Reservation', 'sneakyrestaurant' )
		    ]
	    );
	    $this->add_control(
		    'content_subtitle',
		    [
			    'label'         => esc_html__( 'Sub Title', 'sneakyrestaurant' ),
			    'type'          => Controls_Manager::TEXT,
			    'label_block'   => true,
			    'default'       => __( 'Get experience from sneaky', 'sneakyrestaurant' )
		    ]
	    );
	    $this->add_control(
		    'content_desc',
		    [
			    'label'         => esc_html__( 'Description', 'sneakyrestaurant' ),
			    'type'          => Controls_Manager::WYSIWYG,
			    'label_block'   => true,
			    'default'       => __( 'inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial.', 'sneakyrestaurant' )
		    ]
	    );
	    $this->add_control(
		    'contact_btnlabel',
		    [
			    'label'         => esc_html__( 'Button Label', 'sneakyrestaurant' ),
			    'type'          => Controls_Manager::TEXT,
			    'label_block'   => true,
			    'default'       => esc_html__( 'Order Service Now', 'sneakyrestaurant' )
		    ]
	    );
	    $this->add_control(
		    'contact_btnurl',
		    [
			    'label'         => esc_html__( 'Button Url', 'sneakyrestaurant' ),
			    'type'          => Controls_Manager::URL,
			    'show_external' => false
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
		    'formtitle',
		    [
			    'label'     => esc_html__( 'Form Title', 'sneakyrestaurant' ),
			    'type'      => Controls_Manager::TEXT,
			    'label_block' => true,
                'default'   => esc_html__('Get a free Estimate', 'sneakyrestaurant')
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
        $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'form_bg',
			    'label' => __( 'Form Background', 'sneakyrestaurant' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .search-wrapper',
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
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .genric-btn.primary' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovlc', [
                'label'     => __( 'Form Button background color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#988fff',
                'selectors' => [
                    '{{WRAPPER}} .genric-btn.primary' => 'background: {{VALUE}};',
                ],
            ]
        );
	    $this->add_control(
		    'fbtn_hover_color', [
			    'label'     => __( 'Form Button hover Label color', 'sneakyrestaurant' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#fff',
			    'selectors' => [
				    '{{WRAPPER}} .genric-btn.primary:hover' => 'color: {{VALUE}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'fbtn_hover_bg', [
			    'label'     => __( 'Form Button hover background color', 'sneakyrestaurant' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#00000000',
			    'selectors' => [
				    '{{WRAPPER}} .genric-btn.primary:hover' => 'background: {{VALUE}};',
			    ],
		    ]
	    );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_section', [
                'label' => __( 'Section Style', 'sneakyrestaurant' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'bgimg',
			    'label' => __( 'Background Image', 'sneakyrestaurant' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .discount-section-area',
		    ]
	    );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'overlaybg',
			    'label' => __( 'Background Overlay', 'sneakyrestaurant' ),
			    'types' => [ 'gradient' ],
			    'selector' => '{{WRAPPER}} .discount-section-area .overlay-bg',
		    ]
	    );

        $this->end_controls_section();


    }

    protected function render() {

    $settings = $this->get_settings();


    ?>
    <section class="bg-lightGray section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-xl-5 mb-4 mb-md-0">
                    <div class="section-intro">
                        <?php
                        // Title
                        if( ! empty( $settings['content_title'] ) ){
                            echo sneakyrestaurant_heading_tag(
                                array(
                                    'tag'   => 'h4',
                                    'text'  => esc_html( $settings['content_title'] ),
                                    'class' => esc_attr( 'intro-title' )
                                )
                            );
                        }
                        // Sub Title
                        if( ! empty( $settings['content_title'] ) ){
                            echo sneakyrestaurant_heading_tag(
                                array(
                                    'tag'   => 'h2',
                                    'text'  => esc_html( $settings['content_subtitle'] ),
                                    'class' => esc_attr( 'mb-3' )
                                )
                            );
                        }
                        ?>
                    </div>
                    <?php 
                    // Description
                    if( ! empty( $settings['content_desc'] ) ){
                        echo sneakyrestaurant_paragraph_tag(
                            array(
                                'text' => $settings['content_desc'],
                    
                            )
                        );
                    }
                    ?>
                </div>
                <div class="col-md-6 offset-xl-2 col-xl-5">
                    <div class="search-wrapper">
                            <?php
                            // Form title
                            if( ! empty( $settings['formtitle'] ) ){
                                echo sneakyrestaurant_heading_tag(
                                    array(
                                        'tag'   => 'h3',
                                        'text'  => esc_html( $settings['formtitle'] ),
                                        'class' => esc_attr( 'text-white' )
                                    )
                                );
                            }

                            // Contact Form
                            if( !empty( $settings['contact_formshortcode'] ) ){
                                echo do_shortcode( $settings['contact_formshortcode'] );
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <?php
    }
}
