<?php
/**
 * Template Name: Video Page 2
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package devstrap
 */

get_header();
$container = get_theme_mod( 'devstrapp_container_type' );
?>

<link href="<?php echo get_template_directory_uri() ?>/videosx/videos.css" rel="stylesheet">
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


    <div class="video-container">
    <div class="video-overlay">
  
  
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

</article><!-- #post-## -->

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
