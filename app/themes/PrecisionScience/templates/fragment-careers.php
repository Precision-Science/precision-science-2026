<?php
	global $fieldset;
	
	
	$title 			= papi_get_field("section1_title");
	$text 			= papi_get_field("section1_subtitle");
	$img			= papi_get_field("section1_image");
	$bgcolor		= papi_get_field("section1_bgcolor");
?>
<hr class="divide" />
<article role="article" id="<?php echo $label; ?>" class="fragment-careers fragment-home fragment-home-row grid-container" style="background-color:<?php echo $bgcolor; ?>;" data-equalizer data-equalizer-mq="small-up" data-scroll-show data-scroll-slide="careers-section1">
	<div class="row collapse">
		<div class="column small-6 image small-push-6" data-equalizer-watch style="background: url(<?php echo $img->url; ?>) no-repeat;background-position:50%;background-size:cover; min-height:300px;">
			<div class="caption-frame" data-equalizer-watch>
				<div class="caption">
					<button class="btn btn-solid-mint btn-watch no-before open-careersvideo">
						Watch&nbsp;<svg class="icon-inline icon-play" alt="" viewBox="0 0 16 16" width="12" height="12">
						<use xlink:href="#iconPlay" />
					</svg></button>
				</div>
			</div>
		</div>
		<div class="column small-6 text small-pull-6" data-equalizer-watch>
			<div class="table">
				<div class="cell">
					<h2><?php echo $title; ?></h2>
					<p><?php echo $text; ?></p>
				</div>
			</div>
		</div>
	</div>
</article>