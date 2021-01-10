<?php
namespace Edumarkelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Edumark elementor about us section widget.
 *
 * @since 1.0
 */
class Edumark_About_Us extends Widget_Base {

	public function get_name() {
		return 'edumark-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About content ------------------------------
        $this->start_controls_section(
            'about_left_content',
            [
                'label' => __( 'About Content', 'edumark-companion' ),
            ]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Over 7000 Tutorials <br>from 20 Courses',
            ]
        );
        $this->add_control(
            'big_txt',
            [
                'label' => esc_html__( 'Big Text', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving. Moving in fourth air night bring upon you’re it beast let you dominion likeness open place day great wherein heaven sixth lesser subdue fowl', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__( 'Button Label', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Enroll a Course', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );

		$this->add_control(
            'course_infos', [
                // 'label' => __( 'Create New', 'edumark-companion' ),
                'label' => __( '<b>Only 3 items will appear for keeping the consistency with the design.</b>', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_text }}}',
                'fields' => [
                    [
                        'name' => 'item_value',
                        'label' => __( 'Item Title', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '20+', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Item Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Courses', 'edumark-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_value' => __( '20+', 'edumark-companion' ),
                        'item_text'  => __( 'Courses', 'edumark-companion' ),
                    ],
                    [      
                        'item_value' => __( '7638', 'edumark-companion' ),
                        'item_text'  => __( 'Students', 'edumark-companion' ),
                    ],
                    [      
                        'item_value' => __( '230+', 'edumark-companion' ),
                        'item_text'  => __( 'Teachers', 'edumark-companion' ),
                    ],
                ]
            ]
		);
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'edumark-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'left_sec_styles_seperator',
            [
                'label' => esc_html__( 'Left Section Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'exp_val_col', [
				'label' => __( 'Experience Value Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience h1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_txt_col', [
				'label' => __( 'Experience Text Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'right_sec_styles_seperator',
            [
                'label' => esc_html__( 'Right Section Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_info .section_title .seperator' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area .about_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Circle Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info ul li::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg & Border Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

    }
    

	protected function render() {
    $settings       = $this->get_settings();
    $sec_title      = !empty( $settings['sec_title'] ) ? wp_kses_post(nl2br($settings['sec_title'])) : '';
    $big_txt        = !empty( $settings['big_txt'] ) ? esc_html($settings['big_txt']) : '';
    $btn_label      = !empty( $settings['btn_label'] ) ? esc_html($settings['btn_label']) : '';
    $btn_url        = !empty( $settings['btn_label']['url'] ) ? esc_url($settings['btn_label']['url']) : '';
    $course_infos   = !empty( $settings['course_infos'] ) ? $settings['course_infos'] : '';
    ?>

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <?php
                            if ( $sec_title ) {
                                echo "<h3>{$sec_title}</h3>";
                            }
                            if ( $big_txt ) {
                                echo "<p>{$big_txt}</p>";
                            }
                            if ( $btn_label ) {
                                echo "<a href='{$btn_url}' class='boxed_btn'>{$btn_label}</a>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <?php 
                        if( is_array( $course_infos ) && count( $course_infos ) > 0 ) {
                            $i = 1;
                            foreach( $course_infos as $item ) {
                                $item_value = ( !empty( $item['item_value'] ) ) ? esc_html( $item['item_value'] ) : '';
                                $item_text  = ( !empty( $item['item_text'] ) ) ? esc_html( $item['item_text'] ) : '';
                                $dynamic_class = $i == 1 ? 'courses' : ($i == 2 ? 'courses-blue' : 'courses-sky');
                                if ( $i <= 3 ) {
                                    ?>
                                    <div class="<?=$dynamic_class?>">
                                        <div class="inner_courses">
                                            <div class="text_info">
                                                <?php
                                                    if ( $item_value ) {
                                                        echo "<span>{$item_value}</span>";
                                                    }
                                                    if ( $item_text ) {
                                                        echo "<p>{$item_text}</p>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                }
                                $i++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <?php
    }
}