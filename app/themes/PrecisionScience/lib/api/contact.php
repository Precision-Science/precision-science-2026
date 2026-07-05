<?php
	/*
	CONTACT FORM API
	*/
	add_action( 'rest_api_init', function () {
		register_rest_route( 'form', '/contact', array(
			'methods' => 'POST',
			'callback' => 'contact_submit',
		) );
	} );

	
	function contact_submit( WP_REST_Request $request ) {

		//VARIABLES	
		$DEBUG = constant('WP_DEBUG');
		$status = null;	
		$errors = array();
		$_POST = $request->get_params();
		$_POST['timestamp'] = date('Y-m-d H:i:s');
		
		/*
		FIELD VALIDATION
		*/
		if ( empty( $_POST['form'] ) && $_POST['form'] != 'contact_form' )
			$errors['form'] = 'Not a valid form.';
		if (empty($_POST['contact_first_name']))
			$errors['contact_first_name'] = 'First Name is required.';
		if (empty($_POST['contact_last_name']))
			$errors['contact_last_name'] = 'Last Name is required.';
		if (empty($_POST['contact_phone_number']))
			$errors['contact_phone_number'] = 'Phone number is required.';
		if (empty($_POST['contact_email_address']))
			$errors['contact_email_address'] = 'Email address is required.';
		if (empty($_POST['contact_company']))
			$errors['contact_company'] = 'Company is required.';
		if (empty($_POST['contact_url']))
			$errors['contact_url'] = 'URL is required.';

		// /* One of the checkboxes is set */
		/*
		$checkbox_selected = false;
		$checkboxes = array('contact_soft_chews','contact_powders','contact_pellets');
		foreach($checkboxes as $key => $value){
			if($checkbox_selected == false){
				$checkbox_selected = isset($_POST[$value]) ? true : false;
			}
		}
		if ($checkbox_selected == false)
			$errors['checkboxes'] = 'Indicate the type(s) of products';
		*/
		
		// If there are any errors in our errors array, return a success boolean of false
		if ( !empty($errors)) {
			
			$output = array(
				'status'	=> 'invalid',
				'post'		=> $_POST,
				'errors'	=> $errors,
				'message'	=> 'Please check the fields below',
				'results'   => array(
					"debug" => $DEBUG
				)
			);
			return $output;
			exit();

		}

		/*
		RECAPTCHA VALIDATION
		*/
		if($DEBUG == false && !isset($_POST['debug_flag'])){
			$recaptcha_field = $_POST['g-recaptcha-response'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = array('secret' => get_option('recaptcha_secret_key'), 'response' => $recaptcha_field);
			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => http_build_query($data)
				)
			);
			$context  = stream_context_create($options);
			$recaptcha_response = file_get_contents($url, false, $context);
			$recaptcha_data = json_decode($recaptcha_response,true);
			$_POST['recaptcha_response'] = $recaptcha_data;

			if( isset($recaptcha_data) && ( $recaptcha_data['success'] != true || $recaptcha_data['score'] < 0.4 ) ) {
				
				$output = array(
					'status'		=> 'spam',
					'post'			=> $_POST,
					'errors'		=> $errors,
					'message'		=> 'Message is potentially spam. Please reformat your message and sending again.',
					'results'   	=> array(
						"recaptca" 	=> $recaptcha_data,
						"debug" 	=> $DEBUG
					)
				);
				
				return $output;
				exit();
			}
		}else{
			// Bypass for debugging
			$recaptcha_response = array('success' => true);
		}	

		/*
		SEND MESSAGE - New Email API + Webhook
		*/
		
		if( empty($errors) && $recaptcha_response['success'] == true ){

			//SEND TO webhook
			$url = get_option('webhook_url');
			$webhook_response = wp_remote_post( $url, array(
				'body'    => $_POST,
				'method'  => 'POST'
			) );

			//Set email variables
			$from_name = $_POST['contact_first_name'].' '.$_POST['contact_last_name'];
			$body = load_template_part('templates/email/to-admin'); 

			//Prepare data for new email API
			$email_data = array(
				'firstname' => $_POST['contact_first_name'],
				'lastname' => $_POST['contact_last_name'],
				'subject' => get_bloginfo('name').' Website: Message from '.$from_name,
				'message' => $body,
				'from' => $_POST['contact_email_address']
			);

			//Send to new email API
			$email_api_url = 'https://ps-send.vercel.app/api/email';
			$email_response = wp_remote_post( $email_api_url, array(
				'body'    => http_build_query($email_data),
				'method'  => 'POST',
				'headers' => array(
					'Content-Type' => 'application/x-www-form-urlencoded'
				)
			) );

			//Handle response
			if (is_wp_error($email_response)) {
				$status = 'error';
				$post_message = 'Something has gone wrong. Please try again.<br/><pre>'.$email_response->get_error_message().'</pre>';
				
				$output = array(
					'status'				=> $status,
					'post'					=> $_POST,
					'errors'				=> $errors,
					'message'				=> $post_message,
					'results'   			=> array(
						"debug_status" 		=> $DEBUG,
						"email_api_error" 	=> $email_response->get_error_message(),
						"webhook_response"	=> $webhook_response
					)
				);
				
				return $output;
			} else {
				$response_code = wp_remote_retrieve_response_code($email_response);
				$response_body = wp_remote_retrieve_body($email_response);
				
				if ($response_code == 200) {
					$status = 'sent';
					$post_message = 'Your message has been sent.';
				} else {
					$status = 'error';
					$post_message = 'Something has gone wrong. Please try again.';
				}
				
				$output = array(
					'status'			=> $status,
					'post'				=> $_POST,
					'errors'			=> $errors,
					'message'			=> $post_message,
					'results'   		=> array(
						"debug_status" 			=> $DEBUG,
						"email_api_status" 		=> $response_code,
						"email_api_body" 		=> $response_body,
						"webhook_response"		=> $webhook_response
					)
				);
				
				return $output;
			}
		}
	}
?>