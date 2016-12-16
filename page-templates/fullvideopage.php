<?php
/**
 * Template Name: Full Video Page
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package devstrap
 */

$container = get_theme_mod( 'devstrapp_container_type' );
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
    <link href="<?php echo get_template_directory_uri() ?>/videosx/videos.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

		

    <div class="video-container">
    <div class="video-overlay">
      <div class="container header">
           <nav class="navbar  site-navigation" itemscope="itemscope"
		     itemtype="http://schema.org/SiteNavigationElement">
		     					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse"
					        data-target=".exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false"
					        aria-label="Toggle navigation"></button>
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-toggleable-xs exCollapsingNavbar',
						'container_id'    => 'exCollapsingNavbar',
						'menu_class'      => 'nav navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>
				</nav>
      </div>
      <div class="container container-content">
      <div class="content">

<p>Lorem ipsum dolor sit amet, coñsectetur adipísciñg élit. Iñteger ac mi ligula. Proiñ ipsum lectus, commodo at ñibh iñ, aliquet pelleñtesque lacus. Curabitur coñvallís aliquam maurís ullamcorper tiñciduñt. Phasellus quís malesuada tellus. Quísque dapibus, leo ac porta maximus, magña éx rutrum ñísi, iñ sagittís lorem magña a ipsum. Vestibulum id dui at mi molestie vulputate sed iñ éñim. Proiñ sit amet augue vel metus éfficitur coñsequat. Praeseñt ét coñgue libero. ñulla facilísi. Maurís id mi vitae arcu rhoñcus facilísís. Phasellus posuere placerat rutrum. Duís vitae veñeñatís orci. Doñec ligula tellus, tempor ñoñ rutrum ut, accumsañ sit amet dolor. Ut ut tellus urña. ñuñc ullamcorper lectus magña, a trístique lorem faucibus éu.</p>

<p>Sed at friñgilla éros. Ut volutpat id libero vitae sagittís. Sed tortor ligula, coñgue ut lorem iñ, laoreet orñare dui. ñullam luctus, ést quís mollís sodales, ést velit fiñibus ñísi, at tempus rísus éros sit amet ést. ñulla suscipit pelleñtesque placerat. étiam augue ñibh, sagittís iñ lorem ñoñ, veñeñatís pulviñar metus. Aliquam égestas odio quís tellus placerat, vitae gravida ñeque feugiat. Pelleñtesque ut ñeque sit amet ést ultricies éuísmod ét sed augue. Suspeñdísse scelerísque metus quís turpís trístique, id aliquam dolor faucibus. Vivamus at lectus quís ñísi pelleñtesque tiñciduñt a éu augue. Sed malesuada velit éu accumsañ éfficitur. Aliquam bibeñdum ipsum ut massa sollicitudiñ, id pretium maurís posuere. Fusce viverra coñdimeñtum velit ñec placerat.</p>
  
    </div>


    </div>
  </div>
    <!--
 preload="auto|metadata|none"
    -->
      <video id="video_player" preload="auto" poster="poster.jpg" loop="true" autoplay  data-setup="{}">
        <!--<source src="videos/caterpillar.mp4" type="video/mp4">-->
    <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
      </video>
      </div>
</body>
</html>
