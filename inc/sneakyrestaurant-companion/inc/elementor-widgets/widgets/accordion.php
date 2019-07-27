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
class sneakyrestaurant_Accordion extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-accordion';
	}

	public function get_title() {
		return __( 'Accordion', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'accordion_heading',
            [
                'label' => esc_html__( 'Accordion Section Heading', 'sneakyrestaurant' ),
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

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Accordion content ------------------------------
		$this->start_controls_section(
			'accordion_block',
			[
				'label' => esc_html__( 'Accordion', 'sneakyrestaurant' ),
			]
        );
        
        
		$this->add_control(
            'accordion_content', [
                'label' => esc_html__( 'Create Accordion Accordion', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ accordion_name }}}',
                'fields' => [
                    [
                        'name'  => 'accordion_name',
                        'label' => esc_html__( 'Accordion Name', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => esc_html__('Flex your muscle', 'sneakyrestaurant')
                    ],
                    [
                        'name'  => 'description',
                        'label' => esc_html__( 'Accordion Description', 'sneakyrestaurant' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('For many of us, our very first experience of learning about the celestial bodies begins when we saw our first full moon in the sky. It is truly a magnificent view even to the naked eye. If the night is clear, you can see amazing detail of the lunar surface just star gazing on in your back yard.', 'sneakyrestaurant')
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Accordion content

        // Section video settings ===============================
        $this->start_controls_section(
            'section_video',
            [
                'label' => esc_html__( 'Vedio Settings', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'accordion_video_url', [
                'label' => esc_html__( 'YouTube Vedio URL', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true

            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'sneakyrestaurant' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .video-right',
            ]
        );
        $this->add_control(
            'paly_icon_select', [
                'label' => esc_html__( 'Vedio Play Icon Select', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::SELECT,
                'label_block' => true,
                'options'    => [
                    'image_icon' => 'Image Icon',
                    'font_icon'  => 'FontAwesome Icon'
                ],
                'default' => 'image_icon'

            ]
        );
        $this->add_control(
            'video_paly_icon', [
                'label' => esc_html__( 'Vedio Play Image Icon', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'paly_icon_select' => 'image_icon'
                ]

            ]
        );
        $this->add_control(
            'video_paly_fonticon', [
                'label' => esc_html__( 'Vedio Play Font Icon', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::ICON,
                'label_block' => true,
                'condition' => [
                    'paly_icon_select' => 'font_icon'
                ]

            ]
        );

        $this->end_controls_section();
        // End Setion video settings================================

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Style Section Heading', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => esc_html__( 'Section Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_secttitle',
                'selector'  => '{{WRAPPER}} .title h1',
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => esc_html__( 'Section Sub Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_desc',
                'selector'  => '{{WRAPPER}} .title p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Accordion ------------------------------
        $this->start_controls_section(
            'style_accordion', [
                'label' => esc_html__( 'Style Accordin', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_accordion_title', [
                'label'     => esc_html__( 'Accordion Title Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} .accordion dt a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_accordion_title_bg', [
                'label'     => esc_html__( 'Active Accordion Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .accordion dt .active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_accordion_title_bg', [
                'label'     => esc_html__( 'Active Accordion Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f7631b',
                'selectors' => [
                    '{{WRAPPER}} .accordion dt .active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_accordion_content', [
                'label'     => esc_html__( 'Accordion Content Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .accordion dd' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_accordion_content',
                'selector'  => '{{WRAPPER}} .accordion dd',
            ]
        );

        $this->end_controls_section();

        

    

	}

	protected function render() {

    $settings = $this->get_settings();
    $accordions = $settings['accordion_content'];
    $videoUrl = ! empty( $settings['accordion_video_url']['url'] ) ? $settings['accordion_video_url']['url'] : '';
    $playImgIcon = ! empty( $settings['video_paly_icon']['url'] ) ? $settings['video_paly_icon']['url'] : '';
    ?>
        <section class="course-mission-area pb-120">
            <div class="container">
                <?php
                    sneakyrestaurant_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>							
                <div class="row">
                    <div class="col-md-6 accordion-left">

                        <!-- accordion 2 start-->
                        <dl class="accordion">
                            <?php
                            if( is_array( $accordions ) && count( $accordions ) > 0  ){
                                foreach( $accordions as $accordion ){ ?>
                                    <dt>
                                        <a href=""><?php echo esc_html( $accordion['accordion_name'] ) ?></a>
                                    </dt>
                                    <dd> <?php echo esc_html( $accordion['description'] ) ?> </dd>
                                    <?php
                                }
                            }            
                            ?>                    
                        </dl>
                        <!-- accordion 2 end-->
                    </div>
                    <div class="col-md-6 video-right justify-content-center align-items-center d-flex relative">
                        <div class="overlay overlay-bg"></div>
                        <a class="play-btn" href="<?php echo esc_url( $videoUrl ) ?>">
                            <?php
                            if( $settings['paly_icon_select'] == 'image_icon' ){
                                echo '<img src="'. esc_url( $playImgIcon ) .'" alt="'. esc_html__( 'Play Button', 'sneakyrestaurant' ) .'">';
                            }else{
                                echo '<i class="'. $settings['video_paly_fonticon'] .'"></i>';
                            }
                            ?>
                        </a>
                    </div>
                </div>
            </div>	
        </section>

        <?php

    }
    

}
