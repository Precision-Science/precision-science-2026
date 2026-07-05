<?php

class Default_Page_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'Default',
		  'description' => 'Default page template',
		  'post_type'   => 'page',
		  'template'    => 'pages/default-page.php'
		];
	}
	public function remove() {
		return ['editor', 'commentdiv', 'comments', 'thumbnail','authordiv','pageparentdiv'];
	}
	public function register() {
		//INTRO
		$this->box( 'Intro', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'intro_title',
				'title' => 'Title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'intro_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] )
		] );
		//CONTENT
		$this->box( 'Content', [
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'text',
			  'type'  	 => 'editor'
			] )
		] );
	}
}
