<?php
/**
 * @package Person
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Custom meta box for person settings
 * 
 */
function person_meta_box() {

	// Only add the box to the selected post types
	$screens 		= array();
	$post_types 	= get_post_types( array('public' => true) );

	foreach( $post_types as $post_type)
	{
		if( get_option('_person_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens, $post_type );
		}
	}

	foreach ( $screens as $screen ) 
	{
		add_meta_box(
			'person',
			'Person settings',
			'person_render_meta_box',
			$screen
		);
	}

}
add_action( 'add_meta_boxes', 'person_meta_box' );


/**
 * 
 * @since  		1.0.0
 * 
 * Render the person settings meta box
 * 
 */
function person_render_meta_box( $post ) {

	$post_types 							= get_post_types( array('public' => true) );
	$person_title 							= get_post_meta( $post->ID, '_person_title', true );
	$person_first_name 						= get_post_meta( $post->ID, '_person_first_name', true );
	$person_last_name 						= get_post_meta( $post->ID, '_person_last_name', true );
	$person_middle_names 					= get_post_meta( $post->ID, '_person_middle_names', true );
	$person_post_nominal_letters 			= get_post_meta( $post->ID, '_person_post_nominal_letters', true );
	$person_name 							= get_post_meta( $post->ID, '_person_name', true );
	$person_job_title 						= get_post_meta( $post->ID, '_person_job_title', true );
	$person_organisation 					= get_post_meta( $post->ID, '_person_organisation', true );
	$person_email 							= get_post_meta( $post->ID, '_person_email', true );
	$person_gravatar_src 					= get_post_meta( $post->ID, '_person_gravatar_src', true );
	$person_website 						= get_post_meta( $post->ID, '_person_website', true );
	$person_telephone 						= get_post_meta( $post->ID, '_person_telephone', true );
	$person_twitter 						= get_post_meta( $post->ID, '_person_twitter', true );
	$person_facebook 						= get_post_meta( $post->ID, '_person_facebook', true );
	$person_google 							= get_post_meta( $post->ID, '_person_google', true );
	$person_linkedin 						= get_post_meta( $post->ID, '_person_linkedin', true );
	$person_address 						= get_post_meta( $post->ID, '_person_address', true );
	$person_post_code 						= get_post_meta( $post->ID, '_person_post_code', true );
	$person_link_type 						= get_post_meta( $post->ID, '_person_link_type', true );
	$person_related_internal_type 			= get_post_meta( $post->ID, '_person_related_internal_type', true );
	$person_related_internal 				= get_post_meta( $post->ID, '_person_related_internal', true );
	$person_related_external 				= get_post_meta( $post->ID, '_person_related_external', true );
	$person_related_opens_in_new_window 	= get_post_meta( $post->ID, '_person_related_opens_in_new_window', true );
	$require_divider						= false;

	sort( $post_types );

	if( empty( $person_gravatar_src ) )
	{
		$person_gravatar_src = 'http://www.gravatar.com/avatar/' . md5( $person_email );
	}
	
	?>
	<div class="person cf">
		<?php

			if( get_option('_person_show_title') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_title">Title</label>
							</strong>
						</div>
						<div class="input__container">
								<select id="person_title" name="person_title">
									<?php 
										$titles = get_terms( 'person_title', 'orderby=count&hide_empty=0' );
										foreach( $titles as $title )
										{
											?>
												<option value="<?php echo $title->name;?>"<?php echo ( $person_title == $title->name ) ? ' selected' : '';?>><?php echo $title->name;?></option>
											<?php
										}
									?>
								</select>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_first_name') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_first_name">First name</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_first_name" name="person_first_name" value="<?php echo $person_first_name;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_last_name') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_last_name">Last name</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_last_name" name="person_last_name" value="<?php echo $person_last_name;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_middle_names') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_middle_names">Middle name(s)</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_middle_names" name="person_middle_names" value="<?php echo $person_middle_names;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_post_nominal_letters') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_post_nominal_letters">Post nominal letters</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_post_nominal_letters" name="person_post_nominal_letters" value="<?php echo $person_post_nominal_letters;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_name') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_name">Display name</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_name" name="person_name" value="<?php echo $person_name;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
		?>
	</div>

	<?php 
		if( $require_divider && ( get_option('_person_show_job_title') == 'true' || get_option('_person_show_organisation') == 'true' ) )
		{
			echo '</div><hr/><div class="inside">'; 
			$require_divider = false;
		}
	?>

	<div class="person cf">
		<?php

			if( get_option('_person_show_job_title') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_job_title">Job title</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_job_title" name="person_job_title" value="<?php echo $person_job_title;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_organisation') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_organisation">Organisation</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_organisation" name="person_organisation" value="<?php echo $person_organisation;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
		?>
	</div>

	<?php 
		if( $require_divider && 
			( 
				get_option('_person_show_email') == 'true' || 
				get_option('_person_show_gravatar') == 'true' ||
				get_option('_person_show_website') == 'true' ||
				get_option('_person_show_telephone') == 'true' ||
				get_option('_person_show_twitter') == 'true' ||
				get_option('_person_show_facebook') == 'true' ||
				get_option('_person_show_google') == 'true' ||
				get_option('_person_show_linkedin') == 'true'
			) 
		)
		{
			echo '</div><hr/><div class="inside">'; 
			$require_divider = false;
		}
	?>

	<div class="person cf">
		<?php

			if( get_option('_person_show_email') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_email">Email</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_email" name="person_email" value="<?php echo $person_email;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_gravatar') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_gravatar_src">Gravatar</label>
							</strong>
						</div>
						<div class="input__container">
							<img src="<?php echo $person_gravatar_src;?>?s=50" alt="Gravatar Image"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_website') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_website">Website</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_website" name="person_website" value="<?php echo $person_website;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_telephone') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_telephone">Telephone</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="tel" id="person_telephone" name="person_telephone" value="<?php echo $person_telephone; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_twitter') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_twitter">Twitter</label>
							</strong>
						</div>
						<div class="input__container">
							<div class="input__wrapper">
								<span class="help-inline at">@</span><input type="text" id="person_twitter" name="person_twitter" value="<?php echo $person_twitter; ?>"/>
							</div>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_facebook') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_facebook">Facebook</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_facebook" name="person_facebook" value="<?php echo $person_facebook; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_google') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_google">Google+</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_google" name="person_google" value="<?php echo $person_google; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_linkedin') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_linkedin">LinkedIn</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_linkedin" name="person_linkedin" value="<?php echo $person_linkedin; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
		?>
	</div>

	<?php 
		if( $require_divider && 
			( 
				get_option('_person_show_address') == 'true' || 
				get_option('_person_show_post_code') == 'true'
			) 
		)
		{
			echo '</div><hr/><div class="inside">'; 
			$require_divider = false;
		}
	?>

	<div class="person cf">
		<?php

			if( get_option('_person_show_address') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_address">Address</label>
							</strong>
						</div>
						<div class="input__container">
								<textarea type="text" id="person_address" name="person_address"><?php echo $person_address; ?></textarea>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_person_show_post_code') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="person_post_code">Post code</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="person_post_code" name="person_post_code" value="<?php echo $person_post_code; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
		?>
	</div>

	<?php

	if( get_option('_person_show_link') == 'true' )
	{
		if( $require_divider )
		{
			echo '</div><hr/><div class="inside">'; 
			$require_divider = false;
		}
		?>

		<div class="person cf">
			<p>
				<div class="row cf">
					<div class="label__container">
						<strong>
							Link to post
						</strong>
					</div>
					<div class="input__container">
							<input type="radio" id="person_link_type_none" name="person_link_type" value=""<?php echo empty( $person_link_type ) ? ' checked' : '';?> /> <label for="person_link_type_none">None</label>
							<br/>
							<input type="radio" id="person_link_type_internal" name="person_link_type" value="internal"<?php echo ( $person_link_type == 'internal' ) ? ' checked' : '';?>/> <label for="person_link_type_internal">Internal</label>
							<br/>
							<input type="radio" id="person_link_type_external" name="person_link_type" value="external"<?php echo ( $person_link_type == 'external' ) ? ' checked' : '';?>/> <label for="person_link_type_external">External</label>
					</div>
				</div>
			</p>
			<p>
				<div class="row cf">
					<div class="label__container">
						<strong>
							<label class="label-inline" for="person_related_internal">Related internal</label>
						</strong>
					</div>
					<div class="input__container">
						
						<label class="label-inline" for="person_related_internal_type">Related type</label>&nbsp;&nbsp; 

						<select id="person_related_internal_type" name="person_related_internal_type">
								<?php

									foreach( $post_types as $post_type)
									{
										?>
											<option value="<?php echo $post_type;?>"<?php echo ( $person_related_internal_type == $post_type ) ? ' selected' : '';?>><?php $obj = get_post_type_object( $post_type ); echo $obj->labels->singular_name;?></option>
										<?php
									}

								?>
							</select>
							<br/><br/>
							<select class="full" id="person_related_internal" name="person_related_internal">
								<option value="">None</option>
								<?php

									foreach( $post_types as $post_type)
									{
										$list_posts_args 	= array(
											'post_type'			=> $post_type,
											'orderby'			=> 'title',
											'order'				=> 'ASC',
											'posts_per_page' 	=> -1
										);
										$list_posts 		= get_posts( $list_posts_args );

										foreach( $list_posts as $list_post )
										{
											?>
												<option data-post-type="<?php echo $post_type;?>" value="<?php echo $list_post->ID;?>"<?php echo ( $person_related_internal == $list_post->ID ) ? ' selected' : '';?>><?php echo $list_post->post_title;?></option>
											<?php
										}
									}

								?>
							</select>
					</div>
				</div>
			</p>
			<p>
				<div class="row cf">
					<div class="label__container">
						<strong>
							<label class="label-inline" for="person_related_external">Related external</label>
						</strong>
					</div>
					<div class="input__container">
							<input type="text" id="person_related_external" name="person_related_external" value="<?php echo $person_related_external;?>"/>
					</div>
				</div>
			</p>
			<p>
				<div class="row cf">
					<div class="label__container">
						<strong>
							<label class="label-inline" for="person_related_opens_in_new_window">Open in new window</label>
						</strong>
					</div>
					<div class="input__container">
							<input type="checkbox" id="person_related_opens_in_new_window" name="person_related_opens_in_new_window" value="true"<?php echo ( $person_related_opens_in_new_window == 'true' ) ? ' checked' : '';?>/>
					</div>
				</div>
			</p>
		</div>
		<?php
	}

	wp_nonce_field( 'submit_person', 'person_nonce' ); 
}


/**
 * 
 * @since  		1.0.0
 * 
 * Handle the person meta box post data
 * 
 */
function person_handle_post_data( $post_id )
{
	$nonce_key							= 'person_nonce';
	$nonce_action						= 'submit_person';

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

	$person_title 							= isset( $_POST['person_title'] ) 							?  $_POST['person_title']  							: null;
	$person_first_name 						= isset( $_POST['person_first_name'] ) 						?  $_POST['person_first_name']  					: null;
	$person_last_name 						= isset( $_POST['person_last_name'] ) 						?  $_POST['person_last_name']  						: null;
	$person_middle_names 					= isset( $_POST['person_middle_names'] ) 					?  $_POST['person_middle_names']  					: null;
	$person_post_nominal_letters 			= isset( $_POST['person_post_nominal_letters'] ) 			?  $_POST['person_post_nominal_letters'] 			: null;
	$person_name 							= isset( $_POST['person_name'] ) 							?  $_POST['person_name']  							: null;
	$person_job_title 						= isset( $_POST['person_job_title'] )					 	?  $_POST['person_job_title']  						: null;
	$person_organisation 					= isset( $_POST['person_organisation'] ) 					?  $_POST['person_organisation']  					: null;
	$person_email 							= isset( $_POST['person_email'] ) 							?  sanitize_email( $_POST['person_email'] )			: null;
	$person_website 						= isset( $_POST['person_website'] ) 						?  esc_url_raw( $_POST['person_website'] )  		: null;
	$person_telephone 						= isset( $_POST['person_telephone'] ) 						?  $_POST['person_telephone'] 					 	: null;
	$person_twitter 						= isset( $_POST['person_twitter'] ) 						?  $_POST['person_twitter']  						: null;
	$person_facebook 						= isset( $_POST['person_facebook'] ) 						?  esc_url_raw( $_POST['person_facebook'] )  		: null;
	$person_google 							= isset( $_POST['person_google'] ) 							?  esc_url_raw( $_POST['person_google'] ) 			: null;
	$person_linkedin 						= isset( $_POST['person_linkedin'] ) 						?  esc_url_raw( $_POST['person_linkedin'] )  		: null;
	$person_address 						= isset( $_POST['person_address'] ) 						?  esc_textarea( $_POST['person_address'] )			: null;
	$person_post_code 						= isset( $_POST['person_post_code'] ) 						?  $_POST['person_post_code']  						: null;
	$person_link_type 						= isset( $_POST['person_link_type'] ) 						?  $_POST['person_link_type']  						: null;
	$person_related_internal_type 			= isset( $_POST['person_related_internal_type'] ) 			?  $_POST['person_related_internal_type']  			: null;
	$person_related_internal 				= isset( $_POST['person_related_internal'] ) 				?  $_POST['person_related_internal']  				: null;
	$person_related_external 				= isset( $_POST['person_related_external'] ) 				?  esc_url_raw( $_POST['person_related_external'] )	: null;
	$person_related_opens_in_new_window 	= isset( $_POST['person_related_opens_in_new_window'] ) 	?  $_POST['person_related_opens_in_new_window']  	: null;

	if( !empty( $person_email ) )
	{
		$person_gravatar_src = 'http://www.gravatar.com/avatar/' . md5( $person_email );
	}

	if( !empty( $person_twitter ) )
	{
		$occasion_twitter = preg_replace( '/[^0-9a-zA-Z_]/', '', $occasion_twitter );
	}

	if( !empty( $person_post_code ) )
	{
		$person_post_code = strtoupper( preg_replace( '/[^0-9a-zA-Z\s]/', '', $person_post_code ) );
	}

	if( !empty( $person_telephone ) )
	{
		$person_telephone = preg_replace( '/[^0-9\s]/', '', $person_telephone );
		$person_telephone = preg_replace( '/\s\s+/', ' ', $person_telephone );
		$person_telephone = trim( $person_telephone );
	}

	if( !empty( $person_title ) ) 						update_post_meta( $post_id, '_person_title', 							$person_title );
	if( !empty( $person_first_name ) ) 					update_post_meta( $post_id, '_person_first_name', 						$person_first_name );
	if( !empty( $person_last_name ) ) 					update_post_meta( $post_id, '_person_last_name', 						$person_last_name );
	if( !empty( $person_middle_names ) ) 				update_post_meta( $post_id, '_person_middle_names', 					$person_middle_names );
	if( !empty( $person_post_nominal_letters ) ) 		update_post_meta( $post_id, '_person_post_nominal_letters', 			$person_post_nominal_letters );
	if( !empty( $person_name ) ) 						update_post_meta( $post_id, '_person_name', 							$person_name );
	if( !empty( $person_job_title ) ) 					update_post_meta( $post_id, '_person_job_title', 						$person_job_title );
	if( !empty( $person_organisation ) ) 				update_post_meta( $post_id, '_person_organisation', 					$person_organisation );
	if( !empty( $person_email ) ) 						update_post_meta( $post_id, '_person_email', 							$person_email );
	if( !empty( $person_website ) ) 					update_post_meta( $post_id, '_person_website', 							$person_website );
	if( !empty( $person_telephone ) ) 					update_post_meta( $post_id, '_person_telephone', 						$person_telephone );
	if( !empty( $person_twitter ) ) 					update_post_meta( $post_id, '_person_twitter', 							$person_twitter );
	if( !empty( $person_facebook ) ) 					update_post_meta( $post_id, '_person_facebook', 						$person_facebook );
	if( !empty( $person_google ) ) 						update_post_meta( $post_id, '_person_google', 							$person_google );
	if( !empty( $person_linkedin ) )					update_post_meta( $post_id, '_person_linkedin', 						$person_linkedin );
	if( !empty( $person_address ) )						update_post_meta( $post_id, '_person_address', 							$person_address );
	if( !empty( $person_post_code ) ) 					update_post_meta( $post_id, '_person_post_code',						$person_post_code );
	if( !empty( $person_link_type ) ) 					update_post_meta( $post_id, '_person_link_type', 						$person_link_type );
	if( !empty( $person_related_internal_type ) ) 		update_post_meta( $post_id, '_person_related_internal_type', 			$person_related_internal_type );
	if( !empty( $person_related_internal ) ) 			update_post_meta( $post_id, '_person_related_internal',					$person_related_internal );
	if( !empty( $person_related_external ) ) 			update_post_meta( $post_id, '_person_related_external', 				$person_related_external );
	if( !empty( $person_related_opens_in_new_window ) ) update_post_meta( $post_id, '_person_related_opens_in_new_window', 		$person_related_opens_in_new_window );
	if( !empty( $person_gravatar_src ) ) 				update_post_meta( $post_id, '_person_gravatar_src', 					$person_gravatar_src );

}
add_action( 'save_post', 'person_handle_post_data' );
?>