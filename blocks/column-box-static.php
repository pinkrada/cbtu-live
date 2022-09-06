<?php

/**
 * Column Box Static Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-column-box-static' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-column-box-static';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_cbs_tagline' );
$heading = get_field( 'block_cbs_heading' );
$text = get_field( 'block_cbs_text' );
$type = get_field( 'block_cbs_post_type' );
$posts = get_field( 'block_cbs_posts' );
$link = get_field( 'block_cbs_button' );

if ( 'member-news' == $type || 'member-resources' == $type ) {
    $user = wp_get_current_user();
    if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
        return;
    }
}
?>

<?php if( $posts ): ?>
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
            <?php foreach( $posts as $post ): setup_postdata($post); ?>
                <div class="col-md-6 col-lg-3 block-post-holder">
                    <?php if ( 'team' == $type ) : ?>
                        <div class="block-team">
                            <div class="block-team__image">
                                <?php if ( has_post_thumbnail($post->ID) ) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>" alt="<?php echo get_the_title($post->ID); ?>">
                                <?php endif; ?>
                                <?php if ( get_field( 'team_linkedin', $post->ID ) || get_field( 'team_twitter', $post->ID ) ) : ?>
                                    <div class="block-team__social">
                                        <?php
                                            if ( $linkedin = get_field( 'team_linkedin', $post->ID ) ) :
                                                echo '<a href="'. $linkedin .'"><span class="fa fa-linkedin-square"></span></a>';
                                            endif;
                                            if ( $twitter = get_field( 'team_twitter', $post->ID ) ) :
                                                echo '<a href="'. $twitter .'"><span class="fa fa-twitter"></span></a>';
                                            endif;
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h5 class="block-team__title"><?php echo get_the_title($post->ID); ?></h5>
                            <?php if ( $position = get_field( 'team_position', $post->ID ) ) : ?>
                                <p class="block-team__position"><?php echo $position; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="block-post">
                            <?php if ( has_post_thumbnail($post->ID) ) : ?>
                                <a href="<?php echo get_the_permalink($post->ID); ?>" class="block-post__image<?php echo 'affiliates' == $type ? ' block-post__image--contain' : ''; ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>" alt="<?php echo get_the_title($post->ID); ?>">
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo get_the_permalink($post->ID); ?>"><h5 class="block-post__title"><?php echo get_the_title($post->ID); ?></h5></a>
                            <?php if ( get_the_excerpt($post->ID) ): ?>
                                <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt($post->ID), 17, '' ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach;?>
        </div>
        <?php if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="">
                <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>