<?php

class Post_Page_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'Post',
		  'description' => 'Page template',
		  'post_type'   => 'post'
		];
	}
	public function remove() {
		return ['thumbnail'];
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
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Background Image',
				'slug'     => 'intro_background',
				'settings' => [
					'items' => array('Pig' 		=> 'pig.jpg',
									 'Chickens' => 'chickens.jpg',
									 'Dog' 		=> 'dog.jpg',
									 'Dog 2'	=> 'dog02.jpg',
									 'Puppy and kitten'	=> 'dog03.jpg',
									 'Horse'	=> 'horse.jpg',
									)
				]
			] )
		] );
		//CONTENT
		$this->box( 'Featured Image', [
			papi_property( [
			  'title'    => 'Image',
			  'slug'	 => 'feature_image',
			  'type'  	 => 'image'
			] )
		] );
	}
}
