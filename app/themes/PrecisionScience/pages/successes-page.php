<?php while ( have_posts() ) : the_post(); ?>
<!-- MASTHEAD INTRO -->
<div class="bg grid-container">
	<?php get_template_part('templates/page','header'); ?>
	<hr class="divide" />
	<!-- TESTIMONIALS -->
	<article role=article class="fragment-testimonials" data-scroll-show data-scroll-slide="fragment-testimonials" data-equalizer="testimonials" style="margin-bottom:4rem;">
		<div class="testimonials gallery" data-equalizer-watch="testimonials">
			<?php
				$testimonials = papi_get_field('testimonial');
				foreach($testimonials as $id => $key):
			?>
				<div class="testimonial">
					<div class="table" data-equalizer-watch="testimonials">
						<div class="cell">
							<div class="row"><div class="column medium-10 medium-centered">
								<p class="quote text-center"><?php echo $key['quote_text']; ?></p>
								<p class="signature text-center"><span><?php echo $key['author_title']; ?></span></p>
							</div></div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</article>
</div>
<hr class="divide" />
<!-- SECTIONS -->
<?php
		
	$slugs = papi_get_slugs();
	$exclude = ['Intro','Testimonials'];
	$count = 0;
	foreach($slugs as $key => $fieldset){
		if( !in_array($key,$exclude) ):		
		
			$count++;
			$fieldset['pos_left'] = ($count % 2) ? 'small-push-6' : '';
			$fieldset['pos_right'] = ($count % 2) ? 'small-pull-6' : '';
			get_template_part('templates/fragment','successes');
		
		endif;
	}
?>
<?php endwhile; ?>
<hr class="divide" />