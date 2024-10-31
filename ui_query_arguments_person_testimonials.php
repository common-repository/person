<?php
/**
 * @package Person
 */

/**
 * 
 * @since  		1.1.0
 * 
 * Return loop query args
 *
 * @param 		array 		$args 		argumens to define filter	
 * @return 		array 		arguments to filter wp_query
 * 
 */
function person_testimonials_query_arguements( $args = array() ) 
{
	$defaults = array(
		'post_type'					=> 'person_testimony'				// [ post | page | custom post type | array() ]			
	);

	$r = array_merge( $defaults, $args );

	return person_query_arguements( $r );
}

?>