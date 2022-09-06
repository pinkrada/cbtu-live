<?php
/**
 *Template Name: Template Single Major Projects
 *Template Post Type: major-projects
 */
get_header();
$args = array(
    'post_type' => 'major-projects',// your post type,
    'post__not_in' => array( $post->ID ),
    'post_status' => 'publish',
    'posts_per_page' => 4,
);
$the_query = new WP_Query($args);
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
    <div class="single__banner single__banner--no-image">
        <div class="row">
            <div class="col-md-7 px-5 mx-auto">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="wrapper" id="single-wrapper">
    <div class="container-fluid" id="content" tabindex="-1">
        <div class="row">
            <div class="col-md-7 col-12 mx-auto p-5">
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

<!-- Related Posts -->
<?php 
if ( $the_query->have_posts() ): ?>
         <div class="container">
            <div class="row post__articles">
                <div class="col-12">
                    <p class="section-tagline"><?php echo __( 'Other Projects', 'cbtu' ); ?></p>
                </div>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-lg-3 col-md-6 col-12 block-post-holder">
                    <div class="block-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="block-post__image">
                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid" />
                                </div>
                            <?php endif; ?>
                            <h5 class="block-post__title"><?php echo get_the_title(); ?></h5>
                            <?php if ( get_the_excerpt() ): ?>
                                <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p> 
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <?php endwhile; wp_reset_query();?>
            </div>
        </div>
<?php endif; ?>
<?php
get_footer();