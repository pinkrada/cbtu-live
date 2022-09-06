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
					if ( have_rows('work_dev_pg', 'option') ):
						while( have_rows('work_dev_pg', 'option') ): the_row();
					?>
                <div>
                    <?php if ( $wd_body = get_sub_field('hero_body_text', 'option') ) { ?>
                    <p><?php echo $wd_body; ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 col-12 text-center">
                <?php if ( $wd_img = get_sub_field('hero_image', 'option') ) { ?>
                <img src="<?php echo $wd_img; ?>" class="img-fluid">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<div class="container">
    <section id="wd-initiatives">
        <div class="row">
            <div class="col-md-6 col-12 align-self-center">
                <h3>Workforce Development Initiatives</h3>
                <p>Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem
                    eos.</p>
                <hr>
                <div id="accordion">
                    <?php 
                    $args = array(
                        'post_type' => 'workforce-dev',
                        'category_name' => 'initiatives',
                        'posts_per_page' => -1
                    );  
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                    <div class="card">
                        <div class="card-header" id="<?php the_ID(); ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-parent="#accordion"
                                    data-target="#collapse<?php the_ID(); ?>" aria-expanded="false"
                                    aria-controls="collapse<?php the_ID(); ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?php the_ID(); ?>" class="collapse" role="tabpanel"
                            aria-labelledby="heading<?php the_ID(); ?>">
                            <div class="card-block p-4">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                                    <button class="btn btn-primary">Learn More
                                        &#43;</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <?php
					if ( have_rows('work_dev_pg', 'option') ):
						while( have_rows('work_dev_pg', 'option') ): the_row();
					?>
                <?php if ( $init_img = get_sub_field('initiatives_image', 'option') ) { ?>
                <img src="<?php echo $init_img; ?>" class="img-fluid">
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

    <section id="wd-initiatives">
        <div class="row">
            <div class="col-md-6 col-12">
                <?php
                if ( have_rows('work_dev_pg', 'option') ):
                while( have_rows('work_dev_pg', 'option') ): the_row();
                ?>
                <?php if ( $divinc_img = get_sub_field('diversity_inclusion_image', 'option') ) { ?>
                <img src="<?php echo $divinc_img; ?>" class="img-fluid">
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="col-md-6 col-12 align-self-center">
                <h3>Diversity & Inclusion</h3>
                <p>Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem
                    eos.</p>
                <hr>
                <div id="accordion">
                    <?php 
                    $args = array(
                        'post_type' => 'workforce-dev',
                        'category_name' => 'diversity-inclusion',
                        'posts_per_page' => -1
                    );  
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                    <div class="card">
                        <div class="card-header" id="<?php the_ID(); ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-parent="#accordion"
                                    data-target="#collapse<?php the_ID(); ?>" aria-expanded="false"
                                    aria-controls="collapse<?php the_ID(); ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?php the_ID(); ?>" class="collapse" role="tabpanel"
                            aria-labelledby="heading<?php the_ID(); ?>">
                            <div class="card-block p-4">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                                    <button class="btn btn-primary">Learn More
                                        &#43;</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="wd-apprenticeships">
        <div class="row">
            <div class="col-md-6 col-12 align-self-center">
                <h3>Apprenticeships</h3>
                <p>Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem
                    eos.</p>
                <hr>
                <div id="accordion">
                    <?php 
                    $args = array(
                        'post_type' => 'workforce-dev',
                        'category_name' => 'apprenticeships',
                        'posts_per_page' => -1
                    );  
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                    <div class="card">
                        <div class="card-header" id="<?php the_ID(); ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-parent="#accordion"
                                    data-target="#collapse<?php the_ID(); ?>" aria-expanded="false"
                                    aria-controls="collapse<?php the_ID(); ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?php the_ID(); ?>" class="collapse" role="tabpanel"
                            aria-labelledby="heading<?php the_ID(); ?>">
                            <div class="card-block p-4">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                                    <button class="btn btn-primary">Learn More
                                        &#43;</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <?php
                if ( have_rows('work_dev_pg', 'option') ):
                while( have_rows('work_dev_pg', 'option') ): the_row();
                ?>
                <?php if ( $appren_img = get_sub_field('apprenticeships_image', 'option') ) { ?>
                <img src="<?php echo $appren_img; ?>" class="img-fluid">
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

    <section id="wd-training">
        <div class="row">
            <div class="col-md-6 col-12">
                <?php
                if ( have_rows('work_dev_pg', 'option') ):
                while( have_rows('work_dev_pg', 'option') ): the_row();
                ?>
                <?php if ( $train_img = get_sub_field('training_image', 'option') ) { ?>
                <img src="<?php echo $train_img; ?>" class="img-fluid">
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="col-md-6 col-12 align-self-center">
                <h3>Training</h3>
                <p>Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem
                    eos.</p>
                <hr>
                <div id="accordion">
                    <?php 
                    $args = array(
                        'post_type' => 'workforce-dev',
                        'category_name' => 'training',
                        'posts_per_page' => -1
                    );  
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                    <div class="card">
                        <div class="card-header" id="<?php the_ID(); ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-parent="#accordion"
                                    data-target="#collapse<?php the_ID(); ?>" aria-expanded="false"
                                    aria-controls="collapse<?php the_ID(); ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?php the_ID(); ?>" class="collapse" role="tabpanel"
                            aria-labelledby="heading<?php the_ID(); ?>">
                            <div class="card-block p-4">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                                    <button class="btn btn-primary">Learn More
                                        &#43;</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="wd-resources">
        <div class="row">
            <div class="col-md-6 col-12 align-self-center">
                <h3>Resources</h3>
                <p>Quidam officiis similique sea ei, vel tollit indoctum efficiendi ei, at nihil tantas platonem
                    eos.</p>
                <hr>
                <div id="accordion">
                    <?php 
                    $args = array(
                        'post_type' => 'workforce-dev',
                        'category_name' => 'resources',
                        'posts_per_page' => -1
                    );  
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                    <div class="card">
                        <div class="card-header" id="<?php the_ID(); ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-parent="#accordion"
                                    data-target="#collapse<?php the_ID(); ?>" aria-expanded="false"
                                    aria-controls="collapse<?php the_ID(); ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse<?php the_ID(); ?>" class="collapse" role="tabpanel"
                            aria-labelledby="heading<?php the_ID(); ?>">
                            <div class="card-block p-4">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
                                    <button class="btn btn-primary">Learn More
                                        &#43;</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <?php
                if ( have_rows('work_dev_pg', 'option') ):
                while( have_rows('work_dev_pg', 'option') ): the_row();
                ?>
                <?php if ( $resour_img = get_sub_field('resources_image', 'option') ) { ?>
                <img src="<?php echo $resour_img; ?>" class="img-fluid">
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

    <?php include get_theme_file_path( '/inc/newsletter.php' ); ?>
</div>

<?php
get_footer();