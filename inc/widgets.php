<?php
/**
 * Declaring widgets
 *
 * @package devstrap
 */

if ( ! function_exists( 'devstrapp_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function devstrapp_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'devstrap' ),
			'id'            => 'right-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'devstrap' ),
			'id'            => 'left-sidebar',
			'description'   => 'Left sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Hero Slider', 'devstrap' ),
			'id'            => 'hero',
			'description'   => 'Hero slider area. Place two or more widgets here and they will slide!',
			'before_widget' => '<div class="item">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => __( 'Hero Static', 'devstrap' ),
			'id'            => 'statichero',
			'description'   => 'Static Hero widget. no slider functionallity',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Full', 'devstrap' ),
			'id'            => 'footerfull',
			'description'   => 'Widget area below main content and above footer',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}
} // endif function_exists( 'devstrapp_widgets_init' ).
add_action( 'widgets_init', 'devstrapp_widgets_init' );
