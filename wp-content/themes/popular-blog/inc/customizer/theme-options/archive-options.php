<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'popular_blog_archive_page_options',
	array(
		'title'    => esc_html__( 'Blog / Archive Pages Options', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 30
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'popular_blog_excerpt_length',
	array(
		'default'           => 15,
		'sanitize_callback' => 'popular_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'popular_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'popular-blog' ),
		'section'     => 'popular_blog_archive_page_options',
		'settings'    => 'popular_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Grid Column layout options.
$wp_customize->add_setting(
	'popular_blog_archive_grid_column_layout',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'popular_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'popular_blog_archive_grid_column_layout',
	array(
		'label'           => esc_html__( 'Grid Column Layout', 'popular-blog' ),
		'section'         => 'popular_blog_archive_page_options',
		'type'            => 'select',
		'choices'         => array(
			'grid-column-2' => __( 'Column 2', 'popular-blog' ),
			'grid-column-3' => __( 'Column 3', 'popular-blog' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'popular_blog_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'popular-blog' ),
			'settings' => 'popular_blog_enable_archive_category',
			'section'  => 'popular_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'popular_blog_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'popular-blog' ),
			'settings' => 'popular_blog_enable_archive_author',
			'section'  => 'popular_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'popular_blog_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'popular-blog' ),
			'settings' => 'popular_blog_enable_archive_date',
			'section'  => 'popular_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
