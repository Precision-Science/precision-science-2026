<article role=article id="section-4" class="fragment-home fragment-home-row fragment-home-gallery gallery grid-container row collapse" style="background-color:<?php echo papi_get_field('section4_bgcolor'); ?>" data-scroll-show data-scroll-class="nada" data-scroll-func="page28" data-scroll-funcname="scroll_facility">
	<div class="slick-arrow slick-prev"><</div>
	<div class="slick-arrow slick-next">></div>
	<div class="column small-6 image">
		<div class="image-slides">
		<?php
			$slides = papi_get_field('slide');
			foreach($slides as $id => $slide):
			$img = $slide['section4_image'];
		?>
			<div class="image-slide">

				<?php if(isset($img->fileformat) && $img->fileformat == 'mp4'): ?>
				<div class="image-slide-holder">
					<video autoplay muted loop class="slide-video">
					  <source src="<?php echo $img->url; ?>" type="video/mp4">
					</video>
				</div>
				<?php else: ?>
				<div class="image-slide-holder" style="background-image:url(<?php echo $img->url; ?>);"></div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
	<div class="column small-6">
		<div class="text-slides">
		<?php
			$slides = papi_get_field('slide');
			foreach($slides as $id => $slide):
		?>
			<div class="text-slide">
				<div class="text">
					<div class="table">
						<div class="cell">
							<h2 class="heading"><?php echo papi_get_field('section4_title'); ?></h2>
							<h3 class="subheading"><?php echo $slide['section4_subtitle']; ?></h3>
							<p><?php echo $slide['section4_text']; ?></p>
							<p>
								<?php
									$link = papi_get_field('section4_link');
									$link_id = $link->post_id;
									$dest_page = get_post($link_id);
								?>
								<a class="btn" data-id="<?php echo $link->post_id; ?>" data-title="<?php echo $dest_page->post_title; ?>" data-slug="<?php echo $dest_page->post_name; ?>" href="<?php echo $link->url; ?>" target="<?php echo $link->target; ?>"><?php echo $link->title; ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</article>