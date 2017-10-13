// Phone validation scritps for Salesforce plugin form Mark Warren 8-16-17

add_filter('sfwp2l_validate_field','sf_phone_enforce_country_code', 10, 4);

function sf_phone_enforce_country_code( $error, $name, $val, $field ){

    if( $name == 'phone' ){

		$phone_digits = preg_replace("/[^0-9]/", "", $val);
		
        if( strlen( $phone_digits ) != 10 ){
            $error['valid'] = false;
            $error['message'] = 'Please enter a 10-digit phone number, no spaces, dashes or parenthesis necessary.';
        }

    }

    return $error;
}

add_filter('sfwp2l_validate_field','sf_zip_enforce_number', 10, 4);

function sf_zip_enforce_number( $error, $name, $val, $field ){

    if( $name == 'zip' ){

		$zip_digits = preg_replace("/[^0-9]/", "", $val);

        if( strlen( $zip_digits ) != 5 ){
            $error['valid'] = false;
            $error['message'] = 'Please enter a valid zip code. dude';
        }

    }

    return $error;
}

add_filter('sfwp2l_validate_field','sf_enforce_honeypot', 10, 4);

function sf_enforce_honeypot ($error, $name, $val, $field) {

		if($name == 'honey') { 
			if ($val != "") {
				$error['valid'] = false;
				$error['message'] = 'Sorry robot.';
			}
		}

	return $error;

}
