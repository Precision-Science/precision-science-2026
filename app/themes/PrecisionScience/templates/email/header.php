<?php
	
	$header = "";
	
	$header = '<html><body><table cellpadding="0" cellspacing="0" width="100%"><tr><td align="center"><table width="600" cellpadding="0" cellspacing="0" style="background:#FFF;border:1px solid #f1f1f1;"><tr><td align="left">';

	//HEADER
	$header .= '<table width="100%" cellpadding="0" cellspacing="0"><tr><td style="padding:20px 30px;"><a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url( home_url() ).get_template_directory_uri().'/dist/img/logo-color.png?v=tm" height="50" width="250" alt="'.get_bloginfo('name').'" /></a></td></tr></table>';
	
	//INTRO
	$header .= '<table style="margin:20px 20px;" cellpadding="0" cellspacing="6"><tr><td>';
	
	
	echo $header;