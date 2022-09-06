<?php

/**
 * Tagline Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'tagline-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section-tagline';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<?php if ( get_field( 'block_tagline' ) ) : ?>
    <p id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>"><?php echo get_field( 'block_tagline' ); ?></p>
<?php endif; ?>