<?php

function smash_section_quick_shop($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : '#';
    $label = (!empty($args['label'])) ? $args['label'] : null;
    $alert = (!empty($args['alert'])) ? $args['alert'] : null;
    $pos = (!empty($args['alert_pos'])) ? $args['alert_pos'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $products = (!empty($args['products'])) ? $args['products'] : null;

    if($products){ ?>
        <section class="quick-shop">
            <div class="quick-shop-container">
                <div class="quick-shop-left">
                    <?php if($image){ ?>
                        <div class="quick-shop-image" data-bgratio="0.82" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;">
                            <?php if($label){ ?>
                                <div class="quick-shop-label">
                                    <?php echo $label; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="quick-shop-body">
                        <?php if($title){ ?>
                            <h1 class="quick-shop-title"><?php echo $title; ?></h1>
                        <?php } ?>
                        <?php if($text){ ?>
                            <div class="quick-shop-text">
                                <?php echo $text; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="quick-shop-products-wrapper">
                    <div class="quick-shop-products">
                        <?php foreach($products as $key => $product) { ?>
                            <?php if($key+1 == $pos && $alert){ ?>
                                <?php smash_block_product(['class' => 'product-row', 'product' => $product, 'alert' => $alert, 'description' => false]); ?>
                            <?php } else { ?>
                                <?php smash_block_product(['class' => 'product-row', 'product' => $product, 'description' => false]); ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <?php if($cta){ ?>
                        <a href="<?php echo $link; ?>" class="quick-shop-cta"><?php echo $cta; ?></a>
                    <?php } ?>
                    
                </div>
            </div>
        </section>
    <?php }
}