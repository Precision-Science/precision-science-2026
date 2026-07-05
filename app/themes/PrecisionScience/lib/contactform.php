<?php
	
	function contact(){
		if ( isset( $_POST['form'] ) && 'contact-form' == $_POST['form'] ) {
			
			//echo '<pre>'.print_r($_POST).'</pre>';
			//EMAIL PWS
			try {
			    $mandrill = new Mandrill( get_option('mandrill_api') );
			    $body = load_template_part('templates/emails/email-contact-to.php');
			    $message = array(
			        'html' => $body,
			        'auto_text' => true,
			        'subject' => bloginfo('name').': Message from '.$_POST['contact_name'],
			        'from_email' => get_option('sending_email'),
			        'from_name' => $_POST['contact_name'],
			        'preserve_recipients' => false,
			        'to' => array(
			        	array('email'=> get_option('primary_email'), 'type'=>'to')
			        ),
			        'headers' => array('Reply-To' => $_POST['contact_email_address']),
			        'subaccount' => get_option('mandrill_subaccount'),
			        'signing_domain' => get_option('signing_domain')
			    );
			    $mandrill->messages->send($message);
			    
			    set_transient('post_message', 'Your Contact has been sent.', 3600 );
			    
			} catch(Mandrill_Error $e) {		
				set_transient('post_message', 'Something has gone wrong. Please try again.', 3600 );
			}

			wp_redirect( $_POST['redirect']);
			exit();
		}
	}
	add_action( 'init', 'contact' );


?>