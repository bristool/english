<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Popular Blog
 */

// Breaking News Section.
$breaking_news_section = get_theme_mod( 'popular_blog_breaking_news_section_enable', false );

if ( false === $breaking_news_section ) {
	return;
}

$content_ids = array();

$breaking_news_content_type = get_theme_mod( 'popular_blog_breaking_news_content_type', 'post' );

if ( $breaking_news_content_type === 'post' ) {

	for ( $i = 1; $i <= 8; $i++ ) {
		$content_ids[] = get_theme_mod( 'popular_blog_breaking_news_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 8 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'popular_blog_breaking_news_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 8 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$section_title = get_theme_mod( 'popular_blog_breaking_news_title', __( 'Flash News', 'popular-blog' ) );
	?>

	<section id="popular_blog_breaking_news_section" class="news-ticker-section">
		<div class="theme-wrapper-large">
			<div class="news-ticker-section-wrapper">
				<?php if ( ! empty( $section_title ) ) : ?>
					<div class="acme-news-ticker-label breaking-news-btn">
						<?php echo esc_html( $section_title ); ?>
					</div>
				<?php endif; ?>
				<div class="marquee-part">	
					<ul id="newstick" class="newsticker">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<li>
								<div class="newsticker-outer">
									<span class="newsticker-image">
										<?php the_post_thumbnail('thumbnail'); ?>
									</span>
									<span class="newsticker-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</span>
								</div>
							</li>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>  
		</div>
	</section>

	<?php
}
