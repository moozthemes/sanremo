<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Sanremo
 */
?>
				</div>

				<?php
				/* read layout options */
				$show_sidebar = true;
				if( is_singular() && ( get_post_meta($post->ID, 'site_layout', true) ) ){
					if( get_post_meta($post->ID, 'site_layout', true) == 'no-sidebar' || get_post_meta($post->ID, 'site_layout', true) == 'ot-full-width' ) {
						$show_sidebar = false;               
					}
				} elseif( get_theme_mod( 'sanremo_sidebar_position' ) == "no-sidebar" ||  get_theme_mod( 'sanremo_sidebar_position' ) == "ot-full-width" ) {
					$show_sidebar = false;
				}
				?>

			<?php if( $show_sidebar ): ?>            

				<div class="col-md-4 sidebar-gutter">

				<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
					<!-- sidebar-widget -->

					<div id="search" class="widget widget_search">
						<?php get_search_form(); ?>
					</div>

					<div id="archives" class="widget">
						<h3 class="widget-title"><?php esc_html_e( 'Archives', 'sanremo' ); ?></h3>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
					</div>

				<?php endif; /* dinamic_sidebar */ ?>

				</div>

			<?php endif; /* if is_sidebar */