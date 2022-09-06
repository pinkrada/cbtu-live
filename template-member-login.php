<?php
/*
* Template name: Member Login
*
*/

defined( 'ABSPATH' ) || exit;
if ( is_user_logged_in() ) {
    wp_redirect( admin_url() );
    exit;  
}

get_header();
?>

<div class="section-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <form id="cbtu_member_login" class="section-login__form" action="" method="post">
                    <h2 class="section-login__form-title"><?php echo __( 'Login', 'cbtu' ); ?></h2>
                    <?php cbtu_show_error_messages(); ?>
                    <div class="form-group">
                        <input name="cbtu_member_email" id="cbtu_member_email" class="form-control" type="email" placeholder="<?php _e( 'Email', 'cbtu' ); ?>" required/>
                    </div>
                    <div class="form-group">
                        <input name="cbtu_member_pass" id="cbtu_member_pass" class="form-control" type="password" placeholder="<?php _e( 'Password', 'cbtu' ); ?>" required/>
                    </div>
                    <div class="form-action">
                        <a href="<?php echo get_site_url(); ?>/wp-login.php?action=lostpassword" class="text-link"><?php _e( 'Forgot password?', 'cbtu' ); ?></a>
                        <?php wp_nonce_field( 'cbtu_user_member_login','cbtu_member_login_nonce', true, true ); ?>
                        <input id="cbtu_member_submit" type="submit" value="<?php _e( 'Login', 'cbtu' ); ?>" class="btn btn-primary" />
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-6 ml-lg-auto align-self-center">
                <div class="section-login__content">
                    <h5><?php echo get_field( 'member_title' ); ?></h5>
                    <?php echo get_field( 'member_text' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();