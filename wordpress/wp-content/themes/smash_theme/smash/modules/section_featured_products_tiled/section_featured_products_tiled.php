<?php

function smash_section_featured_products_tiled($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $products = (!empty($args['products'])) ? $args['products'] : null;

    if($products){ ?>
        <div class="tiled-products-wrapper <?php echo $class; ?>">
            <div class="tiled-products-container">
                <?php if($title){ ?>
                    <h4 class="tiled-products-title"><?php echo $title; ?></h4>
                <?php } ?>
                <div class="tiled-products">
                    <?php foreach($products as $key => $product) { $layout = ($key < 2) ? 'product-row' : ''; ?>
                        <?php if($key == 0 || $key == 2){ ?>
                            <div class="tiled-products-col">
                        <?php } ?>
                            <?php smash_block_product(['class' => $layout, 'product' => $product]); ?>
                        <?php if($key == 1 || $key == 2){ ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
}