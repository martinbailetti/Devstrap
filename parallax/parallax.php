<?php

 


add_action( 'init', 'parallax_create_post_type' );

function parallax_create_post_type() {
  register_post_type( 'parallax',
    array(

    'exclude_from_search' => true, // the important line here!
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true,
    'hierarchical' => false,
    'publicly_queryable' => true,

      'labels' => array(
        'name' => __( 'Parallax' ),
        'singular_name' => __( 'Parallax' ),
        'add_new' => __( 'Añadir Parallax' ),
        'add_new_item' => __( 'Añadir un nuevo Parallax' ),
        'view_item' => __( 'Vista Previa' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
   if ( get_option('plugin_settings_have_changed') == true ) {
    flush_rewrite_rules();
  }
}

//runs only when the theme is set up
function parallax_flush_rules(){
  //defines the post type so the rules can be flushed.
  parallax_create_post_type();

  //and flush the rules.
  flush_rewrite_rules();
}
add_action('after_theme_switch', 'parallax_flush_rules');


/*
 * Verifica si existe el ACF   
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
  add_action( 'admin_notices', 'parallax_acf_notice' );
}else{


	//Importa la configuración ACF
	include_once("acf_import.php");

}

function parallax_acf_notice() {
  ?>
<div id="message" class="updated notice is-dismissible"><p>Sliders requiere la instalación del plugin <strong>Advanced Custom Fields</strong>.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Descartar este aviso.</span></button></div>
  <?php
}




   function parallax_init($parallaxID) {
//xPosition - Horizontal position of the element
  //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
  //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
      parallax_add_html($parallaxID);
      parallax_add_js($parallaxID);

   }

   function parallax_add_js($parallaxID) {
 
      echo "<script>";

      echo "jQuery(document).ready(function($){";

      echo "$('#parallax_".$parallaxID."').parallax('".get_field("parallax_position", $parallaxID)."%', 0, " .get_field("parallax_inertia", $parallaxID).");";

      $childs = get_field("parallax_childs", $parallaxID);

      for($i=0; $i < count($childs); $i++){

          echo "$('#parallax_".$parallaxID."_child_".$i."').parallax('".$childs[$i]["parallax_position"]."%', ".$childs[$i]["parallax_position_vertical"].", ".$childs[$i]["parallax_inertia"].");";

      }

      echo "});";

      echo "</script>";
  }

   function parallax_add_html($parallaxID) {
 ?>

  <div class="parallax_container"  style="min-height:<?php echo get_field("parallax_height", $parallaxID) ?>px">
  <div class="parallax_layer" id="parallax_<?php echo $parallaxID ?>" style="background-image: url(<?php echo get_field("parallax_image", $parallaxID) ?>);height: <?php echo get_field("parallax_height", $parallaxID) ?>px;color: white;">
    <div class="parallax_content">
<?php
      $childs = get_field("parallax_childs", $parallaxID);
      for($i=0; $i < count($childs); $i++){

        $height =  $childs[$i]["parallax_height"];
        if(empty($childs[$i]["parallax_height"])){

          $height = "auto";

        }else{

          $height = $childs[$i]["parallax_height"]."px";


        }
?>
    <div id="parallax_<?php echo $parallaxID."_child_".$i ?>" class="parallax_layer_child" style="background-image: url(<?php echo $childs[$i]["parallax_image"] ?>);background-size: auto <?php echo $height ?>;height: <?php echo get_field("parallax_height", $parallaxID) ?>px;color: white;width:100%;z-index:20<?php echo $i ?>"></div>
<?php
      }
?>

<?php 
  
  $parallax_title = get_field("parallax_title", $parallaxID);
  $parallax_text = get_field("parallax_text", $parallaxID);
  $parallax_content_position = get_field("parallax_content_position", $parallaxID);
  $parallax_content_width = get_field("parallax_content_width", $parallaxID);
  $parallax_content_padding_top = get_field("parallax_content_padding_top", $parallaxID);

  if(!empty($parallax_title) || !empty($parallax_text)){

      $css = "padding-top:".$parallax_content_padding_top."px;width:".$parallax_content_width."px;z-index:300;";
      if($parallax_content_position==1){
        $css .= "float:right;";
      }else if($parallax_content_position==2){
        $css .= "float:left;";
      }else{
        $css .= "margin-left:auto;margin-right:auto;";
      }

      echo '<div class="parallax_content_layer" style="'.$css.'">';

  }

  if(!empty($parallax_title)){

      echo '<h2>'.$parallax_title.'</h2>';

  }

  if(!empty($parallax_text)){

      echo '<div class="parallax_text">'.$parallax_text.'</div>';

  }

  if(!empty($parallax_title) || !empty($parallax_text)){

      echo '</div>';

  }
 ?>
    
      </div> <!--.parallax_content-->

      
  </div> <!--.parallax_layer-->
  </div> <!--.parallax_container-->
<?php
  }
