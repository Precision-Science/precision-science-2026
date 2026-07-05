<?php
	global $total_items, $key, $item;
?>
<section class="timeline-entry" id="timeline-<?php echo $key+1; ?>-content">
	<figure class="icon">
		<?php
			$icon = $item['icon'];		
		?>
		<img alt="" src="<?php echo $icon; ?>" height="600" width="600" />
		<figcaption class="row">
			<div class="column xsmall-12 medium-8 medium-centered">
				<?php echo $item['text']; ?>
			</div>
		</figcaption>
	</figure>
</section>