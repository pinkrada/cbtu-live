<?php
/**
 * Template Name: Advocacy Archive Template
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
					if ( have_rows('advocacy_page', 'option') ):
						while( have_rows('advocacy_page', 'option') ): the_row();
					?>
                <div>
                    <?php if ( $adv_body = get_sub_field('hero_body_text', 'option') ) { ?>
                    <p><?php echo $adv_body; ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 col-12 text-center">
                <?php if ( $adv_img = get_sub_field('hero_image', 'option') ) { ?>
                <img src="<?php echo $adv_img; ?>" class="img-fluid img-fit">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<div class="container">
    <section id="key-issues">
        <div class="row">
            <div class="col-md-6 col-12">
                <p class="text-uppercase">Key Issues</p>
                <h3>Campaigns</h3>
                <p>CBTU actively advocates on behalf of our members on major issues to address barriers to work, improve
                    workplaces and opportunities for work and support long-term growth of the industry.</p>
            </div>
        </div>
        <div class="row">
            <?php
                $args = array(
                'post_type'      => 'advocacy',
                'category_name'  => 'campaigns',
                'posts_per_page' => 4,
            );
                $query = new WP_Query( $args );
            ?>
            <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post(); ?>
            <div class="col-md-3 col-12">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', array('class' => 'thumbnail mb-2')); ?>
                    <p class="font-weight-bold"><?php the_title(); ?></p>
                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                    <button class="btn btn-primary">Learn More &#43;</button>
                </a>
            </div>
            <?php
            endwhile;
            wp_reset_postdata();
            endif; 
            ?>
        </div>
    </section>

    <section id="public-policy">
        <div class="row">
            <div class="col-md-4">
                <div class="col-12">
                    <p class="text-uppercase">Public Policy</p>
                    <h3>Working with Government</h3>
                    <p>CBTU actively engages the Canadian Government on our issues, often advocating for changes to
                        legislation, implementing programs to support the workforce and making investments to bolster
                        the sector. To support our advocacy efforts we often produce briefs and reports to share
                        information with decision makers.</p>
                    <button class="btn btn-primary">Learn More &#43;</button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <?php
                $new_loop = new WP_Query( array(
                'post_type'      => 'advocacy',
                'category_name'  => 'Policy Brief',
                'posts_per_page' => 4,
                ) );
            ?>
                    <?php if ( $new_loop->have_posts() ) : ?>
                    <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
                    <div class="col-md-6 mb-4">
                        <p><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></p>
                        <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                        <a href="<?php echo get_the_permalink(); ?>"><button class="btn btn-primary">Learn More
                                &#43;</button></a>
                    </div>
                    <?php endwhile;?>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php include get_theme_file_path( '/inc/newsletter.php' ); ?>
</div>

<?php
get_footer();