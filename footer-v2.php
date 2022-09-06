<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<?php echo get_template_part( 'inc/newsletter-v2' ); ?>
</div>
<div class="footer-v2 wrapper" id="wrapper-footer">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="footer-v2__row">
            <div class="footer-v2__logos">
                <div>
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/cbtu-white.svg" alt="Logo"></a>
                </div>
                <div>
                    <a href="<?php echo home_url('/inthetrades'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-inthetrades.svg" alt="In the Trades Logo"></a>
                </div>
            </div>
            <div class="footer-v2__copyright">© <?php echo date('Y');?> Canada’s Building Trades Unions. <a href="<?php echo home_url('/privacy-policy');?>"><?php echo __( 'Privacy Policy', 'cbtu' ); ?></a></div>
        </div>
    </div>
</div>
</div>
<?php wp_footer(); ?>
<script>
jQuery(document).ready(function($) {
    $(".hamburger").click(function() {
        $(this).toggleClass("is-active");
    });
});
</script>

<style>
<?php if(!is_user_logged_in() ) : ?>
    .top-menu-logout{
        display: none;
    }
<?php endif; ?>
</style>
</body>

</html>
