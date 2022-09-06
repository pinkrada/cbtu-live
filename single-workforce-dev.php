<?php
/**
 *Template Name: Template Single Workforce Dev
 *Template Post Type: workforce-dev
 */
get_header();


?>
<?php if ( has_post_thumbnail() ) : ?>
    <div class="single__banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 align-self-center">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
                <div class="col-lg-6 col-12 img-holder">
                    <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
	<?php if ( !get_field( 'banner_title' ) ) : ?>
    <div class="single__banner single__banner--no-image">
        <div class="row">
            <div class="col-md-7 px-5 mx-auto">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
    </div>
	<?php endif; ?>
<?php endif; ?>

<div class="wrapper" id="single-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <div class="row">
            <div class="<?php echo (!get_field( 'banner_title' ) ? 'col-lg-7': 'col-lg-8');?> col-12 mx-auto p-5">
                <main class="site-main" id="main">
                    <?php while ( have_posts() ) {
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
