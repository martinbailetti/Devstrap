<?php
/**
 * Devstrap Theme Customizer
 *
 * @package devstrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'devstrapp_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function devstrapp_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	}
}
add_action( 'customize_register', 'devstrapp_customize_register' );

if ( ! function_exists( 'devstrapp_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function devstrapp_theme_customize_register( $wp_customize ) {

		$wp_customize->add_section( 'devstrapp_theme_slider_options', array(
			'title' => __( 'Slider Settings', 'devstrap' ),
		) );

		$wp_customize->add_setting( 'devstrapp_theme_slider_count_setting', array(
			'default'           => '1',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'devstrapp_theme_slider_count', array(
			'label'    => __( 'Number of slides displaying at once', 'devstrap' ),
			'section'  => 'devstrapp_theme_slider_options',
			'type'     => 'text',
			'settings' => 'devstrapp_theme_slider_count_setting',
		) );

		$wp_customize->add_setting( 'devstrapp_theme_slider_time_setting', array(
			'default'           => '5000',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'devstrapp_theme_slider_time', array(
			'label'    => __( 'Slider Time (in ms)', 'devstrap' ),
			'section'  => 'devstrapp_theme_slider_options',
			'type'     => 'text',
			'settings' => 'devstrapp_theme_slider_time_setting',
		) );

		$wp_customize->add_setting( 'devstrapp_theme_slider_loop_setting', array(
			'default'           => 'true',
			'sanitize_callback' => 'esc_textarea',
		) );

		$wp_customize->add_control( 'devstrapp_theme_loop', array(
			'label'    => __( 'Loop Slider Content', 'devstrap' ),
			'section'  => 'devstrapp_theme_slider_options',
			'type'     => 'radio',
			'choices'  => array(
				'true'  => 'yes',
				'false' => 'no',
			),
			'settings' => 'devstrapp_theme_slider_loop_setting',
		) );

		// Theme layout settings.
		$wp_customize->add_section( 'devstrapp_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'devstrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'devstrap' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'devstrapp_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'devstrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'devstrap' ),
					'section'     => 'devstrapp_theme_layout_options',
					'settings'    => 'devstrapp_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'devstrap' ),
						'container-fluid' => __( 'Full width container', 'devstrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'devstrapp_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'devstrapp_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'devstrap' ),
					'description' => __( "Set sidebar's position. Can either be: right, left, both or none",
					'devstrap' ),
					'section'     => 'devstrapp_theme_layout_options',
					'settings'    => 'devstrapp_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'devstrap' ),
						'left'  => __( 'Left sidebar', 'devstrap' ),
						'both'  => __( 'Left & Right sidebars', 'devstrap' ),
						'none'  => __( 'No sidebar', 'devstrap' ),
					),
					'priority'    => '20',
				)
			) );

		// How to display posts index page (home.php).
		$wp_customize->add_setting( 'devstrapp_posts_index_style', array(
			'default'           => 'default',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'devstrapp_posts_index_style', array(
					'label'       => __( 'Posts Index Style', 'devstrap' ),
					'description' => __( 'Choose how to display latest posts', 'devstrap' ),
					'section'     => 'devstrapp_theme_layout_options',
					'settings'    => 'devstrapp_posts_index_style',
					'type'        => 'select',
					'choices'     => array(
						'default' => __( 'Default', 'devstrap' ),
						'masonry' => __( 'Masonry', 'devstrap' ),
						'grid'    => __( 'Grid', 'devstrap' ),
					),
					'priority'    => '30',
				)
			) );

		// Columns setup for grid posts.
		/**
		 * Function and callback to check when grid is enabled.
		 *
		 * @return bool
		 */
		function is_grid_enabled() {
			return 'grid' == get_theme_mod( 'devstrapp_posts_index_style' );
		}

		// How many columns to use each grid post.
		$wp_customize->add_setting( 'devstrapp_grid_post_columns', array(
			'default'    => '6',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'devstrapp_grid_post_columns', array(
					'label'       => __( 'Grid Post Columns', 'devstrap' ),
					'description' => __( 'Choose how many columns to use in grid posts', 'devstrap' ),
					'section'     => 'devstrapp_theme_layout_options',
					'settings'    => 'devstrapp_grid_post_columns',
					'type'        => 'select',
					'choices'     => array(
						'6' => '6',
						'4' => '4',
						'3' => '3',
						'2' => '2',
						'1' => '1',
					),
					'default'     => 6,
					'priority'    => '30',
					'transport'   => 'refresh',
				)
			) );

		// hook to auto-hide/show depending the devstrapp_posts_index_style option.
		$wp_customize->get_control( 'devstrapp_grid_post_columns' )->active_callback = 'is_grid_enabled';

	}
} // endif function_exists( 'devstrapp_theme_customize_register' ).
add_action( 'customize_register', 'devstrapp_theme_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'devstrapp_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function devstrapp_customize_preview_js() {
		wp_enqueue_script( 'devstrapp_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'devstrapp_customize_preview_js' );
