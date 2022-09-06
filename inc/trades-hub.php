    <section id="construction-hub">
        <div class="row">
            <div class="col-md-6 col-12 align-self-center">
                <p class="tag-line">Construction trades hub</p>
                <?php
					$ct_hub = get_field('homepage_construction_trades_hub'); ?>
                <h3><?php echo $ct_hub['heading_text'];?></h3>
                <p><?php echo $ct_hub['body_text'];?></p>
                <button class="btn btn-primary"><?php echo $ct_hub['button_text'];?></button>
            </div>
            <div class="col-md-6 col-12"><img src="<?php echo esc_attr($ct_hub['image']['url']); ?>"
                    alt="<?php echo $ct_hub['image']['alt']; ?>" class="img-fluid" width="540px" height="300px"></div>
        </div>
    </section>