<?php

/**
 * Blog Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-section-pla' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-section-pla';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_p_tagline' );
$heading = get_field( 'block_p_heading' );
if ( 'member-news' == $type || 'member-resources' == $type ) {
    $user = wp_get_current_user();
    if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
        return;
    }
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <div class="row">
        <div class="col-md-12">
            <?php
            if ( $tagline ) {
                echo '<p class="section-tagline">'. $tagline .'</h3>';
            }

            if ( $heading ) {
                echo '<h2 class="section-heading">'. $heading .'</h2>';
            }
            ?>
        </div>
        <div class="w-100"></div>
        <?php
            $posts = new WP_Query( array(
                'post_type'      => 'pla',
                'posts_per_page'	=> -1,
                'orderby' => 'title',
                'order'   => 'ASC',
            ));
        ?>
        <?php if ( $posts->have_posts() ) : ?>

            <ul class="row list-unstyled ml-3">
                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                    <?php foreach( $posts as $post ): setup_postdata($post); ?>
                        <?php if ( $file = get_field( 'file', $post->ID ) ) : ?>
                            <li class="col-12 col-md-6">
                                <a href="<?php echo $file['url']; ?>" target="_blank" class="link-file">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24">
                                        <path id="Path" d="M12,5V17A5,5,0,0,1,2,17V5A3,3,0,0,1,8,5v9a1,1,0,0,1-2,0V6H4v8a3,3,0,0,0,6,0V5A5,5,0,0,0,0,5V17a7,7,0,0,0,14,0V5Z" fill="#50748A"/>
                                    </svg>
                                    <?php echo get_the_title($post->ID); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>




