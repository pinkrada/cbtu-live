<?php
/**
 *Template Name: Template Single Workforce Dev
 *Template Post Type: workforce-dev
 */
get_header();

if(!is_user_logged_in()) {
	wp_redirect( 'https://buildingtrades.ca/wp-login.php' );
	//remember to replace "example.com" with your domain
  }
?>
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
				<?php $pla_file = get_field('file', get_the_ID());?>

			<object data="<?php echo $pla_file['url'];?>" style="width:100%;height: 800px" type="application/pdf">
				<iframe src="<?php echo $pla_file['url'];?>"></iframe>
			</object>

            </div>
        </div>
    </div>
<?php endif; ?>



<?php
get_footer();
