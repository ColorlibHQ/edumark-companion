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
 * Edumark elementor faq section section widget.
 *
 * @since 1.0
 */
class Edumark_Faq_Section extends Widget_Base {

	public function get_name() {
		return 'edumark-faq-section';
	}

	public function get_title() {
		return __( 'Faq Section', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Faq content ------------------------------
		$this->start_controls_section(
			'faq_contents',
			[
				'label' => __( 'Faq content', 'edumark-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Frequently Ask Question', 'edumark-companion' )
            ]
        );

        $this->add_control(
            'faq_settings_seperator',
            [
                'label' => esc_html__( 'Faq Items', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'faq_items', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ faq_title }}}',
                'fields' => [
                    [
                        'name' => 'faq_title',
                        'label' => __( 'Faq Title', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'What are the advantages <span>of WordPress hosting over shared?</span>',
                    ],
                    [
                        'name' => 'faq_text',
                        'label' => __( 'Faq Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                        let god moving. Moving in fourth air night bring upon',
                    ],
                ],
                'default'   => [
                    [      
                        'faq_title' => 'What are the advantages <span>of WordPress hosting over shared?</span>',
                        'faq_text'  => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                        let god moving. Moving in fourth air night bring upon',
                    ],
                    [      
                        'faq_title' => 'Will you transfer my site?',
                        'faq_text'  => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                        let god moving. Moving in fourth air night bring upon',
                    ],
                    [      
                        'faq_title' => 'Why should I host with Edumark?',
                        'faq_text'  => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                        let god moving. Moving in fourth air night bring upon',
                    ],
                    [      
                        'faq_title' => 'How do I get started <span>with Shared Hosting?</span>',
                        'faq_text'  => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                        let god moving. Moving in fourth air night bring upon',
                    ],
                    [      
                        'faq_title' => 'Is WordPress hosting worth it?',
                        'faq_text'  => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                        let god moving. Moving in fourth air night bring upon',
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
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq_area .accordion_heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'inner_styles_seperator',
            [
                'label' => esc_html__( 'Inner Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_icon_col', [
                'label' => __( 'Item Icon Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq_area #accordion .card h5 button i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_title_col', [
                'label' => __( 'Item Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq_area #accordion .card h5 button' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_col', [
                'label' => __( 'Item Text Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq_area #accordion .card .card-body' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}
    
	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $faq_items = !empty( $settings['faq_items'] ) ? $settings['faq_items'] : '';
    ?>
    
    <!-- faq_area_start -->
    <div class="faq_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="accordion_heading">
                        <?php 
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                        ?>
                    </div>
                    <div id="accordion">
                        <?php 
                        if( is_array( $faq_items ) && count( $faq_items ) > 0 ) {
                            foreach( $faq_items as $item ) {
                                $faq_id    = ( !empty( $item['_id'] ) ) ? esc_attr($item['_id']) : '';
                                $faq_title = ( !empty( $item['faq_title'] ) ) ? wp_kses_post( nl2br( $item['faq_title'] ) ) : '';
                                $faq_text  = ( !empty( $item['faq_text'] ) ) ? wp_kses_post( nl2br( $item['faq_text'] ) ) : '';
                                ?>
                                <div class="card">
                                    <div class="card-header" id="heading<?=$faq_id?>">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapse<?=$faq_id?>" aria-expanded="false" aria-controls="collapse<?=$faq_id?>">
                                                <i class="flaticon-info"></i> <?=$faq_title?>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse<?=$faq_id?>" class="collapse" aria-labelledby="heading<?=$faq_id?>"
                                        data-parent="#accordion">
                                        <div class="card-body"><?=$faq_text?></div>
                                    </div>
                                </div>
                                <?php 
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq_area_end -->
    <?php
    }
}