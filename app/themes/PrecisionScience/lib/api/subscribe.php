<?php
	
	/*
	ADD SUBSCRIBER TO MAILCHIMP API
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
		register_rest_route( 'form', '/subscribe/add/simple', array(
			'methods' => 'POST',
			'callback' => 'subscribe_add_simple',
		) );
	} );

	function subscribe_add_simple( $data ) {
		
			$contact_email_address = $_POST['contact_email_address'];
			$contact_name = $_POST['contact_name'];
			$contact_referrer =  $_POST['contact_referrer'];
			$autoreply = $_POST['autoreply'];
			
			$contact_arr = explode(' ',$contact_name,2);
			list($contact_first_name, $contact_last_name) = $contact_arr;

			//print_r($contact_last_name);
			$status = 'subscribed';
			$mailchimp_key = get_option('mailchimp_key');
			$list_id = get_option('mailchimp_list_id');
			$merge_fields = array(
				'FNAME' 	=> $contact_first_name,
				'LNAME' 	=> $contact_last_name,
				'REFERRER' 	=> $contact_referrer
			);

			//RECAPTCHA			
			$recaptcha = $_POST['g-recaptcha-response'];
			$object = new Recaptcha(array('secret-key' => get_option('recaptcha_secret_key'),'client-key' => get_option('recaptcha_client_key')));
			$response = $object->verifyResponse($recaptcha);
			
			
			if(isset($response['success']) and $response['success'] != true) {
				$subscribe_result = null;
				$status = 'fail';
			}else {
				
				$subscribe_result = mailchimp_subscriber_status($contact_email_address, $status, $list_id, $mailchimp_key, $merge_fields);
				$status = 'sent'; //($subscribe_result->status == 'sent' || $subscribe_result->status == 'subscribed') ? 'sent' : 'error';
				
			}
			

			//POST
			$output = array(
				'status'				=> $status,
				'subscribe_results'		=> $subscribe_result
			);
			
			return $output;
	}
	
	/*
	ADD SUBSCRIBER TO MAILCHIMP API
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
		register_rest_route( 'form', '/subscribe/add', array(
			'methods' => 'POST',
			'callback' => 'subscribe_add',
		) );
	} );

	function subscribe_add( $data ) {
		
			$contact_email_address = $_POST['contact_email_address'];
			$contact_first_name = $_POST['contact_first_name'];
			$contact_last_name = $_POST['contact_last_name'];
			$contact_phone_number = $_POST['contact_phone_number'];
			$contact_referrer =  $_POST['contact_referrer'];
			$autoreply = $_POST['autoreply'];
		
			$status = 'subscribed';
			$mailchimp_key = get_option('mailchimp_key');
			$list_id = get_option('mailchimp_list_id');
			$merge_fields = array(
				'FNAME' 	=> $contact_first_name,
				'LNAME' 	=> $contact_last_name,
				'PHONE'		=> $contact_phone_number,
				'REFERRER' 	=> $contact_referrer
			);
			
			//RECAPTCHA			
			$recaptcha = $_POST['g-recaptcha-response'];
			$object = new Recaptcha(array('secret-key' => get_option('recaptcha_secret_key'),'client-key' => get_option('recaptcha_client_key')));
			$response = $object->verifyResponse($recaptcha);
			
			
			if(isset($response['success']) && $response['success'] != true) {
				$status = "fail";
				$error = "";
			}else{
			
				//MAILCHIMP
				$subscribe_result = mailchimp_subscriber_status($contact_email_address, $status, $list_id, $mailchimp_key, $merge_fields);
				
			}
			
			
			//POST
			$output = array(
				'status'				=> $status,
				'error'					=> $error,
				//'admin_results'			=> $admin_results,
				//'sender_results'		=> $sender_results,
				//'subscribe_result'		=> $subscribe_result,
				//'list_id'				=> $list_id,
				//'email'					=> $contact_email_address,
				//'merge_fields'			=> $merge_fields,
				//'autoreply'				=> $autoreply
			);
			
			return $output;
	}