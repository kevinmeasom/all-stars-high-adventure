<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_featured_products_script', get_template_directory_uri() . '/smash/modules/slider_featured_products/slider_featured_products.js', array(), '1', true );
} );

function smash_slider_featured_products($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $justify = ($cta) ? 'between' : 'center';
    $products = (!empty($args['products'])) ? $args['products'] : null;

    if($products){ ?>
        <section id="featured_products" class="<?php echo $class; ?>">
            <div class="featured-products-inner container-xl">
                <div class="featured-products-header-wrap flex align-center justify-<?php echo $justify; ?>">
                    <div class="featured-products-header">
                        <?php if($title){ ?>
                            <h2 class="featured-products-title"><?php echo $title; ?></h2>
                        <?php } ?>
                    </div>

                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="all-products-link animate-right">
                            <?php echo $cta; ?>
                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                        </a>
                    <?php } ?>
                </div>
                <div class="featured-products-slider">
                    <?php foreach($products as $product) { ?>
                        <?php smash_block_product(['class' => 'product-grid-item', 'product' => $product, 'description' => false]); ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}