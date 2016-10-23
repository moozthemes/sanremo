<?php
/**
 * Custom author widget
 *
 * @package Sanremo
 */

class sanremo_recent_posts extends WP_Widget
{
	function __construct(){

		$widget_ops = array('classname' => 'sanremo-recent-posts','description' => esc_html__( "sanremo recent Posts Widget", 'sanremo') );
		parent::__construct('sanremo_recent_posts', esc_html__('Sanremo Recent Posts Widget','sanremo'), $widget_ops);
		}

		function widget($args , $instance) {
		extract($args);
		$title = isset($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'sanremo');
		$limit = isset($instance['limit']) ? $instance['limit'] : 5;

		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;

		/**
		* Widget Content
		*/
		?>

		<!-- recent posts -->
		<div class="widget-container">

			<?php

			$featured_args = array(
			'posts_per_page' => $limit ,
			'ignore_sticky_posts' => 1
			);

			$featured_query = new WP_Query($featured_args);

			if($featured_query->have_posts()) : while($featured_query->have_posts()) : $featured_query->the_post();

			?>

			<?php if(get_the_content() != '') : ?>

				<!-- post -->
				<div class="widget-post">

					<!-- image -->
					<div class="post-image <?php echo esc_attr(get_post_format()); ?>">

					<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php if(get_post_format() != 'quote') { echo the_post_thumbnail('thumbnail'); } ?>
					</a>

					</div> <!-- end post image -->

					<!-- content -->
					<div class="post-body">

						<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
						<div class="post-meta"><span><?php echo esc_attr(get_the_date('d. M , Y')); ?></span><span><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></span></div>

					</div><!-- end content -->

				</div><!-- end post -->

			<?php endif; ?>

			<?php

			endwhile; endif; wp_reset_query();

			?>

		</div> <!-- end widget container -->

		<?php

		echo $after_widget;
		}

	function form($instance) {

		if(!isset($instance['title'])) $instance['title'] = esc_html__('recent Posts', 'sanremo');
		if(!isset($instance['limit'])) $instance['limit'] = 5;

		?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','sanremo') ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php esc_html_e('Limit Posts Number', 'sanremo') ?></label>
			<input class="widefat" id="<?php $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo esc_attr($instance['limit']); ?>" />
		</p>

	<?php
	}
}
?>