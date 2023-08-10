<?php
/**
 * Adore Themes Customizer
 *
 * @package Popular Blog
 *
 * Breaking News Section
 */

$wp_customize->add_section(
	'popular_blog_breaking_news_section',
	array(
		'title'    => esc_html__( 'Flash News Section', 'popular-blog' ),
		'panel'    => 'popular_blog_frontpage_panel',
		'priority' => 10
	)
);

// Breaking News section enable settings.
$wp_customize->add_setting(
	'popular_blog_breaking_news_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_breaking_news_section_enable',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'popular-blog' ),
			'type'     => 'checkbox',
			'settings' => 'popular_blog_breaking_news_section_enable',
			'section'  => 'popular_blog_breaking_news_section',
		)
	)
);

// Breaking News title settings.
$wp_customize->add_setting(
	'popular_blog_breaking_news_title',
	array(
		'default'           => __( 'Flash News', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_breaking_news_title',
	array(
		'label'           => esc_html__( 'Title', 'popular-blog' ),
		'section'         => 'popular_blog_breaking_news_section',
		'active_callback' => 'popular_blog_if_breaking_news_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'popular_blog_breaking_news_title',
		array(
			'selector'            => '.news-ticker-section .theme-wrapper',
			'settings'            => 'popular_blog_breaking_news_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'popular_blog_breaking_news_title_text_partial',
		)
	);
}

// breaking_news content type settings.
$wp_customize->add_setting(
	'popular_blog_breaking_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'popular_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'popular_blog_breaking_news_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'popular-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'popular-blog' ),
		'section'         => 'popular_blog_breaking_news_section',
		'type'            => 'select',
		'active_callback' => 'popular_blog_if_breaking_news_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'popular-blog' ),
			'category' => esc_html__( 'Category', 'popular-blog' ),
		),
	)
);

for ( $i = 1; $i <= 8; $i++ ) {
	// breaking_news post setting.
	$wp_customize->add_setting(
		'popular_blog_breaking_news_post_' . $i,
		array(
			'sanitize_callback' => 'popular_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'popular_blog_breaking_news_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'popular-blog' ), $i ),
			'section'         => 'popular_blog_breaking_news_section',
			'type'            => 'select',
			'choices'         => popular_blog_get_post_choices(),
			'active_callback' => 'popular_blog_breaking_news_section_content_type_post_enabled',

		)
	);

}

// breaking_news category setting.
$wp_customize->add_setting(
	'popular_blog_breaking_news_category',
	array(
		'sanitize_callback' => 'popular_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'popular_blog_breaking_news_category',
	array(
		'label'           => esc_html__( 'Category', 'popular-blog' ),
		'section'         => 'popular_blog_breaking_news_section',
		'type'            => 'select',
		'choices'         => popular_blog_get_post_cat_choices(),
		'active_callback' => 'popular_blog_breaking_news_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function popular_blog_if_breaking_news_enabled( $control ) {
	return $control->manager->get_setting( 'popular_blog_breaking_news_section_enable' )->value();
}
function popular_blog_breaking_news_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'popular_blog_breaking_news_content_type' )->value();
	return popular_blog_if_breaking_news_enabled( $control ) && ( 'post' === $content_type );
}
function popular_blog_breaking_news_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'popular_blog_breaking_news_content_type' )->value();
	return popular_blog_if_breaking_news_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'popular_blog_breaking_news_title_text_partial' ) ) :
	// Title.
	function popular_blog_breaking_news_title_text_partial() {
		return esc_html( get_theme_mod( 'popular_blog_breaking_news_title' ) );
	}
endif;
