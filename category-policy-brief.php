<?php
/**
 * Template Name: Major Projects Archive Template
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
					if ( have_rows('major_projects_pg', 'option') ):
						while( have_rows('major_projects_pg', 'option') ): the_row();
					?>
                <div>
                    <?php if ( $mp_body = get_sub_field('hero_body_text', 'option') ) { ?>
                    <p><?php echo $mp_body; ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 col-12 text-center">
                <?php if ( $mp_img = get_sub_field('hero_image', 'option') ) { ?>
                <img src="<?php echo $mp_img; ?>" class="img-fluid">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<div class="container">
    <section id="major-projects">
        <div class="row">
            <?php
                $new_loop = new WP_Query( array(
                'post_type' => 'advocacy',
                'category' => 'policy-brief',
                    'posts_per_page' => 4
                ) );
            ?>
            <?php if ( $new_loop->have_posts() ) : ?>
            <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
            <div class="col-md-6 col-12">
                <a href="<?php the_permalink(); ?>">
                    <img src="http://placehold.it/567x351" class="img-fluid" />
                    <p><?php the_title(); ?></p>
                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                    <button class="btn btn-primary">Learn More</button>
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