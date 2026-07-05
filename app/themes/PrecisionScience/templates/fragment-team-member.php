<figure class="headshot" data-scroll-show data-scroll-slide="team-member">
	<?php
		$headshot = papi_get_field('headshot');
		$headshot_url = papi_get_field('headshot') == null ? 'empty' : $headshot->url;
	?>
	<div class="image"><img class="defer" alt="Photo of <?php the_title(); ?>, <?php the_papi_field('title'); ?>" src="<?php echo $headshot_url; ?>" height="600" width="600" /></div>
	<figcaption class="name">
		<strong><?php the_title(); ?></strong><br/><?php the_papi_field('title'); ?>
	</figcaption>
</figure>