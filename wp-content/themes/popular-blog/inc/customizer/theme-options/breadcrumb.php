<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'popular_blog_breadcrumb_section',
	array(
		'title'    => esc_html__( 'Breadcrumb Options', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 20
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'popular_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'popular-blog' ),
			'type'     => 'checkbox',
			'settings' => 'popular_blog_breadcrumb_enable',
			'section'  => 'popular_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'popular_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'popular_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'popular-blog' ),
		'section'         => 'popular_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'popular_blog_breadcrumb_enable' )->value() );
		},
	)
);
