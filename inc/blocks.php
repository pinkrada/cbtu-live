<?php
function cbtu_acf_init_block_types() {
    //register accordion block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-accordion',
        'title'             => __( 'Accordion', 'cbtu' ),
        'description'       => __( 'Accordion Block', 'cbtu' ),
        'render_template'   => 'blocks/accordion.php',
        'category'          => 'common',
        'icon'              => 'menu-alt3',
        'mode'              => 'edit',
        'keywords'          => [ 'accordion' ],
    ] );
    
    //register carousel block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-carousel',
        'title'             => __( 'Carousel', 'cbtu' ),
        'description'       => __( 'Carousel Block', 'cbtu' ),
        'render_template'   => 'blocks/carousel.php',
        'category'          => 'common',
        'icon'              => 'admin-media',
        'mode'              => 'edit',
        'keywords'          => [ 'carousel' ],
    ] );

    //register tagline block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-tagline',
        'title'             => __( 'Tagline', 'cbtu' ),
        'description'       => __( '', 'cbtu' ),
        'render_template'   => 'blocks/tagline.php',
        'category'          => 'common',
        'icon'              => 'minus',
        'mode'              => 'edit',
        'keywords'          => [ 'tagline' ],
    ] );

    //register column-box block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-column-box',
        'title'             => __( 'Column Box', 'cbtu' ),
        'description'       => __( 'Column Box Block', 'cbtu' ),
        'render_template'   => 'blocks/column-box.php',
        'category'          => 'common',
        'icon'              => 'columns',
        'mode'              => 'edit',
        'keywords'          => [ 'column', 'box' ],
    ] );

    //register column-box-terms block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-column-box-terms',
        'title'             => __( 'Column Box Terms', 'cbtu' ),
        'description'       => __( 'Column Box Terms Block', 'cbtu' ),
        'render_template'   => 'blocks/column-box-terms.php',
        'category'          => 'common',
        'icon'              => 'columns',
        'mode'              => 'edit',
        'keywords'          => [ 'column', 'box', 'terms' ],
    ] );

    //register column-box-static block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-column-box-static',
        'title'             => __( 'Column Box Static', 'cbtu' ),
        'description'       => __( 'Column Box Static Block', 'cbtu' ),
        'render_template'   => 'blocks/column-box-static.php',
        'category'          => 'common',
        'icon'              => 'columns',
        'mode'              => 'edit',
        'keywords'          => [ 'column', 'box', 'static' ],
    ] );

    //register member resources
    acf_register_block_type( [
        'name'              => 'cbtu-block-member-resources',
        'title'             => __( 'Member Resources', 'cbtu' ),
        'description'       => __( 'Member Resources Block', 'cbtu' ),
        'render_template'   => 'blocks/member-resources.php',
        'category'          => 'common',
        'icon'              => 'media-document',
        'mode'              => 'edit',
        'keywords'          => [ 'member', 'resources' ],
    ] );

    //register post type block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-featured-post',
        'title'             => __( 'Select Featured Post', 'cbtu' ),
        'description'       => __( 'Select Featured Post Block', 'cbtu' ),
        'render_template'   => 'blocks/featured-post.php',
        'category'          => 'common',
        'icon'              => 'media-document',
        'mode'              => 'edit',
        'keywords'          => [ 'select', 'featured', 'post' ],
    ] );

    //register ratings block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-ratings',
        'title'             => __( 'Ratings', 'cbtu' ),
        'description'       => __( 'Ratings Block', 'cbtu' ),
        'render_template'   => 'blocks/ratings.php',
        'category'          => 'common',
        'icon'              => 'media-document',
        'mode'              => 'edit',
        'keywords'          => [ 'ratings' ],
    ] );

    //register section blog block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-section-blog',
        'title'             => __( 'Section Blog', 'cbtu' ),
        'description'       => __( 'Section Blog Block', 'cbtu' ),
        'render_template'   => 'blocks/section-blog.php',
        'category'          => 'common',
        'icon'              => 'media-document',
        'mode'              => 'edit',
        'keywords'          => [ 'section', 'blog' ],
    ] );

    //register section pla block.
    acf_register_block_type( [
        'name'              => 'cbtu-block-section-pla',
        'title'             => __( 'Section PLA', 'cbtu' ),
        'description'       => __( 'Section Blog PLA', 'cbtu' ),
        'render_template'   => 'blocks/pla.php',
        'category'          => 'common',
        'icon'              => 'media-document',
        'mode'              => 'edit',
        'keywords'          => [ 'section', 'pla' ],
    ] );

	//register timeline block
	acf_register_block_type( [
		'name'              => 'cbtu-block-timeline',
		'title'             => __( 'Timeline', 'cbtu' ),
		'description'       => __( 'Timeline', 'cbtu' ),
		'render_template'   => 'blocks/timeline.php',
		'category'          => 'common',
		'icon'              => 'media-document',
		'mode'              => 'edit',
		'keywords'          => [ 'section', 'pla' ],
	] );
}
add_action( 'acf/init', 'cbtu_acf_init_block_types' );
