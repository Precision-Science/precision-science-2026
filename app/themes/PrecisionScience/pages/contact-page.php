<?php while ( have_posts() ) : the_post(); ?>
<!-- MASTHEAD INTRO -->
<div class="bg grid-container">
	<?php get_template_part('templates/page','header'); ?>
	<hr class="divide" />
	<!-- CONTACT INFO -->
	<article id="contact-info" data-scroll-show data-scroll-slide="contact-info">
		<div class="grid-container">
			<div class="row"><div class="column">
				<div itemscope itemtype="http://schema.org/LocalBusiness">
					<ul class="phones">
						<?php
						$phones = papi_get_field('phone_numbers');
						foreach($phones as $key => $phone):
						?>
							<li><span itemprop="countryAbbr"><?php echo $phone['label']; ?></span> <span itemprop="telephone"><?php echo $phone['phone_number_pretty']; ?></span></li>
						<?php endforeach ?>
					</ul>
					<div class="address">
						<span itemprop="name"><span class="sr-only"><?php bloginfo(' name'); ?>&nbsp;</span><strong>Corporate Office and Manufacturing Facility</strong></span>
						<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<span itemprop="streetAddress"><?php the_papi_field('street'); ?></span><br/><span itemprop="addressLocality"><?php the_papi_field('city'); ?></span>,&nbsp;<span itemprop="addressRegion"><?php the_papi_field('state'); ?></span>&nbsp;<span itemprop="postalCode"><?php the_papi_field('zip'); ?></span>&nbsp;<span itemprop="addressCountry"><?php the_papi_field('country'); ?></span>
						</p>
					</div>
				</div>
				<div class="row"><div class="column">
					<p class="type-small"><strong>Precision Science is a contract manufacture of only animal pharmaceuticals and nutraceuticals.</strong></p>
					<br/><br/>
				</div></div>
				<button data-target="modal-contact" class="btn btn-mint email-us">Email Us</button>
			</div>
		</div>
	</article>
</div>
<hr class="divide show-for-small-up" />
<!-- MAP -->
<article id="map" data-scroll-show data-scroll-class="animate" class="show-for-small-up">
	<div class="grid-container">
		<div class="row"><div class="column">
			<?php get_template_part('templates/fragment','map'); ?>
		</div></div>
	</div>
	</div>
</article>
<?php endwhile; ?>