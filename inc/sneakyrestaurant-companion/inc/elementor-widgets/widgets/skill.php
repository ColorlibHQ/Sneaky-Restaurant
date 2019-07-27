<?php
namespace sneakyrestaurantelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * sneakyrestaurant elementor counter section widget.
 *
 * @since 1.0
 */
class sneakyrestaurant_Skill extends Widget_Base {

	public function get_name() {
		return 'sneakyrestaurant-skill';
	}

	public function get_title() {
		return __( 'Skill', 'sneakyrestaurant' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'sneakyrestaurant-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'skill_content',
            [
                'label' => __( 'Skill', 'sneakyrestaurant' ),
            ]
        );
        $this->add_control(
            'skill', [
                'label' => __( 'Create skill item', 'sneakyrestaurant' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'          => 'label',
                        'label'         => __( 'Title', 'sneakyrestaurant' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'       => 'WEB DESIGN'
                    ],
                    [
                        'name'    => 'percentage',
                        'label'   => __( 'Percentage', 'sneakyrestaurant' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => '75'
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style counter ------------------------------
        $this->start_controls_section(
            'style_counter', [
                'label' => __( 'Style Counter', 'sneakyrestaurant' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_countertitle', [
                'label' => __( 'Title Color', 'sneakyrestaurant' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-counter p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_number', [
                'label'     => __( 'Number Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-counter h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3898f8',
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .circle' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'sneakyrestaurant' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'sneakyrestaurant' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'sneakyrestaurant' ),
                'label_off' => __( 'Hide', 'sneakyrestaurant' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'sneakyrestaurant' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'sneakyrestaurant' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .counter-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
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
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .counter-area',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
    $this->load_widget_script();
    $settings = $this->get_settings();
    $a = 1;


    ?>
    <section class="faq-area">
        <div class="container">
            <div class="row pt-120 skill-area justify-content-center" id="skills">
                <?php
                if( is_array( $settings['skill'] ) && count( $settings['skill'] ) > 0 ):
                    foreach( $settings['skill'] as $val ):
                    ?>
                    <div class="col-lg-3 single-skill mx-auto d-block">
                        <div class="skills skill-<?php echo $a++; ?>" data-percent="<?php echo absint( $val['percentage'] ); ?>"></div>
                        <?php
                        if( ! empty( $val['label'] ) ) {
                            echo sneakyrestaurant_heading_tag(
                                array(
                                    'tag'   => 'h6',
                                    'text'  => esc_html( $val['label'] ),
                                    'class' => esc_attr( 'text-uppercase' )
                                )
                            );
                        }
                        ?>
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
                    if (document.getElementById("skills")) {

                        $('.skill-1').percentcircle({
                            animate: true,
                            diameter: 400,
                            guage: 5,
                            coverBg: '#fff',
                            bgColor: '#efefef',
                            fillColor: '#988fff',
                            percentSize: '24px',
                            percentWeight: 'normal'
                        });

                        $('.skill-2').percentcircle({
                            animate: true,
                            diameter: 400,
                            guage: 5,
                            coverBg: '#fff',
                            bgColor: '#efefef',
                            fillColor: '#988fff',
                            percentSize: '24px',
                            percentWeight: 'normal'
                        });

                        $('.skill-3').percentcircle({
                            animate: true,
                            diameter: 400,
                            guage: 5,
                            coverBg: '#fff',
                            bgColor: '#efefef',
                            fillColor: '#988fff',
                            percentSize: '24px',
                            percentWeight: 'normal'
                        });

                        $('.skill-4').percentcircle({
                            animate: true,
                            diameter: 400,
                            guage: 5,
                            coverBg: '#fff',
                            bgColor: '#efefef',
                            fillColor: '#988fff',
                            percentSize: '24px',
                            percentWeight: 'normal'
                        });

                    }



                })(jQuery);
            </script>
			<?php
		}
	}

}
