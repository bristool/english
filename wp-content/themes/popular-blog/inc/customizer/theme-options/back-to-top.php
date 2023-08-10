<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'popular_blog_back_to_top_section',
	array(
		'title'    => esc_html__( 'Scroll Up ( Back To Top )', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 80
	)
);

// Scroll to top enable setting.
$wp_customize->add_setting(
	'popular_blog_enable_scroll_to_top',
	array(
		'default'           => true,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_enable_scroll_to_top',
		array(
			'label'    => esc_html__( 'Enable scroll to top.', 'popular-blog' ),
			'settings' => 'popular_blog_enable_scroll_to_top',
			'section'  => 'popular_blog_back_to_top_section',
			'type'     => 'checkbox',
		)
	)
);
