<?php
/**
 * Taxonomy Template
 */
get_header();
$slug = $wp_query->get_queried_object()->slug;
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$image = get_field('featured_image', $term);
?>

<div class="section-banner">
    <div class="container"> 
        <div class="row">
            <div class="col-md-5 col-12 align-self-center">
                <div class="section-banner__content">
                    <h1 class="section-banner__title "><?php echo $term->name; ?></h1>
                    <p class="section-banner__text"><?php echo $term->description; ?></p>
                </div>
              
            </div>
            <div class="col-md-7 col-12">
                <?php if ($image) : ?>
                    <img src="<?php echo $image['url']; ?>" class="img-fluid"/>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</div>

<div class="container">
    <?php if ( have_posts() ) : ?>
        <div class="row post__articles">
            <?php while ( have_posts() ) : the_post(); $type = get_post_type(); ?>
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
            <?php endwhile;?>
            <?php wp_reset_query(); ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
