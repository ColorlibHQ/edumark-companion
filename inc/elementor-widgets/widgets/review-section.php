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
 * Edumark Review Contents section widget.
 *
 * @since 1.0
 */
class Edumark_Review_Contents extends Widget_Base {

	public function get_name() {
		return 'edumark-review-contents';
	}

	public function get_title() {
		return __( 'Review Contents', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Review contents  ------------------------------
		$this->start_controls_section(
			'reviews_content',
			[
				'label' => __( 'Review Contents', 'edumark-companion' ),
			]
        );
        
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Section Bg Image', 'edumark-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'   => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
            ]
        );
		$this->add_control(
            'reviews_contents', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ reviewer_name }}}',
                'fields' => [
                    [
                        'name' => 'reviewr_img',
                        'label' => __( 'Reviewer Image', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src()
                        ]
                    ],
                    [
                        'name' => 'review_txt',
                        'label' => __( 'Review Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => '"Working in conjunction with humanitarian aid <br> agencies we have supported programmes to <br>alleviate. human suffering.'
                    ],
                    [
                        'name' => 'reviewer_name',
                        'label' => __( 'Reviewer Name', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '- Jquileen', 'edumark-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'reviewr_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'review_txt'            => '"Working in conjunction with humanitarian aid <br> agencies we have supported programmes to <br>alleviate. human suffering.',
                        'reviewer_name'         => __( '- Jquileen', 'edumark-companion' ),
                    ],
                    [
                        'reviewr_img'           => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'review_txt'            => '"Working in conjunction with humanitarian aid <br> agencies we have supported programmes to <br>alleviate. human suffering.',
                        'reviewer_name'         => __( '- Hasan Fardous', 'edumark-companion' ),
                    ],
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
                'label' => __( 'Style Review Section', 'edumark-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rev_txt_col', [
                'label' => __( 'Review Text Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_name_col', [
                'label' => __( 'Reviewer Name Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info .author_name h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'rev_desig_col', [
                'label' => __( 'Reviewer Designation Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial_area .testmonial_info .author_name span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings    = $this->get_settings();
    $bg_img      = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $reviews     = !empty( $settings['reviews_contents'] ) ? $settings['reviews_contents'] : '';
    ?>

    <!-- testimonial_area_start -->
    <div class="testimonial_area overlay" <?php echo edumark_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="testmonial_active owl-carousel">
            <?php
            if( is_array( $reviews ) && count( $reviews ) > 0 ){
                foreach ( $reviews as $review ) {
                    $reviewer_name = !empty( $review['reviewer_name'] ) ? $review['reviewer_name'] : '';
                    $reviewr_img   = !empty( $review['reviewr_img']['id'] ) ? wp_get_attachment_image( $review['reviewr_img']['id'], 'edumark_client_img_116x116', '', array('alt' => $reviewer_name . ' image' ) ) : '';
                    $review_txt    = !empty( $review['review_txt'] ) ? $review['review_txt'] : '';
                    ?>
                    <div class="single_testmoial">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="testmonial_text text-center">
                                        <?php 
                                            if ( $reviewr_img ) { 
                                                echo '<div class="author_img">';
                                                    echo $reviewr_img;
                                                echo '</div>';
                                            }
                                            if ( $review_txt ) { 
                                                echo '<p>'.wp_kses_post( nl2br( $review_txt ) ).'</p>';
                                            }
                                            if ( $reviewer_name ) { 
                                                echo '<span>'.$reviewer_name.'</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- testimonial_area_end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:1,
                    nav:false
                },
                1200:{
                    items:1,
                    nav:false
                },
                1500:{
                    items:1
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
