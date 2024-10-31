var person_input						= jQuery('#person input');
var person_telephone					= jQuery('#person_telephone');
var person_twitter						= jQuery('#person_twitter');
var person_related_internal_type		= jQuery('#person_related_internal_type');
var person_related_internal 			= jQuery('#person_related_internal');
var person_related_external 			= jQuery('#person_related_external');
var person_related_opens_in_new_window 	= jQuery('#person_related_opens_in_new_window');
var person_link_type_none				= jQuery('#person_link_type_none');
var person_link_type_internal			= jQuery('#person_link_type_internal');
var person_link_type_external			= jQuery('#person_link_type_external');
var person_related_internal_clone		= person_related_internal.clone();
var person_name							= jQuery('#person_name');
var person_first_name					= jQuery('#person_first_name');
var person_last_name					= jQuery('#person_last_name');

person_related_internal_type.prop('disabled', true).addClass('disabled');
person_related_internal.prop('disabled', true).addClass('disabled');
person_related_external.prop('disabled', true).addClass('disabled');
person_related_opens_in_new_window.prop('disabled', true).addClass('disabled');

if( !person_link_type_none.prop('checked') ) 
{
	person_related_opens_in_new_window.prop('disabled', false).removeClass('disabled');

	if( person_link_type_internal.prop('checked') )
	{
		person_related_internal_type.prop('disabled', false).removeClass('disabled');
		person_related_internal.prop('disabled', false).removeClass('disabled');
	}
	else if( person_link_type_external.prop('checked') )
	{
		person_related_external.prop('disabled', false).removeClass('disabled');
	}
}

selected_post_type = person_related_internal.find('option:selected').data('post-type');
person_related_internal_type.find('option').each(function(){
	if( jQuery(this).val() == selected_post_type )
	{
		jQuery(this).prop('selected', true);
	}
	else
	{
		jQuery(this).prop('selected', false);
	}
});
person_related_internal.find('option').each(function(){
	if( jQuery(this).data('post-type') == selected_post_type )
	{
		jQuery(this).show();
	}
	else
	{
		jQuery(this).remove();
	}
});



person_input.bind('blur', function(){

	if( person_telephone.length && person_telephone.val() != '' )
	{
		person_telephone.val( jQuery.trim( person_telephone.val().replace(/[^0-9\s]/g,'') ).replace( /\s\s+/g, ' ' ) );
	}

	if( person_twitter.length && person_twitter.val() != '' )
	{
		person_twitter.val( person_twitter.val().replace(/[^0-9a-zA-Z_]/g,'') );
	}

	if( person_name.length && person_first_name.length && person_name.val() == '' )
	{
		person_name.val( person_first_name.val() );
	}

	if( person_name.length && person_first_name.length && person_last_name.length && person_name.val() == person_first_name.val() )
	{
		person_name.val( ( person_first_name.val() + ' ' + person_last_name.val() ).trim() );
	}

});

person_link_type_none.bind('click', function(){
	person_related_internal_type.prop('disabled', true).addClass('disabled');
	person_related_internal.prop('disabled', true).addClass('disabled');
	person_related_external.prop('disabled', true).addClass('disabled');
	person_related_opens_in_new_window.prop('disabled', true).addClass('disabled');
});

person_link_type_internal.bind('click', function(){
	person_related_opens_in_new_window.prop('disabled', false).removeClass('disabled');
	person_related_internal_type.prop('disabled', false).removeClass('disabled');
	person_related_internal.prop('disabled', false).removeClass('disabled');
	person_related_external.prop('disabled', true).addClass('disabled');
});

person_link_type_external.bind('click', function(){
	person_related_opens_in_new_window.prop('disabled', false).removeClass('disabled');
	person_related_internal_type.prop('disabled', true).addClass('disabled');
	person_related_internal.prop('disabled', true).addClass('disabled');
	person_related_external.prop('disabled', false).removeClass('disabled');
});

person_related_internal_type.change(function(){
	var post_type = jQuery(this).val();
	person_related_internal.replaceWith( person_related_internal_clone.clone() );
	person_related_internal = jQuery('#person_related_internal');
	person_related_internal.find('option').each(function(){
		if( jQuery(this).data('post-type') != post_type && jQuery(this).val() != '' )
		{
			jQuery(this).remove();
		}
	});
});