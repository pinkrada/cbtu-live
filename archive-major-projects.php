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
$taxonomies = get_terms( array( 'taxonomy' => 'major_proj_categories', 'hide_empty' => false, ) );
$postsPerPage = 6;
$args = array(
    'post_type'       => 'major-projects',
    'posts_per_page'  => $postsPerPage,
);
$major_proj = new WP_Query( $args );
?>
<div class="section-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-12 align-self-center">
                <div class="section-banner__content">
                    <h1 class="section-banner__title "><?php post_type_archive_title(); ?></h1>
                    <?php
                        if ( have_rows('major_projects_pg', 'option') ):
                            while( have_rows('major_projects_pg', 'option') ): the_row();
                        ?>
                    <div>
                        <?php if ( $mp_body = get_sub_field('hero_body_text', 'option') ) { ?>
                        <p class="section-banner__text"><?php echo $mp_body; ?></p>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
            <div class="col-md-7 col-12">
                <?php if ( $mp_img = get_sub_field('hero_image', 'option') ) { ?>
                    <img src="<?php echo $mp_img; ?>" class="img-fluid" alt="major_proj">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row py-5">
        <div class="col-md-7 filter-holder m-auto">
            <ul class="js-filter-projects d-flex justify-content-between list-unstyled">
                <li><a href="#" class="filter-item active" data-category="all">All</a></li>
                <?php if ( $taxonomies ): 
                    foreach ( $taxonomies as $cat ) : ?>
                        <li><a href="#" class="filter-item" data-category="<?= $cat->term_id; ?>"><?= $cat->name; ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>

            </ul>
        </div>
    </div>
    
    <div class="row js-projects-list">
        <?php if( $major_proj->have_posts() ): ?>
            <?php while( $major_proj->have_posts() ): $major_proj->the_post(); ?>
            <div class="col-md-6 block-post-holder">
                <div class="block-post">
                    <a href="<?php the_permalink(); ?>">
                        <?php $image = get_the_post_thumbnail_url($post->ID, 'large');
                            $image_url = $image ? $image : get_site_url().'/wp-content/uploads/2021/09/default-img.jpeg'; ?>
                        <div class="block-post__image">
                            <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid"/>
                        </div>
                        <h5 class="block-post__title"><?php echo get_the_title(); ?></h5>
                        <?php if ( get_the_excerpt() ): ?>
                            <p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p> 
                        <?php endif; ?>
                    </a>
                </div>
                
            </div>
            <?php endwhile; wp_reset_postdata();?>
        <?php endif; ?>
    </div>
    <?php if ( $major_proj->max_num_pages > 1 ) : ?>
        <div class="section-projects__action text-center">
            <a href="#" class="btn btn-primary js-project-load-more" ><?php echo __( 'Load More', 'cbtu' ); ?></a>
        </div>
    <?php endif; ?>
</div>

<script>
(function( $ ){
// Project Load More
var colPageNumber = 1;
     ppp = 6;
     $('.js-project-load-more').on('click', function(e) {
         e.preventDefault();
         $(this).hide();
         var button = $(this);
             category = $('.js-filter-projects a.active').data('category');
         colPageNumber++;
         $.ajax({
             url : wpAjax.ajaxUrl,
             data : { 
                 action: 'projects_load_more',
                 colPageNumber: colPageNumber,
                 ppp: ppp,
                 category: category
             },
             type : 'post',
             dataType: 'json',
             success : function( posts ) {
                 $(".js-projects-list").append(posts.content); 
                 if(posts.page == posts.max_page) {
                     $(button).hide();
                 } else {
                     $(button).show();
                 }
             }
         });
     });

// Projects filter
var ppp = 6;
$('.js-filter-projects a').on('click', function(e) {
    e.preventDefault();
    var category = $(this).data('category');
    colPageNumber = 1;
    // type = $('.js-course-box-load-more').data('type');
    $('.js-filter-projects a').removeClass('active');
    $(this).addClass('active');
    
    $('.js-project-load-more').hide();
    $.ajax({
        url : wpAjax.ajaxUrl,
        data : { 
            action: 'projects_filter',
            category: category
        },
        type : 'post',
        dataType: 'json',
        success : function( posts ) {
            $(".js-projects-list").html(posts.content); 
            if(posts.max_page > 1) {
                $('.js-project-load-more').show();
            } else {
                $('.js-project-load-more').hide();
            }
        }
    });
});
})( jQuery );   
</script>
<?php
get_footer();