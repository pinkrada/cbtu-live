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
<?php echo get_template_part( 'inc/newsletter' ); ?>
<div class="wrapper" id="wrapper-footer">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="footer-menu">
            <a href="<?php echo home_url(); ?>" class="footer-brand">
                <?php $logo = (ICL_LANGUAGE_CODE === 'en') ? 'cbtu-white' :'smcc-white';?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $logo;?>.svg"
                    alt="Canada’s Building Trades Unions (CBTU) Logo" width="228px" height="88px" />
            </a>
            <div class="footer-menu__nav">

                <?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-nav',
						'menu_id'         => 'footer-nav',
					)
				);
				?>

            </div>
        </div>
        <div class="copyright">
            <div class="copyright__text">© Copyright 2021. CBTU All Rights Reserved.</div>
            <div class="copyright__right">
                <?php wp_nav_menu( array( 'theme_location' => 'footer_bottom', 'container' => '', 'menu_class' => 'footer-list' ) ); ?>
                <ul class="social-icons align-items-center">
                    <?php
                    if ( have_rows('social_media', 'option') ):
                        while( have_rows('social_media', 'option') ): the_row();
                    ?>
                    <?php if ( $fbook = get_sub_field('facebook_url', 'option') ) { ?>
                        <li>
                            <a href="<?php echo $fbook; ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="Facebook Icon"
                                    width="40px" height="40px" />
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ( $ig = get_sub_field('instagram_url', 'option') ) { ?>
                        <li>
                            <a href="<?php echo $ig; ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Instagram Icon"
                                    width="40px" height="40px" />
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ( $linkedin = get_sub_field('linkedin_url', 'option') ) { ?>
                        <li>
                            <a href="<?php echo $linkedin; ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.svg" alt="LinkedIn Icon"
                                    width="40px" height="40px" />
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ( $twitter = get_sub_field('twitter_url', 'option') ) { ?>
                        <li>
                            <a href="<?php echo $twitter; ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" alt="Twitter Icon"
                                    width="40px" height="40px" />
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ( $ytube = get_sub_field('youtube_url', 'option') ) { ?>
                        <li>
                            <a href="<?php echo $ytube; ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/youtube.svg" alt="YouTube Icon"
                                    width="40px" height="40px" />
                            </a>
                        </li>
                    <?php } ?>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
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
