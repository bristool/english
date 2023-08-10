<?php
/**
 * Adore Themes Customizer
 *
 * @package Popular Blog
 *
 * Categories Section
 */

$wp_customize->add_section(
	'popular_blog_categories_section',
	array(
		'title'    => esc_html__( 'Categories Section', 'popular-blog' ),
		'panel'    => 'popular_blog_frontpage_panel',
		'priority' => 20
	)
);

// Categories Section section enable settings.
$wp_customize->add_setting(
	'popular_blog_categories_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'popular_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Popular_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'popular_blog_categories_section_enable',
		array(
			'label'    => esc_html__( 'Enable Categories Section', 'popular-blog' ),
			'type'     => 'checkbox',
			'settings' => 'popular_blog_categories_section_enable',
			'section'  => 'popular_blog_categories_section',
		)
	)
);

// Categories Section title settings.
$wp_customize->add_setting(
	'popular_blog_categories_title',
	array(
		'default'           => __( 'Posts Categories', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_categories_title',
	array(
		'label'           => esc_html__( 'Section Title', 'popular-blog' ),
		'section'         => 'popular_blog_categories_section',
		'active_callback' => 'popular_blog_if_categories_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'popular_blog_categories_title',
		array(
			'selector'            => '.categories-section h3.section-title',
			'settings'            => 'popular_blog_categories_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'popular_blog_categories_title_text_partial',
		)
	);
}

// Categories Section subtitle settings.
$wp_customize->add_setting(
	'popular_blog_categories_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_categories_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'popular-blog' ),
		'section'         => 'popular_blog_categories_section',
		'active_callback' => 'popular_blog_if_categories_enabled',
	)
);

// View All button label setting.
$wp_customize->add_setting(
	'popular_blog_categories_view_all_button_label',
	array(
		'default'           => __( 'View All', 'popular-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'popular_blog_categories_view_all_button_label',
	array(
		'label'           => esc_html__( 'View All Button Label', 'popular-blog' ),
		'section'         => 'popular_blog_categories_section',
		'settings'        => 'popular_blog_categories_view_all_button_label',
		'type'            => 'text',
		'active_callback' => 'popular_blog_if_categories_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'popular_blog_categories_view_all_button_label',
		array(
			'selector'            => '.categories-section .adore-view-all',
			'settings'            => 'popular_blog_categories_view_all_button_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'popular_blog_categories_view_all_button_label_text_partial',
		)
	);
}

// View All button URL setting.
$wp_customize->add_setting(
	'popular_blog_categories_view_all_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'popular_blog_categories_view_all_button_url',
	array(
		'label'           => esc_html__( 'View All Button Link', 'popular-blog' ),
		'section'         => 'popular_blog_categories_section',
		'settings'        => 'popular_blog_categories_view_all_button_url',
		'type'            => 'url',
		'active_callback' => 'popular_blog_if_categories_enabled',
	)
);

for ( $i = 1; $i <= 6; $i++ ) {

	// categories category setting.
	$wp_customize->add_setting(
		'popular_blog_categories_category_' . $i,
		array(
			'sanitize_callback' => 'popular_blog_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'popular_blog_categories_category_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Category %d', 'popular-blog' ), $i ),
			'section'         => 'popular_blog_categories_section',
			'settings'        => 'popular_blog_categories_category_' . $i,
			'type'            => 'select',
			'choices'         => popular_blog_get_post_cat_choices(),
			'active_callback' => 'popular_blog_if_categories_enabled',
		)
	);

	// categories bg image.
	$wp_customize->add_setting(
		'popular_blog_categories_image_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'popular_blog_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'popular_blog_categories_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Category Image %d', 'popular-blog' ), $i ),
				'section'         => 'popular_blog_categories_section',
				'settings'        => 'popular_blog_categories_image_' . $i,
				'active_callback' => 'popular_blog_if_categories_enabled',
			)
		)
	);

}

/*========================Active Callback==============================*/
function popular_blog_if_categories_enabled( $control ) {
	return $control->manager->get_setting( 'popular_blog_categories_section_enable' )->value();
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'popular_blog_categories_title_text_partial' ) ) :
	// Title.
	function popular_blog_categories_title_text_partial() {
		return esc_html( get_theme_mod( 'popular_blog_categories_title' ) );
	}
endif;
if ( ! function_exists( 'popular_blog_categories_view_all_button_label_text_partial' ) ) :
	// Title.
	function popular_blog_categories_view_all_button_label_text_partial() {
		return esc_html( get_theme_mod( 'popular_blog_categories_view_all_button_label' ) );
	}
endif;
