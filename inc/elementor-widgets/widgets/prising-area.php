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
 * Edumark elementor prising area section widget.
 *
 * @since 1.0
 */
class Edumark_Prising_Area extends Widget_Base {

	public function get_name() {
		return 'edumark-prising-area';
	}

	public function get_title() {
		return __( 'Prising Areas', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Prising Area content ------------------------------
		$this->start_controls_section(
			'prising_area_content',
			[
				'label' => __( 'Prising Area content', 'edumark-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Choose your Hosting Plan', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Your domain control panel is designed for ease-of-use and <br>allows for all aspects of your domains.'
            ]
        );

        $this->add_control(
            'prising_area_inner_settings_seperator',
            [
                'label' => esc_html__( 'Prising Area Items', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'prising_areas', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'options' => edumark_themify_icon(),
                        'default' => 'flaticon-servers'
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Package Name', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Share Hosting', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Short Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Easy drag and drop fully customizable mobile friendly', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'price_label',
                        'label' => __( 'Price Label', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Start From', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'price_val',
                        'label' => __( 'Price', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => '$2.5/m',
                    ],
                    [
                        'name' => 'btn_label',
                        'label' => __( 'Button Label', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Start Now', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'item_icon'         => 'flaticon-servers',
                        'item_title'        => __( 'Share Hosting', 'edumark-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'edumark-companion' ),
                        'price_label'       => __( 'Start from', 'edumark-companion' ),
                        'price_val'         => __( '$2.5/m', 'edumark-companion' ),
                        'btn_label'         => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'item_icon'         => 'flaticon-hosting',
                        'item_title'        => __( 'VPS Hosting', 'edumark-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'edumark-companion' ),
                        'price_label'       => __( 'Start from', 'edumark-companion' ),
                        'price_val'         => __( '$5/m', 'edumark-companion' ),
                        'btn_label'         => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'item_icon'         => 'flaticon-wordpress',
                        'item_title'        => __( 'Wordpress Hosting', 'edumark-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'edumark-companion' ),
                        'price_label'       => __( 'Start from', 'edumark-companion' ),
                        'price_val'         => __( '$8/m', 'edumark-companion' ),
                        'btn_label'         => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'item_icon'         => 'flaticon-servers-1',
                        'item_title'        => __( 'Dedicated Hosting', 'edumark-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'edumark-companion' ),
                        'price_label'       => __( 'Start from', 'edumark-companion' ),
                        'price_val'         => __( '$10/m', 'edumark-companion' ),
                        'btn_label'         => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'           => '#',
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
                'label' => __( 'Style Service Section', 'edumark-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_styles_seperator',
            [
                'label' => esc_html__( 'Package Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_border_col', [
                'label' => __( 'Item Border Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'indivisual_icon_color_seperator',
            [
                'label' => esc_html__( 'Individual Icon Colors', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'first_item_icon_col', [
                'label' => __( 'First Item Icon Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:first-child i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'second_item_icon_col', [
                'label' => __( 'Second Item Icon Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:nth-child(2) i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'third_item_icon_col', [
                'label' => __( 'Third Item Icon Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:nth-child(3) i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fourth_item_icon_col', [
                'label' => __( 'Fourth Item Icon Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:last-child i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'prising_inner_styles_seperator',
            [
                'label' => esc_html__( 'Prising Inner Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'prising_title_col', [
                'label' => __( 'Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prising_txt_col', [
                'label' => __( 'Text Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prising_label_col', [
                'label' => __( 'Pricing Label Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising .prise' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'prising_val_col', [
                'label' => __( 'Prising Value Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising .prise span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_txt_border_col', [
                'label' => __( 'Button Text & Border Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising .boxed_btn_green2' => 'border-color: {{VALUE}}; color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_col', [
                'label' => __( 'Button Hover Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .single_prising .boxed_btn_green2:hover' => 'border-color: {{VALUE}}; background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings      = $this->get_settings();
    $sec_title     = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sub_title     = !empty( $settings['sub_title'] ) ? wp_kses_post(nl2br($settings['sub_title'])) : '';
    $prising_areas = !empty( $settings['prising_areas'] ) ? $settings['prising_areas'] : '';
    ?>
    
    <!-- prising_area_start -->
    <div class="prising_area">
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
                if( is_array( $prising_areas ) && count( $prising_areas ) > 0 ) {
                    foreach( $prising_areas as $item ) {
                        $item_icon   = ( !empty( $item['item_icon'] ) ) ? esc_attr($item['item_icon']) : '';
                        $item_title  = ( !empty( $item['item_title'] ) ) ? esc_html($item['item_title']) : '';
                        $item_text   = ( !empty( $item['item_text'] ) ) ? esc_html($item['item_text']) : '';
                        $price_label = ( !empty( $item['price_label'] ) ) ? esc_html($item['price_label']) : '';
                        $price_val   = ( !empty( $item['price_val'] ) ) ? esc_html($item['price_val']) : '';
                        $btn_label   = ( !empty( $item['btn_label'] ) ) ? esc_html($item['btn_label']) : '';
                        $btn_url     = ( !empty( $item['btn_url']['url'] ) ) ? esc_url($item['btn_url']['url']) : '';
                        ?>
                        <div class="col-xl-3 col-md-6 col-lg-6">
                            <div class="single_prising">
                                <div class="prising_icon">
                                    <?php
                                        if ( $item_icon ) { 
                                            echo "<i class='{$item_icon}'></i>";
                                        }
                                    ?>
                                </div>
                                <?php
                                    if ( $item_title ) { 
                                        echo "<h3>{$item_title}</h3>";
                                    }
                                    if ( $item_text ) { 
                                        echo "<p class='prising_text'>{$item_text}</p>";
                                    }
                                    if ( $price_label ) { 
                                        echo "<p class='prise'>{$price_label} <span>{$price_val}</span></p>";
                                    }
                                    if ( $btn_label ) { 
                                        echo "<a href='{$btn_url}' class='boxed_btn_green2'>{$btn_label}</a>";
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
    <!-- prising_area_end -->
    <?php
    }
}