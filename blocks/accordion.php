<?php

/**
 * Accordion Block Template.
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute
$id = 'accordion-block-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'accordion-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( get_field( 'block_ac_heading' ) ) : ?>
        <h4 class="accordion-heading"><?php echo get_field( 'block_ac_heading' ); ?></h4>
    <?php endif; ?>
    <?php if ( get_field( 'block_ac_text' ) ) : ?>
        <div class="accordion-description">
            <?php echo get_field( 'block_ac_text' ); ?>
        </div>
    <?php endif; ?>
    <?php if ( get_field( 'block_ac_link' ) ) : ?>
        <?php
        $link = get_field('block_ac_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="accordion-button">
                <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ( have_rows( 'block_ac_items' ) ): ?>
    <div id="parent_<?php echo esc_attr( $id ); ?>" class="accordion">
        <?php
            while( have_rows( 'block_ac_items' ) ): the_row();
            $count = get_row_index();
        ?>
            <div class="accordion-item">
                <h2 id="<?php echo 'heading_' . esc_attr( $id ) . '_' . $count; ?>" class="accordion-header" data-toggle="collapse" data-target="#<?php echo esc_attr( $id ) . '_' . $count; ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $id ) . '_' . $count; ?>">
                    <?php echo get_sub_field( 'title' ); ?>
                </h2>
                <div id="<?php echo esc_attr( $id ) . '_' . $count; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'heading_' . esc_attr( $id ) . '_' . $count; ?>" data-parent="#parent_<?php echo esc_attr( $id ); ?>">
                    <div class="accordion-body">
                        <?php echo get_sub_field( 'description' ); ?>
                        <?php if ( have_rows( 'files' ) ): ?>
                            <?php while( have_rows( 'files' ) ): the_row(); ?>
                                <?php if ( $file = get_sub_field( 'file' ) ) : ?>
                                    <p class="link-file">
                                        <a href="<?php echo $file['url']; ?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24">
                                                <path id="Path" d="M12,5V17A5,5,0,0,1,2,17V5A3,3,0,0,1,8,5v9a1,1,0,0,1-2,0V6H4v8a3,3,0,0,0,6,0V5A5,5,0,0,0,0,5V17a7,7,0,0,0,14,0V5Z" fill="#50748A"/>
                                            </svg>
                                            <?php echo $file['filename']; ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php
                        $link = get_sub_field('link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="mt-3">
                                <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>