<article id="text_feature" class="landing">
	<div class="grid-container upper">
				<section class="row row--fullwidth padding-xsu-gutters--sm padding-smu-gutters--sm padding-lgu-gutters--xs">
			<div class="column xsmall-12">
				<hr class="divide divide--mint" />
			</div>
		</section>
		<section class="row padding-xsu-top--lg padding-xsu-gutters--sm padding-smu-gutters--sm padding-lgu-gutters--xs">
			<div class="column medium-12 content-color--<?php the_papi_field('subhead_color'); ?>">
				<?php the_papi_field('text'); ?>
			</div>
		</section>
		<section class="row padding-xsu-top--lg">
			<div class="column medium-6">
				<div class="padding-xsu-top--md">
					<h3>Have a specific question? Email us.</h3>
					<div class="landingpage-contact row collapse">
					<?php
						set_query_var('landingpage_referrer', get_permalink());
						// get_template_part('templates/form','landingpage');
					?>
					</div>
				</div>
			</div>
		</section>
	</div>
</article>