<?php
/**
 *
 * @package sanremo
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
<!-- Brand and toggle get grouped for better mobile display --> 
  <div class="navbar-header"> 
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
	  <span class="sr-only"><?php __( 'Toggle navigation', 'sanremo' ); ?></span> 
	  <span class="icon-bar"></span> 
	  <span class="icon-bar"></span> 
	  <span class="icon-bar"></span> 
	</button> 
  </div> 

<?php sanremo_header_menu(); // main navigation ?>

</div>
</nav>

	<div class="container">

		<header>
			<?php sanremo_the_custom_logo(); ?>
		</header>

		<?php sanremo_slider(); ?>

	</div>

	<?php
		global $post;                            
		if( is_singular() && get_post_meta($post->ID, 'site_layout', true) ){
			$layout_class = get_post_meta($post->ID, 'site_layout', true);
		}
		else{
			$layout_class = get_theme_mod( 'sanremo_sidebar_position' );
		}
		if ($layout_class == '') $layout_class = "ot-sidebar-right";
	?>

		<div class="container">
		<section>
			<div class="row">
				<div class="<?php echo sanremo_content_bootstrap_classes(); ?> <?php echo $layout_class; ?>">
