<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

//  var_dump($attributes, $content, $block);
echo "<pre>";
print_r($attributes);
?>
<section <?php echo get_block_wrapper_attributes(); ?>>
	<h3>List message</h3>
	<?php
		foreach($attributes['list_message'] as $message){ ?>
			<p><?php echo $message ?></p>
		<?php }
	?>
</section>