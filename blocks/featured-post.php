<?php

/**
 * Featured Post Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-featured-post' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-featured-post';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_cbt_tagline' );
$featured_post = get_field( 'block_cbtu_featured_post' );
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <?php if( $featured_post ): 
        $permalink = get_permalink( $featured_post->ID );
        $title = get_the_title( $featured_post->ID );
    ?>
        <?php
            if ( $tagline ) {
                echo '<p class="section-tagline">'. $tagline .'</h3>';
            }
        ?>
        <div class="block-post-holder">
            <div class="block-post">
                <?php if ( has_post_thumbnail($featured_post->ID) ) : ?>
                    <a href="<?php echo $permalink; ?>" class="block-post__image">
                        <img src="<?php echo get_the_post_thumbnail_url( $featured_post->ID, 'large' ); ?>" alt="<?php echo get_the_title($featured_post->ID); ?>">
                    </a>
                <?php endif; ?>
                <a href="<?php echo $permalink; ?>"><h5 class="block-post__title"><?php echo $title; ?></h5></a>
                <?php if ( get_the_excerpt() ): ?>
                    <p class="block-post__excerpt"><?php echo wp_trim_words( $featured_post->post_excerpt, 20); ?></p>
                <?php endif; ?>
                <a class="btn btn-primary" href="<?php echo $permalink; ?>"><?php echo __( 'Learn More', 'cbtu' ); ?></a>
            </div>
        </div>
        
    <?php endif; ?>
</div>
