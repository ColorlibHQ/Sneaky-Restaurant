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
class sneakyrestaurant_Food extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-foods';
	}

	public function get_title() {
		return __( 'Food', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-basket-medium';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_sec',
			[
				'label' => __( 'About Us', 'sneakyrestaurant' ),
			]
        );
        $this->add_control(
            'intro_title',
            [
                'label'         => esc_html__( 'Title Intro', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true
            ]
        );
        $this->add_control(
            'about_title',
            [
                'label'         => esc_html__( 'About Title', 'sneakyrestaurant' ),
                'description'   => esc_html__('Use <br> tag for line break', 'sneakyrestaurant'),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true
            ]
        );
    
        $this->end_controls_section(); // End about content


        // Feature Food Carousel
        $this->start_controls_section(
			'food_carousel',
			[
				'label' => __( 'Food Carousel', 'sneakyrestaurant' ),
			]
        );
        $this->add_control(
            'select_style',
            [
                'label'         => esc_html__( 'Title Intro', 'sneakyrestaurant' ),
                'type'          => Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    'carousel'  => esc_html__( 'Carousel View', 'sneakyrestaurant' ),
                    'grid'  => esc_html__( 'Grid View', 'sneakyrestaurant' )
                ],
                'default'       => 'carousel'
            ]
        );

        $this->add_control(
            'feature_foods', [
                'label' => __( 'Feature Food', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Mountain Mike Pizza', 'sneakyrestaurant' )
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Title URL', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Description', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => esc_html__( 'Whales and darkness moving', 'sneakyrestaurant' )
                    ],
                    [
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'sneakyrestaurant'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'sneakyrestaurant'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'sneakyrestaurant'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'sneakyrestaurant'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'sneakyrestaurant'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'sneakyrestaurant'),
				                'icon' => 'fa fa-star',
			                ],
		                ],
                    ],
                    [
                        'name'  => 'image',
                        'label' => __( 'Image', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::MEDIA,
                        'label_block' => true
                    ],
                    [
                        'name'  => 'price',
                        'label' => __( 'Price', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                    ]
                    
                    
                ],
            ]
		);
        $this->end_controls_section(); // End about content


        // Section Style Setting
        $this->start_controls_section(
			'section_style',
			[
                'label' => __( 'Style', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
            'intro_title_color', [
                'label' => __( 'Intro Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-intro .intro-title' => 'color: {{VALUE}};',
                ],
                'default'   => '#e22104'
            ]
        );
        $this->add_control(
            'intro_border_color', [
                'label' => __( 'Intro Border Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-intro .intro-title::after' => 'background-color: {{VALUE}};',
                ],
                'default'   => '#3a414e'
            ]
        );
        $this->add_control(
            'title_color', [
                'label' => __( 'Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-intro h2' => 'color: {{VALUE}};',
                ],
                'default'   => '#2f2d4e'
            ]
        );
        $this->end_controls_section(); // End about content

        
       


        //------------------------------ Style Carousel Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Style Food', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'carousel'
                ]
            ]
        );
        $this->add_control(
            'color_food_title', [
                'label'     => esc_html__( 'Food Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f2d4e',
                'selectors' => [
                    '{{WRAPPER}} .featured-item h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_food_title',
                'selector'  => '{{WRAPPER}} .featured-item h3',
            ]
        );

        $this->add_control(
            'color_food_desc', [
                'label'     => esc_html__( 'Food Description Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .featured-item p' => 'color: {{VALUE}};',
                ],
            ]
        );         
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_desc',
                'selector'  => '{{WRAPPER}} .featured-item p',
            ]
        );
        $this->add_control(
            'food_price_color', [
                'label'     => esc_html__( 'Food Price Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#e22104',
                'selectors' => [
                    '{{WRAPPER}} .featured-item .price-tag' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'food_feature_bg_color', [
                'label'     => esc_html__( 'Food Feature Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff8f7',
                'selectors' => [
                    '{{WRAPPER}} .featured-item' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'feature_hover_content_bg', [
                'label'     => esc_html__( 'Feature Hover Content Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .featured-item:hover .item-body' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section(); // End Section Heading
        
        
        
        //------------------------------ Style Grid Section ------------------------------
        $this->start_controls_section(
            'grid_section_style', [
                'label' => esc_html__( 'Style Food', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'grid'
                ]
            ]
        );
        $this->add_control(
            'grid_food_title', [
                'label'     => esc_html__( 'Food Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f2d4e',
                'selectors' => [
                    '{{WRAPPER}} .food-card-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_grid_food_title',
                'selector'  => '{{WRAPPER}} .food-card-title h4',
            ]
        );

        $this->add_control(
            'grid_food_desc', [
                'label'     => esc_html__( 'Food Description Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .food-card p' => 'color: {{VALUE}};',
                ],
            ]
        );         
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_grid_desc',
                'selector'  => '{{WRAPPER}} .food-card p',
            ]
        );
        $this->add_control(
            'grid_food_price', [
                'label'     => esc_html__( 'Food Price Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#e22104',
                'selectors' => [
                    '{{WRAPPER}} .food-card .price-tag' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'grid_feature_bg_color', [
                'label'     => esc_html__( 'Food Feature Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff8f7',
                'selectors' => [
                    '{{WRAPPER}} .food-card, .food-card-title h4, .food-card-title h3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'grid_feature_hover_bg', [
                'label'     => esc_html__( 'Feature Hover Content Background', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .food-card:hover, .food-card:hover .food-card-title h4, .food-card:hover .food-card-title h3' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section(); // End Section Style
        


	}

	protected function render() {
    $this->load_widget_script();
    $settings = $this->get_settings();
    $foods = $settings['feature_foods'];
    
    if( $settings['select_style'] == 'carousel' ){
    ?>

    <section class="section-margin mb-lg-100">
        <div class="container">
            <div class="section-intro mb-75px">
                <?php
                if( !empty( $settings['intro_title'] ) ){
                    echo '<h4 class="intro-title">'. esc_html( $settings['intro_title'] ) .'</h4>';
                }

                if( !empty( $settings['about_title'] ) ){
                    echo '<h2>'. esc_html( $settings['about_title'] ) .'</h2>';
                }
                ?>
            </div>
            <div class="owl-carousel owl-theme featured-carousel">
                <?php
                    if( is_array( $foods ) && count( $foods ) > 0 ){
                        foreach( $foods as $food ){ 
                            $image = $food['image']['url'];
                            ?>
                            <div class="featured-item">
                                <?php
                                if( !empty( $image ) ){
                                    echo '<img class="card-img rounded-0" src="'. esc_url( $image ) .'" alt="'. esc_html__( 'Food Image', 'sneakyrestaurant' ) .'">';
                                }
                                ?>
                                
                                <div class="item-body">
                                    <?php
                                    // Title
                                    if( !empty( $food['title'] ) ){
                                        echo '<a href="'. esc_url( $food['title_url']['url'] ) .'"><h3>'. esc_html( $food['title'] ) .'</h3></a>';
                                    }
                                    // Description
                                    if( !empty( $food['desc'] ) ){
                                        echo '<p>'. esc_html( $food['desc'] ) .'</p>';
                                    }
                                    ?>
                                    <div class="d-flex justify-content-between">
                                        <?php
                                            // Star Review ==================
                                            $star = $food['reviewstar'];
                                            if (!empty( $star )) {
                                                echo '<ul class="rating-star">';
                                                for ($i = 1; $i <= 5; $i++) {

                                                    if ($star >= $i) {
                                                        echo '<li><i class="ti-star checked"></i></li>';
                                                    } else {
                                                        echo '<li><i class="ti-star"></i></li>';
                                                    }
                                                }
                                                echo '</ul>';
                                            }

                                            if( !empty( $food['price'] ) ){
                                                echo '<h3 class="price-tag">'. esc_html( $food['price'] ) .'</h3>';
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
    else{
        ?>
        <section class="section-margin">
            <div class="container">
                <div class="section-intro mb-75px">
                    <?php
                    if( !empty( $settings['intro_title'] ) ){
                        echo '<h4 class="intro-title">'. esc_html( $settings['intro_title'] ) .'</h4>';
                    }

                    if( !empty( $settings['about_title'] ) ){
                        echo '<h2>'. esc_html( $settings['about_title'] ) .'</h2>';
                    }
                    ?>
                </div>
                <div class="row">
                    <?php
                    if( is_array($foods ) && count( $foods ) > 0 ){
                        foreach( $foods as $food ){ 
                            $image = $food['image']['url'];
                        ?>
                        <div class="col-lg-6">
                            <div class="media align-items-center food-card">
                                <?php
                                if( !empty( $image ) ){
                                    echo '<img class="mr-3 mr-sm-4" src="'. esc_html( $image ) .'" alt="'. esc_html__('Food Feature Image', 'sneakyrestaurant') .'">';
                                }
                                ?>
                                
                                <div class="media-body">
                                    <div class="d-flex justify-content-between food-card-title">
                                        <?php
                                        if( !empty( $food['title'] ) ){
                                            echo '<h4>'. esc_html( $food['title'] ) .'</h4>';
                                        }

                                        if( !empty( $food['price'] ) ){
                                            echo '<h3 class="price-tag">'. esc_html( $food['price'] ) .'</h3>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    // Description
                                    if( !empty( $food['desc'] ) ){
                                        echo '<p>'. esc_html( $food['desc'] ) .'</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    } ?>
                </div>
            </div>
        </section>
        <?php
    }
    }	
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.featured-carousel').owlCarousel({
                loop: false,
                margin: 30,
                items: 1,
                nav: true,
                dots: false,
                responsiveClass: true,
                slideSpeed: 300,
                paginationSpeed: 500,
                navText: ["<div class='left-arrow'><i class='ti-angle-left'></i></div>", "<div class='right-arrow'><i class='ti-angle-right'></i></div>"],
                responsive: {
                    768: {
                    items: 2
                    },
                    1100: {
                    items: 3
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }


}