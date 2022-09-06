<?php
/**
 * Template Name: Default template with breadcrumbs 
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
<div class="main-wrapper" id="page-wrapper">
    <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <?php echo get_template_part( 'loop-templates/content', 'page' ); ?>
    </div><!-- #content -->
</div><!-- #page-wrapper -->
<?php
get_footer();