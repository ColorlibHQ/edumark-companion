<?php
namespace Edumarkelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Edumark elementor popular courses section widget.
 *
 * @since 1.0
 */

class Edumark_Popular_Courses extends Widget_Base {

	public function get_name() {
		return 'edumark-popular-courses';
	}

	public function get_title() {
		return __( 'Popular Courses', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  popular-courses content ------------------------------
        $this->start_controls_section(
            'popular_courses_content',
            [
                'label' => __( 'Popular courses Setting', 'edumark-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'edumark-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Popular Courses', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'edumark-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => 'Your domain control panel is designed for ease-of-use and <br> allows for all aspects of your domains.'
            ]
        );
        $this->add_control(
			'course_item',
			[
				'label'         => esc_html__( 'Course Item', 'edumark-companion' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => false,
                'default'       => absint(6),
                'min'           => 1,
                'max'           => 6,
			]
		);
        $this->add_control(
            'btn_title',
            [
                'label'         => __( 'Read More Button Title', 'edumark-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'More Courses', 'edumark-companion' )
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'         => __( 'Read More Button URL', 'edumark-companion' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'edumark-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'section_title_color', [
                'label'     => __( 'Section Title Color', 'edumark-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular_courses .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'section_sub_title_color', [
                'label'     => __( 'Section Sub Title Color', 'edumark-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular_courses .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_styles_sep',
            [
                'label'     => __( 'Blog Styles', 'edumark-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'heighlighted_color', [
                'label'     => __( 'Heighlighted Color', 'edumark-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .popular_courses .course_nav .nav li a.active::before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .popular_courses .more_courses .boxed_btn_rev' => 'border-color: {{VALUE}} !important; color: {{VALUE}}',
                    '{{WRAPPER}} .popular_courses .more_courses .boxed_btn_rev:hover' => 'background: {{VALUE}} !important; color: #fff !important',
                ],
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings    = $this->get_settings();
    $sec_title   = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sub_title   = !empty( $settings['sub_title'] ) ? wp_kses_post(nl2br($settings['sub_title'])) : '';
    $course_item = !empty( $settings['course_item'] ) ? $settings['course_item'] : '';
    $btn_title = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    $dynamic_class = is_front_page() ? 'popular_courses' : 'popular_courses plus_padding';
    ?>

    <!-- popular_courses_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
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
                <div class="col-xl-12">
                    <div class="course_nav">
                        <?php get_popular_courses_navs(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="all_courses">
            <div class="container">
                <?php 
                    edumark_course_section($course_item);

                    if ( $btn_title ) { 
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="more_courses text-center">
                                    <a href="<?php echo esc_url( $btn_url )?>" class="boxed_btn_rev"><?php echo esc_html( $btn_title )?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- popular_course_end -->
    <?php
	}
}
