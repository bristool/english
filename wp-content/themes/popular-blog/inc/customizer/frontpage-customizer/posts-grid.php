<?php
/**
 * Adore Themes Customizer
 *
 * @package Popular Blog
 *
 * Posts Grid Section
 */

$wp_customize->add_section(
	'popular_blog_posts_grid_section',
	array(
		'title'    => esc_html__( 'Posts Grid Section', 'popular-blog' ),
		'panel'    => 'popular_blog_frontpage_panel',
		'priority' => 30
	)
);

// Posts Grid section enable settings.
$wp_customize->add_setting(
	'popular_blog_posts_grid_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_posts_grid_section_enable',
		array(
			'label'    => esc_html__( 'Enable Posts Grid Section', 'popular-blog' ),
			'type'     => 'checkbox',
			'settings' => 'popular_blog_posts_grid_section_enable',
			'section'  => 'popular_blog_posts_grid_section',
		)
	)
);

// Posts Grid title settings.
$wp_customize->add_setting(
	'popular_blog_posts_grid_title',
	array(
		'default'           => __( 'Latest Posts', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_title',
	array(
		'label'           => esc_html__( 'Section Title', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'active_callback' => 'popular_blog_if_posts_grid_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'popular_blog_posts_grid_title',
		array(
			'selector'            => '.post-grid-section h3.section-title',
			'settings'            => 'popular_blog_posts_grid_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'popular_blog_posts_grid_title_text_partial',
		)
	);
}

// Posts Grid subtitle settings.
$wp_customize->add_setting(
	'popular_blog_posts_grid_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'active_callback' => 'popular_blog_if_posts_grid_enabled',
	)
);

// View All button label setting.
$wp_customize->add_setting(
	'popular_blog_posts_grid_view_all_button_label',
	array(
		'default'           => __( 'View All', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_view_all_button_label',
	array(
		'label'           => esc_html__( 'View All Button Label', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'settings'        => 'popular_blog_posts_grid_view_all_button_label',
		'type'            => 'text',
		'active_callback' => 'popular_blog_if_posts_grid_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'popular_blog_posts_grid_view_all_button_label',
		array(
			'selector'            => '.post-grid-section .adore-view-all',
			'settings'            => 'popular_blog_posts_grid_view_all_button_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'popular_blog_posts_grid_view_all_button_label_text_partial',
		)
	);
}

// View All button URL setting.
$wp_customize->add_setting(
	'popular_blog_posts_grid_view_all_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_view_all_button_url',
	array(
		'label'           => esc_html__( 'View All Button Link', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'settings'        => 'popular_blog_posts_grid_view_all_button_url',
		'type'            => 'url',
		'active_callback' => 'popular_blog_if_posts_grid_enabled',
	)
);

// posts_grid content type settings.
$wp_customize->add_setting(
	'popular_blog_posts_grid_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'popular_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'popular-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'type'            => 'select',
		'active_callback' => 'popular_blog_if_posts_grid_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'popular-blog' ),
			'category' => esc_html__( 'Category', 'popular-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// posts_grid post setting.
	$wp_customize->add_setting(
		'popular_blog_posts_grid_post_' . $i,
		array(
			'sanitize_callback' => 'popular_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'popular_blog_posts_grid_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'popular-blog' ), $i ),
			'section'         => 'popular_blog_posts_grid_section',
			'type'            => 'select',
			'choices'         => popular_blog_get_post_choices(),
			'active_callback' => 'popular_blog_posts_grid_section_content_type_post_enabled',
		)
	);

}

// posts_grid category setting.
$wp_customize->add_setting(
	'popular_blog_posts_grid_category',
	array(
		'sanitize_callback' => 'popular_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_category',
	array(
		'label'           => esc_html__( 'Category', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'type'            => 'select',
		'choices'         => popular_blog_get_post_cat_choices(),
		'active_callback' => 'popular_blog_posts_grid_section_content_type_category_enabled',
	)
);

// Posts Grid button label setting.
$wp_customize->add_setting(
	'popular_blog_posts_grid_button_label',
	array(
		'default'           => __( 'Read More', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_posts_grid_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'popular-blog' ),
		'section'         => 'popular_blog_posts_grid_section',
		'type'            => 'text',
		'active_callback' => 'popular_blog_if_posts_grid_enabled',
	)
);

/*========================Active Callback==============================*/
function popular_blog_if_posts_grid_enabled( $control ) {
	return $control->manager->get_setting( 'popular_blog_posts_grid_section_enable' )->value();
}
function popular_blog_posts_grid_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'popular_blog_posts_grid_content_type' )->value();
	return popular_blog_if_posts_grid_enabled( $control ) && ( 'post' === $content_type );
}
function popular_blog_posts_grid_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'popular_blog_posts_grid_content_type' )->value();
	return popular_blog_if_posts_grid_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'popular_blog_posts_grid_title_text_partial' ) ) :
	// Title.
	function popular_blog_posts_grid_title_text_partial() {
		return esc_html( get_theme_mod( 'popular_blog_posts_grid_title' ) );
	}
endif;
if ( ! function_exists( 'popular_blog_posts_grid_view_all_button_label_text_partial' ) ) :
	// View All.
	function popular_blog_posts_grid_view_all_button_label_text_partial() {
		return esc_html( get_theme_mod( 'popular_blog_posts_grid_view_all_button_label' ) );
	}
endif;
