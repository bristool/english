<?php
/**
 * Footer copyright
 */

// Footer copyright
$wp_customize->add_section(
	'popular_blog_footer_section',
	array(
		'title'    => esc_html__( 'Footer Options', 'popular-blog' ),
		'panel'    => 'popular_blog_theme_options_panel',
		'priority' => 70
	)
);

$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'popular-blog' ), '[the-year]', '[site-link]' );

// Footer copyright setting.
$wp_customize->add_setting(
	'popular_blog_copyright_txt',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'popular_blog_sanitize_html',
	)
);

$wp_customize->add_control(
	'popular_blog_copyright_txt',
	array(
		'label'           => esc_html__( 'Copyright text', 'popular-blog' ),
		'section'         => 'popular_blog_footer_section',
		'type'            => 'textarea',
	)
);
