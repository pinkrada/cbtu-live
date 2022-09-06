<?php

/**
 * Column Box Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'block-column-box' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-column-box';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$tagline = get_field( 'block_cb_tagline' );
$heading = get_field( 'block_cb_heading' );
$text = get_field( 'block_cb_text' );
$type = get_field( 'block_cb_post_type' );
$args = array(
    'post_type'       => $type,
    'posts_per_page'  => ($type === 'pla') ? '-1' : '4',
	'order_by' 	      => ($type === 'pla') ? 'title' : 'date',
	'order' 	      => ($type === 'pla') ? 'ASC' : 'ASC',
);
$posts = new WP_Query( $args );

if ( 'member-news' == $type || 'member-resources' == $type ) {
    $user = wp_get_current_user();
    if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
        return;
    }
}
?>

<?php if( $type && $posts->have_posts() ): ?>
    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?> mb-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                <?php
                if ( $tagline ) {
                    echo '<p class="section-tagline">'. $tagline .'</h3>';
                }

                if ( $heading ) {
                    echo '<h2 class="section-heading mb-4">'. $heading .'</h2>';
                }

                if ( $text ) {
                    echo '<p class="section-text">'. $text .'</h3>';
                }
                ?>
            </div>
            <div class="w-100"></div>
            <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php
				if ( 'pla' != $type ) : ?>
                <div class="col-md-6 col-lg-3 block-post-holder mt-4">
                    <div class="block-post">
					<?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="block-post__image">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>">
                            </a>
							<?php endif; ?>
                        <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-post__title"><?php echo get_the_title(); ?></h5></a>
                        <div class="block-post__meta">
                            <?php
                            $author_id = get_post_field( 'post_author', get_the_ID() );
                            if ( get_the_author_meta( 'first_name', $author_id ) && get_the_author_meta( 'last_name', $author_id ) ) {
                                $name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
                            } else {
                                $name = get_the_author_meta( 'display_name', $author_id );
                            }
                            ?>
                            <!-- <span><?php echo $name; ?></span> -->
                            <span class="block-post__date"><?php echo get_the_date( 'j M Y' ); ?></span>
                        </div>
                        <?php if ( get_the_excerpt() ): ?>
                            <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 17, '' ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

				<?php else: ?>

					<!-- PLA CUSTOM POST TYPE -->
					<?php $pla_file = get_field('file', get_the_ID());?>

					<div class="col-12 col-md-6 block-post-holder">
                    <div class="block-post mb-0">
					<?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="block-post__image">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title(); ?>">
                            </a>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>" target="_blank"><h5 class="block-post__title pla-docs mb-3"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;<?php the_title(); ?></h5></a>
                    </div>
                </div>

					<!-- END PLA CUSTOM POST TYPE -->

				<?php endif; ?>


            <?php endwhile; wp_reset_postdata();?>
        </div>
    </div>
<?php endif; ?>
