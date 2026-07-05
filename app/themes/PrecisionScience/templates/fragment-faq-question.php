<?php
	global $key, $item;
?>
<div class="faq-item" data-item="<?php echo $key;?>">
    <h2 class="question" data-target="<?php echo $key;?>"><?php echo $item['question']; ?></h2>
    <div class="answer" data-answer="<?php echo $key;?>"><?php echo $item['answer']; ?></div>
</div>