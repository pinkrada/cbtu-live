<?php
/*
* Template name: Affiliates
*
*/

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="main-wrapper" id="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'         => 'affiliates',
            'posts_per_page'    => -1,
            'paged'             => $paged,
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : ?>
            <div class="row">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-6 col-lg-3 block-post-holder">
                        <div class="block-post">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php echo get_the_permalink(); ?>" class="block-post__image block-post__image--contain">
                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>">
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-post__title"><?php echo get_the_title(); ?></h5></a>
                            <?php if ( get_the_excerpt() ): ?>
                                <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 17, '' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <!-- <div class="col-12 col-blog-pagination">
                    <div class="styled-pagination">
                        <?php
                        $pager = 999999999;
                        echo paginate_links( array(
                            'base'          => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
                            'format'        => '?paged=%#%',
                            'current'       => max( 1, $paged ),
                            'total'         => $the_query->max_num_pages,
                            'prev_next'     => false
                        ) );
                        ?>
                    </div>
                </div> -->
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();