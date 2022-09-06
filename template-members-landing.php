<?php
/*
* Template name: Members Landing
*
*/
$user = wp_get_current_user();
if ( ! is_user_logged_in() && ( ! in_array( 'member', (array) $user->roles ) || ! in_array( 'administrator', (array) $user->roles ) ) ) {
    wp_redirect( home_url('/login') );
    exit;
}

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="main-wrapper">
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>
<?php
get_footer();