<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>
	
	<?php foreach ($galleries as $gallery) : ?>

		<a class="item" href="<?php echo $gallery->pagelink; ?>">
			<div class="img">
				<img alt="<?php echo $gallery->title; ?>" src="<?php echo $gallery->previewurl; ?>" />
			</div>
			<?php echo wpautop($gallery->galdesc); ?>
		</a>

 	<?php endforeach; ?>
