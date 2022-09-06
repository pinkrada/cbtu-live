<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-12 align-self-center">
                <h2><?php post_type_archive_title(); ?></h2>
                <?php
					if ( have_rows('in_lib_page', 'option') ):
						while( have_rows('in_lib_page', 'option') ): the_row();
					?>
                <div>
                    <?php if ( $lib_body = get_sub_field('hero_body_text', 'option') ) { ?>
                    <p><?php echo $lib_body; ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 col-12 text-center">
                <?php if ( $lib_img = get_sub_field('hero_image', 'option') ) { ?>
                <img src="<?php echo $lib_img; ?>" class="img-fluid img-fit">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<div class="container">
    <section id="public-policy">
        <div class="row">
            <div class="col-md-6 col-12">
                <p class="text-uppercase">News</p>
                <h3>Featured Insights</h3>
                <p>Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem
                    eos.</p>
            </div>
        </div>
        <div class="row">
            <?php
                $new_loop = new WP_Query( array(
                'post_type'      => 'insights-library',
                'posts_per_page' => 20,
                ) );
            ?>
            <?php if ( $new_loop->have_posts() ) : ?>
            <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>

            <div class="col-md-6 col-12">
                <a href="<?php echo get_the_permalink(); ?>">
                    <p><?php the_title(); ?></p>
                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                </a>
            </div>
            <?php endwhile;?>
            <?php else: ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

        </div>
    </section>

    <?php include get_theme_file_path( '/inc/newsletter.php' ); ?>
</div>

<?php
get_footer();