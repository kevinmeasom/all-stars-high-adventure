<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_hero_posts_script', get_template_directory_uri() . '/smash/modules/slider_hero_posts/slider_hero_posts.js', array(), '1', true );
} );

function smash_slider_hero_posts($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $slides = (!empty($args['slides'])) ? $args['slides'] : null;
    
    if($slides){ ?>
        <section id="hero_slider" class="<?php echo $class; ?>">
            <div class="container-xl hero-slider">
                <?php foreach($slides as $p) { ?>
                    <div class="hero-slide">
                        <div class="hero-image" data-bgratio="0.60" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/cover;">
                            <?php if(get_field('products', $p->ID)){ ?>
                                <div class="post-products-wrap">
                                    <div class="post-products-trigger btn btn-secondary">
                                        <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                                        <span>Shop</span>
                                    </div>
                                    <div class="post-products">
                                        <?php smash_single_products(['id' => $p->ID, 'products' => get_field('products', $p->ID), 'class' => 'large-slider']); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="hero-body">
                                <h2 class="hero-title"><?php echo get_the_title($p->ID); ?></h2>
                                <a href="<?php echo get_permalink($p->ID); ?>" class="btn btn-primary">Read the Post</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
}