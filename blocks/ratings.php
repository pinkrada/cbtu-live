<?php

/**
 * Ratings Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-ratings' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-ratings';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> mb-5">
        <div class="row justify-content-center text-center">
            <?php if ( have_rows( 'block_cbt_rp' ) ): ?>
                <?php while ( have_rows( 'block_cbt_rp' ) ) : the_row(); 
                    $tagline = get_sub_field( 'block_cbt_tagline' );
                    $rate = get_sub_field( 'block_cbtu_rate' );
                    $small_text = get_sub_field( 'block_cbtu_small_text' );
                ?>
                <div class="col-lg-4 col-12">
                    <?php
                        if ( $tagline ) {
                            echo '<p class="section-tagline">'. $tagline .'</p>';
                        }

                        if ( $rate ) {
                            echo '<h2 class="section-heading">'. $rate .'</h2>';
                        }

                        if ( $small_text ) {
                            echo '<span class="small-text">'. $small_text .'</span>';
                        }
                    ?>
                </div>
                 

                <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
    </div>