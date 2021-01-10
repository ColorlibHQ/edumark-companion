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
 * Edumark elementor hero section widget.
 *
 * @since 1.0
 */
class Edumark_Hero extends Widget_Base {

	public function get_name() {
		return 'edumark-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero content', 'edumark-companion' ),
			]
        );
        
		$this->add_control(
            'banner_img', [
                'label' => __( 'BG Image', 'edumark-companion' ),
                'type' => Controls_Manager::MEDIA,

            ]
		);
		$this->add_control(
            'banner_left_img', [
                'label' => __( 'Banner Left Image', 'edumark-companion' ),
                'type' => Controls_Manager::MEDIA,

            ]
		);
		$this->add_control(
            'big_title', [
                'label' => __( 'Big Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
				'default' => 'Learn your <br>Favorite Course <br>From Online'
			]
        );
		$this->add_control(
            'btn_label', [
                'label' => __( 'Button Label', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Browse Our Courses', 'edumark-companion' ),
            ]
        );
		$this->add_control(
            'btn_url', [
                'label' => __( 'Button URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
					'url' => '#'
				]
            ]
        );
        
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'edumark-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_overlay_col', [
				'label' => __( 'BG Overlay Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider::before' => 'background: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .find_dowmain .find_dowmain_form button' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_col', [
				'label' => __( 'Button Hover BG Color', 'edumark-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .find_dowmain .find_dowmain_form button:hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}
    
	protected function render() {
	$settings   	 = $this->get_settings();  
    $banner_img 	 = !empty( $settings['banner_img']['url'] ) ? $settings['banner_img']['url'] : ''; 
    $big_title  	 = !empty( $settings['big_title'] ) ? wp_kses_post(nl2br($settings['big_title'])) : '';
    $banner_left_img = !empty( $settings['banner_left_img']['id'] ) ? wp_get_attachment_image( $settings['banner_left_img']['id'], 'edumark_hero_left_thumb_638x550', '', array( 'alt' => $big_title ) ) : '';
    $btn_label  	 = !empty( $settings['btn_label'] ) ? esc_html($settings['btn_label']) : '';     
    $btn_url  		 = !empty( $settings['btn_url']['url'] ) ? esc_url($settings['btn_url']['url']) : '';
	?>
	
    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center" <?php echo edumark_inline_bg_img( esc_url( $banner_img ) ); ?>>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
							<?php
								if ( $banner_left_img ) {
									echo $banner_left_img;
								}
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
							<?php
								if ( $big_title ) {
									echo "<h3>{$big_title}</h3>";
								}
                                if ( $btn_label ) {
                                    echo "<a href='{$btn_url}' class='boxed_btn'>{$btn_label}</a>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    }
}