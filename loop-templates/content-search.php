<?php
/**
 * Search results partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="block-insights">
	<a href="<?php echo get_the_permalink(); ?>"><h5 class="block-insights__title"><?php echo get_the_title(); ?></h5></a>
	<div class="block-insights__categories">
	</div>
	<?php if ( get_the_excerpt() ): ?>
		<p class="block-insights__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p>
	<?php endif; ?>
</div>
