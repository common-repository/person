<?php
/**
 * @package Person
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Custom meta box for testimonial
 * 
 */
function person_testimonial_meta_box() {

	// Only add the box to the selected post types
	$screens 		= array();
	$post_types 	= get_post_types( array('public' => true) );

	foreach( $post_types as $post_type)
	{
		if( get_option('_person_testimonial_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens, $post_type );
		}
	}

	foreach ( $screens as $screen ) 
	{
		add_meta_box(
			'person_testimonial',
			'Testimonial',
			'person_testimonial_render_meta_box',
			$screen
		);
	}

}
add_action( 'add_meta_boxes', 'person_testimonial_meta_box' );


/**
 * 
 * @since  		1.0.0
 * 
 * Render the testimonial meta box
 * 
 */
function person_testimonial_render_meta_box( $post ) {


	$person_testimonial_short = get_post_meta( $post->ID, '_person_testimonial_short', true );
	
	?>
		<div class="person_testimonial cf">
			<label class="screen-reader-text" for="person_testimonial_short">Testimonial</label>
			<textarea type="text" id="person_testimonial_short" name="person_testimonial_short"><?php echo $person_testimonial_short; ?></textarea>
		</div>

	<?php

	wp_nonce_field( 'submit_person_testimonial', 'person_testimonial_nonce' ); 
}


/**
 * 
 * @since  		1.0.0
 * 
 * Handle the person meta box post data
 * 
 */
function person_testimonial_handle_post_data( $post_id )
{
	$nonce_key							= 'person_testimonial_nonce';
	$nonce_action						= 'submit_person_testimonial';

	// If it is just a revision don't worry about it
	if ( wp_is_post_revision( $post_id ) )
		return $post_id;

	// Check it's not an auto save routine
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;

	// Verify the nonce to defend against XSS
	if ( !isset( $_POST[$nonce_key] ) || !wp_verify_nonce( $_POST[$nonce_key], $nonce_action ) )
		return $post_id;

	// Check that the current user has permission to edit the post
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$person_testimonial_short = isset( $_POST['person_testimonial_short'] ) ?  esc_textarea( $_POST['person_testimonial_short'] )	: null;

	if( !empty( $person_testimonial_short ) )	update_post_meta( $post_id, '_person_testimonial_short', 	$person_testimonial_short );

}
add_action( 'save_post', 'person_testimonial_handle_post_data' );
?>