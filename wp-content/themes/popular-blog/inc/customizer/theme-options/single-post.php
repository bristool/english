<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'popular_blog_single_page_options',
	array(
		'title'    => esc_html__( 'Single Post Options', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 60
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'popular_blog_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'popular-blog' ),
			'settings' => 'popular_blog_enable_single_category',
			'section'  => 'popular_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'popular_blog_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'popular-blog' ),
			'settings' => 'popular_blog_enable_single_author',
			'section'  => 'popular_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'popular_blog_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'popular-blog' ),
			'settings' => 'popular_blog_enable_single_date',
			'section'  => 'popular_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'popular_blog_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'popular-blog' ),
			'settings' => 'popular_blog_enable_single_tag',
			'section'  => 'popular_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post related Posts setting.
$wp_customize->add_setting(
	'popular_blog_enable_related_post_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_related_post_section',
		array(
			'label'    => esc_html__( 'Enable Related Posts', 'popular-blog' ),
			'settings' => 'popular_blog_enable_related_post_section',
			'section'  => 'popular_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'popular_blog_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_related_posts_title',
	array(
		'label'           => esc_html__( 'Related Posts Title', 'popular-blog' ),
		'section'         => 'popular_blog_single_page_options',
		'settings'        => 'popular_blog_related_posts_title',
	)
);
