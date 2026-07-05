<?php

class Options_Type extends Papi_Option_Type {

  /**
   * The type meta options.
   *
   * @return array
   */
  public function meta() {
    return [
      'menu' => 'options-general.php',
      'name' => 'Site Options'
    ];
  }

  /**
   * Register content meta box.
   */
  public function register() {
	  $this->box( 'Social Sharing', [
      papi_property( [
        'title' => 'Premessage',
        'slug'  => 'social_message',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'ShareThis ID',
        'slug'  => 'sharethis_id',
        'type'  => 'string'
      ])
    ] );
    $this->box( 'Google Services', [
      papi_property( [
        'title' => 'Google Analytics ID',
        'slug'  => 'ga_id',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Google Tag Manager ID',
        'slug'  => 'gtm_id',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Google Tag ID',
        'slug'  => 'gtag_id',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Google Site Verification ID',
        'slug'  => 'google_site_verification',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Google Recaptcha - Client Key',
        'slug'  => 'recaptcha_client_key',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Google Recaptcha - Secret Key',
        'slug'  => 'recaptcha_secret_key',
        'type'  => 'string'
      ] )
      
    ] );
    $this->box( 'Webhook' , [
      papi_property( [
        'title' => 'Webhook URL',
        'slug'  => 'webhook_url',
        'type'  => 'string'
      ] )
    ] );
    $this->box( 'Resend (Emails)', [
      papi_property( [
        'title' => 'API Key',
        'slug'  => 'resend_key',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Send To - Email Addresses (comma separated)',
        'slug'  => 'primary_email',
        'type'     => 'string'
      ] ),
      papi_property( [
        'title' => 'Test - Email Addresses (comma separated)',
        'slug'  => 'test_email',
        'type'     => 'string'
      ] ),
      papi_property( [
        'title' => 'Send From - Email Address',
        'slug'  => 'sending_email',
        'type'  => 'string'
      ] )
      
    ] );
    $this->box( 'MailChimp (Mailing List)', [
      papi_property( [
        'title' => 'API Key',
        'slug'  => 'mailchimp_key',
        'type'  => 'string'
      ] ),
      
      papi_property( [
        'title' => 'List ID',
        'slug'  => 'mailchimp_list_id',
        'type'  => 'string'
      ] ),
      
      papi_property( [
        'title' => 'Unsubscribe URL',
        'slug'  => 'mailchimp_unsubscribe_url',
        'type'  => 'string'
      ] )
      
    ] );
    $this->box( 'Salesforce (WebToLead Form API)', [
      papi_property( [
        'title' => 'OID (DEV: 00D6A000000tflb)',
        'slug'  => 'salesforce_oid',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Return URL (API path)',
        'slug'  => 'salesforce_returl',
        'type'  => 'string'
      ] ),
      papi_property( [
        'title' => 'Enable send',
        'slug'  => 'salesforce_send',
        'type'  => 'string'
      ] )
    ] );
  }
}