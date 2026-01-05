<?php
function smash_block_promo_code($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $p = (!empty($args['post'])) ? $args['post'] : null;

    if($p){ ?>
        <div class="promo-code <?php echo $class; ?>">
            <div class="promo-code-inner">
                <?php if ( get_field('brand',$p->ID) ) : ?>
                    <h3 class="promo-code-brand"><?php echo get_field('brand',$p->ID); ?></h3>
                <?php endif; ?>
                <div class="promo-code-image-wrap">
                    <div class="promo-code-image" data-bgratio="1.38" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/cover;"></div>
                </div>
                <div class="promo-code-title">
                    <?php echo get_the_title($p->ID); ?>
                </div>
                <?php if ( get_field('link') ) : ?>
                    <a href="<?php echo get_field('link'); ?>" class="promo-code-link">Shop Now</a>
                <?php endif; ?>
            </div>
        </div>
    <?php }
}