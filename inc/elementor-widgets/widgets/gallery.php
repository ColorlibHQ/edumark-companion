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
 * Edumark elementor gallery section widget.
 *
 * @since 1.0
 */
class Edumark_Gallery extends Widget_Base {

	public function get_name() {
		return 'edumark-gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Gallery content ------------------------------
		$this->start_controls_section(
			'gallery_content',
			[
				'label' => __( 'Galleries content', 'edumark-companion' ),
			]
        );
        $this->add_control(
            'sec_icon',
            [
                'label' => esc_html__( 'Section Icon', 'edumark-companion' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'options' => edumark_themify_icon(),
                'default' => 'flaticon-scissors'
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Gallery', 'edumark-companion' )
            ]
        );

        $this->add_control(
            'gallery_inner_settings_seperator',
            [
                'label' => esc_html__( 'Gallery Items', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        
		$this->add_control(
            'edumarkgalleries', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ gallery_title }}}',
                'fields' => [
                    [
                        'name' => 'gallery_img',
                        'label' => __( 'Gallery Image', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'gallery_title',
                        'label' => __( 'Gallery Title', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Item 1', 'edumark-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'gallery_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_title'  => __( 'Item 1', 'edumark-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_title'  => __( 'Item 2', 'edumark-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_title'  => __( 'Item 3', 'edumark-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_title'  => __( 'Item 4', 'edumark-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_title'  => __( 'Item 5', 'edumark-companion' ),
                    ],
                    [      
                        'gallery_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'gallery_title'  => __( 'Item 6', 'edumark-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End gallery content

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
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'edumark-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sing_ser_title_col', [
                'label' => __( 'Title Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sing_ser_txt_col', [
                'label' => __( 'Text Color', 'edumark-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings        = $this->get_settings();
    $sec_icon        = !empty( $settings['sec_icon'] ) ? esc_attr($settings['sec_icon']) : '';
    $sec_title       = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $edumarkgalleries = !empty( $settings['edumarkgalleries'] ) ? $settings['edumarkgalleries'] : '';
    ?>
    <!-- gallery_area_start -->
    <div class="gallery_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title2 text-center mb-90">
                        <?php 
                            if ( $sec_icon ) { 
                                echo "<i class='{$sec_icon}'></i>";
                            }
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="gallery_active owl-carousel">
                        <?php 
                        if( is_array( $edumarkgalleries ) && count( $edumarkgalleries ) > 0 ) {
                            foreach( $edumarkgalleries as $gallery ) {
                                $gallery_title   = ( !empty( $gallery['gallery_title'] ) ) ? esc_html($gallery['gallery_title']) : '';
                                $gallery_img     = !empty( $gallery['gallery_img']['id'] ) ? wp_get_attachment_image( $gallery['gallery_img']['id'], 'edumark_gallery_img_362x440', '', array( 'alt' => $gallery_title.' image' ) ) : '';
                                $gallery_img_url = !empty( $gallery['gallery_img']['url'] ) ? esc_url($gallery['gallery_img']['url']) : '';
                                ?>
                                <div class="single_gallery">
                                    <div class="thumb">
                                        <?php 
                                            if ( $gallery_img ) { 
                                                echo $gallery_img;
                                            }
                                        ?>
                                        <div class="image_hover">
                                            <a class="popup-image" href="<?php echo $gallery_img_url?>">
                                                <i class="ti-plus"></i>
                                            </a>
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
        </div>
    </div>
    <?php
    }
}