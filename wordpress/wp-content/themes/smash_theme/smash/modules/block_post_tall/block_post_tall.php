<?php
function smash_block_post_tall($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $p = (!empty($args['post'])) ? $args['post'] : null;

    if($p){ ?>
        <div class="post-block-tall <?php if($class){ echo $class; } ?>">
            <?php $products = (get_field('products')) ? get_field('products') : null; ?>
            <div class="post-item-image-wrap">
                <a href="<?php the_permalink(); ?>" class="post-item-image" data-bgratio="1.12" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/cover;"></a>
                <?php if(get_field('products', $p->ID)){ ?>
                    <div class="post-products-wrap">
                        <div class="post-products-trigger">
                            <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                        </div>
                        <div class="post-products">
                            <?php smash_single_products(['id' => $p->ID, 'products' => get_field('products', $p->ID), 'class' => 'small-slider']); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php smash_block_share_icons(['class' => 'slide-share', 'post' => get_the_ID()]); ?>
            </div>
            <div class="post-block-meta">
                <?php $cats = get_the_category($p->ID);
                if($cats){ ?>
                    <a class="post-block-cat" href="<?php echo get_term_link($cats[0]->term_id); ?>"><?php echo $cats[0]->name; ?></a>
                <?php } ?>
                <div class="dot-sep"></div>
                <?php echo get_the_date(); ?>
            </div>
            <h3 class="post-block-title"><a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a></h3>
            <p class="post-block-text">
                <?php $e = get_the_excerpt($p->ID);
                if($e){ echo wp_trim_words($e, 15); } ?>
            </p>
            <div class="post-block-actions">
                <a href="<?php echo get_the_permalink($p->ID); ?>" class="post-block-link btn-primary">View The Post</a>
                <a class="comment-btn" href="<?php the_permalink(); ?>/?showcomments=true"><i class="fas fa-comment"></i><?php comments_number('Leave A Comment','1 Comment', '% Comments'); ?></a>
            </div>
        </div>
    <?php }
}