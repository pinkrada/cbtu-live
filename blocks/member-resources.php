<?php

/**
 * Member Resources Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-member-resources' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-member-resources';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_mr_tagline' );
$heading = get_field( 'block_mr_heading' );
$user = wp_get_current_user();
if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
    return;
}
?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( $tagline ) : ?>
        <p class="section-tagline"><?php echo $tagline; ?></p>
    <?php endif; ?>
    <div class="block-member-resources__header">
        <h2 class="section-heading"><?php echo $heading; ?></h2>
        <a href="<?php echo site_url('/wp-admin/post-new.php?post_type=member-resources'); ?>">
            <img class="icon" src="<?php echo get_template_directory_uri(); ?>/icons/paper-clip.svg" alt="">
            <?php echo __( 'Upload new member resource', 'cbtu' ); ?>
        </a>
    </div>
    <div class="section-insights__form js-member-resources-form">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label for="topic"><?php echo __( 'Topic', 'cbtu' ); ?></label>
                    <select name="topic" id="topic" class="form-control form-select js-topic">
                        <option value=""></option>
                        <?php
                            $topics = get_terms( 'member_resources_category' );
                            if ( $topics ) :
                        ?>
                            <?php foreach( $topics as $topic ) : ?>
                                <option value="<?php echo $topic->term_id; ?>"><?php echo $topic->name; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label for="type"><?php echo __( 'Type', 'cbtu' ); ?></label>
                    <select name="type" id="type" class="form-control form-select js-type">
                        <option value="">Any</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label for="keywords"><?php echo __( 'Key words', 'cbtu' ); ?></label>
                    <input id="keywords" type="text" class="form-control js-keyword" placeholder="<?php echo __( 'Key Words', 'cbtu' ); ?>">
                </div>
            </div>
            <div class="col-md-6 col-lg-auto align-self-end">
                <div class="form-group">
                    <a href="#" class="btn btn-primary js-member-resources-submit"><?php echo __( 'Show', 'cbtu' ); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
        $resources = new WP_Query( array(
            'post_type'      => 'member-resources',
            'posts_per_page' => 2,
            'ignore_sticky_posts' => 1
        ));
    ?>
    <?php if ( $resources->have_posts() ) : ?>
        <div class="js-member-resources-list">
            <?php while ( $resources->have_posts() ) : $resources->the_post(); ?>
                <div class="block-insights">
                    <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-insights__title"><?php echo get_the_title(); ?></h5></a>
                    <?php $cats = get_the_terms( get_the_ID(), 'member_resources_category' ); ?>
                    <div class="block-insights__categories">
                        <?php if ( $cats ) : ?>
                            <?php foreach( $cats as $cat ) : ?>
                                <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo $cat->name; ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <?php if ( get_the_excerpt() ): ?>
                        <p class="block-insights__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p>
                    <?php endif; ?>
                    <?php if ( $file = get_field( 'file' ) ): ?>
                        <p class="link-file">
                            <a href="<?php echo $file['url']; ?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24">
                                    <path id="Path" d="M12,5V17A5,5,0,0,1,2,17V5A3,3,0,0,1,8,5v9a1,1,0,0,1-2,0V6H4v8a3,3,0,0,0,6,0V5A5,5,0,0,0,0,5V17a7,7,0,0,0,14,0V5Z" fill="#50748A"/>
                                </svg>
                                <?php echo $file['filename']; ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endwhile; wp_reset_postdata();?>
        </div>
    <?php endif; ?>
    <?php if ( $resources->max_num_pages > 1 ) : ?>
        <div class="section-insights__action">
            <a href="#" class="btn btn-primary js-member-resources-load-more" ><?php echo __( 'Load More', 'cbtu' ); ?></a>
        </div>
    <?php endif; ?>
</div>