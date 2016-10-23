<?php
/**
 * The template for displaying pages.
 *
 * @package sanremo
 */

get_header(); ?>

	<section class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main>
	</section>

<?php
get_sidebar();

get_footer();