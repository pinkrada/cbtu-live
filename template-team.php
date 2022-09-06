<?php
/*
* Template name: Team
*
*/

defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="main-wrapper" id="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <?php
        $args = array(
            'post_type'         => 'team',
            'posts_per_page'    => -1
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : ?>
            <div class="row">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="block-team">
                            <div class="block-team__image">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>">
                                <?php endif; ?>
                                <?php if ( get_field( 'team_linkedin' ) || get_field( 'team_twitter' ) ) : ?>
                                    <div class="block-team__social">
                                        <?php
                                            if ( $linkedin = get_field( 'team_linkedin' ) ) :
                                                echo '<a href="'. $linkedin .'"><span class="fa fa-linkedin-square"></span></a>';
                                            endif;
                                            if ( $twitter = get_field( 'team_twitter' ) ) :
                                                echo '<a href="'. $twitter .'"><span class="fa fa-twitter"></span></a>';
                                            endif;
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h5 class="block-team__title"><?php echo get_the_title(); ?></h5>
                            <?php if ( $position = get_field( 'team_position' ) ) : ?>
                                <p class="block-team__position"><?php echo $position; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();