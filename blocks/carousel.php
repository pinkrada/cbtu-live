<?php

/**
 * Carousel Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'carousel-block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'carousel-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( have_rows( 'block_carousel_items' ) ): ?>
    <div id="parent_<?php echo esc_attr( $id ); ?>" class="carousel-slick">
        <?php
            while( have_rows( 'block_carousel_items' ) ): the_row();
            $count = get_row_index();
        ?>
            <div class="carousel-slick-item">
                <img src="<?= get_sub_field('block_carousel_items_image')['url'] ?>" alt="<?= get_sub_field('block_carousel_items_image')['alt'] ?>" />
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>