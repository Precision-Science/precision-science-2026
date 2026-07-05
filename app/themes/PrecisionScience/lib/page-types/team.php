<?php

class Team_Page_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'Team Member',
		  'description' => 'Team member info and bio',
		  'post_type'   => 'team',
		  'template'    => 'pages/team-page.php'
		];
	}
	public function remove() {
		return ['editor', 'commentdiv', 'comments', 'thumbnail','authordiv','pageparentdiv'];
	}
	public function register() {
		
		//INTRO
		$this->box( 'About', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'title',
				'title' => 'Job Title'
			] ),
			papi_property( [
			  'title'    => 'Email',
			  'slug'	 => 'email',
			  'type'  	 => 'string',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
			  'title'    => 'Headshot',
			  'slug'	 => 'headshot',
			  'type'  	 => 'image'
			] ),
			papi_property( [
			  'title'    => 'Image',
			  'slug'	 => 'image',
			  'type'  	 => 'image'
			] ),
			papi_property( [
			  'title'    => 'Bio',
			  'slug'	 => 'bio',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] )
		] );
	}
};