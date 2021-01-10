<?php
namespace Edumarkelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Edumark elementor core feature tab items section widget.
 *
 * @since 1.0
 */
class Edumark_Core_Feature_Tab_Items extends Widget_Base {

	public function get_name() {
		return 'edumark-core-feature-tab-items';
	}

	public function get_title() {
		return __( 'Core Feature Tab Items', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Core Feature tab content ------------------------------
		$this->start_controls_section(
			'core_feature_tab_content',
			[
				'label' => __( 'Core Feature Tab Item', 'edumark-companion' ),
			]
        );

		$this->add_control(
            'feature_items', [
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
                        'default' => 'flaticon-browser',
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Free Domain for 1st Year', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Item Text', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving.', 'edumark-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_icon'  => 'flaticon-browser',   
                        'item_title' => __( 'Free Domain for 1st Year', 'edumark-companion' ),
                        'item_text'  => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving.', 'edumark-companion' ),
                    ],
                    [      
                        'item_icon'  => 'flaticon-security',   
                        'item_title' => __( 'Free SSL Certificate', 'edumark-companion' ),
                        'item_text'  => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving.', 'edumark-companion' ),
                    ],
                    [      
                        'item_icon'  => 'flaticon-like',   
                        'item_title' => __( '30-Day Money-Back Guarantee', 'edumark-companion' ),
                        'item_text'  => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving.', 'edumark-companion' ),
                    ],
                    [      
                        'item_icon'  => 'flaticon-lock',   
                        'item_title' => __( 'Spam Protection', 'edumark-companion' ),
                        'item_text'  => __( 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving.', 'edumark-companion' ),
                    ],
                ]
            ]
		);
        $this->end_controls_section(); // End service content

	}

	protected function render() {
    $settings      = $this->get_settings();
    $feature_items = !empty( $settings['feature_items'] ) ? $settings['feature_items'] : '';

    echo '<div class="row">';
    if( is_array( $feature_items ) && count( $feature_items ) > 0 ) {
        foreach( $feature_items as $item ) {
            $item_icon  = ( !empty( $item['item_icon'] ) ) ? esc_attr($item['item_icon']) : '';
            $item_title = ( !empty( $item['item_title'] ) ) ? esc_html($item['item_title']) : '';
            $item_text  = ( !empty( $item['item_text'] ) ) ? esc_html($item['item_text']) : '';
            ?>
            <div class="col-xl-6">
                <div class="single_features">
                    <?php
                        echo '<div class="icon">';
                            if ( $item_icon ) { 
                                echo "<i class='{$item_icon}'></i>";
                            }
                        echo '</div>';
                    ?>
                    <div class="features_info">
                        <?php
                            if ( $item_title ) { 
                                echo "<h4>{$item_title}</h4>";
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
    }
    echo '</div>';
    }
}