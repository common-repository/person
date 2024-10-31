<?php
/**
 * @package Person
 */

/**
 * 
 * @since  		1.0.0
 * 
 * 
 * Add scripts and styles to the admin boxes
 * 
 */
function person_enqueue_scripts( $hook ) 
{
	global $post;
	$screens 	= array();
	$post_types = get_post_types( array('public' => true) );
	foreach( $post_types as $post_type)
	{
		if( get_option('_person_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens , $post_type );
		}

		if( get_option('_person_related_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens , $post_type );
		}

		if( get_option('_person_testimonial_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens , $post_type );
		}
	}

	if ( $hook == 'post-new.php' || $hook == 'post.php' || $hook == 'settings_page_person-settings' ) 
	{
		if ( $hook == 'settings_page_person-settings' || in_array( $post->post_type, $screens ) ) 
		{
			// Custom styles
			wp_enqueue_style( 'person_admin_styles', plugins_url( 'assets/css/styles.css' , __FILE__ ) );

			// Custom scripts
			wp_enqueue_script( 'person_admin_scripts', plugins_url( 'assets/js/scripts.min.js' , __FILE__ ), array( 'wpdialogs-popup', 'wplink' ), '1.0', true );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'person_enqueue_scripts' );
?>