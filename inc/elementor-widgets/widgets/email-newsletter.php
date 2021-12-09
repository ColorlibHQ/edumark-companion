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
 * Edumark elementor newsletter section widget.
 *
 * @since 1.0
 */
class Edumark_Email_Newsletter extends Widget_Base {

	public function get_name() {
		return 'edumark-email-newsletter';
	}

	public function get_title() {
		return __( 'Email Newsletter', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-envelope';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Email Newsletter content ------------------------------
		$this->start_controls_section(
			'email_newsletter_content',
			[
				'label' => __( 'Email Newsletter content', 'edumark-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Subscribe Newsletter', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Your domain control panel is designed for ease-of-use and allows for all aspects of your', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'form_title',
            [
                'label' => esc_html__( 'Form Title', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Your domain control panel is', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'form_action_url',
            [
                'label' => esc_html__( 'Form Action URL', 'edumark-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01'
                ]
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'edumark-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Sign Up', 'edumark-companion' )
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
            'label' => __( 'Style Core Features Section', 'edumark-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'bg_col', [
            'label' => __( 'BG Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .subscribe_newsletter' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'text_col', [
            'label' => __( 'Text Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .subscribe_newsletter .newsletter_text h3' => 'color: {{VALUE}};',
                '{{WRAPPER}} .subscribe_newsletter .newsletter_text p' => 'color: {{VALUE}};',
                '{{WRAPPER}} .subscribe_newsletter .newsletter_form h4' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'btn_col', [
            'label' => __( 'Button BG Color', 'edumark-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .subscribe_newsletter .newsletter_form .newsletter_form button' => 'background: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

	}
    
	protected function render() {
    $settings        = $this->get_settings();
    $sec_title       = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sub_title       = !empty( $settings['sub_title'] ) ? esc_html($settings['sub_title']) : '';
    $form_title      = !empty( $settings['form_title'] ) ? esc_html($settings['form_title']) : '';
    $form_action_url = !empty( $settings['form_action_url']['url'] ) ? esc_url($settings['form_action_url']['url']) : '';
    $btn_text        = !empty( $settings['btn_text'] ) ? esc_html($settings['btn_text']) : '';
    ?>

    <!-- subscribe_newsletter_Start -->
    <div class="subscribe_newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="newsletter_text">
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
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="newsletter_form">
                        <?php
                            if ( $form_title ) { 
                                echo "<h4>{$form_title}</h4>";
                            }
                        ?>
                        <form action="<?=$form_action_url?>" class="newsletter_form">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit"><?=$btn_text?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe_newsletter_end -->
    <?php
    }
}