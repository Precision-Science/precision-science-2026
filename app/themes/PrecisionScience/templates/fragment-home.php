<?php
	global $fieldset;
	$img = papi_get_field($fieldset[4]);
	$caption = papi_get_field($fieldset[5]);
	$caption_color = papi_get_field($fieldset[6]);
?>
<hr class="divide" />
<article role="article" class="fragment-home fragment-home-row grid-container" style="background-color:<?php echo papi_get_field($fieldset[7]); ?>" data-equalizer data-equalizer-mq="small-up" data-scroll-show data-scroll-slide="fragment-home">
	<div class="row collapse">
		<div class="column small-6 image <?php echo $fieldset['pos_left'] ?>" data-equalizer-watch style="min-height:300px; <?php if(strlen($caption) > 0): ?>background-image:url(<?php echo $img->url; ?>);<?php endif; ?>">
			<?php if(strlen($caption) > 0): ?>
			<div class="caption-frame" data-equalizer-watch>
				<div class="caption">
					<p style="color:<?php echo $caption_color; ?>"><?php echo $caption; ?></p>
				</div>
			</div>
			<?php else: ?>
				<img src="<?php echo $img->url; ?>" />
			<?php endif; ?>
		</div>
		<div class="column small-6 text <?php echo $fieldset['pos_right'] ?>" data-equalizer-watch>
			<div class="table">
				<div class="cell">
					<h2 class="heading"><?php echo papi_get_field($fieldset[0]); ?></h2>
					<h3 class="subheading"><?php echo papi_get_field($fieldset[1]); ?></h3>
					<?php echo papi_get_field($fieldset[2]); ?>
					<p>
						<?php
							$link = papi_get_field($fieldset[3]);
							$link_id = $link->post_id;
							$dest_page = get_post($link_id);
						?>
						<a class="btn" data-id="<?php echo $link->post_id; ?>" data-title="<?php echo $dest_page->post_title; ?>" data-slug="<?php echo $dest_page->post_name; ?>" href="<?php echo $link->url; ?>" target="<?php echo $link->target; ?>"><?php echo $link->title; ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</article>