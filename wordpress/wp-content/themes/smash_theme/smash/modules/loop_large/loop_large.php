<?php

function smash_loop_large($args = null){
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $a = (!empty($args['args'])) ? $args['args'] : null;
    $lp = new WP_Query($a);

    if($lp->have_posts()) : while($lp->have_posts()) : $lp->the_post(); ?>
        <section class="loop-large <?php echo $class; ?>">
            <div class="loop-large-wrapper container-lg">
                <div class="loop-large-banner" data-bgratio="0.52" style="background: url(<?php the_post_thumbnail_url('url'); ?>) center/cover;"></div>
                <div class="loop-large-content">
                    <div class="loop-large-body">
                        <h2 class="loop-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 4); ?></a></h2>
                        <div class="loop-text">
                            <?php $e = get_the_excerpt();
                            echo wp_trim_words($e, 30); ?>
                        </div>
                        <div class="bar-sep"></div>
                        <div class="loop-actions">
                            <a href="<?php the_permalink(); ?>" class="loop-more">View</a>
                            <?php if ( get_field('products') ) : ?>
                                <div class="dot-sep"></div>
                                <a href="#" class="loop-shop">Shop</a>
                            <?php endif; ?>
                        </div>

                        <?php if ( get_field('products') ) : ?>
                            <div class="rs-code">
                                <?php smash_single_products(['id' => get_the_ID(), 'products' => get_field('products', get_the_ID()), 'class' => 'small-slider']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ( get_field('secondary_image') ) : $image = get_field('secondary_image'); ?>
                        <div class="loop-large-image" data-bgratio="1.24" style="background: url(<?php echo $image['sizes']['large']; ?>) center/cover;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <script>
            jQuery(function($){
                $('.loop-shop').mouseenter(function(){
                    $('.loop-large-body').find('.rs-code').addClass('show');
                })
                $('.loop-large-body').mouseleave(function(){
                    $(this).find('.rs-code').removeClass('show');
                })
            });
        </script>
    <?php endwhile; endif; wp_reset_query();
}