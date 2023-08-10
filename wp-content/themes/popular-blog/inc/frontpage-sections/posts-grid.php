<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Popular Blog
 */

// Posts Grid Section.
$posts_grid_section = get_theme_mod( 'popular_blog_posts_grid_section_enable', false );

if ( false === $posts_grid_section ) {
	return;
}

$content_ids      = array();

$posts_grid_content_type = get_theme_mod( 'popular_blog_posts_grid_content_type', 'post' );

if ( $posts_grid_content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$content_ids[] = get_theme_mod( 'popular_blog_posts_grid_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'popular_blog_posts_grid_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$section_title    = get_theme_mod( 'popular_blog_posts_grid_title', __( 'Latest Posts', 'popular-blog' ) );
	$section_subtitle = get_theme_mod( 'popular_blog_posts_grid_subtitle', '' );
	$button_label     = get_theme_mod( 'popular_blog_posts_grid_button_label', __( 'Read More', 'popular-blog' ) );
	$viewall_btn      = get_theme_mod( 'popular_blog_posts_grid_view_all_button_label', __( 'View All', 'popular-blog' ) );
	$viewall_btn_link = get_theme_mod( 'popular_blog_posts_grid_view_all_button_url', '#' );
	?>
	<div id="popular_blog_posts_grid_section" class="frontpage post-grid-section four-column">
		<div class="theme-wrapper">
			<?php if ( ! empty( $section_title || $section_subtitle ) ) : ?>
				<div class="section-head">
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
					</div>
					<?php if ( ! empty( $viewall_btn ) ) { ?>
						<a href="<?php echo esc_url( $viewall_btn_link ); ?>" class="adore-view-all"><?php echo esc_html( $viewall_btn ); ?></a>
					<?php } ?>
				</div>
			<?php endif; ?>
			<div class="post-grid-wrapper">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="post-item post-grid">
						<div class="post-item-image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'post-thumbnail' ); ?>
							</a>
							<div class="read-time-comment">
								<span class="reading-time">
									<i class="far fa-clock"></i>
									<?php
									echo popular_blog_time_interval( get_the_content() );
									echo esc_html__( ' min read', 'popular-blog' );
									?>
								</span>
								<span class="comment">
									<i class="far fa-comment"></i>
									<?php echo absint( get_comments_number( get_the_ID() ) ); ?>
								</span>
							</div>
						</div>
						<div class="post-item-content">
							<div class="entry-cat">
								<?php the_category( '', '', get_the_ID() ); ?>
							</div>
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>  
							<ul class="entry-meta">
								<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
								<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
							</ul>
							<div class="post-exerpt">
								<p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 15 ) ); ?></p>
							</div>
							<?php if ( ! empty( $button_label ) ) { ?>
								<div class="post-btn">
									<a href="<?php the_permalink(); ?>" class="btn-read-more"><?php echo esc_html( $button_label ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}
