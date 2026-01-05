<?php

function smash_section_shop_highlights($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    $products = (!empty($args['products'])) ? $args['products'] : null;
    $dots = (!empty($args['dots'])) ? $args['dots'] : null;

    if($products){ ?>
        <section class="shop-highlights <?php echo $class; ?>">
            <div class="shop-highlights-inner container-xl">
                <div class="shop-highlights-wrapper">
                    <?php smash_block_highlights(['image' => $image, 'dots' => $dots, 'products' => $products]); ?>
                    <div class="shop-highlights-body">
                        <?php if($title){ ?>
                            <h2 class="shop-highlights-title">
                                <?php echo $title; ?>
                            </h2>
                        <?php } ?>
                        <div class="shop-highlights-products">
                            <?php foreach($products as $product) { ?>
                                <?php smash_block_product(['class' => 'product-grid-item', 'product' => $product, 'description' => false]); ?>
                            <?php } ?>
                        </div>

                        <?php if($cta && $link){ ?>
                            <a href="<?php echo $link; ?>" class="shop-highlights-cta animate-right">
                                <?php echo $cta; ?>
                                <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}