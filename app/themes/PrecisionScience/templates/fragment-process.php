<?php
	global $item;
?>
<li class="process-item" data-color="<?php echo $item['color']; ?>" data-scroll-show>
	<div class="sides">
		<div class="side-a" style="border-color:<?php echo $item['color']; ?>">
			<h2 style="color:<?php echo $item['color']; ?>">
				<span><?php echo $item['title']; ?></span>
			</h2>
			<p><?php echo $item['short_desc']; ?></p>
		</div>
		<div class="side-b" data-color="<?php echo $item['color']; ?>" style="background-color:<?php echo $item['color']; ?>">
			<div class="icon">
				<div class="inset" style="color:<?php echo $item['color']; ?>"><?php echo $item['abbr']; ?></div>
			</div>
			<p><?php echo $item['long_desc']; ?></p>
		</div>
	</div>
</li>