<?php

$application = "";
$application .= load_template_part('templates/email/header');

//FIELDS
$application .= '<table style="margin:12px 0;" cellpadding="0" cellspacing="6"><tr><td>';
$application .= '<p style="font-family:Arial;font-size:18px;color:#333333;"><strong>Contact Information</p>';
$application .= '<table style="margin:0;" cellpadding="0" cellspacing="0">';
foreach($_POST as $key => $value):
	$prefix = 'contact_';
	if( strpos($key, $prefix) !== false ):
		$name = ucfirst( str_replace('_',' ',substr($key,strlen($prefix)) ) );
		$application .= '<tr><td style="padding:6px 0;width:150px;font-family:Arial;font-size:13px;color:#999;">'.$name.'</td><td style="padding:6px 0;font-family:Arial;font-size:13px;color:#333333;">'.$value.'</td></tr>';
	endif;
endforeach;
$application .= '</table>';
$application .= '</td></tr></table>';

$application .= load_template_part('templates/email/footer');

echo $application;


?>