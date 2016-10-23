<?php
/**
 * The Sidebar widget area for footer.
 *
 * @package Sanremo
 */
?>

	<?php

	// If footer sidebars do not have widget let's by pass.
	if ( ! is_active_sidebar( 'footer-wide-widget' )) return;

	// If footer have widgets
	?>

	<div class="footer-wide-widgets">

		<!-- left widget -->
		<?php if ( is_active_sidebar( 'footer-wide-widget' ) ) : ?>

				<?php dynamic_sidebar( 'footer-wide-widget' ); ?>

		<?php endif; ?>

	</div>