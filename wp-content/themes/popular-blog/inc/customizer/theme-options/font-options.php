<?php

/**
 * Font section
 */

// Font section.
$wp_customize->add_section(
	'popular_blog_font_options',
	array(
		'title'    => esc_html__( 'Font ( Typography ) Options', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 10
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'popular_blog_site_title_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'popular_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'popular_blog_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'popular-blog' ),
		'section'  => 'popular_blog_font_options',
		'settings' => 'popular_blog_site_title_font',
		'type'     => 'select',
		'choices'  => popular_blog_font_choices(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'popular_blog_site_description_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'popular_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'popular_blog_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'popular-blog' ),
		'section'  => 'popular_blog_font_options',
		'settings' => 'popular_blog_site_description_font',
		'type'     => 'select',
		'choices'  => popular_blog_font_choices(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'popular_blog_header_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'popular_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'popular_blog_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'popular-blog' ),
		'section'  => 'popular_blog_font_options',
		'settings' => 'popular_blog_header_font',
		'type'     => 'select',
		'choices'  => popular_blog_font_choices(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'popular_blog_body_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'popular_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'popular_blog_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'popular-blog' ),
		'section'  => 'popular_blog_font_options',
		'settings' => 'popular_blog_body_font',
		'type'     => 'select',
		'choices'  => popular_blog_font_choices(),
	)
);
