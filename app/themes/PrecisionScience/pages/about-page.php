<?php while ( have_posts() ) : the_post(); ?>
<!-- MASTHEAD INTRO -->
<?php get_template_part('templates/page','header'); ?>
<hr class="divide" />
<!-- TIMELINE -->
<?php
	$timeline_arr = papi_get_field('timeline_item');
	$total_items = count($timeline_arr)-1;
	function orderByYear($a, $b) {
		return intval($a["year"]) - intval($b["year"]);
	}
	usort($timeline_arr, "orderByYear");
?>
<article id="timeline" data-scroll-show data-scroll-slide="timeline">
	<div class="grid-container upper">
		<div class="mask">
			<div class="container">        	
		    	<ul class="tabs" style="left: 0px;"> 
			    	<?php foreach($timeline_arr as $key => $item): ?>
					<li id="timeline-<?php echo $key+1; ?>-tab" class="tab"><button data-target="#timeline-<?php echo $key+1; ?>"><?php echo $item['year']; ?></button></li>
					<?php endforeach; ?>
		        </ul>
    		</div>
		</div>
	</div>
	<div class="grid-container lower">
		<div class="mask">
			<div class="container"> 
				<div class="tab-content">
				<?php	
					foreach($timeline_arr as $key => $item):
						get_template_part('templates/fragment','timeline');
					endforeach;
				?>
				</div>
				<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
				<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>
			</div>
		</div>
	</div>

</article>
<?php endwhile; ?>
<hr class="divide" />
<!-- TEAM MEMBERS -->
<article id="team">
	<div class="grid-container" data-scroll-show data-scroll-slide="team">
		<div class="row">
			<header class="column xsmall-12">
				<h2>Teamwork</h2>
				<h3>Your success is our success.</h3>
				<p>The story of Precision Science is one based on expertise, dependability, and partnership. Our team's spirit of innovation and collaboration has led to shared successes for us and our clients. Whether we're manufacturing custom formula animal pharmaceuticals or nutraceuticals, every project Precision Science undertakes is ingrained with our core values:</p>
			</header>
		</div>
		<div class="row">
			<div class="column xsmall-12">
				
				<ul class="block-grid">
					<li class="process-item" data-color="#005587" data-scroll-show>
						<div class="sides">
							<div class="side-a" style="border-color:#005587">
								<h2 style="color:#005587; height: 100%; margin-top: -1.75rem;">
									<span>Promote<br/>Integrity</span>
								</h2>
							</div>
							<div class="side-b" data-color="#005587" style="background-color:#005587">
								<div class="icon">
									<div class="inset" style="color:#005587">PI</div>
								</div>
								<p>Honesty and fairness drives hard work and accountability.</p>
							</div>
						</div>
					</li>
					<li class="process-item" data-color="#6CACE4" data-scroll-show>
						<div class="sides">
							<div class="side-a" style="border-color:#6CACE4">
								<h2 style="color:#6CACE4; height: 100%; margin-top: -1.75rem;">
									<span>People<br/>Matter</span>
								</h2>
							</div>
							<div class="side-b" data-color="#6CACE4" style="background-color:#6CACE4">
								<div class="icon">
									<div class="inset" style="color:#6CACE4">PM</div>
								</div>
								<p>We focus on the success of our people through collaboration, support and respect.</p>
							</div>
						</div>
					</li>
					<li class="process-item" data-color="#6B4C4C" data-scroll-show>
						<div class="sides">
							<div class="side-a" style="border-color:#6B4C4C">
								<h2 style="color:#6B4C4C; height: 100%; margin-top: -1.75rem;">
									<span>Produce<br/>Quality</span>
								</h2>
							</div>
							<div class="side-b" data-color="#6B4C4C" style="background-color:#6B4C4C">
								<div class="icon">
									<div class="inset" style="color:#6B4C4C">PQ</div>
								</div>
								<p>Dedicated and diligent to ensure every detail and standard is met.</p>
							</div>
						</div>
					</li>
					<li class="process-item" data-color="#6FA287" data-scroll-show>
						<div class="sides">
							<div class="side-a" style="border-color:#6FA287">
								<h2 style="color:#6FA287; height: 100%; margin-top: -1.75rem;">
									<span>Pursue<br/>Knowledge</span>
								</h2>
							</div>
							<div class="side-b" data-color="#6FA287" style="background-color:#6FA287">
								<div class="icon">
									<div class="inset" style="color:#6FA287">PK</div>
								</div>
								<p>Empowering people toward continuous improvement. Love of learning and creative thinking inspire innovation.</p>
							</div>
						</div>
					</li>
					<li class="process-item" data-color="#B7A99A" data-scroll-show>
						<div class="sides">
							<div class="side-a" style="border-color:#B7A99A">
								<h2 style="color:#B7A99A; height: 100%; margin-top: -1.75rem;">
									<span>Practice<br/>Safety</span>
								</h2>
							</div>
							<div class="side-b" data-color="#B7A99A" style="background-color:#B7A99A">
								<div class="icon">
									<div class="inset" style="color:#B7A99A">PS</div>
								</div>
								<p>Every minute, every day, in everything we do.</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</article>
<article id="vision">
	<div class="grid-container" data-scroll-show data-scroll-slide="vision" style="padding-top: 4.5rem;
padding-bottom: 4.5rem;background-image: url(https://precisionscience.com/app/themes/PrecisionScience/dist/img/grid-bg.svg);background-repeat: repeat;">
		<div class="row">
			<header class="column xsmall-12" style="padding-bottom:2rem;">
				<h2 style="text-align: center;">Making life better</h2>
			</header>
		</div>
		<div class="row">
			<div class="column small-6" data-scroll-slide="capabilities">
				<p style="font-size:1.2rem;">Although we make world-class products for animals, we like to think we're in the people business. The professional, and often personal, relationships we share with our clients, vendors, and employees are built on trust and mutual respect. Many of our clients have been with us for years.</p>
			</div>
			<div class="column small-6" data-scroll-slide="capabilities">
				<p style="font-size:1.2rem;">What starts as a one-time project often turns into long-term partnerships. Our ability to understand and learn our clients' particular needs allows us to offer solutions to a multitude of challenges and deliver products, price points and outcomes they have come to depend on.</p>
			</div>
		</div>
		<div class="row">
			<div class="column xsmall-12" style="padding-top:2rem;">
				<h4 style="text-align: center;"><span style="color:#00b2a9;">The Precision Story is growing and unfolding every day.</span> <br/><strong>Join us for the next chapter.</strong></h4>
			</div>
		</div>
	</div>
</article>
<style>
body.about #timeline .upper ul li button, body.page46 #timeline .upper ul li button{
	padding-top:30px;
	height:92px;
}
body.about #vision header h2, body.page46 #vision header h2 {
	margin: 0 0 .25rem;
	font-size: 1.25rem;
	line-height: 1.5rem;
	font-weight: 300;
}
body.about #vision header h3, body.page46 #vision header h3 {
	margin: 0 0 .75rem -.125rem;
	font-weight: 600;
	font-size: 2.625rem;
	line-height: 3rem;
}
</style>
<!--
<article id="team">
	<div class="grid-container" data-scroll-show data-scroll-slide="team">
		<div class="row">
			<header class="column xsmall-12">
				<h2>Our Team</h2>
				<h3>A team of experienced professionals.</h3>
			</header>
		</div>
	</div>
	<div class="team-grid">
		<div class="grid-container">
			<div class="row">
				<div class="column xsmall-12">
					<ul class="full team-members block-grid small-block-grid-2 medium-block-grid-3">
						<?php
							
							$args = array(
								'post_type'      => 'team',
								'posts_per_page' => '-1',
								'order_by' 	     => 'menu_order',
								'order'			 => 'ASC'			
							);
							$key = 0;
							$team = new WP_Query($args);
							if ( $team->have_posts() ):
								while ( $team->have_posts() ):
									$key++;
									$team->the_post();
									get_template_part('templates/wrapper','team-member-about');
								endwhile;
							endif;
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php get_template_part('templates/modal','bio'); ?>
	</div>
</article>
-->