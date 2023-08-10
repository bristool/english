<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'popular_blog_sidebar_option',
	array(
		'title'    => esc_html__( 'Sidebar Options', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 40
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'popular_blog_sidebar_position',
	array(
		'sanitize_callback' => 'popular_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'popular_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'popular-blog' ),
		'section' => 'popular_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'popular-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'popular-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'popular_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'popular_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'popular_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'popular-blog' ),
		'section' => 'popular_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'popular-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'popular-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'popular_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'popular_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'popular_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'popular-blog' ),
		'section' => 'popular_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'popular-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'popular-blog' ),
		),
	)
);
