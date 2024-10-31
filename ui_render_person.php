<?php
/**
 * @package Person
 */


/**
 * 
 * @since  		1.1.0
 * 
 * Render Bootstrap
 * 
 */
function person_render_bootstrap( $post_id, $args = array(), $version = '3' )
{
	// Future proofing, set the version of Bootstrap we wish to render
	// if( $version == '3' ){ // Render here }

	person_render_bootstrap_3( $post_id, $args );
}


/**
 * 
 * @since  		1.1.0
 * 
 * Render bootstrap 3
 *
 * @param 		int 		$post_id 	the post id to render
 * @param 		array 		$args 		arguments to define render
 * 
 */
function person_render_bootstrap_3( $post_id, $args = array() ) 
{
	$defaults = array(
		'class_address_wrapper'			=> '',						// The class of the address wrapper
		'class_content_wrapper' 		=> '',						// The class of the content wrapper
		'class_header'					=> '',						// The class of the header tag
		'class_image_wrapper' 			=> 'pull-right',			// The class of the image wrapper
		'class_link_wrapper' 			=> 'pull-right',			// The class of the map link wrapper
		'class_meta_label_wrapper'		=> 'col-md-2',				// The class of the label wrapper
		'class_wrapper'					=> 'location__wrapper',		// The class of the location wrapper
		'class_meta_row'				=> 'row',					// The class of the row
		'class_meta_value_wrapper'		=> 'col-md-10',				// The class of the value wrapper
		'class_map_wrapper'				=> 'location__map',			// The class of the map wrapper
		'class_title'					=> 'location__title',		// The class of the title
		'id'							=> 'person',				// If you want to have multiple renders, you will want to change the id each time
		'image-size'					=> 'medium',				// [ thumbnail | medium | large | full | custom ]
		'post_type'						=> 'position',				// [ post | page | custom post type | array() ]			
		'show_address'					=> true,					// [ true | false ] - show the address in the list
		'show_content'					=> true,					// [ true | false ] - show the post content in the list
		'show_email'					=> true,					// [ true | false ] - show the email in the list
		'show_facebook'					=> true,					// [ true | false ] - show facebook in the list
		'show_first_name'				=> true,					// [ true | false ] - show first name in the list
		'show_google'					=> true,					// [ true | false ] - show google+ in the list
		'show_gravatar'					=> true,					// [ true | false ] - show gravatar in the list
		'show_image'					=> true, 					// [ true | false ] - show images in the list
		'show_job_title'				=> true,					// [ true | false ] - show job title in the list
		'show_last_name'				=> true,					// [ true | false ] - show job last name in the list
		'show_link'						=> true,					// [ true | false ] - show the larger map link in the lsit
		'show_linkedin'					=> true,					// [ true | false ] - show linkedin in the list
		'show_middle_names'				=> true,					// [ true | false ] - show middle names in the list
		'show_name'						=> true,					// [ true | false ] - show the title
		'show_organisation'				=> true,					// [ true | false ] - show organisation in the list
		'show_post_code'				=> true,					// [ true | false ] - show the post code
		'show_post_nominal_letters'		=> true,					// [ true | false ] - show post nominal letters in the list
		'show_telephone'				=> true,					// [ true | false ] - show the telephone number
		'show_title'					=> true,					// [ true | false ] - show title in the list
		'show_twitter'					=> true,					// [ true | false ] - show twitter in the list
		'show_website'					=> true,					// [ true | false ] - show the website url in the list
		'tag_meta_label_wrapper_close' 	=> '</strong></p>',			// The tag(s) you wish to close the label with
		'tag_meta_label_wrapper_open' 	=> '<p><strong>',			// The tag(s) you wish to open the label with
		'tag_meta_value_wrapper_close' 	=> '</p>',					// The tag(s) you wish to close the value with
		'tag_meta_value_wrapper_open' 	=> '<p>',					// The tag(s) you wish to open the value with
		'title_format'					=> 'display',				// [ display | title ] - use the post type title, or the display name, by default the display will be used and will fall back to the title
	);

	$r 											= array_merge( $defaults, $args );
	$person 									= get_post( $post_id );
	$post_thumbnail_id 							= get_post_thumbnail_id( $post_id );

	$person_title 								= get_post_meta( $person->ID, '_person_title', true );
	$person_first_name 							= get_post_meta( $person->ID, '_person_first_name', true );
	$person_last_name 							= get_post_meta( $person->ID, '_person_last_name', true );
	$person_middle_names 						= get_post_meta( $person->ID, '_person_middle_names', true );
	$person_post_nominal_letters 				= get_post_meta( $person->ID, '_person_post_nominal_letters', true );
	$person_name 								= get_post_meta( $person->ID, '_person_name', true );
	$person_job_title 							= get_post_meta( $person->ID, '_person_job_title', true );
	$person_organisation 						= get_post_meta( $person->ID, '_person_organisation', true );
	$person_email 								= get_post_meta( $person->ID, '_person_email', true );
	$person_gravatar_src 						= get_post_meta( $person->ID, '_person_gravatar_src', true );
	$person_website 							= get_post_meta( $person->ID, '_person_website', true );
	$person_telephone 							= get_post_meta( $person->ID, '_person_telephone', true );
	$person_twitter 							= get_post_meta( $person->ID, '_person_twitter', true );
	$person_facebook 							= get_post_meta( $person->ID, '_person_facebook', true );
	$person_google 								= get_post_meta( $person->ID, '_person_google', true );
	$person_linkedin 							= get_post_meta( $person->ID, '_person_linkedin', true );
	$person_address 							= get_post_meta( $person->ID, '_person_address', true );
	$person_post_code 							= get_post_meta( $person->ID, '_person_post_code', true );
	$person_link_type 							= get_post_meta( $person->ID, '_person_link_type', true );
	$person_related_internal_type 				= get_post_meta( $person->ID, '_person_related_internal_type', true );
	$person_related_internal 					= get_post_meta( $person->ID, '_person_related_internal', true );
	$person_related_external 					= get_post_meta( $person->ID, '_person_related_external', true );
	$person_related_opens_in_new_window 		= get_post_meta( $person->ID, '_person_related_opens_in_new_window', true );
	$person_link 								= null;

	$person_show_title 							= get_option( '_person_show_title' );
	$person_show_first_name 					= get_option( '_person_show_first_name' );
	$person_show_last_name 						= get_option( '_person_show_last_name' );
	$person_show_middle_names 					= get_option( '_person_show_middle_names' );
	$person_show_post_nominal_letters 			= get_option( '_person_show_post_nominal_letters' );
	$person_show_name 							= get_option( '_person_show_name' );				
	$person_show_job_title 						= get_option( '_person_show_job_title' );
	$person_show_organisation 					= get_option( '_person_show_organisation' );
	$person_show_email 							= get_option( '_person_show_email' );			
	$person_show_gravatar_src 					= get_option( '_person_show_gravatar_src' );
	$person_show_website 						= get_option( '_person_show_website' );			
	$person_show_telephone 						= get_option( '_person_show_telephone' );
	$person_show_twitter 						= get_option( '_person_show_twitter' );
	$person_show_facebook 						= get_option( '_person_show_facebook' );
	$person_show_google 						= get_option( '_person_show_google' );	
	$person_show_linkedin 						= get_option( '_person_show_linkedin' );
	$person_show_address 						= get_option( '_person_show_address' );
	$person_show_post_code 						= get_option( '_person_show_post_code' );
	$person_show_link 							= get_option( '_person_show_link' );

	if( $person_show_title 						!= 'true' 	|| !$r['show_title'] ) 						$person_title 					= null;
	if( $person_show_first_name  				!= 'true' 	|| !$r['show_first_name'] ) 				$person_first_name 				= null;
	if( $person_show_last_name 					!= 'true' 	|| !$r['show_last_name'] ) 					$person_last_name 				= null;
	if( $person_show_middle_names 				!= 'true' 	|| !$r['show_middle_names'] ) 				$person_middle_names 			= null;
	if( $person_show_post_nominal_letters 		!= 'true' 	|| !$r['show_post_nominal_letters'] ) 		$person_post_nominal_letters 	= null;
	if( $person_show_name 						!= 'true' 	|| !$r['show_name'] ) 						$person_name 					= null;
	if( $person_show_job_title  				!= 'true' 	|| !$r['show_job_title'] ) 					$person_job_title  				= null;
	if( $person_show_organisation				!= 'true' 	|| !$r['show_organisation'] ) 				$person_organisation			= null;
	if( $person_show_email 						!= 'true' 	|| !$r['show_email'] ) 						$person_email 					= null;
	if( $person_show_gravatar_src				!= 'true' 	|| !$r['show_gravatar_src'] ) 				$person_gravatar				= null;
	if( $person_show_website 					!= 'true' 	|| !$r['show_website'] ) 					$person_website 				= null;
	if( $person_show_telephone 					!= 'true' 	|| !$r['show_telephone'] )	 				$person_telephone 				= null;
	if( $person_show_twitter 					!= 'true' 	|| !$r['show_twitter'] ) 					$person_twitter 				= null;
	if( $person_show_facebook					!= 'true' 	|| !$r['show_facebook'] ) 					$person_facebook 				= null;
	if( $person_show_google						!= 'true' 	|| !$r['show_google'] ) 					$person_google 					= null;
	if( $person_show_linkedin					!= 'true' 	|| !$r['show_linkedin'] ) 					$person_linkedin 				= null;
	if( $person_show_address					!= 'true' 	|| !$r['show_address'] ) 					$person_address 				= null;
	if( $person_show_post_code					!= 'true' 	|| !$r['show_post_code'] ) 					$person_post_code				= null;
	if( $person_show_link						!= 'true' 	|| !$r['show_link'] ) 						$person_show_link 				= 'false';

	if( empty( $person_link_type ) )
	{
		$person_show_link = 'false';
	}
	else if( $person_show_link != 'false' )
	{
		if( $person_link_type == 'internal' )
		{
			$person_link = get_permalink( $person_related_internal );
		}
		else
		{
			$person_link = $person_related_external;
		}
	}

	if( ( $r['title_format'] != 'display' && $r['show_name'] ) || ( $r['show_name'] && empty( $person_name ) ) )
	{
		$person_name = $person->post_title;
	}

	?>
	<section id="<?php echo $r['id']; ?>" class="<?php echo $r['class_wrapper']; ?> vcard organisation">
		
		<?php

		if( !empty( $person_name ) )
		{
			?>
			<header class="<?php echo $r['class_header']; ?>">
				<h1 class="<?php echo $r['class_title']; ?> org"><?php echo $person_name; ?></h1>
			</header>
			<?php
		}
		if( $r['show_image'] )
		{
			?>
			<div class="<?php echo $r['class_image_wrapper']; ?>"><?php echo wp_get_attachment_image( $post_thumbnail_id, $r['image-size'] ); ?></div>
			<?php
		}
		?>
		<?php 
		if( $r['show_content'] )
		{
			?>
			<div class="<?php echo $r['class_content_wrapper']; ?>">
				<?php echo wpautop( $person->post_content );?>
			</div>
			<?php
		}
		if( !empty( $person_title ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Title
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_title; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_first_name ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							First name
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_first_name; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_middle_names ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Middle name(s)
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_middle_names; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_last_name ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Last name
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_last_name; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_post_nominal_letters ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Post nominal letters
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_post_nominal_letters; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_job_title ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Job Title
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_job_title; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_organisation ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Job Title
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<?php echo $person_organisation; ?>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_email ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Email
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a class="email" href="mailto:<?php echo $person_email; ?>"><?php echo $person_email; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_gravatar_src ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Gravatar
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<img src="<?php echo $person_gravatar_src; ?>" alt="Gravatar"/>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_telephone ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Telephone
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a class="tel" href="tel:<?php echo str_replace( ' ','', $person_telephone ); ?>"><?php echo $person_telephone; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_website ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Website
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a class="url" href="<?php echo $person_website; ?>" target="_blank"><?php echo $person_website; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_twitter ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Twitter
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="http://twitter.com/<?php echo $person_twitter; ?>" target="_blank">@<?php echo $person_twitter; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_facebook ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Facebook
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="<?php echo $person_facebook; ?>" target="_blank"><?php echo $person_facebook; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_google ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Google+
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="<?php echo $person_google; ?>" target="_blank"><?php echo $person_google; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_linkedin ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						LinkedIn
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="<?php echo $person_linkedin; ?>" target="_blank"><?php echo $person_linkedin; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $person_address ) || !empty( $person_email ) )
		{
			?>
			<div class="adr <?php echo $r['class_address_wrapper']; ?>">
				<?php
				if( !empty( $person_address ) )
				{
					?>
					<div class="<?php echo $r['class_meta_row']; ?>">
						<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
							<?php echo $r['tag_meta_label_wrapper_open']; ?>
								Address
							<?php echo $r['tag_meta_label_wrapper_close']; ?>
						</div>
						<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
							<span class="street-address">
								<?php echo wpautop( $person_address ); ?>
							</span>
						</div>
					</div>
					<?php
				}
				if( !empty( $person_post_code ) )
				{
					?>
					<div class="<?php echo $r['class_meta_row']; ?>">
						<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
							<?php echo $r['tag_meta_label_wrapper_open']; ?>
								Post code
							<?php echo $r['tag_meta_label_wrapper_close']; ?>
						</div>
						<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
							<?php echo $r['tag_meta_value_wrapper_open']; ?>
								<span class="postal_code"><?php echo $person_post_code; ?></span>
							<?php echo $r['tag_meta_value_wrapper_close']; ?>
						</div>
					</div>
					<?php
				}
				if( !empty( $person_link )  )
				{
					?>
					<div class="<?php echo $r['class_meta_row']; ?>">
						<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
							<?php echo $r['tag_meta_label_wrapper_open']; ?>
								Related Link
							<?php echo $r['tag_meta_label_wrapper_close']; ?>
						</div>
						<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
							<?php echo $r['tag_meta_value_wrapper_open']; ?>
								<a href="<?php echo $person_link; ?>"<?php ( $person_related_opens_in_new_window == 'true' )  ? ' target="_blank"' : ''; ?>><?php echo $person_link; ?></a>
							<?php echo $r['tag_meta_value_wrapper_close']; ?>
						</div>
					</div>
					<?php
				}
				?>

			</div>	
			<?php
		}
		?>
	</section>

	<?php
}

/** Legacy support **/

/**
 * 
 * @since  		1.1.2
 * 
 * Function was spelt wrong previous to this version. 
 * This function will call the old function if anybody is calling it.
 * 
 */
function person_render_boostrap( $post_id, $args = array(), $version = '3' )
{
	person_render_bootstrap( $post_id, $args, $version );
}
?>