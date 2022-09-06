<?php
/**
 * The template for displaying search results pages
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="search-wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<?php if ( have_posts() ) : ?>
			<h2 class="section-heading search-wrapper__heading"><?php printf( esc_html__( 'Search Results for: %s', 'cbtu' ), '<em>' . get_search_query() . '</em>' ); ?></h2>
			<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'loop-templates/content', 'search' );
				endwhile;
			?>
		<?php else : ?>
			<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		<?php endif; ?>
		<?php understrap_pagination(); ?>
	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php
get_footer();
