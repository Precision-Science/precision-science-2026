<?php while ( have_posts() ) : the_post(); ?>

	<!-- MASTHEAD INTRO -->
	<?php get_template_part('templates/fragment','home-masthead'); ?>
	<hr class="divide" />
	<!-- SECTIONS -->
	<?php
			
		$slugs = papi_get_slugs();
		$exclude = ['Intro','Section 4'];
		$count = 0;
		foreach($slugs as $key => $fieldset){
			if( !in_array($key,$exclude) ):		
			
				$count++;
				$fieldset['pos_left'] = ($count % 2) ? 'small-push-6' : '';
				$fieldset['pos_right'] = ($count % 2) ? 'small-pull-6' : '';
				get_template_part('templates/fragment','home');
			
			endif;
		}
	?>
	<hr class="divide" />	
	<!-- FACILITY GALLERY -->
	<?php get_template_part('templates/fragment','home-facility'); ?>

<?php endwhile; ?>

<hr class="divide" />
<!-- TEAM MEMBERS -->
<?php /* get_template_part('templates/fragment','home-team'); */ ?>
