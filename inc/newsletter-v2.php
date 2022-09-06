 <!-- Begin Mailchimp Signup Form -->
 <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
<div id="newsletter" class="section-newsletter-v2">
    <div class="container">
        <div class="row justify-content-between">
        <?php
        if ( have_rows('newsletter_v2', 'option') ):
            while( have_rows('newsletter_v2', 'option') ): the_row();
        ?>
            <?php if ( $heading = get_sub_field('nv2_heading', 'option') ) { ?>
                <div class="col-lg-5 col-xl-4">
                    <h2 class="section-newsletter-v2__heading"><?php echo $heading; ?></h2>
                </div>
            <?php } ?>
            <div class="col-lg-7">
                <div class="section-newsletter-v2__content">                    
                     <div id="mc_embed_signup">
                        <form action="https://buildingtrades.us8.list-manage.com/subscribe/post?u=989dc34bd8ddb9437d594ff39&amp;id=cc8466b5b4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        
                            <div id="mc_embed_signup_scroll" class="d-sm-flex justify-content-center align-items-center">
                                <input type="email" value="" name="EMAIL" class="email w-100" id="mce-EMAIL" placeholder="<?php _e( 'Email', 'cbtu' ); ?>">
                                 <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_989dc34bd8ddb9437d594ff39_cc8466b5b4" tabindex="-1" value=""></div>
                                <div class="clear">
                                    <input type="submit" value="<?php _e( 'Send', 'cbtu' ); ?>" name="subscribe" id="mc-embedded-subscribe" class="btn-yellow">
                                </div>
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>  
                        </form>
                    </div>
                    <!--End mc_embed_signup-->
                    <?php if ( $news_body = get_sub_field('nv2_text', 'option') ) { ?>
                        <div class="section-newsletter-v2__text">
                            <?php echo $news_body; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
        </div>
    </div>
</div>