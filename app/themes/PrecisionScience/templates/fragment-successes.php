<?php
	global $fieldset;
	
	
	$title 			= papi_get_field($fieldset[0]);
	$text 			= papi_get_field($fieldset[1]);
	$caption 		= papi_get_field($fieldset[2]);
	$captioncolor	= papi_get_field($fieldset[3]);
	$img			= papi_get_field($fieldset[4]);
	$bgcolor		= papi_get_field($fieldset[5]);
	$label 			= papi_get_field($fieldset[6]);
?>

<!--
	
	<?php echo $label; ?>
	
-->
<hr class="divide" />
<article role="article" id="<?php echo $label; ?>" class="fragment-home fragment-home-row grid-container" style="background-color:<?php echo $bgcolor; ?>" data-equalizer data-equalizer-mq="small-up" data-scroll-show data-scroll-slide="fragment-successes">
	<div class="row collapse">
		<div class="column small-6 image <?php echo $fieldset['pos_left'] ?>" data-equalizer-watch>
			<img src="<?php echo $img->url; ?>" data-imageid="<?php echo $img->id; ?>" alt="<?php echo $img->alt; ?>" height="<?php echo $img->height; ?>" width="<?php echo $img->width; ?>"/>
			
			<?php if( strlen($caption) > 0 ): ?>
			<div class="caption-frame" data-equalizer-watch>
				<div class="caption">
					<p style="color:<?php echo $captioncolor; ?>"><?php echo $caption; ?></p>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="column small-6 text <?php echo $fieldset['pos_right'] ?>" data-equalizer-watch>
			<div class="table">
				<div class="cell">
					<h2><?php echo $title; ?></h2>
					<p><?php echo $text; ?></p>
				</div>
			</div>
		</div>
	</div>
</article>