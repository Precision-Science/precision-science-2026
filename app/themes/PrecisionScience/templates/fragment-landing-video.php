<article id="video_feature" class="landing">
	<div class="grid-container upper">
				<section class="row row--fullwidth padding-xsu-gutters--sm padding-smu-gutters--sm padding-lgu-gutters--xs">
			<div class="column xsmall-12">
				<hr class="divide divide--mint" />
			</div>
		</section>
		<section class="row row--fullwidth padding-xsu-top--lg padding-xsu-gutters--sm padding-smu-gutters--sm padding-lgu-gutters--xs">
			<div class="column medium-6 medium-push-6 content-color--<?php the_papi_field('subhead_color'); ?>">
				<?php the_papi_field('text'); ?>
			</div>
			<div class="column medium-6 medium-pull-6">
				<div id="video_feature-embed" class="video-embed padding-xsu-top--md padding-mdu-top--xs">
					<?php
						
					$url = papi_get_field('feature_video');
					$service  = wp_oembed_get($url); 
					print_r( $service );
							
					?>
				</div>
				<div class="padding-xsu-top--md">
					<h3>Have a specific question? Email us.</h3>
					<div class="landingpage-contact row collapse">
					<?php
						set_query_var('landingpage_referrer', get_permalink());
						get_template_part('templates/form','landingpage');
					?>
					</div>
				</div>
			</div>
		</section>
	</div>
</article>