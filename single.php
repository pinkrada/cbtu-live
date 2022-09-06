<?php
/*
* Single Post
*
*/

defined( 'ABSPATH' ) || exit;

$related = get_posts( array( 'category__in' => wp_get_post_categories( get_the_ID() ), 'numberposts' => 4, 'post__not_in' => array( get_the_ID() ) ) );
$post_type = get_post_type( get_the_ID() );
if ( 'member-news' == $post_type || 'member-resources' == $post_type ) {
    $user = wp_get_current_user();
    if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
        wp_redirect( home_url('/login') );
        exit;
    }
}
get_header();
?>

<div class="main-wrapper">
    <div class="container">
        <div class="row justify-content-between">
            <div class="<?php echo 'post' == $post_type ? 'col-md-7 col-lg-8' : 'col-12'; ?>">
                <div class="blog-single-content">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>" class="blog-single-featured">
                    <?php endif; ?>
                    <h1 class="blog-single-title"><?php echo get_the_title(); ?></h1>
                    <div class="block-post__meta--blog blog-single-meta">
                        <?php
                        $author_id = get_post_field( 'post_author', get_the_ID() );
                        if ( get_the_author_meta( 'first_name', $author_id ) && get_the_author_meta( 'last_name', $author_id ) ) {
                            $name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
                        } else {
                            $name = get_the_author_meta( 'display_name', $author_id );
                        }
                        ?>
						<?php if ( 'post' == $post_type ) : ?>
							<?php echo get_the_date( 'j F Y' ); ?>
						<?php endif; ?>
                    </div>
                    <main class="site-main" id="main">
                    <?php while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
				    }
				    ?>
                    </main><!-- #main -->
                </div>
            </div>
            <?php if ( 'post' == $post_type ) : ?>
                <div class="col-md-5 col-lg-3">
                    <?php $tags = get_the_tags(); ?>
                    <?php if ( $tags ) : ?>
                        <div class="widget">
                            <div class="block-post__tags">
                                <?php foreach( $tags as $tag ) : ?>
                                    <a href="<?php echo esc_attr( get_tag_link( $tag->term_id ) ); ?>"><?php echo $tag->name; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                        <div class="blog-sidebar">
                            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ( 'post' == $post_type && $related ) : ?>
            <div class="blog-single-related">
                <p class="section-tagline"><?php echo __( 'Related posts', 'cbtu' ); ?></p>
                <div class="row">
                    <?php foreach( $related as $post ) : setup_postdata( $post ); ?>
                        <div class="col-md-6 col-lg-3 block-post-holder">
                            <div class="block-post">
                                <?php if ( has_post_thumbnail() ) :
                                    $image = get_the_post_thumbnail_url($post->ID, 'large');
                                    $image_url = $image ? $image : get_site_url().'/wp-content/uploads/2021/09/default-img.jpeg';
                                ?>
                                    <a href="<?php echo get_the_permalink(); ?>" class="block-post__image">
                                        <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>">
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
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
