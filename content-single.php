<?php
/**
 * The template used for displaying content single
 *
 * @package Sanremo
 */
?>

<article  id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<div class="blog-post-image">

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php echo get_the_post_thumbnail( get_the_ID(), 'sanremo-thumbnail' ); ?>
		</a>
	<?php endif; ?>
		
	</div>
	<div class="blog-post-body">
	<div class="post-cats"><?php the_category( ' ' ); ?></div>
	<h1 class="entry-title"><?php the_title(); ?></h1>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-date">
			<span><?php the_author_posts_link(); ?></span>
			<span><?php echo get_the_date(); ?></span>
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
	<?php endif; ?>
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
	<?php if(has_tag()) : ?>
	<!-- tags -->
	<div class="mz-entry-tags">
		<span>
			<i class="fa fa-tags"></i>
		</span>
		<?php
			$tags = get_the_tags(get_the_ID());
			foreach($tags as $tag){
				echo '<a href="'.esc_url(get_tag_link($tag->term_id)).'">'.$tag->name.'</a> ';
			}
		?>

	</div>
	<!-- end tags -->
	<?php endif; ?>

	</div>
</article>
