<?php
/*
* Template name: Insights Library
*
*/

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

    <div class="section-insights">
        <div class="container">
            <div class="section-insights__featured">
                <p class="section-tagline"><?php echo __( 'Thought leadership', 'cbtu' ); ?></p>
                <h2 class="section-heading"><?php echo __( 'Featured Insights', 'cbtu' ); ?></h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-text">

                        </div>
                    </div>
                </div>
                <?php
                    $featured = new WP_Query( array(
                        'post_type'      => 'insights-library',
                        'posts_per_page' => 2,
                        'ignore_sticky_posts' => 1
                    ));

					$featured_posts = array();
                ?>
                <?php if ( $featured->have_posts() ) : ?>
                    <div class="row">
                        <?php while ( $featured->have_posts() ) : $featured->the_post();
						$featured_posts[] = $post->ID;
						?>
                            <div class="col-md-6 block-post-holder">
                                <div class="block-post">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php echo get_the_permalink(); ?>" class="block-post__image">
                                            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>">
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-post__title mb-3"><?php echo get_the_title(); ?></h5></a>
                                    <?php $cat = get_the_category()[0]; ?>
                                    <?php if ( $cat ) : ?>
                                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="block-post__category"><?php echo $cat->name; ?></a>
                                    <?php endif; ?>
                                    <?php if ( get_the_excerpt() ): ?>
                                        <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 17, '' ); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary"><?php echo __( 'Read More', 'cbtu' ); ?></a>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata();?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="section-insights__list">
                <!-- <p class="section-tagline"><?php echo __( 'Browse all insights', 'cbtu' ); ?></p>
                <div class="section-insights__form js-insights-form">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="topic"><?php echo __( 'Topic', 'cbtu' ); ?></label>
                                <select name="topic" id="topic" class="form-control form-select js-topic">

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
                                <input id="keywords" type="text" class="form-control js-keyword" placeholder="<?php echo __( 'Women', 'cbtu' ); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-auto align-self-end">
                            <div class="form-group">
                                <a href="#" class="btn btn-primary js-insight-submit"><?php echo __( 'Show', 'cbtu' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <?php
                    $do_not_duplicate = array();

                    $insights = new WP_Query( array(
                        'post_type'      => 'insights-library',
                        'posts_per_page' => 4,
                        'post__not_in'   => $featured_posts,
                        'ignore_sticky_posts' => 1,
                        'orderby' => 'date',
                        'order' => 'DESC',
						'post_status'    => 'publish',
                    ));
                ?>
                <?php if ( $insights->have_posts() ) : ?>
                    <div class="js-insights-list">
                        <?php while ( $insights->have_posts() ) : $insights->the_post(); ?>
                            <div class="block-insights">
                                <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-insights__title"><?php echo get_the_title(); ?></h5></a>
                                <?php $cats = get_terms( 'insight_lib_categories' ); ?>
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
                <?php if ( $insights->max_num_pages > 1 ) : ?>
                    <div class="section-insights__action">
                        <a href="#" class="btn btn-primary js-insights-load-more" ><?php echo __( 'Load More', 'cbtu' ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
get_footer();
