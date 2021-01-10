
/*======================================================
    Recent Course for Single Page
=======================================================*/
function edumark_recent_course(){

	$sec_title    = !empty( edumark_opt( 'course_recent_post_section_title' ) ) ? edumark_opt( 'course_recent_post_section_title' ) : '';
	$pnumber      = !empty( edumark_opt( 'course_recent_post_number' ) ) ? edumark_opt( 'course_recent_post_number' ) : '';

	$recentCourse = new WP_Query( array(
        'post_type' => 'course',
        'posts_per_page'    => $pnumber,

    ) );

	?>

	<!-- related_project_part start-->
	<section class="blog_part section_padding related_projects project_details_single">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section_tittle text-center">
						<?php
							if( $sec_title ){
								echo '<h2>'. wp_kses_post( $sec_title ) .'</h2>';
							}
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
			<?php
				if( $recentCourse->have_posts() ){
					while ( $recentCourse->have_posts() ){
						$recentCourse->the_post(); ?>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
							<?php
								if( has_post_thumbnail() ){
									the_post_thumbnail( 'edumark_related_projects_360x369', array( 'class' => 'card-img-top', 'alt' => get_the_title() ) );
								}
							?>
                            <div class="card-body">
                                <h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
								<?php
									$categories = get_the_terms( get_the_ID(), "course-cat");
									foreach ( $categories as $category ){
										echo '<p>'. $category->name .'</p>';
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
    </section>
    <!-- related_project_part end-->
<?php
}
