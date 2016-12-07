<?php
/**
 * Check and setup theme's default settings
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$devstrapp_posts_index_style = get_theme_mod( 'devstrapp_posts_index_style' );
	if ( '' == $devstrapp_posts_index_style ) {
		set_theme_mod( 'devstrapp_posts_index_style', 'default' );
	}

	// Sidebar position.
	$devstrapp_sidebar_position = get_theme_mod( 'devstrapp_sidebar_position' );
	if ( '' == $devstrapp_sidebar_position ) {
		set_theme_mod( 'devstrapp_sidebar_position', 'right' );
	}

	// Container width.
	$devstrapp_container_type = get_theme_mod( 'devstrapp_container_type' );
	if ( '' == $devstrapp_container_type ) {
		set_theme_mod( 'devstrapp_container_type', 'container' );
	}
}
