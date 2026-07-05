<?php while ( have_posts() ) : the_post(); ?>
	<?php
		$social_image_1 = papi_get_field('social_image_1');
		$social_image_2 = papi_get_field('social_image_2');
		$social_image_3 = papi_get_field('social_image_3');

	?>
	<!-- MASTHEAD INTRO -->
	<header id="masthead" class="page-header grid-container" data-scroll-show data-scroll-class="masthead-reveal">
		<div class="grid-container">
			<div class="row collapse">
				<div class="column xsmall-12">
					<div class="row">
						<div class="column xsmall-12">
							<h1 class=""><?php the_papi_field('h1_title'); ?></h1>
							<?php if( papi_get_field('intro_title') ): ?>
								<p><?php the_papi_field('intro_title'); ?></p>
							<?php endif; ?>
							<div>
								<?php
									$intro_link = papi_get_field('intro_link');
								?>
								<a class="btn btn-mint" href="<?php echo $intro_link->url; ?>" target="<?php echo $intro_link->target; ?>"><?php echo $intro_link->title; ?></a>
								&nbsp;&nbsp;&nbsp;<button class="open-careersshare share_link">Share Careers at Precision Science <svg class="icon-inline icon-link" alt="external link" viewBox="0 0 16 16" width="12" height="12">
									<use xlink:href="#iconExternalLink" />
								</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="background_video">
			<video autoplay muted loop poster="/app/media/ps_video_background.png">
			<source src="/app/media/page/labeling-1.mp4" type="video/mp4">
			</video>
		</div>
	</header>
	<?php get_template_part('templates/fragment','careers'); ?>
	<hr class="divide" />
	<article id="whatwedo" class="fragment-careers-whatwedo" style="background-color:<?php echo papi_get_field('section2_bgcolor'); ?>" data-scroll-show data-scroll-slide="career-section2">
		<div class="grid-container">
			<div class="row">
				<header class="column xsmall-12">
					<h2><?php echo papi_get_field('section2_title'); ?></h2>
					<h3><?php echo papi_get_field('section2_subtitle'); ?></h3>
					<p><?php echo papi_get_field('section2_text'); ?></p>
					<?php
						$section2_link = papi_get_field('section2_link');
					?>
					<p><a class="btn" href="<?php echo $section2_link->url; ?>" target="<?php echo $section2_link->target; ?>"><?php echo $section2_link->title; ?></a></p>
				</header>
			</div>
		</div>
	</article>	
	<script>
		//Background video
		var iOS = /iPad|iPhone|iPod/.test(navigator.platform);
		if( iOS ) {
			var background_videos = document.querySelectorAll('.background_video');
			for( i=0; i<background_videos.length; i++ ) {
				background_videos[i].parentNode.removeChild(background_videos[i]);
			}
		}
	</script>
	<div id="careers_share_modal" class="share-modal modal">
		<div class="close">Close</div>
		<h3>Share careers at Precision Science.</h3>
		<div class="row collapse padding-xsu-top--sm">
			<script>
				var career_share_obj = {
					"social_image_1": {
						title:"<?php echo $social_image_1->description ?>",
						description: "<?php echo papi_get_field('social_desc') ?>",
						img:"<?php echo $social_image_1->url ?>",
						url:"<?php echo get_permalink($post->ID).'?utm=social_image_1'; ?>"
					},
					"social_image_2": {
						title:"<?php echo $social_image_2->description ?>",
						description: "<?php echo papi_get_field('social_desc') ?>",
						img:"<?php echo $social_image_2->url ?>",
						url:"<?php echo get_permalink($post->ID).'?utm=social_image_2'; ?>"
					},
					"social_image_3": {
						title:"<?php echo $social_image_3->description ?>",
						description: "<?php echo papi_get_field('social_desc') ?>",
						img:"<?php echo $social_image_3->url ?>",
						url:"<?php echo get_permalink($post->ID).'?utm=social_image_3'; ?>"

					}
				}
			</script>
			<div class="grid-container">
				<div class="row">
					<div class="column small-6">
						<img class="share_image" src="<?php echo $social_image_1->url ?>">
					</div>
					<div class="column small-6">
						<h4>Pick one:</h4>
						<div class="options">
							<label class="radiobox">
								<input class="share_image_section" checked="checked" selected type="radio" name="graphic" value="social_image_1">
								<span class="radiomark"></span>
								<?php echo $social_image_1->title ?>
							</label>
							<label class="radiobox">
								<input class="share_image_section" type="radio" name="graphic" value="social_image_2">
								<span class="radiomark"></span>
								<?php echo $social_image_2->title ?>
							</label>
							<label class="radiobox">
								<input class="share_image_section" type="radio" name="graphic" value="social_image_3">
								<span class="radiomark"></span>
								<?php echo $social_image_3->title ?>
							</label>
						</div>
						<h4>Share on:</h4>
						<?php 
							$share_targets = array('linkedin','facebook','twitter');
							foreach( $share_targets as $target ){
						?>
							<div 
								class="st-custom-button <?php echo $target ?>-share-btn" 
								data-network="<?php echo $target ?>"
								data-url="<?php echo get_permalink($post->ID).'?utm=social_image_1'; ?>" 
								data-title="<?php echo $social_image_1->description ?>" 
								data-image="<?php echo $social_image_1->url ?>" 
								data-description="<?php echo papi_get_field('social_desc') ?>"
								data-email-subject="<?php echo $social_image_3->description ?>"
								data-message="<img src='<?php echo $social_image_1->url ?>' /><br/><?php echo papi_get_field('social_desc') ?><br/><?php echo get_permalink($post->ID).'?utm=social_image_1'; ?>">
								<span><?php echo $target ?></span>
							</div>
							
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="careers_video_modal" class="video-modal modal">
		<div class="close">Close</div>
		<video id="careers-video" class="video-js" controls preload="metadata" poster="/app/media/ps-video-poster.jpg">
			<source src="<?php echo papi_get_field("section1_video_url_mp4"); ?>" type='video/mp4'>
			<source src="<?php echo papi_get_field("section1_video_url_webm"); ?>" type='video/webm'>
			<p class="vjs-no-js">
			To view this video please enable JavaScript, and consider upgrading to a web browser that
			<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
			</p>
		</video>
	</div>
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62a506a8c15a8900199d2362&product=sop' async='async'></script>
<?php endwhile; ?>