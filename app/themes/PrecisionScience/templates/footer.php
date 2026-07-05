<footer id="footer" role="contentinfo">
	<div class="row brand">
		<div class="column small-3">
			<a href="#top"><img class="logo" alt="Precision Science logo" src="<?php echo get_template_directory_uri();?>/dist/img/logo-mark-white.svg"/></a>
		</div>
	</div>
	<div class="row" data-equalizer data-equalizer-mq="medium-up">
		<div class="column small-12 medium-9" data-equalizer-watch>
			<div class="footer-container nav-container">
				<ul id="menu-footer" class="footer_nav">
				<li>
						<a href="/about/" data-id="46" data-slug="about" data-title="About">About Us</a>
						<ul class="sub-menu">
							<li><a href="/about/#timeline" data-id="46" data-slug="about" data-title="About">History</a></li>
							<li><a href="/about/#team" data-id="46" data-slug="about" data-title="About">Our Team</a></li>
							<li><a href="/contact" data-id="110" data-slug="page110" data-title="Contact Us">Contact us</a></li>
							<li><a href="/careers" data-id="498" data-slug="page498" data-title="Careers">Careers</a></li>
							
						</ul>
					</li>
					<li>
						<a href="/capabilities/" data-id="44" data-slug="capabilities" data-title="capabilities">Capabilities</a>
						<ul class="sub-menu">
							<li><a href="/capabilities/#manufacturing" data-id="44" data-slug="page44" data-title="Capabilities">Manufacturing</a></li>
							<li>&nbsp;&nbsp;&nbsp;<a href="/capabilities/softchews" data-id="415" data-slug="page415" data-title="Soft Chews">Soft Chews</a></li>
							<li>&nbsp;&nbsp;&nbsp;<a href="/capabilities/powder" data-id="423" data-slug="page423" data-title="Powder">Powder</a></li>
							<li>&nbsp;&nbsp;&nbsp;<a href="/capabilities/pellets" data-id="418" data-slug="page418" data-title="Pellets">Pellets</a></li>
							<li>&nbsp;&nbsp;&nbsp;<a href="/capabilities/faqs" data-id="404" data-slug="page404" data-title="FAQs">FAQs</a></li>
							<li><a href="/capabilities/#packaging" data-id="44" data-slug="page44" data-title="Capabilities">Packaging</a></li>
							<li><a href="/capabilities/#analytical" data-id="44" data-slug="page44" data-title="Analytics">Analytics</a></li>
						</ul>
					</li>
					<li>
						<a href="/promise/" data-id="60" data-slug="promise" data-title="Our Promise">Our Promise</a>
						<ul class="sub-menu"><li><a href="/promise/#promise" data-id="60" data-slug="page60" data-title="Our Promise">Precision Promise</a></li>
							<li><a href="/promise/#elements-of-success" data-id="60" data-slug="page60" data-title="Our Promise">Success</a></li>
						</ul>	
					</li>
					<li>
						<a href="/successes/" data-id="100" data-slug="successes" data-title="Our Successes">Our Successes</a>
						<ul class="sub-menu">
							<li><a href="/successes/#innovation" data-id="100" data-slug="page100" data-title="Our Successes">Innovation</a></li>
							<li><a href="/successes/#negotiation" data-id="100" data-slug="page100" data-title="Our Successes">Negotiation</a></li>
							<li><a href="/successes/#collaboration" data-id="100" data-slug="page100" data-title="Our Successes">Collaboration</a></li>
							<li><a href="/successes/#analytical" data-id="100" data-slug="page100" data-title="Our Successes">Analytical</a></li>
							<li><a href="/successes/#on-time-delivery" data-id="100" data-slug="page100" data-title="Our Successes">On-time Delivery</a></li>
							<li><a href="/successes/#simple-solutions" data-id="100" data-slug="page100" data-title="Our Successes">Simple Solutions</a></li>
							<li><a href="/successes/#efficiency" data-id="100" data-slug="page100" data-title="Our Successes">Efficiency</a></li>
						</ul>
					</li>
					<li>
						<a href="/news/" data-id="100" data-slug="news" data-title="News">News</a>
						<ul class="sub-menu">
							<?php
								$terms = get_terms( 'category', 'orderby=count&hide_empty=0&number=5');
								foreach ( $terms as $term ) {
							        echo '<li><a href="'.get_term_link($term->term_id).'" data-slug="'.$term->slug.'" data-title="'.$term->name.'">'.$term->name.'</a></li>';
							    }
							?>
						</ul>
					</li>
					
</ul></div>
		</div>
		<div class="column small-12 medium-3" data-equalizer-watch>
			<div class="footer-container contact-container">
				<ul class="phones">
					<?php
					$contact_id = 110;
					$phones = papi_get_field($contact_id,'phone_numbers');
					foreach($phones as $key => $phone):
					?>
						<li><span itemprop="countryAbbr"><?php echo $phone['label']; ?></span> <span itemprop="telephone"><?php echo $phone['phone_number_pretty']; ?></span></li>
					<?php endforeach ?>
					<li>
						Manufacturing Facility<br/>Phoenix, AZ  USA
					</li>
				</ul>
				<div class="contact-btn">
					<button data-target="modal-contact" class="btn btn-border">Email Us</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row divide">
		<div class="column small-12">
			<hr/>
		</div>
	</div>
	<div class="row copyright">
		<div class="column xsmall-12 small-5 small-push-7 medium-4 medium-push-8">
			<p><img src="<?php echo get_template_directory_uri();?>/dist/img/fda.svg" alt="FDA logo"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo get_template_directory_uri();?>/dist/img/epa.svg" alt="EPA logo"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo get_template_directory_uri();?>/dist/img/cgmp.svg" alt="cGMP logo"/></p>
		</div>
		<div class="column xsmall-12 small-7 small-pull-5 medium-8 medium-pull-4">
			<p><span>&copy;</span><?php echo date('Y'); ?> <?php echo bloginfo('name'); ?></p>
		</div>
	</div>
</footer>
<!-- END THEME -->
<?php get_template_part('templates/modal','contact'); ?>
<?php get_template_part('templates/modal','video'); ?>

<!-- ICONS -->
<svg display="none" xmlns="http://www.w3.org/2000/svg"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
	<symbol width="16" height="16" viewBox="0 0 448 512" id="iconExternalLink">
		<path d="M256 64C256 46.33 270.3 32 288 32H415.1C415.1 32 415.1 32 415.1 32C420.3 32 424.5 32.86 428.2 34.43C431.1 35.98 435.5 38.27 438.6 41.3C438.6 41.35 438.6 41.4 438.7 41.44C444.9 47.66 447.1 55.78 448 63.9C448 63.94 448 63.97 448 64V192C448 209.7 433.7 224 416 224C398.3 224 384 209.7 384 192V141.3L214.6 310.6C202.1 323.1 181.9 323.1 169.4 310.6C156.9 298.1 156.9 277.9 169.4 265.4L338.7 96H288C270.3 96 256 81.67 256 64V64zM0 128C0 92.65 28.65 64 64 64H160C177.7 64 192 78.33 192 96C192 113.7 177.7 128 160 128H64V416H352V320C352 302.3 366.3 288 384 288C401.7 288 416 302.3 416 320V416C416 451.3 387.3 480 352 480H64C28.65 480 0 451.3 0 416V128z"/>
	</symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
	<symbol width="16" height="16" viewBox="0 0 448 512" id="iconPlay">
		<path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/>
	</symbol>
</svg>