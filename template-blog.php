<?php
/*
* Template name: Blog
*
*/

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="main-wrapper">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-7 col-lg-8 col-blog-list">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'paged' => $paged,
                    'posts_per_page' => 4
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                ?>
                    <div class="block-post block-post--blog">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php echo get_the_permalink(); ?>" class="block-post__image">
                                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>">
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-post__title"><?php echo get_the_title(); ?></h5></a>
                        <div class="block-post__meta--blog">
                            <?php
                            $author_id = get_post_field( 'post_author', get_the_ID() );
                            if ( get_the_author_meta( 'first_name', $author_id ) && get_the_author_meta( 'last_name', $author_id ) ) {
                                $name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
                            } else {
                                $name = get_the_author_meta( 'display_name', $author_id );
                            }
                            ?>
                            <!-- <span><?php echo $name; ?></span> -->
                            <?php echo get_the_date( 'j F Y' ); ?>
                        </div>
                        <?php $tags = get_the_tags(); ?>
                        <div class="block-post__tags">
                            <?php if ( $tags ) : ?>
                                <?php foreach( $tags as $tag ) : ?>
                                    <a href="<?php echo esc_attr( get_tag_link( $tag->term_id ) ); ?>"><?php echo $tag->name; ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?php if ( get_the_excerpt() ): ?>
                            <p class="block-post__excerpt"><?php echo get_the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-5 col-lg-3 col-blog-sidebar">
                <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                    <div class="blog-sidebar">
                        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-blog-pagination">
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
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
