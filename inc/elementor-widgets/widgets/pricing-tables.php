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
 * Edumark elementor pricing section widget.
 *
 * @since 1.0
 */
class Edumark_Pricing_Section extends Widget_Base {

	public function get_name() {
		return 'edumark-pricing-section';
	}

	public function get_title() {
		return __( 'Pricing Table', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  pricing content ------------------------------
		$this->start_controls_section(
			'pricing_contents',
			[
				'label' => __( 'Pricing Table content', 'edumark-companion' ),
			]
        );
        $this->add_control(
            'pricing_settings_seperator',
            [
                'label' => esc_html__( 'Pricing Table Items', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
		$this->add_control(
            'pricing_tables', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ pack_name }}}',
                'fields' => [
                    [
                        'name' => 'pack_name',
                        'label' => __( 'Package Title', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Starter', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'feat_1',
                        'label' => __( 'Feature 1', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '1 Site', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'feat_2',
                        'label' => __( 'Feature 2', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '100k Visits Per Month', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'feat_3',
                        'label' => __( 'Feature 3', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '1GB Backups', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'feat_4',
                        'label' => __( 'Feature 4', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Free SSL Certificate', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'feat_5',
                        'label' => __( 'Feature 5', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Quick support', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'price_label',
                        'label' => __( 'Price Label', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Start from', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'price_val',
                        'label' => __( 'Price Value', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$2.5/m', 'edumark-companion' ),
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
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'pack_name'   => __( 'Starter', 'edumark-companion' ),
                        'feat_1'      => __( '1 Site', 'edumark-companion' ),
                        'feat_2'      => __( '100k Visits Per Month', 'edumark-companion' ),
                        'feat_3'      => __( '1GB Backups', 'edumark-companion' ),
                        'feat_4'      => __( 'Free SSL Certificate', 'edumark-companion' ),
                        'feat_5'      => __( 'Quick support', 'edumark-companion' ),
                        'price_label' => __( 'Start from', 'edumark-companion' ),
                        'price_val'   => __( '$2.5/m', 'edumark-companion' ),
                        'btn_label'   => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'     => '#',
                    ],
                    [      
                        'pack_name'   => __( 'Silver', 'edumark-companion' ),
                        'feat_1'      => __( '5 Sites', 'edumark-companion' ),
                        'feat_2'      => __( '500k Visits Per Month', 'edumark-companion' ),
                        'feat_3'      => __( '5GB Backups', 'edumark-companion' ),
                        'feat_4'      => __( 'Free SSL Certificate', 'edumark-companion' ),
                        'feat_5'      => __( 'Quick support', 'edumark-companion' ),
                        'price_label' => __( 'Start from', 'edumark-companion' ),
                        'price_val'   => __( '$5/m', 'edumark-companion' ),
                        'btn_label'   => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'     => '#',
                    ],
                    [      
                        'pack_name'   => __( 'Gold', 'edumark-companion' ),
                        'feat_1'      => __( '10 Sites', 'edumark-companion' ),
                        'feat_2'      => __( '1000k Visits Per Month', 'edumark-companion' ),
                        'feat_3'      => __( '10GB Backups', 'edumark-companion' ),
                        'feat_4'      => __( 'Free SSL Certificate', 'edumark-companion' ),
                        'feat_5'      => __( 'Quick support', 'edumark-companion' ),
                        'price_label' => __( 'Start from', 'edumark-companion' ),
                        'price_val'   => __( '$10/m', 'edumark-companion' ),
                        'btn_label'   => __( 'Start Now', 'edumark-companion' ),
                        'btn_url'     => '#',
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
            'style_pricing_section', [
                'label' => __( 'Style Pricing Table Section', 'edumark-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'pricing_header1_col', [
                'label' => __( 'Pricing Header 1 Bg Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package_prsing_area .row > .col-xl-4:first-child .single_prising .prising_header' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pricing_header2_col', [
                'label' => __( 'Pricing Header 2 Bg Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package_prsing_area .row > .col-xl-4:nth-child(2) .single_prising .prising_header' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'pricing_header3_col', [
                'label' => __( 'Pricing Header 3 Bg Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package_prsing_area .row > .col-xl-4:last-child .single_prising .prising_header' => 'background: {{VALUE}};',
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
            'list_pointer_col', [
                'label' => __( 'Listing Pointers Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package_prsing_area .single_prising .list ul li::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_bg_col', [
                'label' => __( 'Button BG Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package_prsing_area .boxed_btn_green' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_hover_bg_col', [
                'label' => __( 'Button Hover Text & Border Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package_prsing_area .boxed_btn_green:hover' => 'background: transparent; border-color: {{VALUE}}; color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->end_controls_section();

	}
    
	protected function render() {
    $settings       = $this->get_settings();
    $pricing_tables = !empty( $settings['pricing_tables'] ) ? $settings['pricing_tables'] : '';
    ?>

    <div class="package_prsing_area">
        <div class="container">
            <div class="row">
                <?php 
                if( is_array( $pricing_tables ) && count( $pricing_tables ) > 0 ) {
                    foreach( $pricing_tables as $item ) {
                        $pack_name  = ( !empty( $item['pack_name'] ) ) ? esc_html($item['pack_name']) : '';
                        $feat_1     = ( !empty( $item['feat_1'] ) ) ? esc_html($item['feat_1']) : '';
                        $feat_2     = ( !empty( $item['feat_2'] ) ) ? esc_html($item['feat_2']) : '';
                        $feat_3     = ( !empty( $item['feat_3'] ) ) ? esc_html($item['feat_3']) : '';
                        $feat_4     = ( !empty( $item['feat_4'] ) ) ? esc_html($item['feat_4']) : '';
                        $feat_5     = ( !empty( $item['feat_5'] ) ) ? esc_html($item['feat_5']) : '';
                        $price_label= ( !empty( $item['price_label'] ) ) ? esc_html($item['price_label']) : '';
                        $price_val  = ( !empty( $item['price_val'] ) ) ? esc_html($item['price_val']) : '';
                        $btn_label  = ( !empty( $item['btn_label'] ) ) ? esc_html($item['btn_label']) : '';
                        $btn_url    = ( !empty( $item['btn_url']['url'] ) ) ? esc_url($item['btn_url']['url']) : '';
                        ?>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="single_prising">
                                <div class="prising_header">
                                    <?php 
                                        if ( $pack_name ) { 
                                            echo "<h3>{$pack_name}</h3>";
                                        }
                                    ?>
                                </div>
                                <div class="middle_content">
                                    <div class="list">
                                        <ul>
                                            <?php 
                                                if ( $feat_1 ) { 
                                                    echo "<li>{$feat_1}</li>";
                                                }
                                                if ( $feat_2 ) { 
                                                    echo "<li>{$feat_2}</li>";
                                                }
                                                if ( $feat_3 ) { 
                                                    echo "<li>{$feat_3}</li>";
                                                }
                                                if ( $feat_4 ) { 
                                                    echo "<li>{$feat_4}</li>";
                                                }
                                                if ( $feat_5 ) { 
                                                    echo "<li>{$feat_5}</li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php 
                                        if ( $price_label ) { 
                                            echo "<p class='prise'>{$price_label} <span>{$price_val}</span></p>";
                                        }
                                    ?>
                                    <div class="start_btn text-center">
                                        <?php 
                                            if ( $btn_label ) { 
                                                echo "<a class='boxed_btn_green' href='{$btn_url}'>
                                                {$btn_label}
                                                </a>";
                                            }
                                        ?>
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
    </div>
    <!-- pricing_area_end -->
    <?php
    }
}