<?php

$ps_colors = array(
	'Mint' 			=> '#86C8BC',
	'Gray' 			=> '#63666A',
	'Dark Blue'		=> '#005587',
	'Green' 		=> '#6FA287',
	'Teal' 			=> '#00B2A9',
	'Brown' 		=> '#6B4C4C',
	'Light Blue' 	=> '#6CACE4',
	'Tan' 			=> '#B7A99A',
	'Medium Blue' 	=> '#4E87A0',
	'Orange' 		=> '#E04E39',
	'White' 		=> '#FFFFFF'
);

//ALLOW SVG UPLOADS
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['mp4'] = 'video/mp4';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//TARGET PS'S MANDRILL SUBACCOUNT
function addSubaccount($message) {
    //$subaccount_id = getSubaccount();
    $message['subaccount'] = get_option('mandrill_suabacount'); //'precisionscience';
    return $message;
}
add_filter('mandrill_payload', 'addSubaccount');