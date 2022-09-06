<?php

/**
 * Blog Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-section-blog' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-section-blog';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_cbt_tagline' );
$heading = get_field( 'block_b_heading' );
$text = get_field( 'block_cbt_text' );
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <div class="row">
        <div class="col-lg-5">
            <?php
            if ( $tagline ) {
                echo '<p class="section-tagline">'. $tagline .'</p>';
            }
            if ( $heading ) {
                echo '<h2 class="section-heading">'. $heading .'</h2>';
            }

            if ( $text ) {
                echo '<p class="section-text">'. $text .'</p>';
            }
            ?>
            <?php
            $link = get_field('block_cbt_button');
            if( $heading ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="mt-3 mb-5">
                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <?php
                    $the_query = new WP_Query( array(
                        'posts_per_page' => 4,
						'post_type'      => 'insights-library',
                    ));
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-6">
                        <div class="block-post">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <h5 class="block-post__title"><?php the_title(); ?></h5>
                                <p class="block-post__date"><?php echo get_the_date( 'd F Y' ); ?></p>
                                <?php if ( get_the_excerpt() ): ?>
                                    <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 10, '' ); ?></p>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
