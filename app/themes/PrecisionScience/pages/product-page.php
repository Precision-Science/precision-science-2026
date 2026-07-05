<?php while ( have_posts() ) : the_post(); ?>
    <!-- HEADER -->
	<style>
	#masthead{
		background-image:url(<?php echo '/app/themes/PrecisionScience/dist/img/'.papi_get_field('intro_background'); ?>);
	}	
	</style>	
	<header id="masthead" class="page-header grid-container" data-scroll-show data-scroll-class="masthead-reveal">
		<div class="row">
			<div class="column xsmall-12 padding-xso-bottom--lg">
				<h1><?php the_papi_field('intro_title'); ?></h1>
				<p class="intro-text"><?php the_papi_field('intro_text'); ?></p>
				<div class="intro-body"><?php the_papi_field('intro_body'); ?></div>
				<p class="headline cta"><strong><?php the_papi_field('intro_cta_text'); ?></strong></p>
				<!-- -->
				<?php $CTA = papi_get_field('intro_cta_link'); ?>
				<a class="btn btn-mint" href="<?php echo $CTA->url; ?>" target="<?php echo $CTA->target; ?>"><?php echo $CTA->title; ?></a>
			</div>
		</div>
	</header>
    <hr class="divide" />
	<!-- SECTIONS -->
	<?php
			
		$slugs = papi_get_slugs();
		$include = ['Section 1','Section 2'];
		$count = 0;
		foreach($slugs as $key => $fieldset){
			if( in_array($key,$include) ):		
			
				$count++;
				$fieldset['pos_left'] = ($count % 2) ? 'small-push-6' : '';
				$fieldset['pos_right'] = ($count % 2) ? 'small-pull-6' : '';
				
				get_template_part('templates/fragment','product-section');
			
			endif;
		}
	?>
	<hr class="divide" />
    <!-- TESTIMONIALS -->
	<article role=article class="fragment-testimonials" data-scroll-show data-scroll-slide="fragment-testimonials" data-equalizer="testimonials">
		<div class="testimonials gallery" data-equalizer-watch="testimonials">
            <div class="testimonial">
                <div class="table" data-equalizer-watch="testimonials">
                    <div class="cell">
                        <div class="row">
                            <div class="column medium-12 medium-centered">
                                <p class="signature text-center"><?php the_papi_field('quote_title'); ?></p>
                                <p class="quote text-center"><?php the_papi_field('quote_text'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</article>
    <!-- PACKAGING-->
    <?php the_papi_field('packaging'); ?>
    <!-- CERTIFIED-->
    <?php $certified_image = papi_get_field('certified_image'); ?>
	<article role="article" class="fragment-home fragment-home-row grid-container" style="background-color:<?php echo papi_get_field('certified_bgcolor'); ?>" data-equalizer data-equalizer-mq="small-up" data-scroll-show data-scroll-slide="fragment-home">
		<div class="row collapse">
			<div class="column small-6 image small-push-6" data-equalizer-watch style="min-height:300px; background-image:url(<?php echo $certified_image->url; ?>);background-size:cover;">
<!-- 				<img src="<?php echo $certified_image->url; ?>" alt="<?php echo $certified_image->alt; ?>" /> -->
			</div>
			<div class="column small-6 text small-pull-6" data-equalizer-watch>
				<div class="table">
					<div class="cell">
						<h2 class="subheading"><?php the_papi_field('certified_title'); ?></h2>
						<p><?php the_papi_field('certified_text'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</article>


<?php endwhile; ?>
<!-- END FEATURE -->