<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'popular_blog_pagination',
	array(
		'title'    => esc_html__( 'Pagination', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 50
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'popular_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'popular-blog' ),
			'settings' => 'popular_blog_pagination_enable',
			'section'  => 'popular_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'popular_blog_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'popular_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'popular_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'popular-blog' ),
		'section'         => 'popular_blog_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'popular-blog' ),
			'numeric'  => __( 'Numeric', 'popular-blog' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'popular_blog_pagination_enable' )->value() );
		},
	)
);
