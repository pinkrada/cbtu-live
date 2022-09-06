<?php

/**
 * Column Box Terms Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-column-box-terms' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-column-box-terms';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_cbt_tagline' );
$heading = get_field( 'block_cbt_heading' );
$text = get_field( 'block_cbt_text' );
$type = get_field( 'block_cbt_post_type' );
$term = get_field( 'block_cbt_term' );
$limit = get_field( 'block_cbt_limit' ) ? get_field( 'block_cbt_limit' ) : 4;
$link = get_field( 'block_cbt_button' );
$args = array(
    'post_type'       => $type,
    'posts_per_page'  => $limit
);
if ( $term ) {
    $get_term = get_term( $term );
    $args['tax_query'] = array(
        array (
            'taxonomy' => $get_term->taxonomy,
            'field' => 'term_id',
            'terms' => $term,
        )
        );
}
$posts = new WP_Query( $args );
$col = 'col-md-6 col-lg-3';
if ( $limit == 1 ) {
    $col = 'col-12';
} else if ( $limit == 2 ) {
    $col = 'col-md-6';
} else if ( $limit == 3 ) {
    $col = 'col-md-6 col-lg-4';
}
if ( 'member-news' == $type || 'member-resources' == $type ) {
    $user = wp_get_current_user();
    if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
        return;
    }
}
?>


<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <div class="row">
        <div class="col-md-6">
            <?php
            if ( $tagline ) {
                echo '<p class="section-tagline">'. $tagline .'</h3>';
            }

            if ( $heading ) {
                echo '<h2 class="section-heading">'. $heading .'</h2>';
            }

            if ( $text ) {
                echo '<p class="section-text">'. $text .'</h3>';
            }
            ?>
        </div>
        <div class="w-100"></div>
        <?php if( $type && $posts->have_posts() ): ?>
            <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="<?php echo $col; ?> block-post-holder">
                <div class="block-post">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="block-post__image">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid" />
                            </div>
                        <?php endif; ?>
                            <h5 class="block-post__title"><?php echo get_the_title(); ?></h5>
                        <?php if ( get_the_excerpt() ): ?>
                            <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 17, '' ); ?></p>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata();?>

            <div class="col-12">
                <?php if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
