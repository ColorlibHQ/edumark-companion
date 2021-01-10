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
 * Edumark elementor lets launch section widget.
 *
 * @since 1.0
 */
class Edumark_Lets_Launch extends Widget_Base {

	public function get_name() {
		return 'edumark-lets-launch';
	}

	public function get_title() {
		return __( 'Lets Launch', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Lets Launch Section ------------------------------
        $this->start_controls_section(
            'lets_launch_content',
            [
                'label' => __( 'Lets Launch Content', 'edumark-companion' ),
            ]
        );
        
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'edumark-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'   => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Lets\'s Launch Your Website Now', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving. <br>Moving in fourth air night bring upon you’re it beast.',
            ]
        );
        $this->add_control(
            'btn1_text',
            [
                'label' => __( 'Button1 Text', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Live Chat', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn1_url',
            [
                'label' => __( 'Button URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        $this->add_control(
            'btn2_text',
            [
                'label' => __( 'Button2 Text', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'get start now', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'btn2_url',
            [
                'label' => __( 'Button2 URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        
        $this->end_controls_section(); // End support_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'edumark-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_overlay_col', [
				'label' => __( 'Section Overlay Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch.overlay2::before' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Sec title Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch .launch_text h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch .launch_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn1_bg_col', [
				'label' => __( 'Button 1 BG Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch .launch_text .chat .boxed_btn_green' => 'background: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn1_hover_border_txt_col', [
				'label' => __( 'Button 1 Hover Border & Text Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch .launch_text .chat .boxed_btn_green:hover' => 'background: transparent; border-color: {{VALUE}}; color: {{VALUE}} !important;',
				],
			]
        );
        $this->add_control(
			'btn2_bg_col', [
				'label' => __( 'Button 2 Border & Text Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch .launch_text .chat .boxed_btn_green2' => 'color: {{VALUE}} !important; border-color: {{VALUE}} !important;',
				],
			]
        );
        $this->add_control(
			'btn2_hover_border_txt_col', [
				'label' => __( 'Button 2 Hover BG Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .lets_launch .launch_text .chat .boxed_btn_green2:hover' => 'background: {{VALUE}}; border-color: {{VALUE}} !important; color: #fff !important;',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? esc_url($settings['bg_img']['url']) : '';
    $sec_title = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sub_title = !empty( $settings['sub_title'] ) ? wp_kses_post(nl2br($settings['sub_title'])) : '';
    $btn1_text = !empty( $settings['btn1_text'] ) ? esc_html( $settings['btn1_text'] ) : '';
    $btn1_url  = !empty( $settings['btn1_url']['url'] ) ? esc_url( $settings['btn1_url']['url'] ) : '';
    $btn2_text = !empty( $settings['btn2_text'] ) ? esc_html( $settings['btn2_text'] ) : '';
    $btn2_url  = !empty( $settings['btn2_url']['url'] ) ? esc_url( $settings['btn2_url']['url'] ) : '';
    ?>
    
    <!-- lets_launch_start -->
    <div class="lets_launch overlay2" <?php echo edumark_inline_bg_img( $bg_img ); ?>>
        <div class="launch_text text-center">
            <?php 
                if ( $sec_title ) { 
                    echo "<h3>{$sec_title}</h3>";
                }
                if ( $sub_title ) { 
                    echo "<p>{$sub_title}</p>";
                }
            ?>
            <div class="chat">
                <?php 
                    if ( $btn1_text ) { 
                        echo "<a class='boxed_btn_green' href='{$btn1_url}'>
                        <i class='flaticon-chat'></i>
                        <span>{$btn1_text}</span></a>";
                    }
                    if ( $btn2_text ) { 
                        echo "<a class='boxed_btn_green2' href='{$btn2_url}'>
                        <span>{$btn2_text}</span></a>";
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- lets_launch_end -->
    <?php

    }
}
