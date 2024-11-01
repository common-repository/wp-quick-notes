<?php 

class Mhpc_Quick_Notes_Widget extends WP_Widget{
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'mhpc_quick_notes_widget',
			'description' => 'Write down notes while listing to podcats.',
		);
		parent::__construct( 'mhpc_quick_notes_widget', 'Quick Notes', $widget_ops );
	}
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		// Display Editor
		$content = '';
		$editor_id = 'quicknoteseditor';
		$settings = array(  'textarea_name' => 'description',
                 'quicktags' => false,
                 'media_buttons' => false,
                 'textarea_rows' => 10,
                 'tinymce'=> array(
                 'toolbar1'=> 'bold,italic,underline,bullist,numlist,forecolor,undo,redo'
                 )
		);

		wp_editor( $content, $editor_id, $settings );
		?>
		<button class="mhpc-quick-notes-btn-print" id="mhpc-quick-notes-btn-print" onclick="mhpcPrintQuickNotesContent()">Print</button>
		<?php
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'My Notes', 'mhpc-quick-notes' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'mhpc-quick-notes' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}