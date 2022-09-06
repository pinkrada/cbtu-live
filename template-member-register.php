<?php
/*
* Template name: Member Registration
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
                <form id="cbtu-member-registration" class="section-login__form" action="" method="post">
                    <h2 class="section-login__form-title"><?php echo __( 'Register', 'cbtu' ); ?></h2>
                    <div class="js-register-response"></div>
                    <div class="form-group">
                        <input name="cbtu_member_register_fname" id="cbtu_member_register_fname" class="form-control" type="text" placeholder="<?php _e( 'First Name', 'cbtu' ); ?>" required/>
                    </div>
                    <div class="form-group">
                        <input name="cbtu_member_register_lname" id="cbtu_member_register_lname" class="form-control" type="text" placeholder="<?php _e( 'Last Name', 'cbtu' ); ?>" required/>
                    </div>
                    <div class="form-group">
                        <input name="cbtu_member_register_email" id="cbtu_member_register_email" class="form-control" type="email" placeholder="<?php _e( 'Email', 'cbtu' ); ?>" required/>
                    </div>
                    <div class="form-group">
                        <textarea name="cbtu_member_register_affiliate" id="cbtu_member_register_affiliate" class="form-control" placeholder="<?php _e( 'Affiliate', 'cbtu' ); ?>" required></textarea>
                    </div>
                    <div class="form-group">
                        <select name="cbtu_member_register_province" id="cbtu_member_register_province" class="form-control form-select">
                            <option value="">Province</option>
                            <option value="Alberta">Alberta</option>
                            <option value="British Columbia">British Columbia</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="New Brunswick">New Brunswick</option>
                            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="Northwest Territories">Northwest Territories</option>
                            <option value="Nunavut">Nunavut</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Prince Edward Island">Prince Edward Island</option>
                            <option value="Quebec">Quebec</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                            <option value="Yukon">Yukon</option>
                        </select>
                    </div>
                    <div class="form-action">
                        <?php wp_nonce_field( 'cbtu_member_register','cbtu_member_register_nonce', true, true ); ?>
                        <a href="#" class="btn btn-primary js-member-register"><?php _e( 'Register', 'cbtu' ); ?></a>
                        <span class="loader-icon js-loading">
                            <img class="loader-icon__image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/loading.gif" alt="loader">
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-6 ml-lg-auto align-self-center">
                <div class="section-login__content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
