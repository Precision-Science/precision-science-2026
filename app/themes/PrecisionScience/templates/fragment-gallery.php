<?php
	global $image; 
?>
<li>
	<div class="row image">
		<div class="column xsmall-12" style="overflow: hidden">
			<?php if(isset($image['image']->fileformat) && $image['image']->fileformat == 'mp4'): ?>
			<video autoplay muted loop>
			  <source src="<?php echo $image['image']->url; ?>" type="video/mp4">
			</video>
			<?php else: ?>
			<img src="<?php echo $image['image']->url; ?>" alt="<?php echo $image['image']->alt; ?>" style="max-width: none;width:auto;"/>
			<?php endif; ?>
		</div>
	</div>
</li>