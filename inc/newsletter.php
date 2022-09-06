 <!-- Begin Mailchimp Signup Form -->
 <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
<div id="newsletter" class="section-newsletter">
    <div class="container">
        <div class="row">
        <?php
        if ( have_rows('newsletter', 'option') ):
            while( have_rows('newsletter', 'option') ): the_row();
        ?>
            <?php if ( $news_image = get_sub_field('image', 'option') ) { ?>
                <div class="col-md-6 align-self-center">
                    <img src="<?php echo $news_image['url']; ?>" alt="<?php echo $news_image['image']['alt']; ?>" class="img-fluid section-newsletter__image">
                </div>
            <?php } ?>
            <div class="col-md-6">
                <div class="section-newsletter__content">
                    <?php if ( $tagline = get_sub_field('tagline', 'option') ) { ?>
                        <p class="section-tagline"><?php echo $tagline; ?></p>
                    <?php } ?>
                    <?php if ( $news_head = get_sub_field('heading_text', 'option') ) { ?>
                        <h3 class="section-newsletter__heading"><?php echo $news_head; ?></h3>
                    <?php } ?>
                    <?php if ( $news_body = get_sub_field('body_text', 'option') ) { ?>
                        <p><?php echo $news_body; ?></p>
                    <?php } ?>
                     <div id="mc_embed_signup">
                        <form action="https://buildingtrades.us8.list-manage.com/subscribe/post?u=989dc34bd8ddb9437d594ff39&amp;id=cc8466b5b4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        
                            <div id="mc_embed_signup_scroll" class="d-sm-flex justify-content-center align-items-center">
                                <input type="email" value="" name="EMAIL" class="email w-100" id="mce-EMAIL" placeholder="<?php _e( 'Email Address', 'cbtu' ); ?>">
                                 <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_989dc34bd8ddb9437d594ff39_cc8466b5b4" tabindex="-1" value=""></div>
                                <div class="clear">
                                    <input type="submit" value="<?php _e( 'Submit', 'cbtu' ); ?>" name="subscribe" id="mc-embedded-subscribe" class="btn-brown-dark-lg mt-0">
                                </div>
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>  
                        </form>
                    </div>

                    <!--End mc_embed_signup-->
                </div>
            </div>
        <?php endwhile; endif; ?>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        </div>
    </div>
</div>