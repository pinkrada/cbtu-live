<?php
/*
* Insights Library List Load More Ajax
*/
add_action('wp_ajax_nopriv_cbtu_insights_load_more', 'cbtu_insights_load_more');
add_action('wp_ajax_cbtu_insights_load_more', 'cbtu_insights_load_more');

function cbtu_insights_load_more() {
    $page = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 1;
    $topic = $_POST['topic'];
    $type = $_POST['type'];
    $keyword = $_POST['keyword'];
    $recent = get_posts( array( 'post_type' => 'insights-library', 'numberposts' => 8, 'fields' => 'ids'));

    $args = array(
        'post_type'           => 'insights-library',
        'posts_per_page'      => 4,
        'post__not_in'        => $recent,
        'paged'               => $page,
        'ignore_sticky_posts' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    if ( isset($keyword) ) {
        $args['s'] = $keyword;
    }
    $the_query = new WP_Query($args);
    $max_page = $the_query->max_num_pages;
    ob_start();
    while ( $the_query->have_posts() ) : $the_query->the_post();
	// var_dump($recent);
	?>
        <div class="block-insights">
            <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-insights__title"><?php echo get_the_title(); ?></h5></a>
            <?php $cats = get_the_category(); ?>
            <div class="block-insights__categories">
                <?php if ( $cats ) : ?>
                    <?php foreach( $cats as $cat ) : ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo $cat->name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php if ( get_the_excerpt() ): ?>
                <p class="block-insights__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p>
            <?php endif; ?>
        </div>
    <?php endwhile; wp_reset_postdata();
    $content = ob_get_clean();
    echo json_encode( array( 'content' => $content, 'page' => $page, 'max_page' => $max_page ) );
    exit;
}

//Projects load more
add_action('wp_ajax_nopriv_projects_load_more', 'projects_load_more');
add_action('wp_ajax_projects_load_more', 'projects_load_more');

function projects_load_more() {
    $ppp = $_POST["ppp"];
    $page = (isset($_POST['colPageNumber'])) ? $_POST['colPageNumber'] : 1;
    // $type = $_POST['postType'];
    $category = $_POST['category'];

    $args = array(
        'post_type'       => 'major-projects',
        'posts_per_page' => $ppp,
        'paged'          => $page,
    );

    if( isset( $category ) && 'all' != $category ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'major_proj_categories',
                'field' => 'id',
                'terms' => $category
            )
        );
    }

    $major_proj = new WP_Query( $args );
    $max_page = $major_proj->max_num_pages;
    ob_start();
    if( $major_proj->have_posts() ):
        while( $major_proj->have_posts() ): $major_proj->the_post(); ?>
            <div class="col-md-6 block-projects mb-5">
                <div class="block-projects__content">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        $image = get_the_post_thumbnail_url($post->ID, 'large');
                        $image_url = $image ? $image : get_site_url().'/wp-content/uploads/2021/09/default-img.jpeg';
                        ?>
                        <div class="block-projects__image">
                            <img src="<?php echo $image_url; ?>" alt="" class="img-fluid"/>
                        </div>
                        <p class="block-projects__title"><strong><?php echo get_the_title(); ?></strong></p>
                        <?php if ( get_the_excerpt() ): ?>
                            <p class="block-projects__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p>
                        <?php endif; ?>
                    </a>
                </div>

            </div>
        <?php endwhile; wp_reset_postdata();
    endif;
    $content = ob_get_clean();
    echo json_encode( array( 'content' => $content, 'page' => $page, 'max_page' => $max_page, 'ppp' => $ppp ) );
    exit;
}

//Projects Filter
add_action('wp_ajax_nopriv_projects_filter', 'projects_filter');
add_action('wp_ajax_projects_filter', 'projects_filter');

function projects_filter() {
    $category = $_POST['category'];
    $type = $_POST['postType'];

    $args = array(
        'post_type'       => 'major-projects',
        'posts_per_page' => 6
    );

    if( isset( $category ) && 'all' != $category ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'major_proj_categories',
                'field' => 'id',
                'terms' => $category
            )
        );
    }
    $major_proj = new WP_Query( $args );
    $max_page = $major_proj->max_num_pages;
    ob_start();
    if( $major_proj->have_posts() ):
        while( $major_proj->have_posts() ): $major_proj->the_post(); ?>
            <div class="col-md-6 block-projects mb-5">
                <div class="block-projects__content">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        $image = get_the_post_thumbnail_url($post->ID, 'large');
                        $image_url = $image ? $image : get_site_url().'/wp-content/uploads/2021/09/default-img.jpeg';
                        ?>
                        <div class="block-projects__image">
                            <img src="<?php echo $image_url; ?>" alt="" class="img-fluid"/>
                        </div>
                        <p class="block-projects__title"><strong><?php echo get_the_title(); ?></strong></p>
                        <?php if ( get_the_excerpt() ): ?>
                            <p class="block-projects__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p>
                        <?php endif; ?>
                    </a>
                </div>

            </div>
        <?php endwhile; wp_reset_postdata();
    endif;
    $content = ob_get_clean();
    echo json_encode( array( 'content' => $content, 'max_page' => $max_page) );
    exit;
}

/*
* Member
*/
add_role( 'member',
    __( 'Member' ),
    array(
        'read' => true,
        'edit_posts' => false,
        'delete_posts' => false,
        'publish_posts' => false,
        'upload_files' => true,
    )
);
add_role( 'pending',  __( 'Pending'  ) );

function add_theme_caps() {
    $roles = array( 'member', 'editor', 'administrator' );
    foreach($roles as $the_role) {
        $role = get_role( $the_role );
        $role->add_cap('read');
        if ( 'member' == $the_role ) {
            $role->add_cap('upload_files');
        }

        $role->add_cap('read_member-news-item');
        $role->add_cap('edit_member-news-item');
        $role->add_cap('edit_member-news');
        $role->add_cap('edit_published_member-news');
        $role->add_cap('publish_member-news');
        $role->add_cap('delete_published_member-news');

        $role->add_cap('read_member-resource');
        $role->add_cap('edit_member-resource');
        $role->add_cap('edit_member-resources');
        $role->add_cap('edit_published_member-resources');
        $role->add_cap('publish_member-resources');
        $role->add_cap('delete_published_member-resources');

        if ( 'administrator' == $the_role || 'editor' == $the_role ) {
            $role->add_cap('edit_others_member-news');
            $role->add_cap('delete_others_member-news');
            $role->add_cap('delete_private_member-news');
            $role->add_cap('edit_others_member-resources');
            $role->add_cap('delete_others_member-resources');
            $role->add_cap('delete_private_member-resources');
        }

        $role->add_cap( 'manage_member_news_category' );
        $role->add_cap( 'edit_member_news_category' );
        $role->add_cap( 'delete_member_news_category' );
        $role->add_cap( 'assign_member_news_category' );

        $role->add_cap( 'manage_member_resources_category' );
        $role->add_cap( 'edit_member_resources_category' );
        $role->add_cap( 'delete_member_resources_category' );
        $role->add_cap( 'assign_member_resources_category' );
    }
}
add_action( 'admin_init', 'add_theme_caps');

function cbtu_errors() {
    static $wp_error;
    return isset( $wp_error ) ? $wp_error : ( $wp_error = new WP_Error() );
}

function cbtu_show_error_messages() {
	if ( $errors = cbtu_errors()->get_error_codes() ) {
		echo '<div class="cbtu-errors">';
		   foreach( $errors as $error ){
		        $message = cbtu_errors()->get_error_message( $error );
		        echo '<span class="error"><strong>' . __('Error', 'cbtu') . '</strong>: ' . $message . '</span><br/>';
		    }
		echo '</div>';
	}
}

function cbtu_member_login() {
    if ( isset( $_POST['cbtu_member_email'] ) && wp_verify_nonce( ( isset( $_POST['cbtu_member_login_nonce'] ) ? $_POST['cbtu_member_login_nonce'] : ''), 'cbtu_user_member_login') ) {
        $user = get_user_by( 'email', $_POST['cbtu_member_email'] );

        if ( !$user || !wp_check_password( $_POST['cbtu_member_pass'], $user->user_pass, $user->ID ) ) {
            cbtu_errors()->add( 'invalid', __( 'Invalid username or password', 'cbtu' ) );
        }

        if ( !in_array( 'member', (array) $user->roles, true ) ) {
            cbtu_errors()->add( 'invalid', __( 'This login form is for members only.', 'cbtu' ) );
        }

        $errors = cbtu_errors()->get_error_messages();

        if ( empty( $errors ) ) {
            $creds = array(
                'user_login'    => $_POST['cbtu_member_email'],
                'user_password' => $_POST['cbtu_member_pass'],
                'remember'      => false
            );
            $user = wp_signon( $creds, false );

            if ( ! is_wp_error( $user ) ) {
                wp_redirect( home_url('/members-landing') );
                exit;
            }
        }
    }
}
add_action('init', 'cbtu_member_login');

function cbtu_member_register() {
    if( !isset( $_POST['cbtu_member_register_nonce'] ) || !wp_verify_nonce( $_POST['cbtu_member_register_nonce'], 'cbtu_member_register' ) )
    die( 'Ooops, something went wrong, please try again later.' );

    $type = 'error';
    $response = '';
    $fname = sanitize_text_field( $_POST['cbtu_member_register_fname'] );
    $lname = sanitize_text_field( $_POST['cbtu_member_register_lname'] );
    $email = sanitize_text_field( $_POST['cbtu_member_register_email'] );
    $affiliate = sanitize_textarea_field( $_POST['cbtu_member_register_affiliate'] );
    $province = sanitize_text_field( $_POST['cbtu_member_register_province'] );

    if ( isset( $fname ) && empty( $fname ) ) {
        $response = __( 'First name is a required field.', 'cbtu' );
    } else if ( isset( $lname ) && empty( $lname ) ) {
        $response = __( 'Last name is a required field.', 'cbtu' );
    } else if ( isset( $email ) && empty( $email ) ) {
        $response = __( 'Email is a required field.', 'cbtu' );
    } else if ( email_exists( $email ) ) {
        $response = __( 'Email already exist!', 'cbtu' );
    } else if ( isset( $affiliate ) && empty( $affiliate ) ) {
        $response = __( 'Affiliate is a required field.', 'cbtu' );
    } else if ( isset( $province ) && empty( $province ) ) {
        $response = __( 'Province is a required field.', 'cbtu' );
    } else {
        $new_user_id = wp_insert_user( [
            'user_login' => $email,
            'user_pass'  => wp_generate_password( 10, true, true ),
            'user_email' => $email,
            'first_name' => $fname,
            'last_name'	 => $lname,
            'role'       => 'pending'
        ] );

        update_user_meta( $new_user_id, 'member_affiliate', $affiliate );
        update_user_meta( $new_user_id, 'member_province', $province );
        wp_new_user_notification( $new_user_id, null, 'user' );
        cbtu_send_email_new_registration_to_admin($new_user_id);
        $type = 'success';
        $response = __( 'Thank you for signing up. We will review the registration and get back to you shortly with your login information.', 'cbtu' );
    }

    echo json_encode( array( 'type' => $type, 'response' => $response) );
    die();
}
add_action('wp_ajax_nopriv_cbtu_member_register', 'cbtu_member_register');
add_action('wp_ajax_cbtu_member_register', 'cbtu_member_register');

function cbtu_send_email_new_registration_to_admin( $user_id ) {
    $user = get_userdata($user_id);
    $user_email = $user->user_email;
    $user_full_name = $user->user_firstname ." ".$user->user_lastname;

    $to = 'robert@sparkadvocacy.ca';

    $subject = "CBTU New Member Registration";
    $body = '
        <h2>New Member Registration: ' . $user_full_name . '</h2>
        <p>You are receiving this email to notify that there is a new member registration from buildingtrades.ca</p>
        ';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    if ( wp_mail( $to, $subject, $body, $headers ) ) {
      error_log( "Email has been successfully sent to user whose email is " . $user_email );
    } else {
      error_log ("Email failed to sent to user whose email is " . $user_email) ;
    }
}

function cbtu_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $blogname ) {
    $key = get_password_reset_key( $user );

    $message = '<p>Welcome to the ' . $blogname . ' website!</p>';
    $message .= '<p>To set your password, visit the following address:</p>';
    $message .= '<p>'. network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . '</p>';
    $message .= '<p>Kind regards,</p>';
    $message .= '<p>Canada\'s Building Trades Unions</p>';
    $wp_new_user_notification_email['message'] = $message;
    $wp_new_user_notification_email['headers'] = array('Content-Type: text/html; charset=UTF-8');

    return $wp_new_user_notification_email;
}
add_filter( 'wp_new_user_notification_email', 'cbtu_wp_new_user_notification_email', 10, 3 );

function change_excerpt( $text )
{
    $pos = strrpos( $text, '[');
    if ($pos === false)
    {
        return $text;
    }

    return rtrim (substr($text, 0, $pos) );
}
add_filter('get_the_excerpt', 'change_excerpt');

/*
* Member Resources Load More Ajax
*/
add_action('wp_ajax_nopriv_cbtu_member_resources_load_more', 'cbtu_member_resources_load_more');
add_action('wp_ajax_cbtu_member_resources_load_more', 'cbtu_member_resources_load_more');

function cbtu_member_resources_load_more() {
    $page = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 1;
    $topic = $_POST['topic'];
    $type = $_POST['type'];
    $keyword = $_POST['keyword'];
    $args = array(
        'post_type'           => 'member-resources',
        'posts_per_page'      => 2,
        'paged'               => $page,
        'ignore_sticky_posts' => 1
    );
    if ( isset( $topic ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'member_resources_category',
                'field'    => 'term_id',
                'terms'    => array($topic),
            ),
        );
    }
    if ( isset($keyword) ) {
        $args['s'] = $keyword;
    }
    $the_query = new WP_Query($args);
    $max_page = $the_query->max_num_pages;
    ob_start();
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="block-insights">
            <a href="<?php echo get_the_permalink(); ?>"><h5 class="block-insights__title"><?php echo get_the_title(); ?></h5></a>
            <?php $cats = get_the_terms( get_the_ID(), 'member_resources_category' ); ?>
            <div class="block-insights__categories">
                <?php if ( $cats ) : ?>
                    <?php foreach( $cats as $cat ) : ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo $cat->name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php if ( get_the_excerpt() ): ?>
                <p class="block-insights__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '' ); ?></p>
            <?php endif; ?>
        </div>
    <?php endwhile; wp_reset_postdata();
    $content = ob_get_clean();
    echo json_encode( array( 'content' => $content, 'page' => $page, 'max_page' => $max_page ) );
    exit;
}

function cbtu_categories_postcount_filter( $variable ) {
    $variable = str_replace('(', '<span class="cat-item_count"> ', $variable);
    $variable = str_replace(')', ' </span>', $variable);
    return $variable;
}
add_filter( 'wp_list_categories', 'cbtu_categories_postcount_filter' );

add_filter( 'wpseo_breadcrumb_links', 'cbtu_yoast_seo_breadcrumb_append_link' );
function cbtu_yoast_seo_breadcrumb_append_link( $links ) {
    global $post;

    if ( is_singular('post') ) {
        $breadcrumb[] = array(
            'url' => site_url( '/blog/' ),
            'text' => __( 'Blog', 'cbtu' ),
        );
        array_splice( $links, 1, -2, $breadcrumb );
    }

    if ( is_singular('advocacy') ) {
        $breadcrumb[] = array(
            'url' => site_url( '/advocacy/' ),
            'text' => __( 'Advocacy', 'cbtu' ),
        );
        array_splice( $links, 1, -2, $breadcrumb );
    }

    if ( is_singular('insights-library') ) {
        $breadcrumb[] = array(
            'url' => site_url( '/insights-library/' ),
            'text' => __( 'Insights Library', 'cbtu' ),
        );
        array_splice( $links, 1, -2, $breadcrumb );
    }

    if ( is_singular('workforce-dev') ) {
        $breadcrumb[] = array(
            'url' => site_url( '/workforce-development/' ),
            'text' => __( 'Workforce Development', 'cbtu' ),
        );
        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
