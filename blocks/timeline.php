<?php

/**
 * Ratings Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-timeline' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-timeline';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>


<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> mb-5">
	<?php if ( have_rows( 'timeline_list' ) ): ?>
	<?php while ( have_rows( 'timeline_list' ) ) : the_row();
				$heading = get_sub_field( 'timeline_heading' );
				$subheading = get_sub_field( 'timeline_subheading' );
				$list_background_colour = get_sub_field( 'list_background_colour' );

			?>
	<div class="timeline-container">
		<div class="row">
			<div class="col-lg-1 my-auto">
				<div class="circle-dot"></div>
			</div>
			<?php if($heading): ?>
			<div class="col-lg-3 my-auto">
				<h3><?php echo $heading;?></h3>
				<?php if($subheading): ?><p><?php echo $subheading;?></p><?php endif;?>
			</div>
			<?php endif;?>

			<div class="col-lg-8">
				<div class="p-4"
					style="background-color: <?php echo $list_background_colour ? $list_background_colour : '#ffffff'; ?>">
					<?php if ( have_rows( 'list' ) ): ?>
					<?php while ( have_rows( 'list' ) ) : the_row();
			$icon = get_sub_field( 'icon' );
			$text_area = get_sub_field( 'text_area' );
			$count = 1;
			?>

					<div class="d-flex timeline-list">
						<?php if($icon): ?>
						<div class="timeline-icon">
							<img src="<?php echo $icon['url']; ?>" alt="timeline icon <?php echo $count;?>">
						</div>
						<?php endif;?>
						<?php if($text_area): ?>
						<div class="timeline-text">
							<?php echo $text_area; ?>
						</div>
						<?php endif;?>
					</div>

					<?php
			$count ++;
			endwhile; ?>
					<?php endif; ?>
				</div><!-- bg white -->

			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
</div>
