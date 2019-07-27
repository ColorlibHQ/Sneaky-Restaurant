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
 * Umeet Event elementor Team Member section widget.
 *
 * @since 1.0
 */
class Sneakyrestaurant_Team_Member extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

       // Start Section Title=====================================
       $this->start_controls_section(
            'member_heading', [
                'label' => esc_html__( 'Member Section Heading', 'sneakyrestaurant' ),
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
        
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'sneakyrestaurant' ),
			]
		);
		$this->add_control(
            'teammembers', [
                'label' => __( 'Create Team Member', 'sneakyrestaurant' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'facebook',
                        'label' => __( 'Facebook URL', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'twitter',
                        'label' => __( 'Twitter URL', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'vimeo',
                        'label' => __( 'Vimeo URL', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'skype',
                        'label' => __( 'Skype ID', 'sneakyrestaurant' ),
                        'type' => Controls_Manager::TEXT,
                    ],

                ],
            ]
        );


		$this->end_controls_section(); // End Team Member content



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


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'sneakyrestaurant' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'image_overlay_color', [
                'label' => __( 'Member Image Overlay Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default' => 'rgba(2,1,15,0.5)',
                'selectors' => [
                    '{{WRAPPER}} .chef-card .chef-overlay' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'sneakyrestaurant' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'sneakyrestaurant' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .chef-card h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .chef-card h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'sneakyrestaurant' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'sneakyrestaurant' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .chef-card p' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .chef-card p',
            ]
        );
        $this->add_control(
            'team_meta',
            [
                'label' => __( 'Meta Style', 'sneakyrestaurant' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_meta_bg', [
                'label' => __( 'Footer Meta Background Color', 'sneakyrestaurant' ),
                'type' => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .chef-card .chef-footer' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $members = $settings['teammembers'];

        ?>
        <section class="section-margin">
            <div class="container">
                <div class="section-intro mb-75px">
                    <?php
                    // Title
                    if( !empty( $settings['sect_title'] ) ){
                        echo '<h4 class="intro-title">'. esc_html( $settings['sect_title'] ) .'</h4>';
                    }
                    // Sub Title
                    if( !empty( $settings['sect_subtitle'] ) ){
                        echo '<h2>'. esc_html( $settings['sect_subtitle'] ) .'</h2>';
                    }
                    ?>
                </div>
                <div class="row">
                    <?php 
                    if( is_array( $members ) && count( $members ) > 0 ):
                        foreach( $members as $member ):
                            ?>
                            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                                <div class="chef-card">
                                    <?php
                                    if( !empty( $member['img']['url'] ) ){
                                        echo '<img class="card-img rounded-0" src="'. esc_url( $member['img']['url'] ) .'" alt="'. esc_html__( 'Team member image', 'sneakyrestaurant' ) .'">';
                                    }
                                    ?>
                                    
                                    <div class="chef-footer">
                                        <?php
                                        if( !empty( $member['label'] ) ){
                                            echo '<h4>'. esc_html( $member['label'] ) .'</h4>';
                                        }
                                        
                                        if( !empty( $member['desig'] ) ){
                                            echo '<p>'. esc_html( $member['desig'] ) .'</p>';
                                        }
                                        ?>
                                    </div>

                                    <div class="chef-overlay">
                                        <ul class="social-icons">
                                            <?php
                                            if( !empty( $member['facebook']['url'] ) ){
                                                echo '<li><a href="'. esc_url( $member['facebook']['url'] ) .'"><i class="ti-facebook"></i></a></li>';
                                            }
                                            if( !empty( $member['twitter']['url'] ) ){
                                                echo '<li><a href="'. esc_url( $member['twitter']['url'] ) .'"><i class="ti-twitter-alt"></i></a></li>';
                                            }

                                            if( !empty( $member['skype']['url'] ) ){
                                                echo '<li><a href="'. esc_html( $member['skype']['url'] ) .'"><i class="ti-skype"></i></a></li>';
                                            }
                                            
                                            if( !empty( $member['vimeo']['url'] ) ){
                                                echo '<li><a href="'. esc_url( $member['vimeo']['url'] ) .'"><i class="ti-vimeo-alt"></i></a></li>';
                                            }
                                            ?>
                                        </ul>
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
}