<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TWKVH28');
    </script>
	<meta name="facebook-domain-verification" content="p5mflmnur0x6jglp9cxh22nslyjovj" />
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TWKVH28" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <?php do_action( 'wp_body_open' ); ?>
    <div class="site" id="page">
        <div id="wrapper-navbar">
            <a class="skip-link sr-only sr-only-focusable"
                href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a href="<?php echo get_home_url(); ?>" class="navbar-brand-holder">
                    <?php $logo = (ICL_LANGUAGE_CODE === 'en') ? 'cbtu-logo':'SMCC';?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $logo;?>.svg"
                            alt="Canada’s Building Trades Unions (CBTU) Logo" class="navbar-brand" width="228px"
                            height="88px" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger" id="hamburger__icon">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </button>
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <div class="navbar-collapse__holder">
                            <?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'topNav' ) ); ?>
                            <div class="menu-main-menu-container">
                                <ul id="main-menu" class="navbar-nav ml-auto">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location'  => 'primary',
                                            'fallback_cb'     => '',
                                            'container'       => '',
                                            'items_wrap'      => '%3$s',
                                            'depth'           => 2,
                                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                                        )
                                    );
                                    ?>
                                    <li class="navbar-hide-tablet-down">
                                        <form role="search" method="get" id="searchform" class="searchform js-searchform" action="<?php echo esc_url( home_url( '/' ) ) ; ?>">
                                            <div class="searchform__input">
                                                <input type="text" value="" name="s" id="s" placeholder="<?php echo __( 'Search Terms', 'cbtu' ); ?>">
                                            </div>
                                            <span class="icon js-header-search">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path id="search" d="M21.627,24h0l-6.288-6.237A9.82,9.82,0,0,1,0,9.73a9.809,9.809,0,0,1,19.617,0,9.6,9.6,0,0,1-1.872,5.711L24,21.646,21.628,24ZM9.809,2.853A6.877,6.877,0,1,0,16.741,9.73,6.912,6.912,0,0,0,9.809,2.853Z" fill="#fff"/>
                                                </svg>
                                            </span>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <form role="search" method="get" id="searchform" class="searchform-mobile active js-searchform navbar-hide-tablet-up" action="<?php echo esc_url( home_url( '/' ) ) ; ?>">
                            <div class="searchform__input">
                                <input type="text" value="" name="s" id="s" placeholder="<?php echo __( 'Search Terms', 'cbtu' ); ?>">
                            </div>
                            <span class="icon js-header-search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path id="search" d="M21.627,24h0l-6.288-6.237A9.82,9.82,0,0,1,0,9.73a9.809,9.809,0,0,1,19.617,0,9.6,9.6,0,0,1-1.872,5.711L24,21.646,21.628,24ZM9.809,2.853A6.877,6.877,0,1,0,16.741,9.73,6.912,6.912,0,0,0,9.809,2.853Z" fill="#fff"/>
                                </svg>
                            </span>
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        <?php
        if(is_single() || is_category() || is_page_template( 'template-default-with-breadcrumbs.php' ) ){
            if ( function_exists('yoast_breadcrumb') && ('workforce-dev' != get_post_type()) ) {
            yoast_breadcrumb( '<div id="breadcrumbs" class="pt-5"><div class="container">','</div></div>' );
            }
        }
        ?>

        <?php if ( get_field( 'banner_title' ) && ! is_search() ) : ?>
            <div class="section-banner<?php echo empty(get_field( 'banner_image' )) ? ' section-banner--narrow' : '' ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 align-self-center">
                            <div class="section-banner__content">
                                <h1 class="section-banner__title <?php echo empty(get_field( 'banner_text' )) ? 'mb-0' : ''; ?>"><?php echo get_field( 'banner_title' ); ?></h1>
                                <div class="section-banner__text">
                                    <?php echo get_field( 'banner_text' ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <?php if ( $banner_img = get_field( 'banner_image' ) ) : ?>
                                <img src="<?php echo $banner_img['url']; ?>" alt="<?php echo $banner_img['title']; ?>" class="img-fluid">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
