<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sanremo
 */
?>

<article  id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<div class="blog-post-image">

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php echo get_the_post_thumbnail( get_the_ID(), 'sanremo-slider' ); ?>
		</a>
	<?php endif; ?>
		
	</div>
	<div class="blog-post-body">
	<div class="post-cats"><?php the_category( ' ' ); ?></div>
	<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="post-date">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'sanremo' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</div>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sanremo' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'sanremo' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
		</div>
	</div>
</article>