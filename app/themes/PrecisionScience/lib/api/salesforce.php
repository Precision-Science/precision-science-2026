<?php
	
	//OIDs
	//PS - 00DF00000006CqH
	//DEV - 00D6A000000tflb
	
	/*
	ADD LEAD TO SALESFORCE API
	--
	OUTPUT
	{
		"status": "string",
        "email": "string",
        "list_id": "string",
		"merge_fields": {}
    }
	*/
	add_action( 'rest_api_init', function () {
		register_rest_route( 'form', '/salesforce/add', array(
			'methods' => 'POST',
			'callback' => 'salesforce_add_webtolead_v2',
		) );
	} );

	function salesforce_add_webtolead_v2( $data ) {
			
			//RECAPTCHA			
			$recaptcha = $_POST['g-recaptcha-response'];
			$object = new Recaptcha(array('secret-key' => get_option('recaptcha_secret_key'),'client-key' => get_option('recaptcha_client_key')));
			$recaptcha_response = $object->verifyResponse($recaptcha);

			// if( isset($recaptcha_response['success']) and $recaptcha_response['success'] != true ) {
			// 	$recaptcha_response = 'fail';
			// }else {

			// 	//$salesforce_response = salesforce_webtolead_v2($_POST);
				
			// 	if(isset($_POST['autoreply']) && $_POST['autoreply'] == "true"){
			// 		//TO ADMIN
			// 		$sendgrid = new SendGrid(get_option('sendgrid_key'));
			// 		$to_admin = new SendGrid\Email(); 
			// 		$to_admin_body = load_template_part('templates/email/to-admin'); 
			// 		$from_name = $contact_first_name.' '.$contact_last_name;
			// 		$to_admin
			// 		    ->addTo(get_option('primary_email'))
			// 		    ->setFrom(get_option('sending_email'))
			// 		    ->setFromName($from_name)
			// 		    ->setReplyTo($_POST['contact_email_address'])
			// 		    ->setSubject(get_bloginfo('name').': Message from '.$from_name)
			// 		    ->setHtml($to_admin_body);
					
			// 		$error = '';
			// 		try {
			// 			$sendgrid_response = 'sent';
						
			// 		    $admin_results = $sendgrid->send($to_admin);
			// 		    $post_message = 'Your Contact has been sent.';
					    
			// 		} catch(\SendGrid\Exception $e) {
			// 			$sendgrid_response = '';
			// 			$sendgrid_response .= $e->getCode().'<hr/>';
			// 		    foreach($e->getErrors() as $er) {
			// 		        $sendgrid_response .= $er.'<br/>';
			// 		    }
			// 		    $post_message = 'Something has gone wrong. Please try again.<br/><pre>'.$error.'</pre>';
			// 		}
			// 	}
				
			// }
			

			// //POST
			$output = array(
				'recaptcha_response'    => $recaptcha_response,
				'salseforce_response'	=> $salesforce_response,
				'sendgrid_response'		=> $sendgrid_response
			);
			
			 return $output;
	}