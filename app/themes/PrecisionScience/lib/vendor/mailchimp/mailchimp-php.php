<?php
	
	//IS MD5
	function isMd5($md5 =''){
	    return preg_match('/^[a-f0-9]{32}$/', $md5);
	}
	
	function mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields){
		$data = array(
			'apikey'        => $api_key,
	    	'email_address' => isMd5($email) ? '' : $email,
	    	'member_hash'   => isMd5($email) ? $email : md5(strtolower($email)),
			'status'        => $status,
			'merge_fields'  => $merge_fields
		);
		$mch_api = curl_init(); // initialize cURL connection
	 
		curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . $data['member_hash']);
		curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
		curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
		curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
		curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
		curl_setopt($mch_api, CURLOPT_POST, true);
		curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	 
		$result = curl_exec($mch_api);
		return $result;
	}