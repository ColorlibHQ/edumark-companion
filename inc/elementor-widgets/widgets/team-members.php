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
 * Edumark elementor team member section widget.
 *
 * @since 1.0
 */
class Edumark_Team_Members extends Widget_Base {

	public function get_name() {
		return 'edumark-team-members';
	}

	public function get_title() {
		return __( 'Team Members', 'edumark-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'edumark-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_member_content',
			[
				'label' => __( 'Team Member content', 'edumark-companion' ),
			]
        );

		$this->add_control(
            'team_members', [
                'label' => __( 'Create New', 'edumark-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Lallu Mia', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'member_designation',
                        'label' => __( 'Member Designation', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Design Expert', 'edumark-companion' ),
                    ],
                    [
                        'name' => 'social_info_separator',
                        'label' => __( 'Social Links', 'edumark-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook Profile URL', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter Profile URL', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'ins_url',
                        'label' => __( 'Instagram Profile URL', 'edumark-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Macau Wilium', 'edumark-companion' ),
                        'member_designation'     => __( 'Massage Master', 'edumark-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Dan Jacky', 'edumark-companion' ),
                        'member_designation'     => __( 'Mens Cut', 'edumark-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Luka Luka', 'edumark-companion' ),
                        'member_designation'     => __( 'Mens Cut', 'edumark-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Rona Dana', 'edumark-companion' ),
                        'member_designation'     => __( 'Ladies Cut', 'edumark-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

	}

	protected function render() {
    $settings     = $this->get_settings();
    $team_members = !empty( $settings['team_members'] ) ? $settings['team_members'] : '';
    ?>
    
    <!-- our_team_member_start -->
    <div class="our_team_member">
        <div class="container">
            <div class="row">
                <?php 
                if( is_array( $team_members ) && count( $team_members ) > 0 ) {
                    foreach( $team_members as $member ) {
                        $member_name        = ( !empty( $member['member_name'] ) ) ? esc_html($member['member_name']) : '';
                        $member_img         = !empty( $member['member_img']['id'] ) ? wp_get_attachment_image( $member['member_img']['id'], 'edumark_team_member_thumb_264x300', '', array( 'alt' => $member_name.' image' ) ) : '';
                        $member_designation = ( !empty( $member['member_designation'] ) ) ? esc_html($member['member_designation']) : '';
                        $fb_url             = ( !empty( $member['fb_url']['url'] ) ) ? esc_url($member['fb_url']['url']) : '';
                        $tw_url             = ( !empty( $member['tw_url']['url'] ) ) ? esc_url($member['tw_url']['url']) : '';
                        $ins_url            = ( !empty( $member['ins_url']['url'] ) ) ? esc_url($member['ins_url']['url']) : '';
                        ?>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="single_team">
                                <div class="thumb">
                                    <?php 
                                        if ( $member_img ) { 
                                            echo $member_img;
                                        }
                                    ?>
                                    <div class="social_link">
                                        <?php 
                                            if ( $fb_url ) { 
                                                echo "<a href='{$fb_url}'><i class='fa fa-facebook'></i></a>";
                                            }
                                            if ( $tw_url ) { 
                                                echo "<a href='{$tw_url}'><i class='fa fa-twitter'></i></a>";
                                            }
                                            if ( $ins_url ) { 
                                                echo "<a href='{$ins_url}'><i class='fa fa-instagram'></i></a>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="master_name text-center">
                                    <?php 
                                        if ( $member_name ) { 
                                            echo "<h3>{$member_name}</h3>";
                                        }
                                        if ( $member_designation ) { 
                                            echo "<p>{$member_designation}</p>";
                                        }
                                    ?>
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
    <!-- our_team_member_end -->
    <?php
    }
}