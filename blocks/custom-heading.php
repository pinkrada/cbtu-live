<?php

/**
 * Tagline Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'custom-heading-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'custom-heading';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<h2 id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>"><span class="outline-text"><span class="custom-heading__border" <?php echo get_field( 'border_color' ) ? 'style="background-color: '.get_field( 'border_color' ).'"' : ''; ?>></span><?php echo get_field( 'outline_text' ); ?></span><span class="text"><?php echo get_field( 'text' ); ?></span></h2>