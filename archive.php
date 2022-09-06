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

<div class="main-wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<?php if ( have_posts() ) : ?>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-6 col-lg-4 block-post-holder">
						<div class="block-post">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
									$image_url = $image ? $image : get_site_url().'/wp-content/uploads/2021/09/default-img.jpeg'; ?>
								<a href="<?php echo get_the_permalink(); ?>" class="block-post__image">
									<img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>">
								</a>
							<?php endif; ?>
							<a href="<?php echo get_the_permalink(); ?>"><h5 class="block-post__title"><?php echo get_the_title(); ?></h5></a>
							<div class="block-post__meta">
								<?php
								$author_id = get_post_field( 'post_author', get_the_ID() );
								if ( get_the_author_meta( 'first_name', $author_id ) && get_the_author_meta( 'last_name', $author_id ) ) {
									$name = get_the_author_meta( 'first_name', $author_id ) . ' ' . get_the_author_meta( 'last_name', $author_id );
								} else {
									$name = get_the_author_meta( 'display_name', $author_id );
								}
								?>
								<span><?php echo $name; ?></span>
								<span class="block-post__date"><?php echo get_the_date( 'j M Y' ); ?></span>
							</div>
							<?php if ( get_the_excerpt() ): ?>
								<p class="block-post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 17, '' ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php understrap_pagination(); ?>
		<?php else : ?>
			<?php echo get_template_part( 'loop-templates/content', 'none' ); ?>
		<?php endif; ?>
	</div><!-- #content -->
</div><!-- #archive-wrapper -->

<?php
get_footer();
