<?php
/**
 * The template for displaying all single posts
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
            <div class="col-10 align-self-center">
                <?php the_title( '<h2>', '</h2>' ); ?>
                <p><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></p>
            </div>
        </div>
    </div>
</section>
<div class="wrapper" id="single-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="row">
            <div class="col-md-10 col-12 mx-auto p-5">
                <main class="site-main" id="main">
                    <?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
				}
				?>
                </main><!-- #main -->
            </div>
        </div><!-- .row -->
    </div><!-- #content -->
</div><!-- #single-wrapper -->
<?php
get_footer();