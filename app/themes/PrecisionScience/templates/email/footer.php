<?php

	$footer = "";
	//CLOSE BODY
	$footer .= '</td></tr></table>';
	
	//CLOSE BORDER
	$footer .= '</td></tr></table>';
	
	//FOOTER
	$footer .= '<table width="600" cellpadding="0" cellspacing="0"><tr>';
	$footer .= '<td><p style="margin:0;padding:30px 20px 30px;font-family:Arial;font-size:11px;color:#ACACAC;">&copy; '.date('Y').' '.get_bloginfo('name').'</p></td>';
	
	$footer .= '<td><p style="margin:0;padding:30px 20px 30px;font-family:Arial;font-size:11px;color:#ACACAC;text-align:right;"><a href="'.get_option('mailchimp_unsubscribe_url').'">Unsubscribe</a></p></td>';
	'</tr></table>';
	
	//CLOSE BODY
	$footer .= '</body></html>';
	
	echo $footer;