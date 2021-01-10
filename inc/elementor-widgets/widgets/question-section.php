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
 * Edumark elementor question section widget.
 *
 * @since 1.0
 */
class Edumark_Question_Section extends Widget_Base {

	public function get_name() {
		return 'edumark-question-section';
	}

	public function get_title() {
		return __( 'Any Question?', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Question content ------------------------------
        $this->start_controls_section(
            'question_content',
            [
                'label' => __( 'Question Content', 'edumark-companion' ),
            ]
        );        
        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Have any Question?', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn1_label',
            [
                'label' => esc_html__( 'Button 1 Label', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Live Chat', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn1_url',
            [
                'label' => esc_html__( 'Button 1 URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
            ]
        );
        $this->add_control(
            'btn2_label',
            [
                'label' => esc_html__( 'Button 2 Label', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'get start now', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn2_url',
            [
                'label' => esc_html__( 'Button 2 URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ],
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
    $settings   = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ?  wp_kses_post(nl2br($settings['sec_title'])) : '';
    $btn1_label = !empty( $settings['btn1_label'] ) ?  esc_html($settings['btn1_label']) : '';
    $btn1_url   = !empty( $settings['btn1_url']['url'] ) ?  esc_url($settings['btn1_url']['url']) : '';
    $btn2_label = !empty( $settings['btn2_label'] ) ?  esc_html($settings['btn2_label']) : '';
    $btn2_url   = !empty( $settings['btn2_url']['url'] ) ?  esc_url($settings['btn2_url']['url']) : '';
    ?>

    <div class="have_question">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="single_border">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-4 col-lg-6">
                                <?php
                                    if ( $sec_title ) {
                                        echo "<h3>{$sec_title}</h3>";
                                    }
                                ?>
                            </div>
                            <div class="col-xl-6 col-md-8 col-lg-6">
                                <div class="chat">
                                    <?php
                                        if ( $btn1_label ) {
                                            echo "<a class='boxed_btn_green' href='{$btn1_url}'>
                                            <i class='flaticon-chat'></i>
                                                <span>{$btn1_label}</span>
                                            </a>";
                                        }
                                        if ( $btn2_label ) {
                                            echo "<a class='boxed_btn_green2' href='{$btn2_url}'>
                                            {$btn2_label}
                                            </a>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}