<?php
 
/*********************************************************************************
Widget
*********************************************************************************/
class FiveEmo_WP_Widget extends WP_Widget {
	
	//widget constructor function
	function __construct() {
		$widget_options = array (
			'classname' => 'FiveEmo_WP_Widget',
			'description' => 'Displays 5 Emotions as a social button or a frame.'
		);
		parent::__construct( 'FiveEmo_WP_Widget', '5 Emotions', $widget_options );
	}
	
	//function to output the widget form
	function form( $instance ) {
		$objectid = ! empty( $instance['fiveemo_objectid'] ) ? $instance['fiveemo_objectid'] : '';
		$mode = ! empty( $instance['fiveemo_mode'] ) ? $instance['fiveemo_mode'] : '';
	?>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'fiveemo_objectid'); ?>">ObjectID:</label>
		<input class="widefat" type="text" placeholder="Object ID" id="<?php echo $this->get_field_id( 'fiveemo_objectid' ); ?>" name="<?php echo $this->get_field_name( 'fiveemo_objectid' ); ?>" value="<?php echo esc_attr( $objectid ); ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'fiveemo_mode'); ?>">Mode:</label>
		<input class="widefat" type="text" placeholder="mode: 'popup' or 'iframe' or 'kiosk' " id="<?php echo $this->get_field_id( 'fiveemo_mode' ); ?>" name="<?php echo $this->get_field_name( 'fiveemo_mode' ); ?>" value="<?php echo esc_attr( $mode ); ?>" />
	</p>
	
	<?php }
	
	//function to define the data saved by the widget
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['fiveemo_objectid'] = strip_tags( $new_instance['fiveemo_objectid'] );
		$instance['fiveemo_mode'] = strip_tags( $new_instance['fiveemo_mode'] );
		return $instance;
	}
	
	//function to display the widget in the site
	function widget( $args, $instance ) {
		
		//define variables
		$objectid = apply_filters( 'widget_title', $instance['fiveemo_objectid'] );

		//output code
		echo $args['before_widget'];
		
		echo $this->write_content($instance);

		echo $args['after_widget'];
	}

	function write_content($instance) {

		$objectid = $instance['fiveemo_objectid'];
		$mode = $instance['fiveemo_mode'];
		$width = $instance['fiveemo_width'];
		$height = $instance['fiveemo_height'];
		if (!isset($objectid) || empty($objectid)) {
			$objectid = 'emotions';
		}

		$params = [ 'objectid' => $objectid ];
		$params['width'] = '100%';
		$params['height'] = '100%';
		$params['mode'] = 'iframe';
		if (isset($mode) && !empty($mode)) {
			$params['mode'] = $mode;
		}
		if (isset($width) && !empty($width)) {
			$params['width'] = $width;
		}
		if (isset($height) && !empty($height)) {
			$params['height'] = $height;
		}

		$params = json_encode($params, JSON_FORCE_OBJECT);

		$ret = "<div id='fiveemo_id'></div><script type='text/javascript'>function initFiveEmo() {
			var fiveemo = new FiveEmo( ". $params ." );
		}</script>";

		return $ret;
	}

}

function five_emo_widget_init() {
	register_widget( 'FiveEmo_WP_Widget' );
}

add_action( 'widgets_init', 'five_emo_widget_init' );

?>