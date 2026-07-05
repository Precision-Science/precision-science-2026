<?php
	header('Content-Type: application/json');
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
		
		/*
		FIELD VALIDATION
		*/
		if ( empty( $_POST['form'] ) && $_POST['form'] != 'contact_form' )
			$errors['form'] = 'Not a valid form.';
		if (empty($_POST['contact_first_name']))
			$errors['contact_first_name'] = 'First Name is required.';
		if (empty($_POST['contact_last_name']))
			$errors['contact_last_name'] = 'Last Name is required.';
		if (empty($_POST['contact_email_address']))
			$errors['contact_email_address'] = 'Email Address is required.';
		/* One of the checkboxes is set */
		$checkbox_selected = false;
		$checkboxes = array('contact_soft_chews','contact_powders','contact_pellets');
		foreach($checkboxes as $key => $value){
			if($checkbox_selected == false){
				$checkbox_selected = isset($_POST[$value]) ? true : false;
			}
		}
		if ($checkbox_selected == false)
			$errors['checkboxes'] = 'Indicate the type(s) of products';
		
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

		if( isset($recaptcha_data['success']) && $recaptcha_data['success'] != true ) {
			
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

		/*
		SEND MESSAGE - Sendgrid + Salesforce
		*/
		if(empty($errors) && $recaptcha_response['success'] == true ){

			//Send to Salesforce
			if($DEBUG == false){
				if(get_option('salesforce_send') == 1){
					$salesforce_response = salesforce_webtolead_v2($_POST);
				}
			}

			//Set email variables
			$from_name = $_POST['contact_first_name'].' '.$_POST['contact_last_name'];
			$body = load_template_part('templates/email/to-admin'); 

			//Set up email structure
			$sendgrid = new SendGrid(get_option('sendgrid_key'));
			$email = new SendGrid\Email();
			$email
			    ->setFrom(get_option('sending_email'))
			    ->setFromName($from_name)
			    ->setReplyTo($_POST['contact_email_address'])
			    ->setSubject(get_bloginfo('name').': Message from '.$from_name)
			    ->setHtml($body);
			$contacts = ($DEBUG == true) ? get_option('test_email') : get_option('primary_email');
			$contact_arr = explode(",",$contacts);
			foreach ($contact_arr as $key => $contact) {
				$email->addTo( trim($contact) );
			}

			//SUCCESS - SendGrid
			try {
			 	$status = 'sent';
				$sendgrid_response = $sendgrid->send($email);
				$post_message = 'Your message has been sent.';
				
				$output = array(
					'status'			=> $status,
					'post'				=> $_POST,
					'errors'			=> $errors,
					'message'			=> $post_message,
					'results'   		=> array(
						"sendgrid" 		=> $sendgrid_response,
						"salesforce"	=> $salesforce_response,
						"debug" 		=> $DEBUG
					)
				);
				
				return $output;
			    
			//ERROR - SendGrid
			} catch(\SendGrid\Exception $e) {
				$status = 'error';
				$error .= $e->getCode().'<hr/>';
			    foreach($e->getErrors() as $er) {
			        $error .= $er.'<br/>';
			    }
				$post_message = 'Something has gone wrong. Please try again.<br/><pre>'.$error.'</pre>';
				
				$output = array(
					'status'			=> $status,
					'post'				=> $_POST,
					'errors'			=> $errors,
					'message'			=> $post_message,
					'results'   		=> array(
						"sendgrid" 		=> $sendgrid_response,
						"salesforce" 	=> $salesforce_response,
						"debug" 		=> $DEBUG
					)
				);
				
				return $output;
			}
		}
	}
?>