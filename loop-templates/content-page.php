<?php
/**
 * Partial template for content in page.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php if ( get_field( 'banner_title' ) || get_field( 'banner_image' ) ) : ?>
	<div class="main-wrapper" id="page-wrapper">
		<div class="container">
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
<?php else: ?>
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
	<div class="wrapper">
		<div class="container-fluid" id="content" tabindex="-1">
			<div class="row">
				<div class="col-md-7 col-12 mx-auto p-5">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>