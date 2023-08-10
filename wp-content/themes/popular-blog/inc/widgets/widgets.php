<?php

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Featured Posts Widget.
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

// Grid Posts Widget.
require get_template_directory() . '/inc/widgets/grid-posts-widget.php';

// Social Widget.
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function popular_blog_register_widgets() {

	register_widget( 'Popular_Blog_Author_Info_Widget' );

	register_widget( 'Popular_Blog_Featured_Posts_Widget' );

	register_widget( 'Popular_Blog_Grid_Posts_Widget' );

	register_widget( 'Popular_Blog_Social_Widget' );

}
add_action( 'widgets_init', 'popular_blog_register_widgets' );
