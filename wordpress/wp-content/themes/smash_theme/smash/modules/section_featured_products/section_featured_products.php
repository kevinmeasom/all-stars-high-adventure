<?php

function smash_section_featured_products($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : 'Featured Products';
    $link_1 = (!empty($args['link_1'])) ? $args['link_1'] : null;
    $link_1_text = (!empty($args['link_1_text'])) ? $args['link_1_text'] : null;
    $link_2 = (!empty($args['link_2'])) ? $args['link_2'] : null;
    $link_2_text = (!empty($args['link_2_text'])) ? $args['link_2_text'] : null;
    $a = (!empty($args['args'])) ? $args['args'] : ['post_type' => 'affiliate_product', 'posts_per_page' => 3];
    
    $loop = new WP_Query($a);

    if($loop->have_posts()) : ?>
    <section id="featured_products" class="<?php echo $class; ?>">
        <div class="products-container container-lg">
            <div class="products-header flex align-center justify-between">
                <a href="<?php echo $link_1 ?>" class="products-link"><?php echo $link_1_text ?></a>
                <h2 class="products-title"><?php echo $title; ?></h2>
                <a href="<?php echo $link_2 ?>" class="products-link"><?php echo $link_2_text ?></a>
            </div>
            <div class="products-items flex flex-wrap justify-between">
                <?php while($loop->have_posts()) : $loop->the_post(); ?>
                    <a href="<?php the_field('product_link'); ?>" class="featured-product flex align-center justify-start" target="_blank">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="product-body">
                            <div class="product-brand"><?php the_field('brand_name'); ?></div>
                            <div class="product-title"><?php the_title(); ?></div>
                        </div>
                    </a>
                <?php endwhile; ?>      
            </div>
        </div>
    </section>
    <?php endif; wp_reset_query();
}