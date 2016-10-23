<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Sanremo
 */

/*
 * sanremo Slider
 */
if ( ! function_exists( 'sanremo_slider' ) ) :

/*
 * Featured image slider, displayed on front page for static page and blog
 */
function sanremo_slider() {

	if ( ( is_home() || is_front_page() ) && true == get_theme_mod('show_sanremo_slider') ) {

		echo '<section><div class="mz-slider ot-slider">';

		$count = 4;
		$slidecat = get_theme_mod( 'sanremo_slider_cat' );
		$active_slide = "active";

		$query = new WP_Query( array( 'cat' => $slidecat,'posts_per_page' => $count ) );

		if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post();

				echo '<div><div class="ot-slider-item">';

				if ( (function_exists( 'has_post_thumbnail' )) && ( has_post_thumbnail() ) ) :
					echo get_the_post_thumbnail( get_the_ID(), 'sanremo-slider' );
				endif;

				echo '<div class="ot-slide-title">';
				if ( get_the_title() != '' ) echo '<a href="' . esc_url(get_permalink()) . '"><h2 class="entry-title">'. get_the_title().'</h2></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				$active_slide = "";

			endwhile; wp_reset_query();
		endif;

		echo '</div></section>';
	}

}
endif;

/*
 * Add boostrap classes fot tables
 */
add_filter( 'the_content', 'sanremo_add_custom_table_class' );

function sanremo_add_custom_table_class( $content ) {
	return str_replace( '<table>', '<table class="table table-hover">', $content );
}