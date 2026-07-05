<?php

$application = "";
$application .= load_template_part('templates/email/header');

//FIELDS
$application .= '<table style="margin:12px 0;" cellpadding="0" cellspacing="6"><tr><td>';
$application .= '<p style="font-family:Arial;font-size:18px;color:#333333;"><strong>Thank you</p>';
$application .= '<table style="margin:0;" cellpadding="0" cellspacing="0"><tr><td>';

$application .= '<p style="font-family:Arial;font-size:14px;color:#333333;">We have received your message and will reply shortly. You have been added to our mailing list.';

$application .= '</td></tr>';
$application .= '</table>';
$application .= '</td></tr></table>';

$application .= load_template_part('templates/email/footer');

echo $application;


?>