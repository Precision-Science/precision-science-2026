<?php

class Contact_Page_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'Contact Us',
		  'description' => 'The Contact Page (Address, Phone Numbers & Map)',
		  'post_type'   => 'page',
		  'template'    => 'pages/contact-page.php'
		];
	}
	public function remove() {
		return ['editor', 'commentdiv', 'comments', 'thumbnail','authordiv','pageparentdiv'];
	}
	public function register() {
		
		$this->box( 'Intro', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'intro_title',
				'title' => 'Title',
				'settings' => [
					'allow_html' => true
				]
			] )
		]);
		$this->box( 'Address', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'street',
				'title' => 'Street Address'
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'city',
				'title' => 'City'
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'state',
				'title' => 'State'
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'zip',
				'title' => 'Zip Code'
			] )
			,
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'country',
				'title' => 'Country'
			] )
		]);
		$this->box( 'Contact', [
			papi_property( [
				'title'    => 'Phone Numbers',
				'slug'     => 'phone_numbers',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'slug'	=> 'label',
							'title' => 'Country'
						] ),
						papi_property( [
							'type'  => 'string',
							'slug'	=> 'phone_number_pretty',
							'title' => 'Phone Number'
						] ),
						papi_property( [
							'type'  => 'string',
							'slug'	=> 'phone_number_func',
							'title' => 'Phone Number Functional'
						] )
					]
				]
			] )
		] );
	}

}
