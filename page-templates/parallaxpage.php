<?php
/**
 * Template Name: Parallax Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package devstrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
	      content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
    <link href="<?php echo get_template_directory_uri() ?>/parallax/parallax.css" rel="stylesheet">
	<script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/parallax/js/jquery.scrollTo-1.4.2-min.js?ver=4.6.1'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/parallax/js/jquery.localscroll-1.2.7-min.js?ver=4.6.1'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/parallax/js/jquery.parallax-1.1.3.js?ver=4.6.1'></script>
</head>

<body <?php body_class(); ?>>


					<?php while ( have_posts() ) : the_post(); ?>

						<?php parallax_init(get_field("parallax")); ?>

					<?php endwhile; // end of the loop. ?>

				

</body>
</html>
