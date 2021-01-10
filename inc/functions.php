<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Edumark Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */

// Section Heading
function edumark_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'edumark_companion_frontend_scripts', 99 );
function edumark_companion_frontend_scripts() {

	wp_enqueue_script( 'edumark-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'edumark-common-js', plugins_url( '../js/common.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
// 
add_action( 'wp_ajax_edumark_portfolio_ajax', 'edumark_portfolio_ajax' );

add_action( 'wp_ajax_nopriv_edumark_portfolio_ajax', 'edumark_portfolio_ajax' );
function edumark_portfolio_ajax( ){

	ob_start();

	if( !empty( $_POST['elsettings'] ) ):


		$items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

	    $i = 0;
	    foreach( $items as $val ):

	    $tagclass = sanitize_title_with_dashes( $val['label'] );
	    $i++;
	?>
	<div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
	    <?php 
	    if( !empty( $val['img']['url'] ) ){
	        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
	    }
	    ?>
	    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
	        <div class="port-hover-text text-center">
	            <?php 
	            if( !empty( $val['title'] ) ){
	                echo edumark_heading_tag(
	                    array(
	                        'tag'  => 'h4',
	                        'text' => esc_html( $val['title'] )
	                    )
	                );
	            }

	            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
	                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
	            }else{
	                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
	            }
	            ?>
	            
	        </div>
	    </div>
	</div>

	<?php 

	if( !empty( $_POST['postIncrNumber'] ) ){

	    if( $i == $_POST['postIncrNumber'] ){
	        break;
	    }
	}
	    endforeach;
	endif;
	echo ob_get_clean();
	die();
}

	// Update the post/page by your arguments
	function edumark_update_the_followed_post_page_status( $title = 'Hello world!', $type = 'post', $status = 'draft', $message = false ){

		// Get the post/page by title
		$target_post_id = get_page_by_title( $title, OBJECT, $type);

		// Post/page arguments
		$target_post = array(
			'ID'    => $target_post_id->ID,
			'post_status'   => $type,
		);

		if ( $message == true ) {
			// Update the post/page
			$update_status = wp_update_post( $target_post, true );
		} else {
			// Update the post/page
			$update_status = wp_update_post( $target_post, false );
		}

		return $update_status;
	}


	
/*================================================
    Edumark Custom Posts
================================================*/
function edumark_custom_posts() {
	
	// Course - Custom Post
	$labels = array(
		'name'               => _x( 'Courses', 'post type general name', 'edumark' ),
		'singular_name'      => _x( 'Course', 'post type singular name', 'edumark' ),
		'menu_name'          => _x( 'Courses', 'admin menu', 'edumark' ),
		'name_admin_bar'     => _x( 'Course', 'add new on admin bar', 'edumark' ),
		'add_new'            => _x( 'Add New', 'course', 'edumark' ),
		'add_new_item'       => __( 'Add New Course', 'edumark' ),
		'new_item'           => __( 'New Course', 'edumark' ),
		'edit_item'          => __( 'Edit Course', 'edumark' ),
		'view_item'          => __( 'View Course', 'edumark' ),
		'all_items'          => __( 'All Courses', 'edumark' ),
		'search_items'       => __( 'Search Courses', 'edumark' ),
		'parent_item_colon'  => __( 'Parent Courses:', 'edumark' ),
		'not_found'          => __( 'No courses found.', 'edumark' ),
		'not_found_in_trash' => __( 'No courses found in Trash.', 'edumark' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'edumark' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'course' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'course', $args );

	// course-cat - Custom taxonomy
	$labels = array(
		'name'              => _x( 'Course Category', 'taxonomy general name', 'edumark' ),
		'singular_name'     => _x( 'Course Categories', 'taxonomy singular name', 'edumark' ),
		'search_items'      => __( 'Search Course Categories', 'edumark' ),
		'all_items'         => __( 'All Course Categories', 'edumark' ),
		'parent_item'       => __( 'Parent Course Category', 'edumark' ),
		'parent_item_colon' => __( 'Parent Course Category:', 'edumark' ),
		'edit_item'         => __( 'Edit Course Category', 'edumark' ),
		'update_item'       => __( 'Update Course Category', 'edumark' ),
		'add_new_item'      => __( 'Add New Course Category', 'edumark' ),
		'new_item_name'     => __( 'New Course Category Name', 'edumark' ),
		'menu_name'         => __( 'Course Category', 'edumark' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'course-category' ),
	);

	register_taxonomy( 'course-cat', array( 'course' ), $args );

}
add_action( 'init', 'edumark_custom_posts' );




/*=========================================================
    Popular courses navs
========================================================*/
function get_popular_courses_navs(){ 
	$course_cats = get_terms( ['taxonomy' => 'course-cat'] );
	$i = 1;
	?>
	<nav>
		<ul class="nav" id="myTab" role="tablist">
			<?php
				foreach( $course_cats as $cat ) {
					$nav_link_class_dynamic 	 = esc_attr($i==1?' active':'');
					$area_selected_class_dynamic = esc_attr($i==1?'true':'false');
					echo "
					<li class='nav-item'>
						<a class='nav-link{$nav_link_class_dynamic}' id='{$cat->slug}-tab' data-toggle='tab' href='#{$cat->slug}' role='tab' aria-controls='{$cat->slug}' aria-selected='{$area_selected_class_dynamic}'>{$cat->name}</a>
					</li>";
					$i++;
				}
			?>
		</ul>
	</nav>
	<?php
}


/*=========================================================
    Courses Section
========================================================*/
function edumark_course_section( $pNumber = 6 ){ 
	$course_cats = get_terms( ['taxonomy' => 'course-cat'] );
	$i = 1;
	?>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
			<div class="row">
				<?php
					$courses = new WP_Query( array(
						'post_type' => 'course',
						'posts_per_page'=> $pNumber,
				
					) );

					if( $courses->have_posts() ) {
						while ( $courses->have_posts() ) {
							$courses->the_post();
							$course_cat = get_the_terms( get_the_ID(), "course-cat");
							$regular_fee = get_post_meta( get_the_ID(), 'course_fee_regular', true );
							$discount_fee = get_post_meta( get_the_ID(), 'course_fee_discount', true );
							?>
							<div class="col-xl-4 col-lg-4 col-md-6">
								<div class="single_courses">
									<div class="thumb">
										<?php 
											if ( has_post_thumbnail() ) {
												the_post_thumbnail( 'edumark_course_thumb_362x250', ['alt' => get_the_title()] );
											}
										?>
									</div>
									<div class="courses_info">
										<span><?=$course_cat[0]->name?></span>
										<h3><a href="#"><?=the_title()?></a></h3>
										<div class="star_prise d-flex justify-content-between">
											<div class="star">
												<i class="flaticon-mark-as-favorite-star"></i>
												<span>(4.5)</span>
											</div>
											<div class="prise">
												<span class="offer"><?=$regular_fee?></span>
												<span class="active_prise"><?=$discount_fee?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
				?>
			</div>		<!-- end row -->

		</div>			<!-- end tab-pane -->
	</div>				<!-- end tab-content -->
	<?php
}

// Recent Course for Single Page
function edumark_recent_course(){

	$sec_title    = !empty( edumark_opt( 'edumark_course_related_projects_sec_title' ) ) ? edumark_opt( 'edumark_course_related_projects_sec_title' ) : '';
	$pnumber      = !empty( edumark_opt( 'edumark_course_related_projects_item' ) ) ? edumark_opt( 'edumark_course_related_projects_item' ) : '';


	$recentCourse = new WP_Query( array(
        'post_type' => 'course',
        'posts_per_page'    => $pnumber,

    ) );

	?>
	<!-- related project part start -->
    <section class="related_project padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <h2><?php echo esc_html( $sec_title )?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
				<?php
				if( $recentCourse->have_posts() ){
					while ( $recentCourse->have_posts() ){
						$recentCourse->the_post(); 
						$project_img_id  = edumark_meta( 'project_img');
						$project_img_url = wp_get_attachment_image_src( $project_img_id, 'edumark_course_img_360x378' );
						?>
						<div class="col-lg-4 col-sm-6 mb-5">
							<div class="single_project_details">
								<a href="<?php echo $project_img_url[0]?>" class="grid-item img_gallery">
									<img src="<?php echo $project_img_url[0]?>" alt="<?php echo the_title()?>">
									<div class="course_hover_text">
										<i class="ti-plus"></i>
									</div>
								</a>
							</div>
						</div>
						<?php
					}
				}?>
			</div>
		</div>
	</section>
<?php
}
