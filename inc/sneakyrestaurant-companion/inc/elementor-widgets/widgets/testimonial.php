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
class sneakyrestaurant_Testimonial extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // -----------   Section Heading ------------------------------
        $this->start_controls_section(
            'testimonial_heading',
            [
                'label' => __( 'Testimonial Section Heading', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'section_logo', [
                'label' => __( 'Sub Title', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true

            ]
        );
        $this->end_controls_section(); // End section top content



		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'sneakyrestaurant' ),
			]
		);
		
		$this->add_control(
            'testimonials', [
                'label' => __( 'Create Review', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Designation', 'sneakyrestaurant')
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'sneakyrestaurant')
                    ],
                    [
                        'name'  => 'image',
                        'label' => __( 'Author Image', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::MEDIA
                    ]
                    
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2a2a2a',
                'selectors' => [
                    '{{WRAPPER}} .section-intro h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .section-intro p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'style_testimonial_item', [
                'label' => __( 'Style Testimonial Item', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'author_name_color', [
                'label'     => __( 'Testimonial Author Name Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2a2a2a',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'author_designation_color', [
                'label'     => __( 'Testimonial Designation Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_testimonial_desc',
                'selector'  => '{{WRAPPER}} .testimonial__content p',
            ]
        );
        $this->add_control(
            'testimonial_bg_color', [
                'label'     => __( 'Testimonial Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__item' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


       

        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'sneakyrestaurant' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    $secLogo  = $settings['section_logo']['url'];
    $secTitle = $settings['sect_title'];
    $secDesc  = $settings['sect_subtitle'];
    ?>

    <section class="bg-gray section-padding magic-ball magic-ball-testimonial pb-xl-5">
        <div class="container">
            <div class="section-intro text-center pb-90px">
                <?php
                // Logo
                if( !empty( $secLogo ) ){
                    echo '<img class="section-intro-img" src="'. esc_url( $secLogo ) .'" alt="'. esc_html__( 'Section Logo', 'sneakyrestaurant' ) .'">';
                }
                // Title
                if( !empty( $secTitle ) ){
                    echo '<h2>'. esc_html( $secTitle ) .'</h2>';
                }
                // Section Sub-title
                if( !empty( $secDesc ) ){
                    echo '<p>'. esc_html( $secDesc ) .'</p>';
                }
                ?>
            </div>
            <div class="owl-carousel owl-theme testimonial pb-xl-5">
                <?php
                if ( is_array( $settings['testimonials'] ) && count( $settings['testimonials'] ) > 0 ):
                    foreach ( $settings['testimonials'] as $testimonial ): ?>
                        <div class="testimonial__item">
                            <div class="row">
                                <div class="col-md-3 col-lg-2 align-self-center">
                                <div class="testimonial__img">
                                    <?php 
                                    if( !empty( $testimonial['image']['url'] ) ){
                                        echo '<img class="card-img rounded-0" src="'. $testimonial['image']['url'] .'" alt="'. esc_html__( 'Author Image', 'sneakyrestaurant' ) .'">';
                                    }
                                    ?>
                                </div>
                                </div>
                                <div class="col-md-9 col-lg-10">
                                <div class="testimonial__content mt-3 mt-sm-0">
                                    <?php
                                    // Name =======
                                    if ( ! empty( $testimonial['label'] ) ) {
                                        echo sneakyrestaurant_heading_tag(
                                            array(
                                                'tag'  => 'h3',
                                                'text' => esc_html( $testimonial['label'] ),
                                            )
                                        );
                                    }
                                    // Designation
                                    if( ! empty( $testimonial['designation'] ) ) {
                                        echo sneakyrestaurant_paragraph_tag(
                                            array(
                                                'text'  => esc_html( $testimonial['designation'] ),
                                            )
                                        );
                                    }

                                    if( !empty( $testimonial['desc'] ) ){
                                        echo '<p class="testimonial__i">'. esc_html( $testimonial['desc'] ) .'</p>';
                                    }
                                    ?>
                                    <span class="testimonial__icon"><i class="ti-quote-right"></i></span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
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

            $('.testimonial').owlCarousel({
                loop: true,
                margin: 30,
                items: 5,
                nav: false,
                dots: true,
                responsiveClass: true,
                slideSpeed: 300,
                paginationSpeed: 500,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
