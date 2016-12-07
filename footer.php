<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package devstrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'devstrapp_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon" role="contentinfo">

					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/',
						'devstrap' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'devstrap' ),
						'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'devstrap' ), $the_theme->get( 'Name' ),
						'<a href="http://devstrap.com/">devstrap.com</a>' ); ?>
						(<?php printf( __( 'Version: %1$s', 'devstrap' ), $the_theme->get( 'Version' ) ); ?>)
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
