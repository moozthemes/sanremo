<?php
/**
 * Custom author widget
 *
 * @package Sanremo
 */

class sanremo_social_widget extends WP_Widget
{

	function __construct(){

	$widget_ops = array('classname' => 'sanremo-social','description' => esc_html__( "sanremo Social Widget" ,'sanremo') );
	parent::__construct('sanremo-social', esc_html__('Sanremo Social Widget','sanremo'), $widget_ops);

	}

	/**
	* Helper function that holds widget fields
	* Array is used in update and form functions
	*/

	private function widget_fields() {
	$fields = array(
		// Title
		'widget_title' => array(
			'sanremo_widgets_name'      => 'widget_title',
			'sanremo_widgets_title'     => __( 'Title', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),

		// Other fields
		'twitter' => array (
			'sanremo_widgets_name'      => 'twitter',
			'sanremo_widgets_title'     => __( 'Twitter', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'facebook' => array (
			'sanremo_widgets_name'      => 'facebook',
			'sanremo_widgets_title'     => __( 'Facebook', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'linkedin' => array (
			'sanremo_widgets_name'      => 'linkedin',
			'sanremo_widgets_title'     => __( 'LinkedIn', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'google' => array (
			'sanremo_widgets_name'      => 'google',
			'sanremo_widgets_title'     => __( 'Google+', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'pinterest' => array (
			'sanremo_widgets_name'      => 'pinterest',
			'sanremo_widgets_title'     => __( 'Pinterest', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'youtube' => array (
			'sanremo_widgets_name'      => 'youtube',
			'sanremo_widgets_title'     => __( 'YouTube', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'vimeo' => array (
			'sanremo_widgets_name'      => 'vimeo',
			'sanremo_widgets_title'     => __( 'Vimeo', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'flickr' => array (
			'sanremo_widgets_name'      => 'flickr',
			'sanremo_widgets_title'     => __( 'Flickr', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'dribbble' => array (
			'sanremo_widgets_name'      => 'dribbble',
			'sanremo_widgets_title'     => __( 'Dribbble', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'tumblr' => array (
			'sanremo_widgets_name'      => 'tumblr',
			'sanremo_widgets_title'     => __( 'Tumblr', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'instagram' => array (
			'sanremo_widgets_name'      => 'instagram',
			'sanremo_widgets_title'     => __( 'Instagram', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'lastfm' => array (
			'sanremo_widgets_name'      => 'lastfm',
			'sanremo_widgets_title'     => __( 'Last.fm', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
		'soundcloud' => array (
			'sanremo_widgets_name'      => 'soundcloud',
			'sanremo_widgets_title'     => __( 'SoundCloud', 'sanremo' ),
			'sanremo_widgets_field_type'    => 'text'
		),
	);

	return $fields;

	}

	function widget($args , $instance) {

		extract($args);

		if(!isset($instance['title']) ) $instance['title']='';
		$widget_title = apply_filters('widget_title', $instance['title'] );

		echo $before_widget;

		// Show title
		if( isset( $widget_title ) ) {
			echo $before_title . $widget_title . $after_title;
		}

		/**
		* Widget Content
		*/
		?>

		<div class="widget-container">

			<?php
			echo '<div class="widget-socials">';

			// Loop through fields
			$widget_fields = $this->widget_fields();
			foreach( $widget_fields as $widget_field ) {

				// Make array elements available as variables
				extract( $widget_field );

				// Check if field has value and skip title field
				unset( $sanremo_widgets_field_value );

				if( isset( $instance[$sanremo_widgets_name] ) && 'widget_title' != $sanremo_widgets_name ) { 

					$sanremo_widgets_field_value = esc_url( $instance[$sanremo_widgets_name] ); 

					if( '' != $sanremo_widgets_field_value ) {  ?>

					<a href="<?php echo $sanremo_widgets_field_value; ?>" title="<?php echo esc_attr($sanremo_widgets_title); ?>"><i class="fa fa-<?php echo esc_attr($sanremo_widgets_name); ?>"></i></a>

				<?php }
				}
			}
			echo '</div>';
			?>

		</div>

		<?php

		echo $after_widget;

	}

	/**
	* Update the widget settings.
	*/
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_html( $new_instance['title'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? esc_html( $new_instance['rss'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? esc_html( $new_instance['facebook'] ) : '';
		$instance['google'] = ( ! empty( $new_instance['google'] ) ) ? esc_html( $new_instance['google'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? esc_html( $new_instance['twitter'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? esc_html( $new_instance['pinterest'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? esc_html( $new_instance['instagram'] ) : '';
		$instance['tumblr'] = ( ! empty( $new_instance['tumblr'] ) ) ? esc_html( $new_instance['tumblr'] ) : '';
		$instance['lastfm'] = ( ! empty( $new_instance['lastfm'] ) ) ? esc_html( $new_instance['lastfm'] ) : '';
		$instance['soundcloud'] = ( ! empty( $new_instance['soundcloud'] ) ) ? esc_html( $new_instance['soundcloud'] ) : '';
		$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? esc_html( $new_instance['dribbble'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? esc_html( $new_instance['youtube'] ) : '';
		$instance['flickr'] = ( ! empty( $new_instance['flickr'] ) ) ? esc_html( $new_instance['flickr'] ) : '';

		return $instance;

	}


	function form( $instance ) {

	/* Set up some default widget settings. */
	$defaults = array( 'title' => __('Follow me','sanremo'), 'rss' => '', 'facebook' => '', 'twitter' => '', 
						'google' => '', 'pinterest' => '', 'instagram' => '', 'tumblr' => '', 'lastfm' => '',
						'soundcloud' => '', 'dribbble' => '', 'youtube' => '', 'flickr' => '');
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>

	<p><?php _e('Enter full URL. If you don\'t want to display element, leave it\'s URL field empty.','sanremo') ?></p>

	<!-- Facebook URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php _e('URL address of your Facebook profile or page','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" type="text" value="<?php echo esc_attr($instance['facebook']); ?>" />
	</p>

	<!-- Twitter URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php _e('URL address of your Twitter profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" type="text" value="<?php echo esc_attr($instance['twitter']); ?>" />
	</p>

	<!-- Google Plus URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'google' )); ?>"><?php _e('URL address of your Google+ profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google' )); ?>" type="text" value="<?php echo esc_attr($instance['google']); ?>" />
	</p>    

	<!-- Pinterest URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php _e('URL address of your Pinterest profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" type="text" value="<?php echo esc_attr($instance['pinterest']); ?>" />
	</p>

	<!-- Instagram URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php _e('URL address of your Instagram profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" type="text" value="<?php echo esc_attr($instance['instagram']); ?>" />
	</p>

	<!-- Tumblr URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>"><?php _e('URL address of your Tumblr profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' )); ?>" type="text" value="<?php echo esc_attr($instance['tumblr']); ?>" />
	</p>

	<!-- Dribbble URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>"><?php _e('URL address of your Dribbble profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble' )); ?>" type="text" value="<?php echo esc_attr($instance['dribbble']); ?>" />
	</p>

	<!-- Last FM URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'lastfm' )); ?>"><?php _e('URL address of your Last FM profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'lastfm' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'lastfm' )); ?>" type="text" value="<?php echo esc_attr($instance['lastfm']); ?>" />
	</p>

	<!-- Soundcloud URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>"><?php _e('URL address of your Soundcloud profile','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud' )); ?>" type="text" value="<?php echo esc_attr($instance['soundcloud']); ?>" />
	</p>

	<!-- YouTube URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php _e('URL address of your YouTube channel','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" type="text" value="<?php echo esc_attr($instance['youtube']); ?>" />
	</p>

	<!-- Flickr URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'flickr' )); ?>"><?php _e('URL address of your Flickr profile page','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'flickr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'flickr' )); ?>" type="text" value="<?php echo esc_attr($instance['flickr']); ?>" />
	</p>

	<!-- RSS URL -->
	<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php _e('URL address of your RSS feed','sanremo') ?>:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" type="text" value="<?php echo esc_attr($instance['rss']); ?>" style="width:90%;" />
	</p>

	<?php
	}

}