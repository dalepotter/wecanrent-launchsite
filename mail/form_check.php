<?php

function is_form_data_valid($arr){
	// Check that only allowed fields have been passed in
	foreach($arr as $k => $v){
		if ( !in_array($k, array('name', 'email', 'phone', 'property_postcode', 'num_properties', 'how_heard', 'service')) ){
			return false;
		}
	}

	// If passed all checks, return true
	return true;
}

?>