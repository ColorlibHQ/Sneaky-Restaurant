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
 * sneakyrestaurant elementor few words section widget.
 *
 * @since 1.0
 */

class sneakyrestaurant_Blog extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-blog';
	}

	public function get_title() {
		return __( 'Blog', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

        // Start Section Title=====================================
        $this->start_controls_section(
            'blog_heading', [
                'label' => esc_html__( 'Blog Section Heading', 'sneakyrestaurant' ),
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
        $this->end_controls_section(); // End Section Title

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Blog', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'blog_limit',
            [
                'label'   => esc_html__( 'Post Limit', 'sneakyrestaurant' ),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
				'max'     => 12,
				'step'    => 1,
                'default' => 3
            ]
        );
        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
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
                'default' => '#e22104',
                'selectors' => [
                    '{{WRAPPER}} .section-intro .intro-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_title',
                'selector'  => '{{WRAPPER}} .section-intro .intro-title',
            ]
        );
        $this->add_control(
            'section_subtitle_color', [
                'label' => __( 'Sub-title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#2f2d4e',
                'selectors' => [
                    '{{WRAPPER}} .section-intro h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_subtitle',
                'selector'  => '{{WRAPPER}} .section-intro h2',
            ]
        );

        $this->end_controls_section();


        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f2d4e',
                'selectors' => [
                    '{{WRAPPER}} .blog-body h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#2f2d4e',
                'selectors' => [
                    '{{WRAPPER}} .blog-body h3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtext', [
                'label'     => __( 'Blog Meta Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#999',
                'selectors' => [
                    '{{WRAPPER}} .blog-info li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'content_bg', [
                'label'     => __( 'Blog Content Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff8f7',
                'selectors' => [
                    '{{WRAPPER}} .card-blog' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_content_bg', [
                'label'     => __( 'Hover Content Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .card-blog:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings(); 
    $secTitle = $settings['sect_title'];
    $secDesc  = $settings['sect_subtitle'];
    ?>
        <section class="section-margin">
            <div class="container">
                <div class="section-intro mb-75px">
                    <?php
                    // Title
                    if( !empty( $secTitle ) ){
                        echo '<h4 class="intro-title">'. esc_html( $secTitle ) .'</h4>';
                    }
                    // Section Sub-title
                    if( !empty( $secDesc ) ){
                        echo '<h2>'. esc_html( $secDesc ) .'</h2>';
                    }
                    ?>
                </div>

                <div class="row">
                    <?php
                    // Blog
                    sneakyrestaurant_blog_section( $settings['blog_limit'] );
                    ?> 
                </div>
            </div>
        </section>

        <?php
    }
	
}
