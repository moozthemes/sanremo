<?php
/**
 * The template used for displaying content single
 *
 * @package Sanremo
 */
?>

				</div><!-- /.columns -->

			</div><!-- /.row -->
		</section><!-- /.container -->
		</div><!-- /.container -->

		<!-- back to top button -->
		<p id="back-top" style="display: block;">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>

		<footer class="mz-footer">

			<!-- footer widgets -->
			<div class="container footer-inner">
				<div class="row">
					<?php get_sidebar( 'footer' ); ?>
				</div>
			</div>

			<div class="footer-wide">
					<?php get_sidebar( 'footer-wide' ); ?>
			</div>

			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<div class="footer-menu">
				<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'sanremo' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			</div>
			<?php endif; ?>


			<div class="footer-bottom">
				<?php do_action('sanremo_footer'); ?>
			</div>
		</footer>

		<?php wp_footer(); ?>
		
	</body>
</html>