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
 * Edumark elementor statistic section widget.
 *
 * @since 1.0
 */
class Edumark_Statistic_Section extends Widget_Base {

	public function get_name() {
		return 'edumark-statistic';
	}

	public function get_title() {
		return __( 'Statistic Section', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  statistic content ------------------------------
        $this->start_controls_section(
            'statistic_content',
            [
                'label' => __( 'Statistic Content', 'edumark-companion' ),
            ]
        );

		$this->add_control(
            'statistics', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ statistic_txt }}}',
                'fields' => [
                    [
                        'name' => 'statistic_val',
                        'label' => __( 'Statistic Value', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '278390', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'statistic_txt',
                        'label' => __( 'Statistic Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Client around the World', 'edumark-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'statistic_val'     => __( '278390', 'edumark-companion' ),
                        'statistic_txt'     => __( 'Client around the World', 'edumark-companion' ),
                    ],
                    [      
                        'statistic_val'     => __( '200', 'edumark-companion' ),
                        'statistic_txt'     => __( 'Dedicated team', 'edumark-companion' ),
                    ],
                    [      
                        'statistic_val'     => __( '563278', 'edumark-companion' ),
                        'statistic_txt'     => __( 'Domain registation', 'edumark-companion' ),
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
    $settings   = $this->get_settings();    
    $statistics = !empty( $settings['statistics'] ) ?  $settings['statistics'] : '';
    ?>

    <div class="about_boxes">
        <div class="container">
            <div class="row">
                <?php 
                if( is_array( $statistics ) && count( $statistics ) > 0 ) {
                    foreach( $statistics as $settings ) {
                        $statistic_val  = !empty( $settings['statistic_val'] ) ?  esc_html($settings['statistic_val']) : '';
                        $statistic_txt  = !empty( $settings['statistic_txt'] ) ?  esc_html($settings['statistic_txt']) : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_box">
                                <?php 
                                    if ( $statistic_val ) { 
                                        echo "<h3>{$statistic_val}</h3>";
                                    }
                                    if ( $statistic_txt ) { 
                                        echo "<p>{$statistic_txt}</p>";
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
    <?php
    }
}