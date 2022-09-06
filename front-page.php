<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 align-self-center">
                <?php
					$hero = get_field('homepage_hero'); ?>
                <h1>
                    <?php echo $hero['dark_blue_text']; ?>
                    <span class="teal">
                        <?php echo $hero['light_blue_text']; ?>
                    </span>
                </h1>
                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow-down.svg" alt="Down Arrow" width="48px"
                    height="52px" class="down-arrow" />
            </div>
            <div class="col-lg-8 col-12 text-center align-self-center">
                <?php if( have_rows('homepage_hero') ): ?>
                <?php while ( have_rows('homepage_hero') ) : the_row(); ?>
                <img src="<?php echo esc_attr($hero['image']['url']); ?>"
                    alt="<?php echo esc_attr($hero['image']['alt']); ?>" class="img-fluid" width="635px"
                    height="352px" />
                <?php endwhile; ?>
                <?php else : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div class="main-wrapper">
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>

<?php
get_footer();