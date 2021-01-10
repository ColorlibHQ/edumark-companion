<?php
namespace Edumarkelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Edumark elementor course speciality section widget.
 *
 * @since 1.0
 */
class Edumark_Course_Speciality extends Widget_Base {

	public function get_name() {
		return 'edumark-course-speciality';
	}

	public function get_title() {
		return __( 'Course Speciality', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  course speciality content ------------------------------
		$this->start_controls_section(
			'course_speciality_content',
			[
				'label' => __( 'Course Speciality content', 'edumark-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Course Speciality', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Your domain control panel is designed for ease-of-use and <br>allows for all aspects of your domains.'
            ]
        );

		$this->add_control(
            'specialities', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name' => 'icon',
                        'label' => __( 'Icon', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'default' => 'flaticon-art-and-design',
                        'options' => edumark_flaticon_list()
                    ],
                    [
                        'name' => 'title',
                        'label' => __( 'Title', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Premium Quality', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Your domain control panel is designed for ease-of-use <br> and <br>allows for all aspects of',
                    ],
                ],
                'default'   => [
                    [      
                        'icon'  => 'flaticon-art-and-design',
                        'title' => __( 'Premium Quality', 'edumark-companion' ),
                        'text'  => 'Your domain control panel is designed for ease-of-use <br> and <br>allows for all aspects of',
                    ],
                    [      
                        'icon'  => 'flaticon-business-and-finance',
                        'title' => __( 'Best Quality', 'edumark-companion' ),
                        'text'  => 'Your domain control panel is designed for ease-of-use <br> and <br>allows for all aspects of',
                    ],
                    [      
                        'icon'  => 'flaticon-premium',
                        'title' => __( 'Standard Quality', 'edumark-companion' ),
                        'text'  => 'Your domain control panel is designed for ease-of-use <br> and <br>allows for all aspects of',
                    ],
                    [      
                        'icon'  => 'flaticon-crown',
                        'title' => __( 'Pro Quality', 'edumark-companion' ),
                        'text'  => 'Your domain control panel is designed for ease-of-use <br> and <br>allows for all aspects of',
                    ],
                ]
            ]
		);
        $this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

    $this->start_controls_section(
        'style_room_section', [
            'label' => __( 'Style Core Features Section', 'edumark-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'section_title_col', [
            'label' => __( 'Section Title Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .featuures_heading h3' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'icon_styles_separator', [
            'label' => __( 'Icon Styles', 'edumark-companion' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after'
        ]
    );
    $this->add_control(
        'first_icon_col', [
            'label' => __( 'First Icon Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:first-child .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'first_icon_bg_col', [
            'label' => __( 'First Icon Bg Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:first-child .icon' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'second_icon_col', [
            'label' => __( 'Second Icon Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(2) .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'second_icon_bg_col', [
            'label' => __( 'Second Icon Bg Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(2) .icon' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'third_icon_col', [
            'label' => __( 'Third Icon Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(3) .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'third_icon_bg_col', [
            'label' => __( 'Third Icon Bg Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(3) .icon' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'fourth_icon_col', [
            'label' => __( 'Fourth Icon Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:last-child .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'fourth_icon_bg_col', [
            'label' => __( 'Fourth Icon Bg Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:last-child .icon' => 'background: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'icon_hover_styles_separator', [
            'label' => __( 'Icon Hover Styles', 'edumark-companion' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after'
        ]
    );
    $this->add_control(
        'icon_hover_bg_color', [
            'label' => __( 'Icon Hover BG Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .single_features:hover .icon' => 'background: {{VALUE}} !important;',
            ],
        ]
    );

    $this->add_control(
        'inner_styles_separator', [
            'label' => __( 'Inner Styles', 'edumark-companion' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'after'
        ]
    );
    $this->add_control(
        'title_col', [
            'label' => __( 'Title Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .features_info h4' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'text_col', [
            'label' => __( 'Text Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .features_info p' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

	}

	protected function render() {
    $settings     = $this->get_settings();
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $specialities = !empty( $settings['specialities'] ) ? $settings['specialities'] : '';
    ?>

    <!-- our_courses_start -->
    <div class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <?php
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                            if ( $sub_title ) { 
                                echo "<p>{$sub_title}</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $specialities ) && count( $specialities ) > 0 ){
                    foreach ( $specialities as $item ) {
                        $icon  = !empty( $item['icon'] ) ? esc_attr($item['icon']) : '';
                        $title = !empty( $item['title'] ) ? esc_html($item['title']) : '';
                        $text  = !empty( $item['text'] ) ? wp_kses_post(nl2br($item['text'])) : '';
                        ?>
                        <div class="col-xl-3 col-md-6 col-lg-6">
                            <div class="single_course text-center">
                                <div class="icon">
                                    <?php
                                        if ( $icon ) { 
                                            echo "<i class='{$icon}'></i>";
                                        }
                                    ?>
                                </div>
                                <?php
                                    if ( $title ) { 
                                        echo "<h3>{$title}</h3>";
                                    }
                                    if ( $text ) { 
                                        echo "<p>{$text}</p>";
                                    }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- course speciality end -->
    <?php
    }
}