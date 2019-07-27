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
 * sneakyrestaurant elementor about us section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Banner extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-banner';
	}

	public function get_title() {
		return __( 'Banner', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_content',
            [
                'label' => __( 'Banner Section Content', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'banner_titleone',
            [
                'label'         => esc_html__( 'Title ', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'Travel More To Discover Yourself', 'sneakyrestaurant' ),
                'label_block'   => true
            ]
        );

        $this->add_control(
            'banner_btnlabel1',
            [
                'label'         => esc_html__( 'Button One Label', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Book Now', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'banner_btnurl1',
            [
                'label'         => esc_html__( 'Button One Url', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'banner_btnlabel2',
            [
                'label'         => esc_html__( 'Button Two Label', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Watch Video', 'sneakyrestaurant' )
            ]
        );
        $this->add_control(
            'banner_btnurl2',
            [
                'label'         => esc_html__( 'Button Two URL', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'social_share_switcher',
            [
                'label'         => esc_html__( 'Social Share Switch', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'sneakyrestaurant' ),
				'label_off'     => esc_html__( 'Hide', 'sneakyrestaurant' ),
				'return_value'  => 'yes',
				'default'       => 'yes',
            ]
        );
        $this->end_controls_section(); // End content


        // Feature List
        $this->start_controls_section(
            'hero_feature_list',
            [
                'label' => __( 'Hero Feature List', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'feature_list', [
                'label' => __( 'Feature List', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Fast Service', 'sneakyrestaurant' )
                    ],
                    [
                        'name'  => 'select_style',
                        'label' => __( 'Icon Type', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::SELECT,
                        'options' => [
                            'style1' => esc_html__( 'Image Icon', 'sneakyrestaurant' ),
                            'style2' => esc_html__( 'Font Icon', 'sneakyrestaurant' )
                        ],
                        'default' => 'style1'
                    ],
                    [
                        'name'  => 'image_icon',
                        'label' => __( 'Image Icon', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::MEDIA,
                        'label_block' => true,
                        'condition' => [
                            'select_style' => 'style1'
                        ]
                    ],
                    [
                        'name'  => 'font_icon',
                        'label' => __( 'Font Icon', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::ICON,
                        'condition' => [
                            'select_style' => 'style2'
                        ]
                    ]
                    
                ],
            ]
		);
        $this->end_controls_section(); // End content


        // Hero Slider
        $this->start_controls_section(
            'hero_slider',
            [
                'label' => __( 'Slider', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'slider_images',
            [
                'label'         => esc_html__( 'Upload Slider Images', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::GALLERY,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_textcolor', [
                'label' => __( 'Style Content', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titleone', [
                'label'     => __( 'Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '##2f2d4e',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .hero-banner h1',
            ]
        );
       
        $this->end_controls_section();

        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-hero' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-hero:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bnt1_bg_color', [
                'label'     => __( 'Button One Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#e22104',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-hero' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bnt1_hover_bg_color', [
                'label'     => __( 'Button One Hover Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#e22104',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-hero:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn2_label_color', [
                'label'       => __( 'Button Two Label Color', 'sneakyrestaurant' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '#2f2d4e',
                'selectors'   => [
                    '{{WRAPPER}} .hero-banner .hero-banner__video' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn2_hover_color', [
                'label'     => __( 'Button Two Hover Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#0056b3',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .hero-banner__video:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    $sliderImages = $settings['slider_images'];
    $features = $settings['feature_list'];



    ?>
<section class="hero-banner">
    <div class="hero-wrapper">
        <div class="hero-left">
            <?php 
                // Banner Title
                if( ! empty( $settings['banner_titleone'] ) ) {
                    echo sneakyrestaurant_heading_tag(
                        array(
                            'tag'   => 'h1',
                            'text'  => wp_kses_post( $settings['banner_titleone'] ),
                            'class' => 'hero-title'
                        )
                    );
                } 
                ?>
            <div class="d-sm-flex flex-wrap">
                <?php

                    // Button 1
                    if( ! empty( $settings[ 'banner_btnlabel1' ] ) && !empty( $settings['banner_btnurl1']['url'] ) ) {
                        echo sneakyrestaurant_anchor_tag(
                            array(
                                'url'   => esc_url( $settings['banner_btnurl1']['url'] ),
                                'text'  => esc_html( $settings['banner_btnlabel1'] ),
                                'class' => esc_attr( 'button button-hero button-shadow' )
                            )
                        );
                    }

                    // Button 2
                    if( ! empty( $settings[ 'banner_btnlabel2' ] ) && !empty( $settings['banner_btnurl2']['url'] ) ) {
                        echo sneakyrestaurant_anchor_tag(
                            array(
                                'url'   => esc_url( $settings['banner_btnurl2']['url'] ),
                                'text'  => esc_html( $settings['banner_btnlabel2'] ),
                                'class' => esc_attr( 'hero-banner__video' )
                            )
                        );
                    }

                    ?>
            </div>
            <ul class="hero-info d-none d-lg-block">
                <?php
                if( !empty( $features ) && count( $features ) > 0 ){
                    foreach( $features as $feature ){ 
                        $iconType = $feature['select_style'];
                        ?>
                        <li>
                            <?php
                            if( $iconType == 'style1' ){
                                echo '<img src="'. esc_url( $feature['image_icon']['url'] ) .'" alt="'.esc_html__( 'Image Icon', 'sneakyrestaurant' ).'">';
                            } 
                            else{
                                echo '<i class="'. esc_attr( $feature['font_icon'] ) .'"></i>';
                            } 
                            
                            //Title
                            if( ! empty( $feature['label'] ) ){
                                echo '<h4>'.esc_html( $feature['label'] ).'</h4>';
                            }
                            ?>
                        </li>
                    <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="hero-right">
            <div class="owl-carousel owl-theme hero-carousel">
                <?php
                if( !empty( $sliderImages ) && count( $sliderImages ) > 0  ){
                    foreach( $sliderImages as $image ){
                        ?>
                        <div class="hero-carousel-item">
                            <?php echo '<img class="img-fluid" src="'. esc_url( $image['url'] ) .'" alt="'. esc_html__('Hero slider image', 'sneakyrestaurant') .'">'; ?>
                        </div>
                        <?php
                    }
                }
                ?>
                
            </div>
        </div>
        <?php
        if( $settings['social_share_switcher'] == 'yes' ){
            echo sneakyrestaurant_social_sharing_buttons( 'social-icons d-none d-lg-block' );
        }
        ?>
    </div>
</section>
<?php

    }
    
    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        (function($) {
            
            $('.hero-carousel').owlCarousel({
                loop: false,
                margin: 30,
                items: 1,
                nav: false,
                dots: true,
                responsiveClass: true,
                slideSpeed: 300,
                paginationSpeed: 500
            })
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}