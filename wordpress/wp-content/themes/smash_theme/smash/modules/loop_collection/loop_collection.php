<?php

function smash_loop_collection($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $a = (!empty($args['args'])) ? $args['args'] : null;
    $lp = new WP_Query($a);
    if($lp->have_posts()) : ?>
        <div class="posts-collection <?php echo $class; ?>">
            <div class="posts-collection-container">
                <?php while($lp->have_posts()) : $lp->the_post(); $i = $lp->current_post; ?>
                    <?php $cats = get_the_category(); ?>
                    <?php if($i == 0){ ?>
                        <div class="collection-post-main">
                            <div class="collection-post-main-body">
                                <div class="collection-post-main-body-inner">
                                    <?php if(get_field('products')){ ?>
                                        <div class="post-products-wrap">
                                            <div class="post-products-trigger">
                                                <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                                            </div>
                                            <div class="post-products">
                                                <?php smash_single_products(['id' => get_the_ID(), 'products' => get_field('products'), 'class' => 'xsmall-slider']); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="collection-post-main-cat"><?php echo $cats[0]->name; ?></a>
                                    <h2 class="collection-post-main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="collection-post-main-text">
                                        <?php $e = get_the_excerpt(); 
                                        echo wp_trim_words($e, 20); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="collection-post-main-link">View The Post</a>
                                </div>
                            </div>
                            <div class="collection-post-main-image" data-bgratio="1.08" style="background: url(<?php the_post_thumbnail_url('large'); ?>) no-repeat center/cover;"></div>
                        </div>
                        <div class="posts-collection-posts-side">
                    <?php } else { ?>
                            <div class="collection-post">
                                <a href="<?php echo get_term_link($cats[0]->term_id); ?>" class="collection-post-cat"><?php echo $cats[0]->name; ?></a>
                                <h4 class="collection-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                    <?php } ?>
                    <?php if($i >= 4){ ?>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; wp_reset_query();
}